<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Pesan\ValidationRequest;
use App\Pesan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PesanController extends Controller
{
    
    public function form() {
    	return view ('vendor.backpack.base.pesan.form');
    }

    public function send(ValidationRequest $request)
    {
        abort_if(!function_exists('curl_init'), 400, 'CURL is not installed.');
        $curl = curl_init('http://smsgateway.me/api/v3/messages/send');
 
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'email'    => config('smsgateway.email'),
            'password' => config('smsgateway.password'),
            'device'   => config('smsgateway.device'),
            'number'   => $request->number,
            'name'     => $request->name,
            'message'  => $request->message,
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
        $response = json_decode(curl_exec($curl));
 
        curl_close($curl);
 
        if ($response->success === true) {
            if (!empty($response->result->fails)) {
                Log::debug($response->result->fails);
            } else {
                foreach ($response->result->success as $success) {
                    $messages[] = [
                        'type'           => 'outbox',
                        'contact_id'     => $success->contact->id,
                        'contact_name'   => $success->contact->name,
                        'contact_number' => $success->contact->number,
                        'device_id'      => $success->device_id,
                        'message'        => $success->message,
                        'expired_at'     => Carbon::now()->timestamp($success->expires_at),
                        'created_at'     => Carbon::now(),
                        'updated_at'     => Carbon::now(),
                    ];
                }
 
                Pesan::insert($messages);
 
                return redirect()
                    ->route('pesan.form')
                    ->withSuccess('Pesan terkirim.');
            }
        } else {
            Log::debug(json_encode($response->errors));
        }
 
        return redirect()
            ->back()
            ->withError('Gagal mengirim pesan.');
    }
}
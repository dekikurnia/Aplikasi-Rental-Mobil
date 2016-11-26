<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Kendaraan;
use App\LogPeminjaman;
use App\Pelanggan;
use Webpatser\Uuid\Uuid;
use Session;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $kendaraan = Kendaraan::join('merk', 'kendaraan.id_merk', '=', 'merk.id')
            ->select('kendaraan.id', 'kendaraan.no_plat', 'merk.nama_merk')
            ->where('kendaraan.status_rental', '=', 'Tersedia');
            return Datatables::of($kendaraan)
            ->addColumn('action', function($kendaraan){
                return '<a class="btn btn-xs btn-success" href="'.route('pinjam.kendaraan', $kendaraan->id).'"">Pinjam</a>'; 
            })->make(true); 
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'no_plat', 'name'=>'no_plat', 'title'=>'No Plat'])
        ->addColumn(['data' => 'nama_merk', 'name' => 'nama_merk', 'title'=>'Merk', 'orderable'=>false, 'searchable'=>false])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);   
        return view('vendor.backpack.base.peminjaman.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pinjam($id) 
    {
         try {
            $kendaraan = Kendaraan::findOrFail($id);
            LogPeminjaman::create(['id'=> Uuid::generate(4), 
                'id_kendaraan'=> $id,
                'id_pelanggan' =>'6c57e255-2cfb-43cd-b6b1-51a703caf92c'
                ]);

            $kendaraan = Kendaraan::find($id);
            $kendaraan->status_rental = 'Dipinjam';
            $kendaraan->save();

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil meminjam $kendaraan->no_plat"
                ]);

        } catch (ModelNotFoundException $e) {

            Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>"Kendaraan tidak ditemukan."
                ]);
        }
        return redirect('/admin/peminjaman');
    }

}

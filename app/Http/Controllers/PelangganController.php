<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Pelanggan;
use Webpatser\Uuid\Uuid;
use Session;
use Excel;
use PDF;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $pelanggan = Pelanggan::select(['id', 'no_ktp', 'nama','alamat', 'telepon']);
            return Datatables::of($pelanggan)
            ->addColumn('action', function($pelanggan){
                return view('vendor.backpack.base.datatable._action', [
                    'model' => $pelanggan, 
                    'form_url' => route('pelanggan.destroy', $pelanggan->id),
                    'edit_url' => route('pelanggan.edit', $pelanggan->id),
                    'confirm_message' => 'Yakin ingin menghapus ' . $pelanggan->nama. '?'
                    ]);
            })->make(true); 
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'no_ktp', 'name'=>'no_ktp', 'title'=>'No KTP'])
        ->addColumn(['data' => 'nama', 'name'=>'naman', 'title'=>'Nama Pelanggan'])
        ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
        ->addColumn(['data' => 'telepon', 'name'=>'telepon', 'title'=>'Telepon'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);   
        return view('vendor.backpack.base.pelanggan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.backpack.base.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['no_ktp' => 'required|unique:pelanggan|numeric']);
        $this->validate($request, ['nama' => 'required']);
        $this->validate($request, ['alamat' => 'required']);
        $this->validate($request, ['telepon' => 'required|numeric']);
        $pelanggan = new Pelanggan();
        $pelanggan->id = Uuid::generate(4);
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $pelanggan->nama"
            ]);
        return redirect()->route('pelanggan.index');
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
        $pelanggan = Pelanggan::find($id);
        return view('vendor.backpack.base.pelanggan.edit')->with(compact('pelanggan'));
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
        $this->validate($request, ['no_ktp' => 'required|numeric']);
        $this->validate($request, ['nama' => 'required']);
        $this->validate($request, ['alamat' => 'required']);
        $this->validate($request, ['telepon' => 'required|numeric']);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->id = Uuid::generate(4);
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $pelanggan->nama_pelanggan"
            ]);
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Pelanggan berhasil dihapus"
            ]);
        return redirect()->route('pelanggan.index');
    }

    public function export()
    {
        return view('vendor.backpack.base.pelanggan.export');
    }

    public function exportPost(Request $request) 
    { 
        $this->validate($request, [
            'pelanggan'=>'required|in:pdf,xls'
        ]);


        $pelanggan= Pelanggan::select('no_ktp', 'nama', 'alamat', 'telepon')->get();
 
        $handler = 'export' . ucfirst($request->get('pelanggan'));
        return $this->$handler($pelanggan);
    }

    private function exportPdf($pelanggan)
    {
        $pdf = PDF::loadview('vendor.backpack.base.pdf.pelanggan', compact('pelanggan'));
        return $pdf->stream('pelanggan.pdf');
    }
}


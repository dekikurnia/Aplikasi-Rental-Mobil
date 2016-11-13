<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Kendaraan;
use App\Merk;
use Webpatser\Uuid\Uuid;
use Session;
use Excel;
use PDF;

class KendaraanController extends Controller
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
            ->select(['kendaraan.id', 'kendaraan.no_plat', 'kendaraan.tahun', 'kendaraan.tarif_perjam', 'kendaraan.status_rental', 'merk.nama_merk']);
            return Datatables::of($kendaraan)
            ->addColumn('action', function($kendaraan){
                return view('vendor.backpack.base.datatable._action', [
                    'model' => $kendaraan, 
                    'form_url' => route('kendaraan.destroy', $kendaraan->id),
                    'edit_url' => route('kendaraan.edit', $kendaraan->id),
                    'confirm_message' => 'Yakin ingin menghapus ' . $kendaraan->no_plat. '?'
                    ]);
            })->make(true); 
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'no_plat', 'name'=>'no_plat', 'title'=>'No Plat'])
        ->addColumn(['data' => 'tahun', 'name'=>'tahun', 'title'=>'Tahun','className'=>'text-center'])
        ->addColumn(['data' => 'tarif_perjam', 'name'=>'tarif_perjam', 'title'=>'Tarif Perjam', 'className'=>'text-right'])
        ->addColumn(['data' => 'status_rental', 'name'=>'status_rental', 'title'=>'Status Rental','className'=>'text-center'])
        ->addColumn(['data' => 'nama_merk', 'name' => 'nama_merk', 'title'=>'Merk', 'orderable'=>false, 'searchable'=>false])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);   
        return view('vendor.backpack.base.kendaraan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.backpack.base.kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['no_plat' => 'required|unique:kendaraan']);
        $this->validate($request, ['tahun' => 'required']);
        $this->validate($request, ['tarif_perjam' => 'required']);
        $this->validate($request, ['status_rental' => 'required']);
        $this->validate($request, ['id_merk' => 'required|exists:merk,id']);
        $kendaraan = new Kendaraan();
        $kendaraan->id = Uuid::generate(4);
        $kendaraan->no_plat = $request->no_plat;
        $kendaraan->tahun = $request->tahun;
        $kendaraan->tarif_perjam = $request->tarif_perjam;
        $kendaraan->status_rental = $request->status_rental;
        $kendaraan->id_merk = $request->id_merk;
        $kendaraan->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $kendaraan->no_plat"
            ]);
        return redirect()->route('kendaraan.index');
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
        $kendaraan = Kendaraan::find($id);
        return view('vendor.backpack.base.kendaraan.edit')->with(compact('kendaraan'));
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
        $this->validate($request, ['no_plat' => 'required']);
        $this->validate($request, ['tahun' => 'required']);
        $this->validate($request, ['tarif_perjam' => 'required']);
        $this->validate($request, ['status_rental' => 'required']);
        $this->validate($request, ['id_merk' => 'required|exists:merk,id']);
        $kendaraan = Kendaraan::find($id);
        $kendaraan->id = Uuid::generate(4);
        $kendaraan->no_plat = $request->no_plat;
        $kendaraan->tahun = $request->tahun;
        $kendaraan->tarif_perjam = $request->tarif_perjam;
        $kendaraan->status_rental = $request->status_rental;
        $kendaraan->id_merk = $request->id_merk;
        $kendaraan->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $kendaraan->no_plat"
            ]);
        return redirect()->route('kendaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kendaraan::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Kendaraan berhasil dihapus"
            ]);
        return redirect()->route('kendaraan.index');
    }

}

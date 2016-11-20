<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Merk;
use App\Type;
use Webpatser\Uuid\Uuid;
use Session;
use Excel;
use PDF;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
             $merk = Merk::join('type', 'merk.id_type', '=', 'type.id')
            ->select(['merk.id', 'merk.kode_merk','merk.nama_merk', 'type.nama_type']);
            return Datatables::of($merk)
            ->addColumn('action', function($merk){
                return view('vendor.backpack.base.datatable._action', [
                    'model' => $merk, 
                    'form_url' => route('merk.destroy', $merk->id),
                    'edit_url' => route('merk.edit', $merk->id),
                    'confirm_message' => 'Yakin ingin menghapus ' . $merk->nama_merk. '?'
                    ]);
            })->make(true); 
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_merk', 'name'=>'kode_merk', 'title'=>'Kode Merk'])
        ->addColumn(['data' => 'nama_merk', 'name'=>'nama_merk', 'title'=>'Nama Merk'])
        ->addColumn(['data' => 'nama_type', 'name'=>'nama_type', 'title'=>'Tipe'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);   
        return view('vendor.backpack.base.merk.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.backpack.base.merk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['kode_merk' => 'required|unique:merk']);
        $this->validate($request, ['nama_merk' => 'required']);
        $this->validate($request, ['id_type' => 'required|exists:type,id']);
        $merk = new Merk();
        $merk->id = Uuid::generate(4);
        $merk->kode_merk = $request->kode_merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->id_type = $request->id_type;
        $merk->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $merk->nama_merk"
            ]);
        return redirect()->route('merk.index');
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
        $merk = Merk::find($id);
        return view('vendor.backpack.base.merk.edit')->with(compact('merk'));
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
        $this->validate($request, ['kode_merk' => 'required']);
        $this->validate($request, ['nama_merk' => 'required']);
        $this->validate($request, ['id_type' => 'required']);
        $merk = Merk::find($id);
        $merk->kode_merk = $request->kode_merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->id_type = $request->id_type;
        $merk->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $merk->nama_merk"
            ]); 
        return redirect()->route('merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Merk::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Merk berhasil dihapus"
            ]);
        return redirect()->route('merk.index');
    }

    public function export()
    {
        return view('vendor.backpack.base.merk.export');
    }

    public function exportPost(Request $request) 
    { 
        $this->validate($request, [
            'id_type'=>'required',
            'type'=>'required|in:pdf,xls'
        ], [
            'id_type.required'=>'Anda belum memilih tipe mobil. Pilih minimal 1 tipe mobil.'
        ]);

        //$merk = DB::table('merk')->whereIn('id', $request->get('id_type'))->get();

        $merk = Merk::join('type', 'type.id', '=', 'merk.id_type')
            ->select('merk.*', 'type.nama_type')
            ->whereIn('type.id', $request->get('id_type'))->get();
 
        $handler = 'export' . ucfirst($request->get('type'));
        return $this->$handler($merk);
    }

    private function exportPdf($merk)
    {
        $pdf = PDF::loadview('vendor.backpack.base.pdf.merk', compact('merk'));
        return $pdf->stream('merk.pdf');
    }
}


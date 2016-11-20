<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Type;
use Webpatser\Uuid\Uuid;
use Session;
use Excel;
use PDF;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $type = Type::select(['id', 'kode_type', 'nama_type']);
            return Datatables::of($type)
            ->addColumn('action', function($type){
                return view('vendor.backpack.base.datatable._action', [
                    'model' => $type, 
                    'form_url' => route('type.destroy', $type->id),
                    'edit_url' => route('type.edit', $type->id),
                    'confirm_message' => 'Yakin ingin menghapus ' . $type->nama_type. '?'
                    ]);
            })->make(true); 
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_type', 'name'=>'kode_type', 'title'=>'Kode Tipe'])
        ->addColumn(['data' => 'nama_type', 'name'=>'nama_type', 'title'=>'Nama Tipe'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);   
        return view('vendor.backpack.base.type.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.backpack.base.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['kode_type' => 'required|unique:type']);
        $this->validate($request, ['nama_type' => 'required']);
        $type = new Type();
        $type->id = Uuid::generate(4);
        $type->kode_type = $request->kode_type;
        $type->nama_type = $request->nama_type;
        $type->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $type->nama_type"
            ]);
        return redirect()->route('type.index');
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
        $type = Type::find($id);
        return view('vendor.backpack.base.type.edit')->with(compact('type'));
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
        $this->validate($request, ['kode_type' => 'required']);
        $this->validate($request, ['nama_type' => 'required']);
        $type = Type::find($id);
        $type->id = Uuid::generate(4);
        $type->kode_type = $request->kode_type;
        $type->nama_type = $request->nama_type;
        $type->save();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $type->nama_type"
            ]);
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Type::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Tipe berhasil dihapus"
            ]);
        return redirect()->route('type.index');
    }

}


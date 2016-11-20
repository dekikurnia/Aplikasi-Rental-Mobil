@extends('backpack::layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Cari Pelanggan</h2>
            </div>
		<div class="panel-body">
        <div class="row">
            <div class="form-group {!! $errors->has('id_pelanggan') ? 'has-error' : 'Nama Pelanggan' !!}" id="data_pelanggan">
                <div class="col-md-4">
                    {!! Form::select('id_pelanggan', [''=>'']+App\Pelanggan::pluck('nama','id')->all(), null, ['class'=>'js-selectize', 'placeholder' => 'Pilih Pelanggan']) !!}
                    {!! $errors->first('id_pelanggan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">
            	<div class="panel panel-default">
            		<div class="panel-heading">
            			<h2 class="panel-title">Peminjaman</h2>
            		</div>
            	<div class="panel-body">
            	{!! $html->table(['class'=>'table-striped table-bordered']) !!}
            	</div>
            </div>
           </div>
        </div>
    </div>
@endsection

@section('after_scripts')
{!! $html->scripts() !!}
@endsection

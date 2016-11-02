@extends('backpack::layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
            	<ul class="breadcrumb">
            		<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            		<li class="active">Kendaraan</li>
            	</ul>
                <p> <a class="btn btn-info" href="{{ route('kendaraan.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah </a>
                <a class="btn btn-success" href="{{ url('/admin/export/kendaraan') }}">
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Export </a>
                </p> 
            	<div class="panel panel-default">
            		<div class="panel-heading">
            			<h2 class="panel-title">Kendaraan</h2>
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

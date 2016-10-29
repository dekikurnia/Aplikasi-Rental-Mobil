@extends('backpack::layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/kendaraan') }}">Kendaraan</a></li>
				<li class="active">Tambah Kendaraan</li>
			</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h2 class="panel-title">Tambah Kendaraan</h2>
			</div>
		<div class="panel-body">
		{!! Form::open(['url' => route('kendaraan.store'),
		'method' => 'post', 'class'=>'form-horizontal']) !!}
		@include('vendor.backpack.base.kendaraan._form')
		{!! Form::close() !!}
		</div>
	</div>
</div>
	</div>
		</div>
@endsection
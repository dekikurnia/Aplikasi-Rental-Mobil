@extends('backpack::layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/merk') }}">Merk</a></li>
				<li class="active">Tambah Merk</li>
			</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h2 class="panel-title">Tambah Merk</h2>
			</div>
		<div class="panel-body">
		{!! Form::open(['url' => route('merk.store'),
		'method' => 'post', 'class'=>'form-horizontal']) !!}
		@include('vendor.backpack.base.merk._form')
		{!! Form::close() !!}
		</div>
	</div>
</div>
	</div>
		</div>
@endsection
@extends('backpack::layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/type') }}">Merk</a></li>
				<li class="active">Tambah Tipe</li>
			</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h2 class="panel-title">Tambah Tipe</h2>
			</div>
		<div class="panel-body">
		{!! Form::open(['url' => route('type.store'),
		'method' => 'post', 'class'=>'form-horizontal']) !!}
		@include('vendor.backpack.base.type._form')
		{!! Form::close() !!}
		</div>
	</div>
</div>
	</div>
		</div>
@endsection
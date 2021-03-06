@extends('backpack::layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="{{ url('/home') }}">Dashboard</a></li>
        <li><a href="{{ url('/admin/merk') }}">Merk</a></li>
        <li class="active">Export Merk</li>
      </ul>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Export Merk</h2>
        </div>

        <div class="panel-body">
          {!! Form::open(['url' => route('export.merk.post'),
          'method' => 'post', 'class'=>'form-horizontal']) !!}
          <div class="form-group {!! $errors->has('id_type') ? 'has-error' : '' !!}">
            {!! Form::label('nama_type', '', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-4">
              {!! Form::select('id_type[]', [''=>'']+App\Type::pluck('nama_type','id')->all(), null, [
              'class'=>'js-selectize',
              'multiple',
              'placeholder' => 'Pilih Tipe']) !!}
              {!! $errors->first('id_type', '<p class="help-block">:message</p>') !!}
            </div>
          </div>

          <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
              {!! Form::label('type', 'Pilih Output', ['class'=>'col-md-2 control-label']) !!}
              <div class="col-md-4 checkbox">
                  {{ Form::radio('type', 'xls', true) }} Excel
                  {{ Form::radio('type', 'pdf') }} PDF
                  {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
              </div>
          </div>

          <div class="form-group">
            <div class="col-md-4 col-md-offset-2">
              {!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
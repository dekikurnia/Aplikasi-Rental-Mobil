@extends('backpack::layout')
@section('content')
  <div class="row">
    <div class="col-md-12">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="{{ url('/home') }}">Dashboard</a></li>
        <li><a href="{{ url('/admin/pelanggan') }}">Pelanggan</a></li>
        <li class="active">Export Pelanggan</li>
      </ul>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Export Pelanggan</h2>
        </div>

        <div class="panel-body">
          {!! Form::open(['url' => route('export.pelanggan.post'),
          'method' => 'post', 'class'=>'form-horizontal']) !!}
          <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
              {!! Form::label('pelanggan', 'Pilih Output', ['class'=>'col-md-2 control-label']) !!}
              <div class="col-md-4 checkbox">
                  {{ Form::radio('pelanggan', 'xls', true) }} Excel
                  {{ Form::radio('pelanggan', 'pdf') }} PDF
                  {!! $errors->first('pelanggan', '<p class="help-block">:message</p>') !!}
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
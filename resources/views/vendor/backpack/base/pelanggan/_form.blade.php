<div class="form-group{{ $errors->has('no_ktp') ? ' has-error' : '' }}">
{!! Form::label('no_ktp', 'No. KTP', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('no_ktp', null, ['class'=>'form-control']) !!}
    {!! $errors->first('no_ktp', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
{!! Form::label('nama', 'Nama Pelanggan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('nama', null, ['class'=>'form-control']) !!}
    {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
{!! Form::label('alamat', 'Alamat', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('alamat', null, ['class'=>'form-control']) !!}
    {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
{!! Form::label('telepon', 'Telepon', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('telepon', null, ['class'=>'form-control']) !!}
    {!! $errors->first('telepon', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {{ Form::button('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan', ['type' => 'submit', 'class' => 'btn btn-info active'] )  }}
  </div>
</div>
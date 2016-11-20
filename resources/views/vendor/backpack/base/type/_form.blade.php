<div class="form-group{{ $errors->has('kode_type') ? ' has-error' : '' }}">
{!! Form::label('kode_merk', 'Kode Tipe', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('kode_type', null, ['class'=>'form-control']) !!}
    {!! $errors->first('kode_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('nama_type') ? ' has-error' : '' }}">
{!! Form::label('nama_type', 'Nama Tipe', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('nama_type', null, ['class'=>'form-control']) !!}
    {!! $errors->first('nama_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>


<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {{ Form::button('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan', ['type' => 'submit', 'class' => 'btn btn-info active'] )  }}
  </div>
</div>
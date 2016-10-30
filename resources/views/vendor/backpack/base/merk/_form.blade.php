<div class="form-group{{ $errors->has('kode_merk') ? ' has-error' : '' }}">
{!! Form::label('kode_merk', 'Kode Merk', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('kode_merk', null, ['class'=>'form-control']) !!}
    {!! $errors->first('kode_merk', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('nama_merk') ? ' has-error' : '' }}">
{!! Form::label('nama_merk', 'Nama Merk', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('nama_merk', null, ['class'=>'form-control']) !!}
    {!! $errors->first('nama_merk', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('id_type') ? 'has-error' : 'Nama Tipe' !!}">
{!! Form::label('id_type', 'Tipe', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('id_type', [''=>'']+App\Type::pluck('nama_type','id')->all(), null, 
    ['class'=>'js-selectize', 'placeholder' => 'Pilih Tipe']) !!}
    {!! $errors->first('id_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {{ Form::button('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan', ['type' => 'submit', 'class' => 'btn btn-info active'] )  }}
  </div>
</div>
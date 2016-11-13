<div class="form-group{{ $errors->has('no_plat') ? ' has-error' : '' }}">
{!! Form::label('no_plat', 'Nomor Plat', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('no_plat', null, ['class'=>'form-control']) !!}
    {!! $errors->first('no_plat', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
{!! Form::label('tahun', 'Tahun', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('tahun', null, ['class'=>'form-control']) !!}
    {!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('tarif_perjam') ? ' has-error' : '' }}">
{!! Form::label('tarif_perjam', 'Tarif Perjam', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('tarif_perjam', null, ['class'=>'form-control']) !!}
    {!! $errors->first('tarif_perjam', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('status_rental') ? ' has-error' : '' }}">
{!! Form::label('status_rental', 'Status Rental', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('status_rental', null, ['class'=>'form-control']) !!}
    {!! $errors->first('status_rental', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('id_merk') ? 'has-error' : 'Nama Merk' !!}">
{!! Form::label('id_merk', 'Merk', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('id_merk', [''=>'']+App\Merk::pluck('nama_merk','id')->all(), null, 
    ['class'=>'js-selectize', 'placeholder' => 'Pilih Merk']) !!}
    {!! $errors->first('id_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {{ Form::button('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan', ['type' => 'submit', 'class' => 'btn btn-info active'] )  }}
  </div>
</div>
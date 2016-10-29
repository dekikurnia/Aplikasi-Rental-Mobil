<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('no_plat', 'Nomor Plat', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('no_plat', null, ['class'=>'form-control']) !!}
    {!! $errors->first('no_plat', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('tahun', 'Tahun', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('tahun', null, ['class'=>'form-control']) !!}
    {!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('tarif_perjam', 'Tarif Perjam', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('tarif_perjam', null, ['class'=>'form-control']) !!}
    {!! $errors->first('tarif_perjam', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('status_rental', 'Status Rental', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('status_rental', null, ['class'=>'form-control']) !!}
    {!! $errors->first('status_rental', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {{ Form::button('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan', ['type' => 'submit', 'class' => 'btn btn-info active'] )  }}
  </div>
</div>
<div class="form-group col-sm-6">
        {!! Form::label('id', 'Id de Ingreso:') !!}
        {!! Form::select('id_ingreso_detalle', $id_ingreso_detalle, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un Ingreso Asociado al Lote']) !!}
    </div>
    <div class="form-group col-sm-6">
    {!! Form::label('institucion', 'Bodega de Ingreso:') !!}
    {!! Form::text('institucion', 'COORDINACION ZONAL 7 - SALUD', ['class' => 'form-control','readonly' => 'true']) !!}
</div>
  
    <div class="form-group col-sm-6">
        {!! Form::label('lote', 'Lote de Vacuna:') !!}
        {!! Form::select('lote', $lote, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Lote']) !!}
    </div>

<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad de Dosis:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('precio_unitario', 'Precio Unitario:') !!}
    {!! Form::text('precio_unitario', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::text('subtotal', null, ['class' => 'form-control']) !!}
</div>


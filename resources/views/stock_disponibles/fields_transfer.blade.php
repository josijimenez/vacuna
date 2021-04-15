<!-- Lote Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lote', 'Lote a Transferir:') !!}
    <br>
    {!! Form::text('lote', null, ['class' => 'form-control','readonly' => 'true']) !!}
</div>
<br>
<!-- Cantidad Actual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_actual', 'Cantidad Actual:') !!}
    {!! Form::text('cantidad_actual', null, ['class' => 'form-control','readonly' => 'true']) !!}
</div>

<!-- Institucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institucion', 'Bodega que Entrega:') !!}
    {!! Form::text('institucion', null, ['class' => 'form-control','readonly' => 'true']) !!}
</div>
<div class="form-group col-sm-6">
        {!! Form::label('institucion', 'Bodega que Recibe:') !!}
        {!! Form::select('institucion_enviar', $instituciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_enviar', 'Cantidad Dosis Envio:') !!}
    {!! Form::text('cantidad_enviar', null, ['class' => 'form-control']) !!}
</div>
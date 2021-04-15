<!-- Numero Comprobante Field -->
<div class="col-sm-12">
    {!! Form::label('numero_comprobante', 'Numero Comprobante:') !!}
    <p>{{ $ingresoDetalle->numero_comprobante }}</p>
</div>

<!-- Fecha Emision Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_emision', 'Fecha Emision:') !!}
    <p>{{ $ingresoDetalle->fecha_emision }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $ingresoDetalle->subtotal }}</p>
</div>

<!-- Iva Field -->
<div class="col-sm-12">
    {!! Form::label('iva', 'Iva:') !!}
    <p>{{ $ingresoDetalle->iva }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $ingresoDetalle->total }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('id_institucion', 'Bodega:') !!}
    <p>{{ $ingresoDetalle->id_institucion }}</p>
</div>

<!-- Observacion Field -->
<div class="col-sm-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{{ $ingresoDetalle->observacion }}</p>
</div>

<!-- Recibidoconforme Field -->
<div class="col-sm-12">
    {!! Form::label('recibidoconforme', 'Recibidoconforme:') !!}
    <p>{{ $ingresoDetalle->recibidoconforme }}</p>
</div>

<!-- Puestorecibidoconforme Field -->
<div class="col-sm-12">
    {!! Form::label('puestorecibidoconforme', 'Puestorecibidoconforme:') !!}
    <p>{{ $ingresoDetalle->puestorecibidoconforme }}</p>
</div>

<!-- Entregadoconforme Field -->
<div class="col-sm-12">
    {!! Form::label('entregadoconforme', 'Entregadoconforme:') !!}
    <p>{{ $ingresoDetalle->entregadoconforme }}</p>
</div>

<!-- Puestoentregadoconforme Field -->
<div class="col-sm-12">
    {!! Form::label('puestoentregadoconforme', 'Puestoentregadoconforme:') !!}
    <p>{{ $ingresoDetalle->puestoentregadoconforme }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ingresoDetalle->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ingresoDetalle->updated_at }}</p>
</div>


<!-- Cantidad Field -->
<div class="col-sm-12">
    {!! Form::label('bodega', 'Bodega de Ingreso:') !!}
    <p>{{ $ingresoProducto->institucion }}</p>
</div>
<!-- Cantidad Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $ingresoProducto->cantidad }}</p>
</div>

<!-- Precio Unitario Field -->
<div class="col-sm-12">
    {!! Form::label('precio_unitario', 'Precio Unitario:') !!}
    <p>{{ $ingresoProducto->precio_unitario }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $ingresoProducto->subtotal }}</p>
</div>

<!-- Lote Field -->
<div class="col-sm-12">
    {!! Form::label('lote', 'Lote:') !!}
    <p>{{ $ingresoProducto->lote }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ingresoProducto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ingresoProducto->updated_at }}</p>
</div>


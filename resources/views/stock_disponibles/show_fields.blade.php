<!-- Lote Field -->
<div class="col-sm-12">
    {!! Form::label('lote', 'Lote:') !!}
    <p>{{ $stockDisponible->lote }}</p>
</div>

<!-- Cantidad Actual Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad_actual', 'Cantidad Actual:') !!}
    <p>{{ $stockDisponible->cantidad_actual }}</p>
</div>

<!-- Institucion Field -->
<div class="col-sm-12">
    {!! Form::label('institucion', 'Institucion:') !!}
    <p>{{ $stockDisponible->institucion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $stockDisponible->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $stockDisponible->updated_at }}</p>
</div>


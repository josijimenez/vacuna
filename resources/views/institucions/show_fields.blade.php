<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $institucion->nombre }}</p>
</div>

<!-- Tipo Field -->
<div class="col-sm-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $institucion->tipo }}</p>
</div>

<!-- Categoria Field -->
<div class="col-sm-12">
    {!! Form::label('categoria', 'Categoria:') !!}
    <p>{{ $institucion->categoria }}</p>
</div>

<!-- Ubicacion Field -->
<div class="col-sm-12">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    <p>{{ $institucion->ubicacion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $institucion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $institucion->updated_at }}</p>
</div>


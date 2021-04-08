<!-- Lote Field -->
<div class="col-sm-12">
    {!! Form::label('lote', 'Lote:') !!}
    <p>{{ $biologico->lote }}</p>
</div>

<!-- Marca Field -->
<div class="col-sm-12">
    {!! Form::label('marca', 'Marca:') !!}
    <p>{{ $biologico->marca }}</p>
</div>

<!-- Fecha Caducidad Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_caducidad', 'Fecha Caducidad:') !!}
    <p>{{ $biologico->fecha_caducidad }}</p>
</div>

<!-- Codigo Cum Field -->
<div class="col-sm-12">
    {!! Form::label('codigo_cum', 'Codigo Cum:') !!}
    <p>{{ $biologico->codigo_cum }}</p>
</div>

<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $biologico->descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $biologico->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $biologico->updated_at }}</p>
</div>


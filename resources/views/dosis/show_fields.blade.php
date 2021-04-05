<!-- Puesto Field -->
<div class="col-sm-12">
    {!! Form::label('puesto', 'Puesto:') !!}
    <p>{{ $dosis->puesto }}</p>
</div>

<!-- Vacuna Field -->
<div class="col-sm-12">
    {!! Form::label('farmaceutica', 'Vacuna:') !!}
    <p>{{ $dosis->farmaceutica }}</p>
</div>

<!-- Catidad Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad', 'Catidad:') !!}
    <p>{{ $dosis->cantidad }}</p>
</div>

<!-- Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $dosis->fecha }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $dosis->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $dosis->updated_at }}</p>
</div>


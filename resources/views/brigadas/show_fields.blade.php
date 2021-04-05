<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $brigada->nombre }}</p>
</div>

<!-- Punto Vacunacions Id Field -->
<div class="col-sm-12">
    {!! Form::label('punto_vacunacions_id', 'Punto Vacunacions Id:') !!}
    <p>{{ $brigada->punto_vacunacions_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $brigada->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $brigada->updated_at }}</p>
</div>


<!-- Tipo Field -->
<div class="col-sm-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $integrante->tipo }}</p>
</div>

<!-- Integrante User Id Field -->
<div class="col-sm-12">
    {!! Form::label('integrante_user_id', 'Integrante User Id:') !!}
    <p>{{ $integrante->integrante_user_id }}</p>
</div>

<!-- Estado Field -->
<div class="col-sm-12">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{{ $integrante->estado }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $integrante->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $integrante->updated_at }}</p>
</div>


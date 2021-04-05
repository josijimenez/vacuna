<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $item->nombre }}</p>
</div>

<!-- Catalogos Id Field -->
<div class="col-sm-12">
    {!! Form::label('catalogos_id', 'Catalogos Id:') !!}
    <p>{{ $item->catalogos_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $item->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $item->updated_at }}</p>
</div>


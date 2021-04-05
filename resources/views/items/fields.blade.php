<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Catalogos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catalogos_id', 'Catalogos Id:') !!}
    <!-- {!! Form::text('catalogos_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('catalogos_id', $catalogos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>
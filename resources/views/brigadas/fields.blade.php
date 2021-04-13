<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Punto Vacunacions Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('punto_vacunacions_id', 'Punto Vacunacions Id:') !!}
    {!! Form::select('punto_vacunacions_id', $puntos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>
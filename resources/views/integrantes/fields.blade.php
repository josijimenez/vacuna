<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::select('tipo', $tipos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Integrante User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('integrante_user_id', 'Integrante User Id:') !!}
    {!! Form::select('integrante_user_id', $brigadaItems, null, ['class' => 'form-control custom-select']) !!}
</div>



<!-- Working Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Está activo?:') !!}
    <label class="radio-inline">
        {!! Form::radio('estado', "1", null) !!} SI
    </label>
    <label class="radio-inline">
        {!! Form::radio('estado', "0", null) !!} NO
    </label>
</div>
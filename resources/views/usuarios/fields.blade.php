<!-- Puesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Puesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', 'Identificación:') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
{!! Form::label('email', 'Email:') !!}
{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
@error('email')
<span class="error invalid-feedback">{{ $message }}</span>
@enderror
</div>

<!-- Puesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
{!! Form::label('password', 'Password:') !!}
<input type="password"
       name="password"
       class="form-control @error('password') is-invalid @enderror"
       placeholder="Password">
@error('password')
<span class="error invalid-feedback">{{ $message }}</span>
@enderror
</div>

<div class="form-group col-sm-6">
{!! Form::label('password_confirmation', 'Repita el Password:') !!}
<input type="password"
       name="password_confirmation"
       class="form-control"
       placeholder="Retype password">

</div>

<!-- Institucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::select('type', $tipos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

 <!-- Institucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institucion_id', 'Institución:') !!}
    {!! Form::select('institucion_id', $institucionItems, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>
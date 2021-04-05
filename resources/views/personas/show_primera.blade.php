@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles Primera Vacuna</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('personas.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                   
                	<!-- Covid Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_vacunado', 'Pimera dosis:') !!}
					    <p>{{ $persona->primera_vacunado }}</p>
					</div>

					<!-- Covid Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_farmaceutica', 'Farmacéutica:') !!}
					    <p>{{ $persona->primera_farmaceutica }}</p>
					</div>

					<!-- Provincia Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_provincia', 'Provincia:') !!}
					    <p>{{ $persona->primera_provincia }}</p>
					</div>


					<!-- Ciudad Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_ciudad', 'Ciudad:') !!}
					    <p>{{ $persona->primera_ciudad }}</p>
					</div>

					<!-- Puesto Vacunacion Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_puesto', 'Puesto Vacunacion:') !!}
					    <p>{{ $persona->primera_puesto }}</p>
					</div>

					<!-- Primera Dosis Fecha Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_fecha', 'Fecha:') !!}
					    <p>{{ $persona->primera_fecha }}</p>
					</div>

					<!-- Primera Dosis Hora Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_hora', 'Hora:') !!}
					    <p>{{ $persona->primera_hora }}</p>
					</div>

					<!-- Usuario Digitador Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_digitador', 'Usuario Digitador:') !!}
					    <p>{{ $persona->primera_digitador }}</p>
					</div>

					<!-- Primera Dosis Observacion Field -->
					<div class="col-sm-12">
					    {!! Form::label('primera_observacion', 'Observacion:') !!}
					    <p>{{ $persona->primera_observacion }}</p>
					</div>



                </div>
            </div>

        </div>
    </div>

@endsection

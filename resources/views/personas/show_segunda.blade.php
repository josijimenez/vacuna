@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles Segunda Vacuna</h1>
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
					    {!! Form::label('segunda_vacunado', 'Segunda dosis:') !!}
					    <p>{{ $persona->segunda_vacunado }}</p>
					</div>

					<!-- Covid Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_farmaceutica', 'Farmacéutica:') !!}
					    <p>{{ $persona->segunda_farmaceutica }}</p>
					</div>

					<!-- Provincia Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_provincia', 'Provincia:') !!}
					    <p>{{ $persona->segunda_provincia }}</p>
					</div>


					<!-- Ciudad Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_ciudad', 'Ciudad:') !!}
					    <p>{{ $persona->segunda_ciudad }}</p>
					</div>

					<!-- Puesto Vacunacion Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_puesto', 'Puesto Vacunacion:') !!}
					    <p>{{ $persona->segunda_puesto }}</p>
					</div>

					<!-- Primera Dosis Fecha Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_fecha', 'Fecha:') !!}
					    <p>{{ $persona->segunda_fecha }}</p>
					</div>

					<!-- Primera Dosis Hora Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_hora', 'Hora:') !!}
					    <p>{{ $persona->segunda_hora }}</p>
					</div>

					<!-- Usuario Digitador Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_digitador', 'Usuario Digitador:') !!}
					    <p>{{ $persona->segunda_digitador }}</p>
					</div>

					<!-- Primera Dosis Observacion Field -->
					<div class="col-sm-12">
					    {!! Form::label('segunda_observacion', 'Observacion:') !!}
					    <p>{{ $persona->segunda_observacion }}</p>
					</div>



                </div>
            </div>

        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">

    	<div class="content px-3">
        	@include('flash::message')
  		</div>

    <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse1"><p class="text-info"><u> Panel de Reportes </u></p></a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            {!! Form::open(array('url' => URL::current(), 'method' => 'GET', 'class' => "form-horizontal", 'role' => "form", 'style' => "padding:10px;")) !!}

                <!-- Meeting Date Field -->
                <div class="form-group">
							                <!-- Provincia Field -->
							<div class="form-group col-sm-6">
							    {!! Form::label('provincia', 'Provincia:') !!}
							    {!! Form::select('provincia', $provincias, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
							    
							</div>

							<!-- CiudadField -->
							<div class="form-group col-sm-6">
							    {!! Form::label('ciudad', 'Ciudad:') !!}
							    {!! Form::select('ciudad', $ciudades, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
							</div>

							<!-- Puesto Vacunacion Field -->
							<div class="form-group col-sm-6">
							    {!! Form::label('puesto_vacunacion', 'Puesto Vacunacion:') !!}
							    {!! Form::select('puesto_vacunacion', $puesto_vacunaciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
							</div>
                    </div>
                    
                </div>
                              
                <!-- Submit Field -->
                <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary', 'name' => 'search']) !!}
                </div>
                </div>

        	{!! Form::close() !!}
          </div>
        </div>
    </div>

    </section>


@endsection


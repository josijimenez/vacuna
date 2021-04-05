@extends('layouts.app')

@section('content')
    <section class="content-header">

    	<div class="content px-3">
        	@include('flash::message')
  		</div>

    <div class="panel-group">
        <div class="panel panel-default">
          
            {!! Form::open(array('url' => '/excel_completo', 'method' => 'GET', 'class' => "form-horizontal", 'role' => "form", 'style' => "padding:10px;")) !!}

                <!-- Meeting Date Field -->
                <div class="form-group">

                           <!-- Segunda Farmaceutica Field -->
                          <div class="form-group col-sm-4">
                              {!! Form::label('primera_farmaceutica', 'Farmaceutica:') !!}
                              {!! Form::select('primera_farmaceutica', $farmaceuticas, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                          </div>

					                <!-- Provincia Field -->
            							<div class="form-group col-sm-4">
            							    {!! Form::label('primera_provincia', 'Provincia:') !!}
            							    {!! Form::select('primera_provincia', $provincias, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
            							    
            							</div>

            							<!-- Ciudad Field -->
            							<div class="form-group col-sm-4">
            							    {!! Form::label('primera_ciudad', 'Ciudad:') !!}
            							    {!! Form::select('primera_ciudad', $ciudades, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
            							</div>

            							<!-- Puesto Vacunacion Field -->
            							<div class="form-group col-sm-4">
            							    {!! Form::label('primera_puesto', 'Puesto Vacunacion:') !!}
            							    {!! Form::select('primera_puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
            							</div>
                </div>
                              
                <!-- Submit Field -->
                <div class="form-group">
                <div class="col-sm-12">
                   
                   <button class="btn btn-primary" type="reset"> <i class="fas fa-eraser"></i></button>
                   <button class='btn btn-primary' type='submit' value='submit'> <i class='fas fa-search'> </i> </button>
                </div>
                </div>

        	  {!! Form::close() !!}
          </div>
        </div>
    </div>

    </section>


@endsection
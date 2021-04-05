@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            

        <div class="panel-group">
            <div class="panel panel-default">

                {!! Form::open(array('url' => URL::current(), 'method' => 'GET', 'class' => "form-horizontal", 'role' => "form", 'style' => "padding:10px;")) !!}

                <!-- Meeting Date Field -->
               <div class="row">

                        <div class="form-group col-sm-6">
                            {!! Form::label('nombres', 'Nombres:', array('class' => 'col-sm-2 control-label')) !!}
                            {!! Form::text('nombres', Request::get('nombres'), ['class' => 'form-control']) !!}
                        </div>

                         <!-- Institucion Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('tipo', 'Tipo:') !!}
                            {!! Form::select('tipo', $tipos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                        </div>

                        <!-- Puesto Vacunacion Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('puesto_vacunacion', 'Puesto Vacunacion:') !!}
                            {!! Form::select('puesto_vacunacion', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                        </div>

                      
                        <!-- Institucion Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('institucion', 'Institución:') !!}
                            {!! Form::select('institucion', $instituciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
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


            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('usuarios.create') }}">
                        Nuevo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('usuarios.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $users])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


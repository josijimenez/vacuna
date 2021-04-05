@extends('layouts.app')

@section('content')
  

    <section class="content-header">
        <div class="container-fluid">



           <div class="panel-group">
            <div class="panel panel-default">

                {!! Form::open(array('url' => URL::current(), 'method' => 'GET', 'class' => "form-horizontal", 'role' => "form", 'style' => "padding:10px;")) !!}

                <!-- Meeting Date Field -->
               <div class="row">

                        <!-- Puesto Vacunacion Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('cedula', 'Cédula o Pasaporte:') !!}
                            {!! Form::text('cedula', Request::get('cedula'), ['class' => 'form-control']) !!}
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
                    <h1>Personas</h1>
                </div>
                 <div class="col-sm-6">
                  @if(Auth::user()->isAdminOrRegister())
                    <a class="btn btn-primary float-right"
                       href="{{ route('personas.create') }}">
                       Nuevo <i class="fas fa-male"></i>
                    </a>
                  @endif
                </div>
            </div>
            
            @if(Auth::user()->isAdmin())
            <div class="row mb-2">
               <div class='btn-group'>
                     <a class="btn btn-warning float-left"
                       href="/excel">
                        Reporte <i class="far fa-eye"></i>
                    </a>
                </div>
                 <div class='btn-group'>
                     <a class="btn btn-warning float-left"
                       href="/test">
                        Test <i class="far fa-eye"></i>
                    </a>
                </div>
                 
                
            </div>
            @endif

        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        
        <div class="form-group">
          <div class="col-sm-12">
            

             <div class="alert alert-info" role="alert">Número de registros:  {{ $num_registros }}</div>

          </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                @include('personas.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


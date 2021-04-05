@extends('layouts.app')

@section('content')
    <section class="content-header">

    	<div class="content px-3">
        	@include('flash::message')
  		</div>

    <div class="panel-group">
        
        @include('adminlte-templates::common.errors')

        <div class="panel panel-default">
          
            {!! Form::open(array('url' => '/excel_puesto_vacunacion', 'method' => 'GET', 'class' => "form-horizontal", 'role' => "form", 'style' => "padding:10px;")) !!}

                <!-- Meeting Date Field -->
                <div class="form-group">

                         <!-- Fecha Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
                            {!! Form::text('fecha_inicio', null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#fecha_inicio').datetimepicker({
                                    format: 'YYYY-MM-DD',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

					    <div class="form-group col-sm-4">
                            {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
                            {!! Form::text('fecha_fin', null, ['class' => 'form-control','id'=>'fecha_fin']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#fecha_fin').datetimepicker({
                                    format: 'YYYY-MM-DD',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush
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
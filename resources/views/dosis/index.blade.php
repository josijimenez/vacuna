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
                            {!! Form::label('puesto', 'Puesto Vacunacion:') !!}
                            {!! Form::select('puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                        </div>

                        <!-- Fecha Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('fecha', 'Fecha:') !!}
                            {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#fecha').datetimepicker({
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


            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>dosis</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('dosis.create') }}">
                        Add New
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
                @include('dosis.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $dosis])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


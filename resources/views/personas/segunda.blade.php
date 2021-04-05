@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Segunda dosis</h1>
                     
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($persona, ['route' => ['update_segunda', $persona->id], 'method' => 'POST']) !!}

            <div class="card-body">
                <div class="row">

                	  <!-- Segunda Vacunado Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_vacunado', 'Segunda Dosis:') !!}
                        {!! Form::select('segunda_vacunado', ['SI' => 'SI', 'NO' => 'NO'], Request::get('segunda_vacunado'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>   

                    <!-- Segunda Farmaceutica Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_farmaceutica', 'Farmaceutica:') !!}
                        {!! Form::select('segunda_farmaceutica', $farmaceuticas, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                     <!-- Segunda Provincia Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_provincia', 'Provincia:') !!}
                        {!! Form::select('segunda_provincia', $provincias, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                        
                    </div>

                    <!-- Segunda Ciudad Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_ciudad', 'Ciudad:') !!}
                        {!! Form::select('segunda_ciudad', $ciudades, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                    <!-- Segunda Puesto Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_puesto', 'Puesto Vacunacion:') !!}
                        {!! Form::select('segunda_puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                    <!-- Segunda Fecha Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_fecha', 'Fecha:') !!}
                        {!! Form::text('segunda_fecha', null, ['class' => 'form-control','id'=>'segunda_fecha', 'readonly' => 'true']) !!}
                    </div>

                    @push('page_scripts')
                        <script type="text/javascript">
                           var dateNow = new Date();
                            $('#segunda_fecha').datetimepicker({
                                format: 'YYYY-MM-DD',
                                locale: 'es',
                                defaultDate: dateNow
                            })
                        </script>
                    @endpush

                    <!-- Segunda Hora Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('segunda_hora', 'Hora:') !!}
                        {!! Form::text('segunda_hora', null, ['class' => 'form-control','id'=>'segunda_hora', 'readonly' => 'true']) !!}
                    </div>

                    @push('page_scripts')
                        <script type="text/javascript">
                            $('#segunda_hora').datetimepicker({
                                format: 'HH:mm',
                                locale: 'es',
                                useCurrent: true,
                                sideBySide: true,
                                defaultDate: dateNow
                            })
                        </script>
                    @endpush


                    <!-- Segunda Observacion Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('segunda_observacion', 'Observacion:') !!}
                        {!! Form::textarea('segunda_observacion', null, ['class' => 'form-control']) !!}
                    </div>


                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('personas.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
          $('#segunda_provincia').select2();
          $('#segunda_ciudad').select2();
          $('#segunda_puesto').select2();
      });
    </script>
    @parent
@stop
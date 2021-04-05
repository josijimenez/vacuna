@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Primera dosis</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($persona, ['route' => ['update_primera', $persona->id], 'method' => 'POST']) !!}

            <div class="card-body">
                <div class="row">
                  

                	  <!-- Primera Vacunado Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_vacunado', 'Primera Dosis:') !!}
                        {!! Form::select('primera_vacunado', ['SI' => 'SI', 'NO' => 'NO'], Request::get('primera_vacunado'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>   

                    <!-- Primera Farmaceutica Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_farmaceutica', 'Farmaceutica:') !!}
                        {!! Form::select('primera_farmaceutica', $farmaceuticas, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                     <!-- Primera Provincia Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_provincia', 'Provincia:') !!}
                        {!! Form::select('primera_provincia', $provincias, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                        
                    </div>

                    <!-- Primera Ciudad Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_ciudad', 'Ciudad:') !!}
                        {!! Form::select('primera_ciudad', $ciudades, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                    <!-- Primera Puesto Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_puesto', 'Puesto Vacunación:') !!}
                        {!! Form::select('primera_puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                    <!-- Primera Fecha Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_fecha', 'Fecha:') !!}
                        {!! Form::text('primera_fecha', null, ['class' => 'form-control','id'=>'primera_fecha','readonly' => 'true']) !!}
                    </div>

                    @push('page_scripts')
                        <script type="text/javascript">
                           var dateNow = new Date();
                            $('#primera_fecha').datetimepicker({
                                format: 'YYYY-MM-DD',
                                locale: 'es',
                                defaultDate: dateNow
                            })
                        </script>
                    @endpush

                    <!-- Primera Hora Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('primera_hora', 'Hora:') !!}
                        {!! Form::text('primera_hora', null, ['class' => 'form-control','id'=>'primera_hora', 'readonly' => 'true']) !!}
                    </div>

                    @push('page_scripts')
                        <script type="text/javascript">
                            $('#primera_hora').datetimepicker({
                                format: 'HH:mm:ss',
                                locale: 'es',
                                useCurrent: true,
                                sideBySide: true,
                                defaultDate: dateNow
                            })
                        </script>
                    @endpush


                    <!-- Primera Observacion Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('primera_observacion', 'Observacion:') !!}
                        {!! Form::textarea('primera_observacion', null, ['class' => 'form-control']) !!}
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
      	  $('#primera_vacunado').select2();
          $('#primera_farmaceutica').select2();
          $('#primera_provincia').select2();
          $('#primera_ciudad').select2();
          $('#primera_puesto').select2();
          $('#primera_equipo').select2();

      });
    </script>
    @parent
@stop
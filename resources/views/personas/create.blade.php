@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Persona</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'personas.store']) !!}

            <div class="card-body">

                <div class="row">
                     <div id="respuesta" class="col-lg-12">
                    </div>
                </div>

                <div class="row">
                   

                    @include('personas.fields')
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


         
        $('#puesto_vacunacion').select2();
            
        var thecedula = $("#cedula");

        thecedula.focusout(function (event) {

                console.log('intro method')
                var cedula = document.getElementById("cedula").value;
                console.log(cedula);
                //var home = 'http://localhost:8000' ;
                var url =  '/cedula/' + cedula ;
                console.log(url);

                 $.ajax({
                   type:'GET',
                   url: '/cedula/' + cedula ,
                   data:'_token = <?php echo csrf_token() ?>',
                   
                   beforeSend: function() {
                       $("#respuesta").html('<div class="alert alert-info" role="alert"> *   Buscando empleado...</div>');
                   },
                   
                   error: function() {
                        $("#respuesta").html('<div class="alert alert-warning" role="alert" >*   Ha surgido un error. Datos inválidos o error con el servicio de consulta !!! </div>');
                    },
                   
                   success:function(respuesta) {
                        console.log('Respuesta ok');

                        if (respuesta) {
                         
                          document.getElementById("nombres").value = respuesta.nombre;
                          document.getElementById("fecha_nacimiento").value = respuesta.fecha_nacimiento;
                          //$('#cedula').attr('readonly', true);
                          //$('#nombres').attr('readonly', true);
                          //$('#fecha_nacimiento').attr('readonly', true);
                         
                            
                            $("#respuesta").html('<div></div>');

                       } else {
                          
                          $("#respuesta").html('<div class="alert alert-warning" role="alert" >*  No hay ningún registro con el numero de cedula ingresado. </div>');
                       
                       }

                   }

                });

        });


      });

    </script>

    @parent
@stop
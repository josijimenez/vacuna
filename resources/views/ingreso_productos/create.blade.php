@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crear Ingreso Producto</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'ingresoProductos.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('ingreso_productos.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('ingresoProductos.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    
    <script type="text/javascript">
     // alert();
     $(document).ready(function(){
        $("#id_ingreso_detalle").change(function(){
           alert();
        });
    });
     
     
   /*  
     
      $(document).ready(function() {

        
         
        $('#puesto_vacunacion').select2();
            
        //var thecedula = $("#cedula");
        var id_ingreso = $("#id_ingreso_detalle");
        alert(id_ingreso);
        id_ingreso.change(function (event) {
               
                console.log('intro method')
                var id_ingreso_detalle = document.getElementById("id_ingreso_detalle").value;
                console.log(id_ingreso_detalle);
                //var home = 'http://localhost:8000' ;
                var url =  '/buscarinstitucion/' + id_ingreso_detalle ;
                console.log(url);

                 $.ajax({
                   type:'GET',
                   url: '/buscarinstitucion/' + id_ingreso_detalle ,
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
                         
                         
                            
                            $("#respuesta").html('<div></div>');

                       } else {
                          
                          $("#respuesta").html('<div class="alert alert-warning" role="alert" >*  No hay ningún registro con el numero de cedula ingresado. </div>');
                       
                       }

                   }

                });

        });


      });*/

    </script>

    @parent
@stop
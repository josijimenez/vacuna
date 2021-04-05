<div class="table-responsive">
    <table class="table" id="personas-table">
        <thead>
            <tr>
                <th>Institucion</th>
        <th>Consta Lista</th>
        <th>Eod</th>
        <th>Cedula</th>
        <th>Nombres</th>
       <!-- <th>Regimen Laboral</th>
        <th>Modalidad Laboral</th>
        <th>Tipo Nombramiento</th>
        <th>Unidad Operativa</th>
        <th>Area</th>
        <th>Denominacion Puesto</th>
        <th>Fecha Nacimiento</th> -->
        <th>Telefono</th>
        <!--  <th>Gestacion</th>
        <th>Maternidad</th>
        <th>Lactancia</th>
        <th>Enfermedad Catastrofica</th>
        <th>Tipo</th>
        <th>Discapacidad</th>
        <th>Cambio Administrativo</th>
        <th>Area Labora</th>
        <th>Nivel Ocupacional</th>
        <th>Covid</th> -->
        <th>Acepta Vacuna</th>
        <!-- <th>Usuario Digitador</th>
        <th>Puesto Vacunacion</th>
        <th>Primera Dosis Fecha</th>
        <th>Primera Dosis Hora</th>
        <th>Primera Equipo Vacunador</th>
        <th>Primera Dosis Vacunado</th>
        <th>Segunda Dosis Fecha</th>
        <th>Segunda Dosis Hora</th>
        <th>Segunda Equipo Vacunador</th>
        <th>Segunda Dosis Vacunado</th> -->
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personas as $persona)
            <tr>
                <td>{{ $persona->institucion }}</td>
            <td>{{ $persona->consta_lista }}</td>
            <td>{{ $persona->eod }}</td>
            <td>{{ $persona->cedula }}</td>
            <td>{{ $persona->nombres }}</td>
           <!-- <td>{{ $persona->regimen_laboral }}</td>
            <td>{{ $persona->modalidad_laboral }}</td>
            <td>{{ $persona->tipo_nombramiento }}</td>
            <td>{{ $persona->unidad_operativa }}</td>
            <td>{{ $persona->area }}</td>
            <td>{{ $persona->denominacion_puesto }}</td>
            <td>{{ $persona->fecha_nacimiento }}</td> -->
            <td>{{ $persona->telefono }}</td>
           <!-- <td>{{ $persona->gestacion }}</td>
            <td>{{ $persona->maternidad }}</td>
            <td>{{ $persona->lactancia }}</td>
            <td>{{ $persona->enfermedad_catastrofica }}</td>
            <td>{{ $persona->tipo }}</td>
            <td>{{ $persona->discapacidad }}</td>
            <td>{{ $persona->cambio_administrativo }}</td>
            <td>{{ $persona->area_labora }}</td>
            <td>{{ $persona->nivel_ocupacional }}</td> 
            <td>{{ $persona->covid }}</td>  -->
            <td>{{ $persona->acepta_vacuna }}</td>
            <!-- <td>{{ $persona->usuario_digitador }}</td>
            <td>{{ $persona->puesto_vacunacion }}</td>
            <td>{{ $persona->primera_dosis_fecha }}</td>
            <td>{{ $persona->primera_dosis_hora }}</td>
            <td>{{ $persona->primera_equipo_vacunador }}</td>
            <td>{{ $persona->primera_dosis_vacunado }}</td>
            <td>{{ $persona->segunda_dosis_fecha }}</td>
            <td>{{ $persona->segunda_dosis_hora }}</td>
            <td>{{ $persona->segunda_equipo_vacunador }}</td>
            <td>{{ $persona->segunda_dosis_vacunado }}</td> -->
                <td width="120">
                    {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personas.show', [$persona->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('personas.edit', [$persona->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>

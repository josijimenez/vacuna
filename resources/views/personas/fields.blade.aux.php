<!-- Institucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institucion', 'Institucion:') !!}
    {!! Form::text('institucion', null, ['class' => 'form-control']) !!}
</div>

<!-- Consta Lista Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consta_lista', 'Consta en lista:') !!}
    {!! Form::select('consta_lista', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('consta_lista'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Eod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eod', 'EOD:') !!}
    {!! Form::select('eod', ['AA' => 'COORDINACION ZONAL 7 - SALUD', 'AB' => 'DIRECCION DISTRITAL 07D01 CHILLA- EL GUABO-PASAJE-SALUD', 'AC' => 'DIRECCION DISTRITAL 07D02 MACHALA - SALUD'], Request::get('eod'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Regimen Laboral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regimen_laboral', 'Regimen Laboral:') !!}
    {!! Form::select('regimen_laboral', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('regimen_laboral'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Modalidad Laboral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modalidad_laboral', 'Modalidad Laboral:') !!}
    {!! Form::select('modalidad_laboral', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('modalidad_laboral'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Tipo Nombramiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_nombramiento', 'Modalidad Laboral:') !!}
    {!! Form::select('tipo_nombramiento', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('tipo_nombramiento'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Unidad Operativa Laboral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unidad_operativa', 'Unidad Operativa:') !!}
    {!! Form::select('unidad_operativa', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('unidad_operativa'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! Form::select('area', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('area'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Denominacion Puesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('denominacion_puesto', 'Denominacion Puesto:') !!}
    {!! Form::select('denominacion_puesto', ['P' => 'Principal', 'B' => 'Backup', 'N' => 'No'], Request::get('denominacion_puesto'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    {!! Form::text('fecha_nacimiento', null, ['class' => 'form-control','id'=>'fecha_nacimiento']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_nacimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Gestacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gestacion', 'Gestacion:') !!}
    {!! Form::select('gestacion', ['S' => 'Si', 'N' => 'No'], Request::get('gestacion'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>


<!-- Maternidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maternidad', 'Maternidad:') !!}
    {!! Form::select('maternidad', ['S' => 'Si', 'N' => 'No'], Request::get('maternidad'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Lactancia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lactancia', 'Lactancia:') !!}
    {!! Form::select('lactancia', ['S' => 'Si', 'N' => 'No'], Request::get('lactancia'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Enfermedad Catastrofica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enfermedad_catastrofica', 'Enfermedad Catastrofica:') !!}
    {!! Form::select('enfermedad_catastrofica', ['S' => 'Si', 'N' => 'No'], Request::get('enfermedad_catastrofica'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::select('tipo', ['S' => 'Si', 'N' => 'No'], Request::get('tipo'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Discapacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discapacidad', 'Discapacidad:') !!}
    {!! Form::select('discapacidad', ['S' => 'Si', 'N' => 'No'], Request::get('discapacidad'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Cambio Administrativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cambio_administrativo', 'Cambio Administrativo:') !!}
    {!! Form::select('cambio_administrativo', ['S' => 'Si', 'N' => 'No'], Request::get('cambio_administrativo'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Area Labora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area_labora', 'Area Labora:') !!}
    {!! Form::select('area_labora', ['S' => 'Si', 'N' => 'No'], Request::get('area_labora'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Nivel Ocupacional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_ocupacional', 'Nivel Ocupacional:') !!}
    {!! Form::select('nivel_ocupacional', ['S' => 'Si', 'N' => 'No'], Request::get('nivel_ocupacional'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Covid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('covid', 'Covid:') !!}
    {!! Form::select('covid', ['S' => 'Si', 'N' => 'No'], Request::get('covid'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Acepta Vacuna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acepta_vacuna', 'Covid:') !!}
    {!! Form::select('acepta_vacuna', ['S' => 'Si', 'N' => 'No'], Request::get('acepta_vacuna'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Usuario Digitador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_digitador', 'Usuario Digitador:') !!}
    {!! Form::text('usuario_digitador', null, ['class' => 'form-control']) !!}
</div>

<!-- Puesto Vacunacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('puesto_vacunacion', 'Puesto Vacunacion:') !!}
    {!! Form::select('puesto_vacunacion', ['S' => 'Si', 'N' => 'No'], Request::get('puesto_vacunacion'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Primera Dosis Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primera_dosis_fecha', 'Primera Dosis Fecha:') !!}
    {!! Form::text('primera_dosis_fecha', null, ['class' => 'form-control','id'=>'primera_dosis_fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#primera_dosis_fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Primera Dosis Hora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primera_dosis_hora', 'Primera Dosis Hora:') !!}
    {!! Form::text('primera_dosis_hora', null, ['class' => 'form-control','id'=>'primera_dosis_hora']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#primera_dosis_hora').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Primera Equipo Vacunador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primera_equipo_vacunador', 'Primera Equipo Vacunador:') !!}
    {!! Form::text('primera_equipo_vacunador', null, ['class' => 'form-control']) !!}
</div>

<!-- Primera Dosis Vacunado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primera_dosis_vacunado', 'Primera Dosis Vacunado:') !!}
    {!! Form::select('primera_dosis_vacunado', ['S' => 'Si', 'N' => 'No'], Request::get('primera_dosis_vacunado'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Primera Dosis Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('primera_dosis_observacion', 'Primera Dosis Observacion:') !!}
    {!! Form::textarea('primera_dosis_observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Segunda Dosis Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segunda_dosis_fecha', 'Segunda Dosis Fecha:') !!}
    {!! Form::text('segunda_dosis_fecha', null, ['class' => 'form-control','id'=>'segunda_dosis_fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#segunda_dosis_fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Segunda Dosis Hora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segunda_dosis_hora', 'Segunda Dosis Hora:') !!}
    {!! Form::text('segunda_dosis_hora', null, ['class' => 'form-control','id'=>'segunda_dosis_hora']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#segunda_dosis_hora').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Segunda Equipo Vacunador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segunda_equipo_vacunador', 'Segunda Equipo Vacunador:') !!}
    {!! Form::text('segunda_equipo_vacunador', null, ['class' => 'form-control']) !!}
</div>

<!-- Segunda Dosis Vacunado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segunda_dosis_vacunado', 'Segunda Dosis Vacunado:') !!}
    {!! Form::text('segunda_dosis_vacunado', null, ['class' => 'form-control']) !!}
</div>

<!-- Segunda Dosis Vacunado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segunda_dosis_vacunado', 'Segunda Dosis Vacunado:') !!}
    {!! Form::select('segunda_dosis_vacunado', ['S' => 'Si', 'N' => 'No'], Request::get('segunda_dosis_vacunado'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Segunda Dosis Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('segunda_dosis_observacion', 'Segunda Dosis Observacion:') !!}
    {!! Form::textarea('segunda_dosis_observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>
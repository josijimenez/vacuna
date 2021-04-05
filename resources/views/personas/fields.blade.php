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

    <!-- Fecha Nacimiento Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
        {!! Form::text('fecha_nacimiento', null, ['class' => 'form-control','id'=>'fecha_nacimiento']) !!}
    </div>

     <!-- Telefono Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
    </div>

    
      <!-- Covid Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('covid', 'Se ha contagiado de Covid?') !!}
        {!! Form::select('covid', ['SI' => 'SI', 'NO' => 'NO'], Request::get('covid'), ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>

    <!-- Fecha Nacimiento Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_covid', 'Fecha de contagio:') !!}
        {!! Form::text('fecha_covid', null, ['class' => 'form-control','id'=>'fecha_covid']) !!}
    </div>

    @push('page_scripts')
        <script type="text/javascript">
            $('#fecha_covid').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: true
            })
        </script>
    @endpush

     <!-- Tipo Institucion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo_institucion', 'Tipo institución:') !!}
        {!! Form::select('tipo_institucion', $tipo_instituciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>


    <!-- Institucion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('institucion', 'Institución:') !!}
        {!! Form::select('institucion', $instituciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>

    <!-- Profesion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('profesion', 'Profesión:') !!}
        {!! Form::select('profesion', $profesiones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>

    <!-- Area Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('area', 'Área:') !!}
        {!! Form::select('area', $areas, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>

    <!-- Tipo Nombramiento Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('puesto', 'Denominación del puesto:') !!}
        {!! Form::select('puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>

    @push('page_scripts')
        <script type="text/javascript">
            $('#fecha_nacimiento').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: true
            })
        </script>
    @endpush

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>
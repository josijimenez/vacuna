<!-- Puesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('puesto', 'Puesto vacunación:') !!}
    {!! Form::select('puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Vacuna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('farmaceutica', 'Vacuna:') !!}
    {!! Form::select('farmaceutica', $farmaceuticas, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
</div>

<!-- Catidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
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
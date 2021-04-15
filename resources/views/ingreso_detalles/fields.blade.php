<!-- Numero Comprobante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_comprobante', 'Numero Comprobante:') !!}
    {!! Form::text('numero_comprobante', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Emision Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_emision', 'Fecha Emision:') !!}
    {!! Form::text('fecha_emision', null, ['class' => 'form-control','id'=>'fecha_emision']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_emision').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::text('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Iva Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva', 'Iva:') !!}
    {!! Form::text('iva', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
        {!! Form::label('institucion', 'Bodega de Ingreso:') !!}
        {!! Form::select('id_institucion', $instituciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
    </div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Recibidoconforme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recibidoconforme', 'Recibidoconforme:') !!}
    {!! Form::text('recibidoconforme', null, ['class' => 'form-control']) !!}
</div>

<!-- Puestorecibidoconforme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('puestorecibidoconforme', 'Puestorecibidoconforme:') !!}
    {!! Form::text('puestorecibidoconforme', null, ['class' => 'form-control']) !!}
</div>

<!-- Entregadoconforme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entregadoconforme', 'Entregadoconforme:') !!}
    {!! Form::text('entregadoconforme', null, ['class' => 'form-control']) !!}
</div>

<!-- Puestoentregadoconforme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('puestoentregadoconforme', 'Puestoentregadoconforme:') !!}
    {!! Form::text('puestoentregadoconforme', null, ['class' => 'form-control']) !!}
</div>
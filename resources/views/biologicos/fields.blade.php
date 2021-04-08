<!-- Lote Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lote', 'Lote:') !!}
    {!! Form::text('lote', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Caducidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_caducidad', 'Fecha Caducidad:') !!}
    {!! Form::text('fecha_caducidad', null, ['class' => 'form-control','id'=>'fecha_caducidad']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_caducidad').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Codigo Cum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_cum', 'Codigo Cum:') !!}
    {!! Form::text('codigo_cum', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>
<div class="table-responsive">
    <table class="table" id="ingresoProductos-table">
        <thead>
            <tr>
                <th>Cantidad de Dosis</th>
        <th>Precio Unitario</th>
        <th>Subtotal</th>
        <th>Lote</th>
        <th>ID de Comprobante de Ingreso</th>
        <th>Bodega Ingreso</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ingresoProductos as $ingresoProducto)
            <tr>
                <td>{{ $ingresoProducto->cantidad }}</td>
            <td>{{ $ingresoProducto->precio_unitario }}</td>
            <td>{{ $ingresoProducto->subtotal }}</td>
            <td>{{ $ingresoProducto->lote }}</td>
            <td>{{ $ingresoProducto->id_ingreso_detalle }}</td>
            <td>{{ $ingresoProducto->institucion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ingresoProductos.destroy', $ingresoProducto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ingresoProductos.show', [$ingresoProducto->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ingresoProductos.edit', [$ingresoProducto->id]) }}" class='btn btn-default btn-xs'>
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

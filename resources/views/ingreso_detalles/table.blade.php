<div class="table-responsive">
    <table class="table" id="ingresoDetalles-table">
        <thead>
            <tr>
            <th>ID de Comprobante</th>
                <th>Numero Comprobante</th>
        <th>Fecha Emision</th>
        <th>Subtotal</th>
        <th>Iva</th>
        <th>Total</th>
        
       
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ingresoDetalles as $ingresoDetalle)
            <tr>
            <td>{{ $ingresoDetalle->id }}</td>
                <td>{{ $ingresoDetalle->numero_comprobante }}</td>
            <td>{{ $ingresoDetalle->fecha_emision }}</td>
            <td>{{ $ingresoDetalle->subtotal }}</td>
            <td>{{ $ingresoDetalle->iva }}</td>
            <td>{{ $ingresoDetalle->total }}</td>
            
            
                <td width="120">
                    {!! Form::open(['route' => ['ingresoDetalles.destroy', $ingresoDetalle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                            
                        <a href="{{ route('ingresoDetalles.show', [$ingresoDetalle->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ingresoDetalles.edit', [$ingresoDetalle->id]) }}" class='btn btn-default btn-xs'>
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

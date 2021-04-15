<div class="table-responsive">
    <table class="table" id="stockDisponibles-table">
        <thead>
            <tr>
                <th>Lote</th>
        <th>Cantidad Actual</th>
        <th>Institucion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockDisponibles as $stockDisponible)
            <tr>
                <td>{{ $stockDisponible->lote }}</td>
            <td>{{ $stockDisponible->cantidad_actual }}</td>
            <td>{{ $stockDisponible->institucion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['stockDisponibles.destroy', $stockDisponible->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stockDisponibles.show', [$stockDisponible->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('stockDisponibles.edit', [$stockDisponible->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

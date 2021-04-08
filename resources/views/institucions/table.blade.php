<div class="table-responsive">
    <table class="table" id="institucions-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Tipo</th>
        <th>Categoria</th>
        <th>Ubicacion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($institucions as $institucion)
            <tr>
                <td>{{ $institucion->nombre }}</td>
            <td>{{ $institucion->tipo }}</td>
            <td>{{ $institucion->categoria }}</td>
            <td>{{ $institucion->ubicacion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['institucions.destroy', $institucion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('institucions.show', [$institucion->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('institucions.edit', [$institucion->id]) }}" class='btn btn-default btn-xs'>
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

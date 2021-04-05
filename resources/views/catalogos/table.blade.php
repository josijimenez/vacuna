<div class="table-responsive">
    <table class="table" id="catalogos-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catalogos as $catalogo)
            <tr>
                <td>{{ $catalogo->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['catalogos.destroy', $catalogo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catalogos.show', [$catalogo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catalogos.edit', [$catalogo->id]) }}" class='btn btn-default btn-xs'>
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

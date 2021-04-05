<div class="table-responsive">
    <table class="table" id="brigadas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Punto Vacunacions Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($brigadas as $brigada)
            <tr>
                <td>{{ $brigada->nombre }}</td>
            <td>{{ $brigada->punto_vacunacions_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['brigadas.destroy', $brigada->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('brigadas.show', [$brigada->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('brigadas.edit', [$brigada->id]) }}" class='btn btn-default btn-xs'>
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

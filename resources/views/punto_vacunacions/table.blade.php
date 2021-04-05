<div class="table-responsive">
    <table class="table" id="puntoVacunacions-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($puntoVacunacions as $puntoVacunacion)
            <tr>
                <td>{{ $puntoVacunacion->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['puntoVacunacions.destroy', $puntoVacunacion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('puntoVacunacions.show', [$puntoVacunacion->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('puntoVacunacions.edit', [$puntoVacunacion->id]) }}" class='btn btn-default btn-xs'>
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

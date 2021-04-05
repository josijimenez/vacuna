<div class="table-responsive">
    <table class="table" id="dosis-table">
        <thead>
            <tr>
                <th>Puesto</th>
        <th>Vacuna</th>
        <th>Catidad</th>
        <th>Fecha</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dosis as $dosis)
            <tr>
                <td>{{ $dosis->puesto }}</td>
            <td>{{ $dosis->farmaceutica }}</td>
            <td>{{ $dosis->cantidad }}</td>
            <td>{{ $dosis->fecha }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['dosis.destroy', $dosis->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dosis.show', [$dosis->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('dosis.edit', [$dosis->id]) }}" class='btn btn-default btn-xs'>
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

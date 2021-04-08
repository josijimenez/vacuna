<div class="table-responsive">
    <table class="table" id="biologicos-table">
        <thead>
            <tr>
                <th>Lote</th>
        <th>Marca</th>
        <th>Fecha Caducidad</th>
        <th>Codigo Cum</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($biologicos as $biologico)
            <tr>
                <td>{{ $biologico->lote }}</td>
            <td>{{ $biologico->marca }}</td>
            <td>{{ $biologico->fecha_caducidad }}</td>
            <td>{{ $biologico->codigo_cum }}</td>
            <td>{{ $biologico->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['biologicos.destroy', $biologico->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('biologicos.show', [$biologico->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('biologicos.edit', [$biologico->id]) }}" class='btn btn-default btn-xs'>
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

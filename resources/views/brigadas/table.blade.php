<div class="table-responsive">
    <table class="table" id="brigadas-table">
        <thead>
            <tr>
                <th>Institución</th>
                <th>Punto de Vacunacion</th>
                <th>Brigada</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($brigadas as $brigada)
            <tr>
                <td>{{ $brigada->punto_vacunacion->institucion->nombre }}</td>
                <td>{{ $brigada->punto_vacunacion->nombre }}</td>
                <td>{{ $brigada->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['brigadas.destroy', $brigada->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                          <a href="{!! route('integrantes_brigada', [$brigada->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-vial" title="Integrantes"></i></a>

                         <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Open Form
                    </button>
                </div>
                          
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

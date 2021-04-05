<div class="table-responsive">
    <table class="table" id="personas-table">
        <thead>
            <tr>
                <th>Institucion</th>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Primera Dosis</th>
                <th>Segunda Dosis</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($personas as $persona)
                    <tr>
                    <td>{{ $persona->institucion }}</td>
                    <td>{{ $persona->cedula }}</td>
                    <td>{{ $persona->nombres }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->primera_vacunado }}</td>
                    <td>{{ $persona->segunda_vacunado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personas.show', [$persona->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                       
                        @if(Auth::user()->isAdminOrRegister())

                        <a href="{{ route('personas.edit', [$persona->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        
                        @endif

                        @if(Auth::user()->isAdminOrVaccinator())

                         

                        
                         
                            @if (empty($persona->primera_vacunado))
                             
                             <a href="{!! route('register_primera', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-vial" title="Primera Dosis"></i></a>

                            @elseif (!empty($persona->primera_vacunado) && empty($persona->segunda_vacunado))
                                
                                <a href="{{ route('show_primera', [$persona->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="fas fa-check"></i>
                                </a>

                                <a href="{!! route('register_segunda', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class=" fas fa-vials" title="Segunda Dosis"></i></a>

                            @else
                               
                                <a href="{{ route('show_primera', [$persona->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="fas fa-check"></i>
                                </a>

                                <a href="{{ route('show_segunda', [$persona->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="fas fa-check-double"></i>
                                </a>

                            @endif

                        @endif

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $personas->links() }}
    </div>

</div>

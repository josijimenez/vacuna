<div class="table-responsive">
    <table class="table" id="integrantes-table">
        <thead>
            <tr>
                <th>Tipo</th>
        <th>Integrante User Id</th>
        <th>Activo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($integrantes as $integrante)
            <tr>
                <td>{{ $integrante->tipo }}</td>
            <td>{{ $integrante->integrante_user_id }}</td>
             <td>
            @if($integrante->estado=="0")         
                     <input type="radio"  id="option1" name="estado" value="0"  {{ ($integrante->estado=="0")? "checked" : "" }} ><label>NO</label>
            @else
                   <input type="radio" id="option2" name="estado" value="1" {{ ($integrante->estado=="1")? "checked" : "" }} ><label>SI</label>      
     
            @endif

            </td>
                <td width="120">
                    {!! Form::open(['route' => ['integrantes.destroy', $integrante->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('integrantes.show', [$integrante->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('integrantes.edit', [$integrante->id]) }}" class='btn btn-default btn-xs'>
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



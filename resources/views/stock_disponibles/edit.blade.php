@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Realizar Transferencia de Stock Disponible</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($stockDisponible, ['route' => ['stockDisponibles.update', $stockDisponible->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('stock_disponibles.fields_transfer')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('stockDisponibles.index') }}" class="btn btn-default">Cancelar</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
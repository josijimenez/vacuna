@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle Biologico</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('biologicos.index') }}">
                        Retornar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('biologicos.show_fields')
                </div>
            </div>

        </div>

        
    </div>

    <div class="col-sm-6">
                    <h1>Ingresos a Bodega</h1>
                </div>
    <div class="table-responsive">
    <table class="table" id="biologicos-table">
        <thead>
            <tr>
                <th>Lote</th>
        <th>Cantidad Dosis Ingreso</th>
        <th>Bodega Ingreso</th>
        <th>Fecha de Ingreso</th>
        
                
            </tr>
        </thead>
        <tbody>
        @foreach($ingresos as $ingreso)
            <tr>
                <td>{{ $ingreso->lote }}</td>
            <td>{{ $ingreso->cantidad }}</td>
            <td>{{ $ingreso->institucion }}</td>
            <td>{{ $ingreso->created_at }}</td>
            
                
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-sm-6">
                    <h1>Egresos de Bodega</h1>
                </div>
    <div class="table-responsive">
    <table class="table" id="biologicos-table">
        <thead>
            <tr>
                <th>Lote</th>
        <th>Cantidad Dosis Egreso</th>
        <th>Bodega a la que Egresa</th>
        <th>Fecha de Egreso</th>
        
               
            </tr>
        </thead>
        <tbody>
        @foreach($egresos as $egreso)
            <tr>
                <td>{{ $egreso->lote }}</td>
            <td>{{ $egreso->cantidad }}</td>
            <td>{{ $egreso->institucion }}</td>
            <td>{{ $egreso->created_at }}</td>
            
               
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

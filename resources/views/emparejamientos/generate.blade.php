@extends('menu.layout')

@section('content')
    <div class="container">
        <h1>Generar Emparejamientos</h1>

        <!-- Formulario de filtros -->
        <form action="{{ route('emparejamientos.generate') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="diferencia_peso">Diferencia Máxima de Peso (kg):</label>
                    <input type="number" step="0.1" id="diferencia_peso" name="diferencia_peso" class="form-control"
                        value="{{ request('diferencia_peso', $diferenciaPesoMax) }}">
                </div>
                <div class="col-md-4">
                    <label for="diferencia_peleas">Diferencia Máxima de Peleas:</label>
                    <input type="number" id="diferencia_peleas" name="diferencia_peleas" class="form-control"
                        value="{{ request('diferencia_peleas', $diferenciaPeleasMax) }}">
                </div>
                <div class="col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="{{ route('emparejamientos.generate') }}" class="btn btn-secondary">Restablecer</a>
                </div>
            </div>
        </form>

        <!-- Tabla de emparejamientos -->
        {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>Peleador 1</th>
                <th>Academia 1</th>
                <th>Peleador 2</th>
                <th>Academia 2</th>
                <th>Diferencia de Peso (kg)</th>
                <th>Diferencia de Peleas</th>
                <th>Modalidad</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($emparejamientos as $emparejamiento)
                <tr>
                    <td>{{ $emparejamiento->peleador1_nombre }}</td>
                    <td>{{ $emparejamiento->academia_1 }}</td>
                    <td>{{ $emparejamiento->peleador2_nombre }}</td>
                    <td>{{ $emparejamiento->academia_2 }}</td>
                    <td>{{ $emparejamiento->diferencia_peso }}</td>
                    <td>{{ $emparejamiento->diferencia_peleas }}</td>
                    <td>{{ $emparejamiento->modalidad }}</td>
                    <td>
                        <form action="{{ route('emparejamientos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="peleador1_id" value="{{ $emparejamiento->peleador1_id }}">
                            <input type="hidden" name="peleador2_id" value="{{ $emparejamiento->peleador2_id }}">
                            <button type="submit" class="btn btn-success btn-sm">Emparejar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron emparejamientos.</td>
                </tr>
            @endforelse
        </tbody>
    </table> --}}

        <table id="tablaEmparejamientos" class="table table-bordered">
            <thead>
                <tr>
                    <th>Peleador 1</th>
                    <th>Peso 1</th>
                    <th>Peleas 1</th>
                    <th>Academia 1</th>
                    <th>Edad 1</th>
                    <th>Peleador 2</th>
                    <th>Peso 2</th>
                    <th>Peleas 2</th>
                    <th>Academia 2</th>
                    <th>Edad 2</th>
                    {{-- <th>Diferencia de Peso (kg)</th>
                    <th>Diferencia de Peleas</th> --}}
                    <th>Modalidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emparejamientos as $emparejamiento)
                    <tr>
                        <td>{{ $emparejamiento->peleador1_nombre }}</td>
                        <td>{{ $emparejamiento->peso_1 }}</td>
                        <td>{{ $emparejamiento->peleas_1 }}</td>
                        <td>{{ $emparejamiento->academia_1 }}</td>
                        <td>{{ $emparejamiento->edad_1 }}</td>
                        <td>{{ $emparejamiento->peleador2_nombre }}</td>
                        <td>{{ $emparejamiento->peso_2 }}</td>
                        <td>{{ $emparejamiento->peleas_2 }}</td>
                        <td>{{ $emparejamiento->academia_2 }}</td>
                        <td>{{ $emparejamiento->edad_2 }}</td>
                        {{-- <td>{{ $emparejamiento->diferencia_peso }}</td>
                        <td>{{ $emparejamiento->diferencia_peleas }}</td> --}}
                        <td>{{ $emparejamiento->modalidad }}</td>
                        <td>
                            <form action="{{ route('emparejamientos.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="peleador1_id" value="{{ $emparejamiento->peleador1_id }}">
                                <input type="hidden" name="peleador2_id" value="{{ $emparejamiento->peleador2_id }}">
                                <button type="submit" class="btn btn-success btn-sm">Emparejar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No se encontraron emparejamientos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection


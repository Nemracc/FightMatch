@extends('menu.layout')

@section('content')
    <div class="container">
        <h1>Emparejamientos</h1>

        <table id="tablaEmparejamientos" class="table table-bordered">
            <thead>
                <tr>
                    <th>Peleador 1</th>
                    <th>Peso1</th>
                    <th>Edad1</th>
                    <th>Academia 1</th>
                    <th>Peleador 2</th>
                    <th>Peso2</th>
                    <th>Edad 2</th>
                    <th>Academia 2</th>
                    <th>Modalidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emparejamientos as $emparejamiento)
                    <tr>
                        <td>{{ $emparejamiento->peleador1_nombre }}</td>
                        <td>{{ $emparejamiento->peso_1 }}</td>
                        <td>{{ $emparejamiento->edad_1 }}</td>
                        <td>{{ $emparejamiento->academia_1 }}</td>
                        <td>{{ $emparejamiento->peleador2_nombre }}</td>
                        <td>{{ $emparejamiento->peso_2 }}</td>
                        <td>{{ $emparejamiento->edad_2 }}</td>
                        <td>{{ $emparejamiento->academia_2 }}</td>
                        <td>{{ $emparejamiento->modalidad }}</td>
                        <td>
                            <form action="{{ route('emparejamientos.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $emparejamiento->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Desemparejar</button>
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

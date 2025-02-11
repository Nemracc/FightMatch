@extends('menu.layout')
 
@section('content')

<div class="card mt-5">
  <h2 class="card-header">ABM Peleadores</h2>
  <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('peleadores.create') }}"> <i class="fa fa-plus"></i> Crear Nuevo Peleador</a>
        </div>

        <table  id="tablaEmparejamientos" class="table table-bordered">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Peso</th>
                    <th>Peleas</th>
                    <th>Academia</th>
                    <th>Sexo</th>
                    <th>Modalidad</th>
                    <th width="250px">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($peleadores as $peleador)
                <tr>
                    <td>{{ $peleador->id }}</td>
                    <td>{{ $peleador->nombre }}</td>
                    <td>{{ $peleador->edad }}</td>
                    <td>{{ $peleador->peso }}</td>
                    <td>{{ $peleador->peleas }}</td>
                    <td>{{ $peleador->academia }}</td>
                    <td>{{ $peleador->sexo }}</td>
                    <td>{{ $peleador->modalidad->descripcion ?? 'Sin Modalidad' }}</td>
                    <td>
                        <form action="{{ route('peleadores.destroy', $peleador) }}" method="POST">
           
                            <a class="btn btn-info btn-sm" href="{{ route('peleadores.show', $peleador->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
            
                            <a class="btn btn-primary btn-sm" href="{{ route('peleadores.edit', $peleador->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay peleadores registrados.</td>
                </tr>
            @endforelse
            </tbody>

        </table>
      
        {{-- {!! $peleadores->links() !!} --}}

  </div>
</div>  
@endsection

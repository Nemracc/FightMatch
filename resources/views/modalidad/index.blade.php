@extends('menu.layout')
 
@section('content')

<div class="card mt-5">
  <h2 class="card-header">ABM Modalidad</h2>
  <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('modalidad.create') }}"> <i class="fa fa-plus"></i> Crear Nueva Modalidad</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">ID</th>
                    <th>Nombre</th>
                    <th width="250px">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($modalidades as $mod)
                <tr>
                    <td>{{ $mod->id }}</td>
                    <td>{{ $mod->descripcion }}</td>
                    <td>
                        <form action="{{ route('modalidad.destroy', $mod->id) }}" method="POST">
           
                            <a class="btn btn-info btn-sm" href="{{ route('modalidad.show', $mod->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
            
                            <a class="btn btn-primary btn-sm" href="{{ route('modalidad.edit', $mod->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay modalidad registrados.</td>
                </tr>
            @endforelse
            </tbody>

        </table>
      
        {{-- {!! $modalidades->links() !!} --}}

  </div>
</div>  
@endsection

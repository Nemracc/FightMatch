@extends('menu.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Editar Modalidad</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('modalidad.index') }}"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>

    <form action="{{ route('modalidad.update', $modalidad->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputDescripcion" class="form-label"><strong>Descripcion:</strong></label>
            <input 
                type="text" 
                name="descripcion" 
                value="{{ $modalidad->descripcion }}"
                class="form-control @error('descripcion') is-invalid @enderror" 
                id="inputDescripcion" 
                placeholder="Descripcion">
            @error('descripcion')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
    </form>

  </div>
</div>
@endsection

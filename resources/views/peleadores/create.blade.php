@extends('menu.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Agregar Nuevo Peleador</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('peleadores.index') }}"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>

    <form action="{{ route('peleadores.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputNombre" class="form-label"><strong>Nombre:</strong></label>
            <input 
                type="text" 
                name="nombre" 
                class="form-control @error('nombre') is-invalid @enderror" 
                id="inputNombre" 
                placeholder="Nombre">
            @error('nombre')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputEdad" class="form-label"><strong>Edad:</strong></label>
            <input 
                type="number" 
                name="edad" 
                class="form-control @error('edad') is-invalid @enderror" 
                id="inputEdad" 
                placeholder="Edad">
            @error('edad')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputPeso" class="form-label"><strong>Peso (kg):</strong></label>
            <input 
                type="number" 
                step="0.01" 
                name="peso" 
                class="form-control @error('peso') is-invalid @enderror" 
                id="inputPeso" 
                placeholder="Peso">
            @error('peso')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputPeleas" class="form-label"><strong>Cantidad de Peleas:</strong></label>
            <input 
                type="number" 
                name="peleas" 
                class="form-control @error('peleas') is-invalid @enderror" 
                id="inputPeleas" 
                placeholder="Cantidad de peleas">
            @error('peleas')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputAcademia" class="form-label"><strong>Academia:</strong></label>
            <input 
                type="text" 
                name="academia" 
                class="form-control @error('academia') is-invalid @enderror" 
                id="inputAcademia" 
                placeholder="Nombre de la academia">
            @error('academia')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputSexo" class="form-label"><strong>Sexo:</strong></label>
            <select 
                name="sexo" 
                class="form-select @error('sexo') is-invalid @enderror" 
                id="inputSexo">
                <option value="">Seleccione</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            @error('sexo')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputCI" class="form-label"><strong>Cédula de Identidad:</strong></label>
            <input 
                type="text" 
                name="ci" 
                class="form-control @error('ci') is-invalid @enderror" 
                id="inputCI" 
                placeholder="Cédula de Identidad">
            @error('ci')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="modalidad" class="form-label"><strong>Modalidad:</strong></label>
            <select 
                name="modalidad_id" 
                class="form-control @error('modalidad_id') is-invalid @enderror">
                <option value="">Seleccione una modalidad</option>
                @foreach ($modalidades as $modalidad)
                    <option value="{{ $modalidad->id }}" 
                        {{ isset($peleador) && $peleador->modalidad_id == $modalidad->id ? 'selected' : '' }}>
                        {{ $modalidad->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('modalidad_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

  </div>
</div>
@endsection

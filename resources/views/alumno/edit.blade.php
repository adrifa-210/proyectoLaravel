@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('alumno.update', $alumno) }}" method="post" novalidate>
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ old('nombre', $alumno->nombre) }}" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del alumno">
                    @error('nombre')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" value="{{ old('apellido', $alumno->apellido) }}" id="apellido" name="apellido" required maxlength="130" placeholder="Introduce los apellidos del alumno">
                    @error('apellido')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fnac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" value="{{ old('fnac', $alumno->fnac) }}" id="fnac" name="fnac" max="{{ now()->format('Y-m-d') }}">
                    @error('fnac')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero">
                        <option value="" @selected(old('genero', $alumno->genero) == '')>
                            Selecciona un género
                        </option>
                        <option value="masculino" @selected(old('genero', $alumno->genero) == 'masculino')>
                            Masculino
                        </option>
                        <option value="femenino" @selected(old('genero', $alumno->genero) == 'femenino')>
                            Femenino
                        </option>
                        <option value="otro" @selected(old('genero', $alumno->genero) == 'otro')>
                            Otro
                        </option>
                    </select>
                    @error('genero')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="notaacceso" class="form-label">Nota de acceso</label>
                    <input type="number" value="{{ old('notaacceso', $alumno->notaacceso) }}" class="form-control" id="notaacceso" name="notaacceso" min="0" max="10" step="0.01" placeholder="Introduce la nota de acceso">
                    @error('notaacceso')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">
                    Editar alumno
                </button>
                <a href="{{ route('alumno.index') }}" class="btn btn-outline-light ms-2">
                    Volver al listado
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
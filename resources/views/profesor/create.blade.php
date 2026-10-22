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
            <form action="{{ route('profesor.store') }}" method="post" novalidate>
                @csrf                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ old('nombre') }}" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del profesor">
                    @error('nombre')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" value="{{ old('apellidos') }}" id="apellidos" name="apellidos" required maxlength="130" placeholder="Introduce los apellidos del profesor">
                    @error('apellidos')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <input type="text" class="form-control" value="{{ old('especialidad') }}" id="especialidad" name="especialidad" required maxlength="100" placeholder="Introduce la especialidad del profesor">
                    @error('especialidad')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fecha_alta" class="form-label">Fecha de alta</label>
                    <input type="date" class="form-control" value="{{ old('fecha_alta') }}" id="fecha_alta" name="fecha_alta">
                    @error('fecha_alta')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="salario" class="form-label">Salario</label>
                    <input type="number" value="{{ old('salario') }}" class="form-control" id="salario" name="salario" min="0" step="0.01" placeholder="Introduce el salario del profesor">
                    @error('salario')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">
                    Crear profesor
                </button>
                <a href="{{ route('profesor.index') }}" class="btn btn-outline-light ms-2">
                    Volver al listado
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

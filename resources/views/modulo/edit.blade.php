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
            @error('error')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <form action="{{ route('modulo.update', $modulo) }}" method="post" novalidate>
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ old('nombre', $modulo->nombre) }}" id="nombre" name="nombre" required maxlength="120" placeholder="Introduce el nombre del módulo">
                    @error('nombre')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="abreviatura" class="form-label">Abreviatura</label>
                    <input type="text" class="form-control" value="{{ old('abreviatura', $modulo->abreviatura) }}" id="abreviatura" name="abreviatura" required maxlength="7" placeholder="Introduce la abreviatura del módulo">
                    @error('abreviatura')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="horas" class="form-label">Horas</label>
                    <input type="number" class="form-control" value="{{ old('horas', $modulo->horas) }}" id="horas" name="horas" min="0" max="15" placeholder="Introduce las horas (máx 15)">
                    @error('horas')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="creditos" class="form-label">Créditos</label>
                    <input type="number" value="{{ old('creditos', $modulo->creditos) }}" class="form-control" id="creditos" name="creditos" min="0" max="99.99" step="0.01" placeholder="Introduce los créditos (máx 99.99)">
                    @error('creditos')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">
                    Editar módulo
                </button>
                <a href="{{ route('modulo.index') }}" class="btn btn-outline-light ms-2">
                    Volver al listado
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
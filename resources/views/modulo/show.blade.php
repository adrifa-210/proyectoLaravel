@extends('template.base')

@section('css')
<link href="{{ asset('assets/style/show.css') }}" rel="stylesheet"/>
@endsection

@section('content')
<div class="container my-5">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card text-center text-dark">
                <div class="card-body py-4">
                    <h3 class="card-title mb-2">{{ $modulo->nombre }}</h3>
                    <span class="badge bg-secondary fs-6">{{ $modulo->abreviatura }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card text-center text-dark">
                <div class="card-body">
                    <h6 class="card-title mb-3"><strong>Abreviatura:</strong> {{ $modulo->abreviatura }}</h6>
                    <h6 class="card-title mb-3"><strong>Horas:</strong> {{ $modulo->horas !== null ? $modulo->horas . ' h' : 'No especificadas' }}</h6>
                    <h6 class="card-title mb-3"><strong>Créditos:</strong> {{ $modulo->creditos !== null ? number_format($modulo->creditos, 2, ',', '.') : 'No especificados' }}</h6>
                    <a href="{{ route('modulo.edit', $modulo) }}" class="btn btn-secondary mt-3 me-2">Edit</a>
                    <a href="{{ route('modulo.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

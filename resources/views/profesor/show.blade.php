@extends('template.base')

@section('css')
<link href="{{ asset('assets/style/show.css') }}" rel="stylesheet"/>
@endsection

@section('content')
<div class="container my-5">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card text-center text-dark">
                <img src="{{ asset('assets/img/avataaars.svg') }}" class="card-img-top mx-auto p-3" style="max-width: 250px;" alt="{{ $profesor->nombre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $profesor->nombre . ' ' . $profesor->apellidos }}</h5>
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
                    <h6 class="card-title mb-3"><strong>Especialidad:</strong> {{ $profesor->especialidad }}</h6>
                    <h6 class="card-title mb-3"><strong>Fecha de alta:</strong> {{ $profesor->fecha_alta ? \Carbon\Carbon::parse($profesor->fecha_alta)->locale('es')->translatedFormat('d/m/Y') : 'No especificada' }}</h6>
                    <h6 class="card-title mb-3"><strong>Salario:</strong> {{ $profesor->salario !== null ? number_format($profesor->salario, 2, ',', '.') . ' €' : 'No especificado' }}</h6>
                    <a href="{{ route('profesor.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

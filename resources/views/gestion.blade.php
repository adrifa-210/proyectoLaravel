@extends('template.base')

@section('title', 'Gestión')

@section('css')
<style>
    .gestion-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: none;
        border-radius: 1.25rem;
        background: #ffffff;
        color: #2c3e50;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        overflow: hidden;
        position: relative;
    }

    .gestion-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 35px rgba(0, 0, 0, 0.2) !important;
    }

    .gestion-icon-circle {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
        transition: transform 0.3s ease;
    }

    .gestion-card:hover .gestion-icon-circle {
        transform: scale(1.12) rotate(4deg);
    }

    .icon-alumnos {
        background: rgba(26, 188, 156, 0.15);
        color: #1abc9c;
    }

    .icon-profesores {
        background: rgba(44, 62, 80, 0.12);
        color: #2c3e50;
    }

    .icon-modulos {
        background: rgba(13, 110, 253, 0.12);
        color: #0d6efd;
    }

    .icon-matriculas {
        background: rgba(253, 126, 20, 0.15);
        color: #fd7e14;
    }

    .gestion-btn-primary {
        background-color: #2c3e50;
        border-color: #2c3e50;
        color: #ffffff;
        font-weight: 600;
        border-radius: 0.65rem;
        padding: 0.65rem 1rem;
        transition: all 0.2s ease;
    }

    .gestion-btn-primary:hover {
        background-color: #1a252f;
        border-color: #1a252f;
        color: #ffffff;
    }

    .gestion-btn-outline {
        border: 2px solid #2c3e50;
        color: #2c3e50;
        font-weight: 600;
        border-radius: 0.65rem;
        padding: 0.6rem 1rem;
        transition: all 0.2s ease;
    }

    .gestion-btn-outline:hover {
        background-color: #2c3e50;
        color: #ffffff;
    }
</style>
@endsection

@section('content')
<div class="container py-3">
    <!-- Encabezado de la Sección -->
    <div class="text-center mb-5">
        <h1 class="masthead-heading text-uppercase mb-0">Panel de Gestión</h1>
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-th-large"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <p class="masthead-subheading font-weight-light mb-0">
            Centro de administración académica: selecciona una sección para gestionar
        </p>
    </div>

    <!-- Grid de Tarjetas de Gestión -->
    <div class="row g-4 justify-content-center">
        <!-- Tarjeta Alumnos -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card gestion-card h-100 p-4">
                <div class="card-body d-flex flex-column text-center p-0">
                    <div class="gestion-icon-circle icon-alumnos mx-auto">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <h3 class="h4 fw-bold text-uppercase mb-2">Alumnos</h3>
                    <p class="text-muted small mb-4">
                        Consulta el listado general de estudiantes, expedientes y altas.
                    </p>
                    <div class="mt-auto d-grid gap-2">
                        <a href="{{ route('alumno.index') }}" class="btn gestion-btn-primary">
                            <i class="fas fa-users me-1"></i> Ver Alumnos
                        </a>
                        <a href="{{ route('alumno.create') }}" class="btn gestion-btn-outline">
                            <i class="fas fa-user-plus me-1"></i> Crear Alumno
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta Profesores -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card gestion-card h-100 p-4">
                <div class="card-body d-flex flex-column text-center p-0">
                    <div class="gestion-icon-circle icon-profesores mx-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h3 class="h4 fw-bold text-uppercase mb-2">Profesores</h3>
                    <p class="text-muted small mb-4">
                        Administra el profesorado, departamentos y datos del personal docente.
                    </p>
                    <div class="mt-auto d-grid gap-2">
                        <a href="{{ route('profesor.index') }}" class="btn gestion-btn-primary">
                            <i class="fas fa-list me-1"></i> Ver Profesores
                        </a>
                        <a href="{{ route('profesor.create') }}" class="btn gestion-btn-outline">
                            <i class="fas fa-user-tie me-1"></i> Crear Profesor
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta Módulos -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card gestion-card h-100 p-4">
                <div class="card-body d-flex flex-column text-center p-0">
                    <div class="gestion-icon-circle icon-modulos mx-auto">
                        <i class="fas fa-book-open fa-2x"></i>
                    </div>
                    <h3 class="h4 fw-bold text-uppercase mb-2">Módulos</h3>
                    <p class="text-muted small mb-4">
                        Gestión de asignaturas, ciclos formativos y distribución lectiva.
                    </p>
                    <div class="mt-auto d-grid gap-2">
                        <a href="{{ route('modulo.index') }}" class="btn gestion-btn-primary">
                            <i class="fas fa-list me-1"></i> Ver Módulos
                        </a>
                        <a href="{{ route('modulo.create') }}" class="btn gestion-btn-outline">
                            <i class="fas fa-folder-plus me-1"></i> Crear Módulo
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta Matrículas -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card gestion-card h-100 p-4">
                <div class="card-body d-flex flex-column text-center p-0">
                    <div class="gestion-icon-circle icon-matriculas mx-auto">
                        <i class="fas fa-id-card fa-2x"></i>
                    </div>
                    <h3 class="h4 fw-bold text-uppercase mb-2">Matrículas</h3>
                    <p class="text-muted small mb-4">
                        Registro y asociación de alumnos con sus correspondientes módulos.
                    </p>
                    <div class="mt-auto d-grid gap-2">
                        <a href="{{ route('matricula.index') }}" class="btn gestion-btn-primary">
                            <i class="fas fa-list me-1"></i> Ver Matrículas
                        </a>
                        <a href="{{ route('matricula.create') }}" class="btn gestion-btn-outline">
                            <i class="fas fa-file-signature me-1"></i> Crear Matrícula
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

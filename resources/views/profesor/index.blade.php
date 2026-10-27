@extends('template.base')

@section('before-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <a class="btn btn-secondary" href="{{ route('profesor.create') }}">Crear Profesor</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Especialidad</th>
                        <th>Fecha Alta</th>
                        <th>Salario</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->id }}</td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->apellidos }}</td>
                            <td>{{ $profesor->especialidad }}</td>
                            <td>{{ $profesor->fecha_alta ? \Carbon\Carbon::parse($profesor->fecha_alta)->locale('es')->translatedFormat('d/m/Y') : '-' }}</td>
                            <td>{{ $profesor->salario !== null ? number_format($profesor->salario, 2, ',', '.') . ' €' : '-' }}</td>
                            <td class="text-center text-nowrap">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('profesor.show', $profesor->id) }}" class="btn btn-secondary" style="width: 75px;">View</a>
                                    <a href="{{ route('profesor.edit', $profesor->id) }}" class="btn btn-secondary" style="width: 75px;">Edit</a>
                                    <form class="confirm-dialog d-inline m-0" data-message="{{ $profesor->apellidos . ' , ' . $profesor->nombre }}" action="{{ route('profesor.destroy', $profesor) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="btn btn-secondary" style="width: 75px;">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.querySelectorAll('form.confirm-dialog').forEach(
        form => {
            form.addEventListener('submit', e => {
                const message = '¿Seguro que quieres borrar al profesor ' + form.dataset.message + '?';
                if(!confirm(message)){
                    e.preventDefault();
                }
            });
        }
    );
</script>
@endsection

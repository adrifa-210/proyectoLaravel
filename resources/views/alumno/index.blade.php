@extends('template.base')

@section('before-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <a class="btn btn-secondary" href="{{ route('alumno.create') }}">Crear Alumno</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nota</th>
                        <th>Género</th>
                        <th>Fecha Nac.</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->apellido }}</td>
                            <td>{{ $alumno->notaacceso }}</td>
                            <td>{{ $alumno->genero }}</td>
                            <td>{{ \Carbon\Carbon::parse($alumno->fnac)->locale('es')->translatedFormat('d/m/Y') }}</td>
                            <td class="text-center text-nowrap">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-secondary" style="width: 75px;">View</a>
                                    <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-secondary" style="width: 75px;">Edit</a>
                                    <form class="confirm-dialog d-inline m-0" data-message="{{ $alumno->apellido .' , ' . $alumno->nombre }}" action="{{ route('alumno.destroy', $alumno) }}" method="post">
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
                const message = '¿Seguro que quieres borrar al alumno '+ form.dataset.message +'?' ;
                if(!confirm(message)){
                    e.preventDefault();
                }
            });
        }
    );
    </script>
@endsection
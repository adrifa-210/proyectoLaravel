@extends('template.base')

@section('before-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <a class="btn btn-secondary" href="{{ route('modulo.create') }}">Crear Módulo</a>
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
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Abreviatura</th>
                        <th>Horas</th>
                        <th>Créditos</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($modulos as $modulo)
                        <tr>
                            <td>{{ $modulo->id }}</td>
                            <td>{{ $modulo->nombre }}</td>
                            <td>{{ $modulo->abreviatura }}</td>
                            <td>{{ $modulo->horas ?? '-' }}h</td>
                            <td>{{ $modulo->creditos !== null ? number_format($modulo->creditos, 2, ',', '.') : '-' }}</td>
                            <td class="text-center text-nowrap">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('modulo.show', $modulo->id) }}" class="btn btn-secondary" style="width: 75px;">View</a>
                                    <a href="{{ route('modulo.edit', $modulo->id) }}" class="btn btn-secondary" style="width: 75px;">Edit</a>
                                    <form class="confirm-dialog d-inline m-0" data-message="{{ $modulo->nombre }}" action="{{ route('modulo.destroy', $modulo) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="btn btn-secondary" style="width: 75px;">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay módulos registrados.</td>
                        </tr>
                    @endforelse
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
                const message = '¿Seguro que quieres borrar el módulo ' + form.dataset.message + '?';
                if(!confirm(message)){
                    e.preventDefault();
                }
            });
        }
    );
</script>
@endsection
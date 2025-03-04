@extends('auth.index')

@section('titulo')
<title>JAC - Mi Célula</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('auth/plugins/datatable/datatables.min.css') }}">
@endsection

@section('contenido')
<style>
.activo {
    background-color: green;
    color: white;
    padding: 5px;
    border-radius: 5px;
}

.inactivo {
    background-color: red;
    color: white;
    padding: 5px;
    border-radius: 5px;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fas fa-user-check"></i> Mi Célula
        </h1>
    </section>
    <br>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tablaAsistentes" class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre y Apellido</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistentes as $asistente)
                            <tr>
                                <td>{{ $asistente->nombre }}, {{ $asistente->apellido }}</td>
                                <td>{{ $asistente->tel }}</td>
                                <td>
                                    <span class="badge {{ $asistente->estado ? 'bg-success' : 'bg-danger' }}">
                                        {{ $asistente->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('auth/plugins/datatable/datatables.min.js') }}"></script>
@endsection
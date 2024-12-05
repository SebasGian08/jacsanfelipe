@extends('auth.index')

@section('titulo')
    <title>JAC </title>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('auth/plugins/datatable/datatables.min.css') }}">
@endsection

@section('contenido')
    <style>
        .activo {
            background-color: green;
            color: white;
        }

        .inactivo {
            background-color: red;
            color: white;
        }
    </style>
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                <i class="fas fa-user-check"></i> Reasignar Asistentes a Nueva Célula
            </h1>
        </section>
        <br>
        <div class="content-header">
            <div class="row align-items-center">
                <!-- Contenedor para los mensajes -->
                <div class="col-lg-12">
                    <!-- Mensaje de éxito -->
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa fa-check-circle me-2"></i> <!-- Icono de éxito -->
                            <div>
                                <ul class="mb-0">
                                    {{ session('success') }}
                                </ul>
                            </div>
                        </div>
                    @endif
                    <!-- Mensaje de error -->
                    @if ($errors->any())
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa fa-exclamation-triangle me-2"></i> <!-- Icono de error -->
                            <div>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <form class="col-lg-12 col-md-12" action="{{ route('auth.reasignar.store') }}" method="POST">
                    @csrf
                        <div style="display: flex; flex-wrap: wrap;">
                            <!-- Casillas de verificación para seleccionar asistentes -->
                            <div class="form-group col-lg-12">
                                <label for="asistente_id" class="font-weight-bold">Seleccionar Asistentes:</label>
                                <div class="row">
                                    @foreach ($asistentes as $asistente)
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="asistente_id[]"
                                                    value="{{ $asistente->id }}" id="asistente_{{ $asistente->id }}">
                                                <label class="custom-control-label" for="asistente_{{ $asistente->id }}">
                                                    {{ $asistente->nombre }} <span style="color:blueviolet"> (Célula: {{ $asistente->celula->nombre }})</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Selección de la Nueva Célula -->
                            <div class="form-group col-lg-12">
                                <label for="tipo_programa" class="font-weight-bold" >Seleccionar nueva celula:</label>
                                <select name="celula_id" id="ncelula_id" required class="form-control">
                                    @foreach ($celulas as $celula)
                                        <option value="{{ $celula->id }}">{{ $celula->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Botón de Confirmación -->
                        <div class="form-group col-lg-12 text-center">
                            <button type="submit" class="btn btn-success btn-lg"
                                style="font-size: 17px; border-radius: 15px;">
                                <i class="fa fa-save"></i> Confirmar Reasignación
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('auth/plugins/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('auth/plugins/datatable/dataTables.config.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('auth/js/asistencia/index.js') }}"></script>
    <script>
        var csrfToken = '{{ csrf_token() }}';
    </script>
@endsection

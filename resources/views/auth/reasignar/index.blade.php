@extends('auth.index')

@section('titulo')
    <title>JAC | Registro de Asistencia</title>
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
                <i class="fas fa-user-check"></i> Asistencia
            </h1>
        </section>


        <br>

        {{--  --}}
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
                <form class="col-lg-12 col-md-12" action="{{ route('auth.asistencia.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" class="id_user" value="{{ $userId }}" required>
                    <div style="display: flex; flex-wrap: wrap;">
                        <!-- Programa -->
                        <div class="form-group col-lg-6">
                            <label for="tipoprograma" class="m-0 label-primary" style="font-size: 17px;">
                                <i class="fa fa-briefcase"></i> Programa
                            </label>
                            <select class="form-control form-control-lg" id="programa_id" name="programa_id" required>
                                <option value="" disabled selected>Seleccione Programa..</option>
                                @foreach ($tipoprograma as $tipoprograma)
                                    <option value="{{ $tipoprograma->id }}">{{ $tipoprograma->nombre }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-primary btn-lg" style="font-size: 17px;border-radius:15px;">
                            <i class="fa fa-save"></i> Confirmar Reasignación</button>
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

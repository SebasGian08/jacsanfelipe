@extends('auth.index')

@section('titulo')
<title>JAC | Inicio</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('auth/plugins/datatable/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('auth/css/inicio/core.css') }}">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css"> --}}
@endsection
@section('contenido')
<div class="content-wrapper">

    <section class="content-header d-flex justify-content-between align-items-center">
        <h2>
            Dashboard
            <small>| Inicio</small>
        </h2>
        <!-- Botón de refresco alineado a la derecha -->
        <div>
            <a href="javascript:void(0)" class="btn-m btn-secondary-m" onclick="window.location.reload();">
                <i class="fa fa-refresh"></i> Refrescar | Dashboard
            </a>
        </div>
    </section>
    <br>
    {{-- Cargando --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container">
        <!-- Shortcut Buttons Row -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-9">
                <!-- Barra de notificación 1: No te olvides de marcar asistencia -->
                <!-- Barra de notificación con icono -->
                <div class="alert alert-danger text-left mb-4" role="alert"
                    style="font-size: 12px; background-color: #ff180026; color: #ff0000;">
                    <span class="fa fa-calendar-check"></span>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> No te olvides de marcar asistencia.
                    <a href="#" data-toggle="modal" data-target="#indicacionesModal"
                        style="color: #007bff; text-decoration: underline; font-size:10px;"><i
                            class="fa fa-angle-double-right" aria-hidden="true"></i> Ver Indicaciones</a>
                </div>

                <!-- Modal de Indicaciones -->
                <div class="modal fade" id="indicacionesModal" tabindex="-1" role="dialog"
                    aria-labelledby="indicacionesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #ff180026; color: white;">
                                <h5 class="modal-title" id="indicacionesModalLabel">Indicaciones para Marcar Asistencia
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Para garantizar que todos los asistentes sean registrados correctamente, por favor
                                    sigue los siguientes pasos:</p>
                                <ul>
                                    <li>1. Dirígete a la sección <strong>Gestión de Asistencia</strong> (Registro de
                                        Asistencia).</li>
                                    <li>2. Selecciona el <strong>programa</strong> y la <strong>célula</strong> que
                                        estás liderando.</li>
                                    <li>3. Marca a los <strong>asistentes</strong> y registra su estado:
                                        <strong>PRESENTE</strong>, <strong>AUSENTE</strong> o
                                        <strong>JUSTIFICADO</strong>.
                                    </li>
                                    <li>4. Si tienes alguna duda, por favor contáctate con el encargado.</li>
                                </ul>
                                <p><strong>Recuerda:</strong></p>
                                <ul>
                                    <li>Es necesario registrar el estado de todos los asistentes, independientemente de
                                        cuál sea.</li>
                                    <li>Si el estado es <strong>JUSTIFICADO</strong>, asegúrate de detallar la razón de
                                        la ausencia.</li>
                                    <li>Registrar la asistencia correctamente es fundamental para el seguimiento de las
                                        actividades y la planificación de futuras reuniones.</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-9">
                <!-- Barra de notificación 2: No te olvides de registrar el seguimiento -->
                <div class="alert alert-danger text-left mb-4" role="alert" style="font-size: 12px;
                        background-color: #ff180026;
                        color: #ff0000;">
                    <span class="fa fa-pencil-alt"></span> <i class="fa fa-info-circle" aria-hidden="true"></i> No te
                    olvides de registrar el seguimiento.
                </div>
            </div>
        </div>
        @if (Auth::guard('web')->user()->profile_id == \BolsaTrabajo\App::$PERFIL_DESARROLLADOR ||
            Auth::guard('web')->user()->profile_id == \BolsaTrabajo\App::$PERFIL_LIDER)
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-3 text-center">
                <a href="{{ route('auth.asistencia') }}" class="btn"
                    style="width:100%; background-color: #28a745; color: #ffffff; margin: 10px 1px 10px 1px;
    padding: 15px 20px 20px 20px; border-radius: 10px; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-check-circle fa-2x"></i><br>
                    <span style="font-size: 1.2em;">REGISTRAR ASISTENCIA</span>
                </a>
            </div>
            <div class="col-12 col-md-3 text-center">
                <a href="{{ route('auth.seguimiento') }}" class="btn"
                    style="width:100%;background-color: #384e63; color: #ffffff; margin: 10px 1px 10px 1px;
    padding: 15px 20px 20px 20px; border-radius: 10px; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-folder-open fa-2x"></i><br>
                    <span style="font-size: 1.1em;">REGISTRAR SEGUIMIENTO</span>
                </a>
            </div>
            <div class="col-12 col-md-3 text-center">
                <a href="{{ route('auth.asistentes') }}" class="btn"
                    style="width:100%;background-color: #007bff; color: #ffffff; margin: 10px 1px 10px 1px;
    padding: 15px 20px 20px 20px; border-radius: 10px; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-user-plus fa-2x"></i><br>
                    <span style="font-size: 1.2em;">REGISTRAR ASISTENTES</span>
                </a>
            </div>
            <div class="col-12 col-md-3 text-center">
                <a href="{{ route('auth.micelula') }}" class="btn"
                    style="width:100%;background-color: #7b00ff; color: #ffffff; margin: 10px 1px 10px 1px;
            padding: 15px 20px 20px 20px; border-radius: 10px; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-hand-peace-o fa-2x"></i><br>
                    <span style="font-size: 1.2em;">MI CÉLULA</span>
                </a>
            </div>
            @endif
            @if (Auth::guard('web')->user()->profile_id == \BolsaTrabajo\App::$PERFIL_DESARROLLADOR ||
            Auth::guard('web')->user()->profile_id == \BolsaTrabajo\App::$PERFIL_ADMINISTRADOR)
            <div class="col-12 col-md-3 text-cente">
                <a href="{{ route('auth.asistencia.listado') }}" class="btn"
                    style="width:100%;background-color: #ffc107; color: #ffffff; margin: 10px 1px 10px 1px;
    padding: 15px 20px 20px 20px; border-radius: 10px; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-calendar fa-2x"></i><br>
                    <span style="font-size: 1.2em;">LISTADO DE ASISTENCIA</span>
                </a>
            </div>
            @endif
        </div>
        <style>
        .btn:hover {
            filter: brightness(1.1);
            transform: translateY(-5px);
        }
        </style>
        <div class="row justify-content-center">
            <div class="col-lg-3 mb-4">
                <div class="container rounded" style="background-color: #ffffff; padding: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: center;
                        border-radius:35px !important;">
                    <form id="filtro-form" action="{{ route('auth.inicio') }}" method="GET">
                        <div class="form-group">
                            <label for="fecha_desde" class="m-0 label-primary">Mostrar desde</label>
                            <input type="date" class="form-control form-control-sm" id="fecha_desde" name="fecha_desde"
                                value="{{ request()->input('fecha_desde', date('Y-m-d')) }}">
                            @error('fecha_desde')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fecha_hasta" class="m-0 label-primary">Mostrar hasta</label>
                            <input type="date" class="form-control form-control-sm" id="fecha_hasta" name="fecha_hasta"
                                value="{{ request()->input('fecha_hasta', date('Y-m-d')) }}">
                            @error('fecha_hasta')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" id="filtro-submit" class="btn btn-primary btn-sm"
                                style="border-color: #2ecc71; border-radius: 5px;">Aplicar Filtro</button>
                            <div id="loading" style="display: none;">
                                Cargando...
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Remaining content (totals) goes here --}}
            <div class="col-lg-3 mb-4 zoom-container">
                <div class="totales text-center"
                    style="background: linear-gradient(to bottom right, #34495e, #536f8b);">
                    <div class="title">
                        <p class="title-text" style="color:rgb(255, 255, 255)">
                            <i class="fa fa-user"></i> Total de Asistentes
                            <span class="icon-up"><i class="fa fa-arrow-up"></i></span>
                        </p>
                    </div>
                    <div class="data">
                        <p id="totalAsistentes" style="color: white">
                            {{ $totalAsistentes }}
                        </p>
                        <div class="range">
                            <div class="fill" style="background-color: #00e272 !important;"></div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <!-- Espacio entre contenido principal y enlace -->
                        <a href="{{ route('auth.asistentes') }}" class="ver-mas"
                            style="color: white; text-decoration: none; margin-top: 10px;">
                            Ver más <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4 zoom-container">
                <div class="totales text-center">
                    <div class="title">
                        <p class="title-text" style="color:rgb(0, 175, 102)">
                            <i class="fa fa-users"></i> Total de Celulas
                            <span class="icon-up"><i class="fa fa-arrow-up" style="color:white"></i></span>
                        </p>
                    </div>
                    <div class="data">
                        <p id="totalUsuarios">
                            {{ $totalCelulas }}
                        </p>
                        <div class="range">
                            <div class="fill" style="background-color: #00e272 !important;"></div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <!-- Espacio entre contenido principal y enlace -->
                        <a href="{{ route('auth.celula') }}" class="ver-mas"
                            style="color: #00e272; text-decoration: none; margin-top: 10px;">
                            Ver más <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4 zoom-container">
                <div class="totales text-center"
                    style="background: linear-gradient(to bottom right, #34495e, #536f8b);">
                    <div class="title">
                        <p class="title-text" style="color:rgb(255, 255, 255)">
                            <i class="fa fa-calendar mr-5"></i> Total de Actividades
                            <span class="icon-up"><i class="fa fa-arrow-up"></i></span>
                        </p>
                    </div>
                    <div class="data">
                        <p id="totalActividades" style="color: white">
                            {{ $totalActividades }}
                        </p>
                        <div class="range">
                            <div class="fill" style="background-color: #00e272 !important;"></div>
                        </div>
                        <div style="margin-top: 10px;">
                            <!-- Espacio entre contenido principal y enlace -->
                            <a href="{{ route('auth.calendario.listado') }}" class="ver-mas"
                                style="color: white; text-decoration: none; margin-top: 10px;">
                                Ver más <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-9">
            <div class="alert alert-success" role="alert">
                <span class="fa fa-check-circle"></span>
                Por favor, aplique filtros por fecha para visualizar gráficos e indicadores actualizados.
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="content-header"
                    style="box-shadow: 0 2px 25px -5px rgba(0, 0, 0, .16), 0 25px 21px -5px rgba(0, 0, 0, .1) !important;">
                    <div id="container"></div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="content-header"
                    style="box-shadow: 0 2px 25px -5px rgba(0, 0, 0, .16), 0 25px 21px -5px rgba(0, 0, 0, .1) !important;">
                    <div id="seguimiento"></div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="content-header"
                    style="box-shadow: 0 2px 25px -5px rgba(0, 0, 0, .16), 0 25px 21px -5px rgba(0, 0, 0, .1) !important;">
                    <div id="bautizados"></div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="content-header"
                    style="box-shadow: 0 2px 25px -5px rgba(0, 0, 0, .16), 0 25px 21px -5px rgba(0, 0, 0, .1) !important;">
                    <div id="grafico"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="content-header"
                    style="box-shadow: 0 2px 25px -5px rgba(0, 0, 0, .16), 0 25px 21px -5px rgba(0, 0, 0, .1) !important;">
                    <div id="carreraporcontratado"></div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="content-header"
                    style="box-shadow: 0 2px 25px -5px rgba(0, 0, 0, .16), 0 25px 21px -5px rgba(0, 0, 0, .1) !important;">
                    <div id="otro"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h3 style="text-align: center;font-weight: 700">Motivos de Oración</h3>
                <section class="content-header">
                    @csrf
                    <table id="tableInicio" width="100%"
                        class='table dataTables_wrapper container-fluid dt-bootstrap4 no-footer'></table>
                </section>
            </div>
        </div>
    </div>
    <br>

</div>
@endsection

@section('scripts')
<!-- Incluir archivos de Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript" src="{{ asset('auth/js/inicio/index.js') }}"></script>

<script type="text/javascript">
// Obtener los datos proporcionados por el controlador
var TotalDeAsistentesporCelula = @json($TotalDeAsistentesporCelula);
var seguimientoPorCelula = @json($seguimientoPorCelula);
var asistenciasPresente = @json($asistenciasPresente);
var asistenciasAusente = @json($asistenciasAusente);
var asistenciasPorPrograma = @json($asistenciasPorPrograma);
var obtenerBautizados = @json($obtenerBautizados);

// Imprimir datos en la consola para depuración
console.log('TotalDeAsistentesporCelula:', TotalDeAsistentesporCelula);
console.log('seguimientoPorCelula:', seguimientoPorCelula);
console.log('asistenciasPresente:', asistenciasPresente);
console.log('asistenciasAusente:', asistenciasAusente);
console.log('asistenciasPorPrograma:', asistenciasPorPrograma);
console.log('obtenerBautizados:', obtenerBautizados);

// Función para transformar datos a números
function transformData(data) {
    return data.map(item => ({
        name: item.celula || item.name,
        y: parseFloat(item.cantidad_asistentes || item.cantidad_seguimientos || item.y)
    }));
}

// Configurar el gráfico de Highcharts
Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Cantidad de Asistentes por Célula'
    },
    tooltip: {
        formatter: function() {
            return '<b>' + this.point.name + ': ' + this.point.percentage.toFixed(0) + '%</b>';
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y}'
            }
        }
    },
    series: [{
        name: 'Cantidad',
        colorByPoint: true,
        data: transformData(TotalDeAsistentesporCelula)
    }]
});

Highcharts.chart('seguimiento', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Seguimiento por Célula',
        align: 'center'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y}'
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Cantidad de Seguimientos',
        colorByPoint: true,
        data: transformData(seguimientoPorCelula)
    }]
});

Highcharts.chart('grafico', {
    chart: {
        type: 'bar'
    },
    title: {
        align: 'center',
        text: 'Cantidad de Asistencias por Participante'
    },
    xAxis: {
        type: 'category',
        title: {
            text: 'Participantes'
        }
    },
    yAxis: {
        title: {
            text: 'Cantidad de Asistencias'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
    series: [{
        name: 'Cantidad de Asistencias',
        colorByPoint: true,
        data: transformData(asistenciasPresente)
    }]
});

Highcharts.chart('carreraporcontratado', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'center',
        text: 'Cantidad de Inasistencias por Participante'
    },
    xAxis: {
        type: 'category',
        title: {
            text: 'Participantes'
        }
    },
    yAxis: {
        title: {
            text: 'Cantidad de Inasistencias'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
    series: [{
        name: 'Cantidad de Contratados',
        colorByPoint: true,
        data: transformData(asistenciasAusente)
    }]
});

Highcharts.chart('otro', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'center',
        text: 'Cantidad de Asistencias por Programa'
    },
    xAxis: {
        type: 'category',
        title: {
            text: 'Programa'
        }
    },
    yAxis: {
        title: {
            text: 'Cantidad de Asistencias'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
    series: [{
        name: 'Cantidad de Asistencias',
        colorByPoint: true,
        data: transformData(asistenciasPorPrograma)
    }]
});


const datosBautizados = Array.isArray(obtenerBautizados.data) ? obtenerBautizados.data : [];

// Transformamos los datos para Highcharts
function transformBautizados(data) {
    return data.map(item => ({
        name: item.bautizado,
        y: parseFloat(item.total)
    }));
}

// Dibujamos el gráfico
Highcharts.chart('bautizados', {
    chart: { type: 'pie' },
    title: { text: 'Cantidad de bautizados' },
    tooltip: {
        formatter: function() {
            return '<b>' + this.point.name + ': ' + this.point.percentage.toFixed(0) + '%</b>';
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: { enabled: true, format: '{point.name}: {point.y}' }
        }
    },
    series: [{
        name: 'Cantidad',
        colorByPoint: true,
        data: transformBautizados(datosBautizados) // <-- aquí usamos solo el array
    }]
});



</script>
@endsection
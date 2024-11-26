
@extends('auth.index')

@section('titulo')
    <title>JAC | Camino del Hijo - Cursos</title>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('auth/plugins/datatable/datatables.min.css') }}">
    
@endsection

@section('contenido')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Camino del hijo - Cursos
            </h1>
        </section>

        <section class="content">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="content-header">
                        <table id="tableCursos"
                            class="table table-bordered table-striped display nowrap margin-top-10 dataTable no-footer">
                            <thead>
                                <tr>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('auth/plugins/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('auth/plugins/datatable/dataTables.config.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('auth/js/caminodelhijo/index.js') }}"></script>
@endsection

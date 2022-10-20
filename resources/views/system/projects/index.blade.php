@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyectos registrados</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Proyectos</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Proyecto</th>
                            <th>Contractor</th>
                            <th>Fiscalizador</th>
                            <th>Lugar</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>
                            <th>Progreso</th>
                            <th style="width: 40px">(%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($projects as $project)
                                <td>
                                    <a href="{{route('projects.show', $project->id)}}" class="btn btn-block bg-gradient-primary">Editar</a>
                                </td>
                                <td>{{$project->project}}</td>
                                <td>{{$project->contractor}}</td>
                                <td>{{$project->inspection}}</td>
                                <td>{{$project->place}}</td>
                                <td>{{$project->date_start}}</td>
                                <td>{{$project->date_end}}</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">55%</span></td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop

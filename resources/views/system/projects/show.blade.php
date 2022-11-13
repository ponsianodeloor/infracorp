@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto:</h1>
@stop

@section('content')
    <h4>
        {{$project->project}}
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Proyecto</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
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
                            <td>
                                <a class="btn btn-outline-info" href="{{route('projects.print_inspection_report', $project)}}" target="_blank"><span class="fa fa-file-pdf"></span></a>
                            </td>
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
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Informe de Fiscalizacion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Anexos de Volumen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="true">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>1.- GENERALIDADES</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header panel box box-primary">
                                    <h3 class="card-title">1.1.- Antecedentes</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.antecedent.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <textarea id="editor" name="antecedent">
                                            {{$project->inspectionReport->antecedent}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Antecedente">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">1.2.- Contrato fiscalizado</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.audited_contract.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <textarea id="editor_2" name="audited_contract">
                                            {{$project->inspectionReport->audited_contract}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Contrato Fiscalizado">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">1.2.1.- Resumen del Contrato</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.resume_contract.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <x-adminlte-textarea name="resume_contract" label="Resumen del Contrato" rows=5 igroup-size="sm" placeholder="Insert resumen...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            {{$project->inspectionReport->resume_contract}}
                                        </x-adminlte-textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Resumen">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>2.- OBRA INTERVENIDA</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">2.1.- Identificacion</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.resume_contract.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        Formulario Identificacion


                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Formulario de Identificacion">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">2.2.- Ubicacion Geografica del proyecto</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.geographic_location.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <x-adminlte-textarea name="geographic_location" label="Ubicacion Geografica" rows=5 igroup-size="sm" placeholder="Insertar ubicacion geografica...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            {{$project->inspectionReport->geographic_location}}
                                        </x-adminlte-textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Resumen">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">2.3.- Gráfico del Proyecto</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.resume_contract.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <x-adminlte-textarea name="resume_contract" label="Ubicacion Geografica" rows=5 igroup-size="sm" placeholder="Insert resumen...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            {{$project->inspectionReport->resume_contract}}
                                        </x-adminlte-textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Resumen">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>3.- CONTRATO DE FISCALIZACION</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">3.1.- Fiscalizacion Temporal Anterior</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.previous_temporary_control.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_3" name="contracted_control">
                                            {{$project->inspectionReport->previous_temporary_control}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Fiscalizacion Temporal Anterior">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">3.2.- Fiscalizacion Contratada</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.contracted_control.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_4" name="contracted_control">
                                            {{$project->inspectionReport->contracted_control}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Fiscalizacion Contratada">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{route('projects.volumes.create', $project)}}" class="btn btn-block btn-success">Nuevo</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 200px">#</th>
                                            <th>Item</th>
                                            <th>Codigo</th>
                                            <th>Unidad Metrica</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($project->volumes as $volume)
                                            <tr>
                                                <td>
                                                    <a href="{{route('projects.volumes.edit', $volume->id)}}" class="btn btn-block bg-gradient-primary"> <i class="fa fa-edit"></i>Editar</a>
                                                    <a href="{{route('projects.volumes.show', $volume)}}" class="btn btn-warning btn-block"> <i class="fa fa-file"></i> Elementos <span class="badge bg-success">0</span></a>
                                                </td>
                                                <td>{{$volume->item}}</td>
                                                <td>{{$volume->code}}</td>
                                                <td>{{$volume->metric_unit}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_2' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_2 => {
                window.editor_2 = editor_2;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_3' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_3 => {
                window.editor_3 = editor_3;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_4' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_4 => {
                window.editor_4 = editor_4;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>


@stop

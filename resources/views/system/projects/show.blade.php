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
                            <th colspan="2">&nbsp;</th>
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
                                <a class="btn btn-outline-info" href="{{route('projects.edit', $project)}}" title="Editar"><span class="fa fa-list"></span></a>
                            </td>
                            <td>
                                <a class="btn btn-outline-info" href="{{route('projects.print_inspection_report', $project)}}" title="Imprimir reporte" target="_blank"><span class="fa fa-file-pdf"></span></a>
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
                                    <form action="{{route('projects.intervened_work_identification.update', $project->intervenedWorkIdentification)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <td colspan="4">
                                                    <x-adminlte-input name="identification" label="Identificacion" placeholder="Identificacion" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->identification}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Datos Referenciales</td>
                                                <td>
                                                    <x-adminlte-input name="work_number" label="Numero de Obra" placeholder="Numero de Obra" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->work_number}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <x-adminlte-input name="drive_type" label="Tipo de Unidad" placeholder="Tipo de Unidad" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->drive_type}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td colspan="2">
                                                    <x-adminlte-input name="typology" label="Tipologia" placeholder="Tipologia" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->typology}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="stage" label="Etapa" placeholder="Etapa" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->stage}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <x-adminlte-input name="location" label="Ubicacion" placeholder="Ubicacion" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->location}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="province" label="Provincia" placeholder="Provincia" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->province}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="canton" label="Canton" placeholder="Canton" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->canton}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="parish" label="Parroquia" placeholder="Parroquia" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->parish}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Coordenadas</td>
                                                <td>
                                                    <x-adminlte-input name="coordinate_x" label="X" placeholder="Coordenadas X" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->coordinate_x}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="coordinate_y" label="Y" placeholder="Coordenadas Y" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->coordinate_y}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="altitude" label="Altitud" placeholder="Altitud" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->altitude}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <x-adminlte-textarea name="existing_documentation" label="Documentacion Existente" rows=5
                                                                         label-class="text-lightblue"
                                                                         igroup-size="sm" placeholder="Insert Short description...">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text bg-dark">
                                                                <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                        {{$project->intervenedWorkIdentification->existing_documentation}}
                                                    </x-adminlte-textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <x-adminlte-input name="land_deeds" label="Escrituras Predio" placeholder="Localización" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->land_deeds}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td colspan="2">
                                                    <x-adminlte-input name="date_deeds" label="Fecha Predio" placeholder="Localización" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->date_deeds}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <x-adminlte-input name="municipality" label="Municipio" placeholder="Municipio" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->municipality}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="cadastral_code" label="Predio" placeholder="Predio" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->cadastral_code}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="irm_date" label="IRM/FECH" placeholder="IRM/FECH" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->irm_date}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <x-adminlte-input name="total_cos" label="COS Total" placeholder="COS Total" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->total_cos}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="floors" label="Pisos" placeholder="Pisos" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->floors}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="pb_cos" label="COS PB" placeholder="COS PB" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->pb_cos}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <x-adminlte-input name="front_removal" label="Retiro Frontal" placeholder="Retiro Frontal" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->front_removal}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="block" label="Bloque" placeholder="Bloque" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->block}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="pst_removal" label="Retiro PST" placeholder="Retiro PST" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->pst_removal}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td>
                                                    <x-adminlte-input name="side_removal" label="Retiro LAT" placeholder="Retiro LAT" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->side_removal}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-file text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <x-adminlte-input name="delivery_date_property" label="Fecha Entrega del Predio" placeholder="Fecha de entrega del predio" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->delivery_date_property}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td colspan="3">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <x-adminlte-input name="delivery_date_plans" label="Fecha Entrega de Planos" placeholder="Fecha de entrega del predio" label-class="text-lightblue" value="{{$project->intervenedWorkIdentification->delivery_date_plans}}">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-lightblue"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </td>
                                                <td colspan="3">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </table>

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

                                    <div class="card">
                                        <div class="card-header">
                                            <p>Imagen de Localizacion</p>
                                        </div>
                                        <div class="card-body">
                                            @if($project->url_image_location)
                                                <div style="overflow: hidden;">
                                                    <img src="{{asset($project->url_image_location)}}" alt="image project">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                    <form action="{{route('projects.update.url_image_location', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <x-adminlte-input-file name="file_url_image_location" label="Subir imagen" placeholder="Choose a Location Picture...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Imagen " theme="primary btn-block" icon="fas fa-save" type="submit"/>

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

                                        <textarea id="editor_3" name="previous_temporary_control">
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

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">3.3.- Resumen del Contrato de fiscalización</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.resume_audited_contract.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <x-adminlte-textarea name="resume_audited_contract" label="Resumen del Contrato de fiscalizacion" rows=5 igroup-size="sm" placeholder="Insert resumen...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            {{$project->inspectionReport->resume_audited_contract}}
                                        </x-adminlte-textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Resumen del Contrato de Fiscalizacion">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">3.4.- Valor referencial del contrato de fiscalización</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    Los cambios se realizan en la edicion del proyecto
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>4.- Ejecucion del Contrato</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">4.1.- Estado de Ejecucion de los Estudios</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="card card-primary card-outline card-tabs">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-three-state_execution-tab" data-toggle="pill" href="#custom-tabs-three-state_execution" role="tab" aria-controls="custom-tabs-three-state_execution" aria-selected="true">Estado de Ejecucion</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-three-stage-tab" data-toggle="pill" href="#custom-tabs-three-stage" role="tab" aria-controls="custom-tabs-three-stage" aria-selected="false">Etapas</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                                <div class="tab-pane fade active show" id="custom-tabs-three-state_execution" role="tabpanel" aria-labelledby="custom-tabs-three-state_execution-tab">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Registro de etapas</h3>
                                                                </div>
                                                                <div class="card-body">

                                                                    <form action="{{route('projects.execution_status.store', $project)}}" method="post">
                                                                        @csrf
                                                                        {{-- With prepend slot --}}
                                                                        <x-adminlte-input name="stage" label="Etapa" placeholder="Etapa" label-class="text-lightblue">
                                                                            <x-slot name="prependSlot">
                                                                                <div class="input-group-text">
                                                                                    <i class="fas fa-map text-lightblue"></i>
                                                                                </div>
                                                                            </x-slot>
                                                                        </x-adminlte-input>


                                                                        {{-- With prepend slot --}}
                                                                        <x-adminlte-input name="start_date" label="Fecha Inicio" placeholder="Fecha de Inicio" label-class="text-lightblue">
                                                                            <x-slot name="prependSlot">
                                                                                <div class="input-group-text">
                                                                                    <i class="fas fa-calendar text-lightblue"></i>
                                                                                </div>
                                                                            </x-slot>
                                                                        </x-adminlte-input>

                                                                        {{-- With prepend slot --}}
                                                                        <x-adminlte-input name="final_date" label="Fecha Final" placeholder="Fecha Final" label-class="text-lightblue">
                                                                            <x-slot name="prependSlot">
                                                                                <div class="input-group-text">
                                                                                    <i class="fas fa-calendar text-lightblue"></i>
                                                                                </div>
                                                                            </x-slot>
                                                                        </x-adminlte-input>

                                                                        <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                                                                    </form>
                                                                </div>
                                                                <div class="card-footer">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-8">

                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Ejecucion</h3>
                                                                </div>

                                                                <div class="card-body p-0">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Etapas</th>
                                                                            <th>&nbsp;</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($project->executionStates as $execution_status)
                                                                            <tr>
                                                                                <td width="30%">
                                                                                    {{$execution_status->stage}}
                                                                                </td>
                                                                                <td>
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                        @foreach($execution_status->types as $execution_status_type)
                                                                                            @php
                                                                                                $type_and_description = explode('$$', $execution_status_type->type_and_description);
                                                                                            @endphp
                                                                                            <td>
                                                                                                {{$type_and_description[0]}}
                                                                                                <p>
                                                                                                    {{$type_and_description[1]}}
                                                                                                </p>
                                                                                                <form action="{{route('projects.execution_status.types.destroy', $execution_status_type)}}" method="post">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                                                </form>
                                                                                            </td>
                                                                                        @endforeach
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <td>
                                                                                                Fecha Inicio: {{$execution_status->start_date}}
                                                                                            </td>
                                                                                            <td>
                                                                                                Fecha Final: {{$execution_status->final_date}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
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
                                                <div class="tab-pane fade" id="custom-tabs-three-stage" role="tabpanel" aria-labelledby="custom-tabs-three-stage-tab">
                                                    <form action="{{route('projects.execution_status.types.store', $project)}}" method="post">
                                                        @csrf
                                                        <x-adminlte-select name="execution_status_id" label="Etapa" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text bg-gradient-info">
                                                                    <i class="fas fa-sitemap"></i>
                                                                </div>
                                                            </x-slot>
                                                            @foreach($project->executionStates as $execution_status)
                                                                <option value="{{$execution_status->id}}">{{$execution_status->stage}}</option>
                                                            @endforeach
                                                        </x-adminlte-select>

                                                        {{-- With prepend slot --}}
                                                        <x-adminlte-input name="type" label="type" placeholder="Item" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-clone text-lightblue"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>

                                                        {{-- With prepend slot --}}
                                                        <x-adminlte-input name="description" label="Description" placeholder="Description" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-bars text-lightblue"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>

                                                        <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">4.2.- Monto ejecutado y aprobado de los estudios</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.execute_approved_mounts.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_executed_approved_amount" label="Subir Archivo XLS" placeholder="Choose a File Executed and approved amount...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->executeApprovedAmounts)>0)
                                        <table class="table table-bordered table-striped mt-3">
                                            <tr>
                                                <td>Proyecto</td>
                                                <td>Monto Estudios Definitivos</td>
                                                <td>Monto Aprobado Estudios</td>
                                            </tr>
                                            @php
                                                $sum_value_definitive_studies = 0;
                                            @endphp
                                            @foreach($project->executeApprovedAmounts as $executeApprovedAmount)
                                                <tr>
                                                    <td>{{$executeApprovedAmount->project}}</td>
                                                    <td><?php echo "$ ".number_format($executeApprovedAmount->value_definitive_studies, 2); ?></td>
                                                    <td><?php echo "$ ".number_format($executeApprovedAmount->value_approved_studies, 2); ?></td>
                                                </tr>
                                                @php
                                                    $sum_value_definitive_studies += $executeApprovedAmount->value_definitive_studies;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <strong>Total: </strong>
                                                </td>
                                                <td>
                                                    <?php echo "$ ".number_format($sum_value_definitive_studies, 2); ?>
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                    @endif

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">4.3- Personal del Contratista</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.contractor_workers.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_contractor_workers" label="Subir Archivo XLS" placeholder="Choose a File Personal del Contratista...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->contractorWorkers)>0)
                                        <table class="table table-bordered table-striped mt-3">
                                            <tr>
                                                <td>Cargo</td>
                                                <td>Cantidad</td>
                                                <td>Nombre</td>
                                                <td>Observaciones</td>
                                            </tr>
                                            @foreach($project->contractorWorkers as $contractorWorker)
                                                <tr>
                                                    <td>{{$contractorWorker->position}}</td>
                                                    <td>{{$contractorWorker->amount}}</td>
                                                    <td>{{$contractorWorker->name}}</td>
                                                    <td>{{$contractorWorker->observations}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>5.- Productos de los trabajos ejecutados por la empresa contratista</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Productos de los trabajos ejecutados por la empresa contratista:</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.product_work_contractors.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_product_work_contractor" label="Subir Archivo XLS" placeholder="Choose a File Productos de los trabajos ejecutados...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->productWorkContractors)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>"#"</td>
                                                <td>MDG</td>
                                                <td>Subcircuito</td>
                                                <td>TipoGrafica</td>
                                                <td>Estudio Suelos</td>
                                                <td>Certificado Ambiental</td>
                                                <td>Revision Topografica</td>
                                                <td>Implantaciones</td>
                                                <td>Memorias Arquitectonicas</td>
                                                <td>Estructural</td>
                                                <td>Electrica Electronica</td>
                                                <td>Hidrosanitario</td>
                                                <td>Estudio Mecanico</td>
                                            </tr>
                                            @foreach($project->productWorkContractors as $productWorkContractor)
                                                <tr>
                                                    <td>{{$productWorkContractor->number}}</td>
                                                    <td>{{$productWorkContractor->mdg}}</td>
                                                    <td>{{$productWorkContractor->sub_circuit}}</td>
                                                    <td>{{$productWorkContractor->typography}}</td>
                                                    <td>{{$productWorkContractor->soil_study}}</td>
                                                    <td>{{$productWorkContractor->environmental_certificate}}</td>
                                                    <td>{{$productWorkContractor->typographical_revision}}</td>
                                                    <td>{{$productWorkContractor->implantations}}</td>
                                                    <td>{{$productWorkContractor->architectural_memories}}</td>
                                                    <td>{{$productWorkContractor->structural}}</td>
                                                    <td>{{$productWorkContractor->electrical_electronic}}</td>
                                                    <td>{{$productWorkContractor->hydro_sanitary}}</td>
                                                    <td>{{$productWorkContractor->mechanical_study}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>6.- RESULTADOS DE LA REVISION DE ESTUDIOS DEFINITIVOS</h3>
                                </div>
                            </div>

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>7.- EVALUACION DE LOS ESTUDIOS DE PRESUPUESTOS DE ESTUDIOS DEFINITIVOS</h3>
                                </div>
                            </div>

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>8.- CONTROL DE CUMPLIMIENTO DE CRONOGRAMA</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Se lo realiza, analizando lo ejecutado, versus lo programado</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.schedule_compliance_control.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_schedule_compliance_control" label="Subir Archivo XLS" placeholder="Choose a File Control de cumpliento de cronograma...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->scheduleComplianceControls)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Mes</td>
                                                <td>Calendario</td>
                                                <td>Programado Acumumulado</td>
                                                <td>Ejecutado Acumulado</td>
                                                <td>Porcentaje de Cumplimiento</td>
                                                <td>Diferencia en Mora</td>
                                            </tr>
                                            @foreach($project->scheduleComplianceControls as $scheduleComplianceControl)
                                                <tr>
                                                    <td>{{$scheduleComplianceControl->month}}</td>
                                                    <td>{{$scheduleComplianceControl->calendar}}</td>
                                                    <td>{{$scheduleComplianceControl->cumulative_scheduled}}</td>
                                                    <td>{{$scheduleComplianceControl->executed_scheduled}}</td>
                                                    <td>{{$scheduleComplianceControl->compliance_percentage}}</td>
                                                    <td>{{$scheduleComplianceControl->difference_in_arrears}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>9.- LABORES DE FISCALIZACION.-</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">9.1.- Revisión de documentación del proyecto:</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.project_documentation_review.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_5" name="project_documentation_review">
                                            {{$project->inspectionReport->project_documentation_review}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar Revisión de documentación del proyecto">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">9.2.- Revisión de Garantias:</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <form action="{{route('projects.inspection_reports.warranty_review.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_6" name="warranty_review">
                                            {{$project->inspectionReport->warranty_review}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4 mb-5" value="Guardar Revisión de Garantias">
                                    </form>

                                    <form action="{{route('projects.warranty_review.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_warranty_review" label="Subir Archivo XLS" placeholder="Choose a File Control de cumpliento de cronograma...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->warrantyReviews)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Tipo Garantia</td>
                                                <td>Entidad Emisora</td>
                                                <td>Numero</td>
                                                <td>Referencia</td>
                                                <td>Monto</td>
                                                <td>Vigencia desde</td>
                                                <td>Vigencia hasta</td>
                                            </tr>
                                            @foreach($project->warrantyReviews as $warrantyReview)
                                                <tr>
                                                    <td>{{$warrantyReview->type_guarantee}}</td>
                                                    <td>{{$warrantyReview->issuing_entity}}</td>
                                                    <td>{{$warrantyReview->number}}</td>
                                                    <td>{{$warrantyReview->reference}}</td>
                                                    <td>{{$warrantyReview->amount}}</td>
                                                    <td>{{$warrantyReview->valid_since}}</td>
                                                    <td>{{$warrantyReview->valid_until}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">9.3.- Actividades de fiscalizacion en el periodo</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_activity.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_inspection_activity" label="Subir Archivo XLS" placeholder="Choose a File Subir Actividades de Fiscalizacion...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->inspectionActivities)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Especialidad</td>
                                                <td>Fecha</td>
                                                <td>Acta Numero</td>
                                                <td>Asunto</td>
                                                <td>Predio Revisiado</td>
                                                <td>Numero de Revision</td>
                                            </tr>
                                            @foreach($project->inspectionActivities as $inspection_activity)
                                                <tr>
                                                    <td>{{$inspection_activity->specialty}}</td>
                                                    <td>{{$inspection_activity->date}}</td>
                                                    <td>{{$inspection_activity->act_number}}</td>
                                                    <td>{{$inspection_activity->affair}}</td>
                                                    <td>{{$inspection_activity->revised_property}}</td>
                                                    <td>{{$inspection_activity->revision_number}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>10.- Personal Fiscalizacion.-</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Cargar personal de fiscalizacion</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_personals.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_inspection_personals" label="Subir Archivo XLS" placeholder="Choose a File Subir Personal de fiscalizacion...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->inspectionPersonals)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Nombre</td>
                                                <td>Cargo</td>
                                                <td>Aprobacion</td>
                                            </tr>
                                            @foreach($project->inspectionPersonals as $inspectionPersonal)
                                                <tr>
                                                    <td>{{$inspectionPersonal->name}}</td>
                                                    <td>{{$inspectionPersonal->position}}</td>
                                                    <td>{{$inspectionPersonal->approval}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>11.- Estado Economico del contrato de fiscalizacion</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Cargar Estado Economico del contrato de fiscalizacion</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.economic_state.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_economic_state" label="Subir Archivo XLS" placeholder="Choose a File Subir Personal de fiscalizacion...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->economicStates)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Concepto</td>
                                                <td>Periodo Ejecucion</td>
                                                <td>Monto Total</td>
                                                <td>Descuento Anticipo</td>
                                                <td>Liquido</td>
                                                <td>Porcentaje Avance Economico</td>
                                            </tr>
                                            @foreach($project->economicStates as $economicState)
                                                <tr>
                                                    <td>{{$economicState->concept}}</td>
                                                    <td>{{$economicState->execution_period}}</td>
                                                    <td>{{$economicState->total_amount}}</td>
                                                    <td>{{$economicState->advance_discount}}</td>
                                                    <td>{{$economicState->liquid}}</td>
                                                    <td>{{$economicState->economic_progress_percentage}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>12.- Estado Economico del contrato de fiscalizacion</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">12.1 Ingreso de Estudios a Municipio</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.entrance_study.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_entrance_study" label="Subir Archivo XLS" placeholder="Choose a File Subir Ingreso de Estudios a Municipio...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->entranceStudies)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Ingreso</td>
                                                <td>Devolucion</td>
                                                <td>Reingreso</td>
                                                <td>Documento de Respaldo</td>
                                            </tr>
                                            @foreach($project->entranceStudies as $entranceStudy)
                                                <tr>
                                                    <td>{{$entranceStudy->entry}}</td>
                                                    <td>{{$entranceStudy->return}}</td>
                                                    <td>{{$entranceStudy->re_entry}}</td>
                                                    <td>{{$entranceStudy->backup_document}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>13.- CONCLUSIONES Y RECOMENDACIONES (ENTREGA RECEPCION)</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">13.1 Guardar Conclusiones y recomendaciones</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.conclusions_recommendations.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_7" name="conclusions_recommendations">
                                            {{$project->inspectionReport->conclusions_recommendations}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4 mb-5" value="Guardar Conclusiones y recomendaciones">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>14 Asuntos Pendientes</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">14.1 Atencion de asuntos pendientes</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.attention_pending_issues.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_8" name="attention_pending_issues">
                                            {{$project->inspectionReport->attention_pending_issues}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4 mb-5" value="Guardar Atencion de asuntos pendientes">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">14.2 Documentacion Cursada</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.cross_documentation.imports_excel.store_excel', $project)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-input-file name="file_xls_cross_documentation" label="Subir Archivo XLS" placeholder="Choose a File Subir Documentacion Cruzada...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-file-excel text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="bottomSlot">
                                            </x-slot>
                                        </x-adminlte-input-file>
                                        <x-adminlte-button label="Cargar Archivo XLS " theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                    </form>

                                    @if(count($project->crossDocumentations)>0)
                                        <table class="table table-bordered table-striped mt-3 small">
                                            <tr>
                                                <td>Fecha</td>
                                                <td>Oficio o Memorandum</td>
                                                <td>Para</td>
                                                <td>De</td>
                                                <td>Asunto</td>
                                            </tr>
                                            @foreach($project->crossDocumentations as $cross_documentation)
                                                <tr>
                                                    <td>{{$cross_documentation->date}}</td>
                                                    <td>{{$cross_documentation->document}}</td>
                                                    <td>{{$cross_documentation->for}}</td>
                                                    <td>{{$cross_documentation->of}}</td>
                                                    <td>{{$cross_documentation->affair}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3>15 Anexos</h3>
                                </div>
                            </div>

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">15.1 Guardar Anexos</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.annexes.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_9" name="annexes">
                                            {{$project->inspectionReport->annexes}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4 mb-5" value="Guardar Anexos">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Firma del Documento</h3>
                                    <div class="card-tools">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('projects.inspection_reports.signature.update', $project->inspectionReport)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <textarea id="editor_10" name="signature">
                                            {{$project->inspectionReport->signature}}
                                        </textarea>
                                        <input type="submit" class="btn btn-primary btn-block mt-4 mb-5" value="Guardar Anexos">
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#start_date" ).datepicker(
                { dateFormat: 'yy-mm-dd' }
            );

            $( "#final_date" ).datepicker(
                { dateFormat: 'yy-mm-dd' }
            );
        } );
    </script>

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

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_5' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_5 => {
                window.editor_5 = editor_5;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_6' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_6 => {
                window.editor_6 = editor_6;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_7' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_7 => {
                window.editor_7 = editor_7;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_8' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_8 => {
                window.editor_8 = editor_8;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_9' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_9 => {
                window.editor_9 = editor_9;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_10' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor_10 => {
                window.editor_10 = editor_10;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>


@stop

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
        <div class="col-12">
            <div class="card collapsed-card">
                <div class="card-header panel box box-primary">
                    <h3 class="card-title">Tabla de valores referenciales</h3>
                    <div class="card-tools">
                        <!-- Collapse Button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Tipos de Infraestructura</h3>
                        </div>

                        <div class="card-body">
                            @php
                                $total_infraestructures = 0;
                            @endphp
                            @foreach($project->infraestructures as $infraestructure)
                                <table class="table table-bordered mt-2">
                                    <tr>
                                        <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>{{$infraestructure->infraestructure}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Tipo</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Cantidad</strong>
                                                    </td>
                                                    <td colspan="2">

                                                    </td>
                                                </tr>
                                                @php
                                                    $sum_infraestructure = 0;
                                                    $sum_inspection = 0;
                                                @endphp
                                                @foreach($infraestructure->types as $type)
                                                    <tr>
                                                        <td>
                                                            {{$type->type}}
                                                        </td>
                                                        <td>
                                                            {{$type->amount}}
                                                        </td>
                                                        <td colspan="2">
                                                            @if(count($type->activities) > 0)
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td>
                                                                            Acciones
                                                                        </td>
                                                                        <td>
                                                                            <strong>Actividad</strong>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-right">
                                                                                <strong>Monto Referencial</strong>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-right">
                                                                                <strong>Monto Referencial Fiscalizacion</strong>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    @php
                                                                        $sum_activity_reference_value = 0;
                                                                        $sum_activity_reference_value_inspection = 0;
                                                                    @endphp
                                                                    @foreach($type->activities as $infraestructureActivity)
                                                                        <tr>
                                                                            <td>
                                                                                <form action="{{route('projects.infraestructures.activities.destroy', $infraestructureActivity)}}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <x-adminlte-button theme="btn btn-outline-danger" icon="fas fa-trash" type="submit"/>
                                                                                </form>
                                                                            </td>
                                                                            <td>
                                                                                {{$infraestructureActivity->activity}}
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-right">
                                                                                    <?php echo "$ ".number_format($infraestructureActivity->reference_value, 2); ?>
                                                                                    @php
                                                                                        $sum_activity_reference_value +=  $infraestructureActivity->reference_value
                                                                                    @endphp
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-right">
                                                                                    <?php echo "$ ".number_format($infraestructureActivity->reference_value_inspection, 2); ?>
                                                                                    @php
                                                                                        $sum_activity_reference_value_inspection += + $infraestructureActivity->reference_value_inspection
                                                                                    @endphp
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <div class="text-right">
                                                                                <strong>TOTAL {{$type->type}}:</strong>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-right">
                                                                                <strong><?php echo "$ ".number_format($sum_activity_reference_value, 2); ?></strong>
                                                                                @php
                                                                                    $sum_infraestructure += $sum_activity_reference_value;
                                                                                @endphp
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-right">
                                                                                <strong><?php echo "$ ".number_format($sum_activity_reference_value_inspection, 2); ?></strong>
                                                                                @php
                                                                                    $sum_inspection += $sum_activity_reference_value_inspection;
                                                                                @endphp
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>Total <strong>{{$infraestructure->infraestructure}}</strong></td>
                                                    @php
                                                        $total_infraestructures += $sum_infraestructure + $sum_inspection;
                                                    @endphp
                                                    <td>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>
                                                                    Infraestructura
                                                                </td>
                                                                <td>
                                                                    <div class="text-right">
                                                                        <strong><?php echo "$ ".number_format($sum_infraestructure, 2); ?></strong>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Fiscalizacion
                                                                </td>
                                                                <td>
                                                                    <div class="text-right">
                                                                        <strong><?php echo "$ ".number_format($sum_inspection, 2); ?></strong>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <strong><?php echo "$ ".number_format($total_infraestructures, 2); ?></strong>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-footer clearfix text-right">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Proyecto</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('projects.update', $project)}}" method="post">
                        @csrf
                        @method('PUT')
                        <x-adminlte-textarea name="project" label="Proyecto" rows=5
                                             label-class="text-lightblue"
                                             igroup-size="sm" placeholder="Insert Short description...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                            {{$project->project}}
                        </x-adminlte-textarea>

                        <x-adminlte-input name="place" label="Localización" placeholder="Localización"
                                          label-class="text-lightblue" value="{{$project->place}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="date_start" label="Fecha de Inicio" placeholder="Fecha de inicio"
                                          label-class="text-lightblue" value="{{$project->date_start}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="date_end" label="Fecha Final" placeholder="Fecha final"
                                          label-class="text-lightblue" value="{{$project->date_end}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="contractor" label="Contratista" placeholder="Contratista"
                                          label-class="text-lightblue" value="{{$project->contractor}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="inspection" label="Fiscalizacion" placeholder="Fiscalizacion"
                                          label-class="text-lightblue" value="{{$project->inspection}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="reference_value_contract"
                                          label="Valor Referencial del Contrato (usar . para decimales .00)"
                                          placeholder="Valor Referencial del Contrato" label-class="text-lightblue"
                                          value="{{$project->reference_value_contract}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="date_start_text" label="Fecha de Suscripcion del Contrato"
                                          placeholder="Fecha de Suscripcion del Contrato" label-class="text-lightblue"
                                          value="{{$project->date_start_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="advance_payment_date_text" label="Fecha de Pago de Anticipo"
                                          placeholder="Fecha de Pago de Anticipo" label-class="text-lightblue"
                                          value="{{$project->advance_payment_date_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="project_term_start_date_text"
                                          label="Fecha de Inicio del plazo del Proyecto"
                                          placeholder="Fecha de Inicio del plazo del Proyecto"
                                          label-class="text-lightblue"
                                          value="{{$project->project_term_start_date_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="contract_term" label="Plazo Contractual (Dias Calendario)"
                                          placeholder="Plazo Contractual" label-class="text-lightblue"
                                          value="{{$project->contract_term}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="term_extensions" label="Ampliaciones de Plazo (dias)"
                                          placeholder="Ampliaciones de Plazo (dias)" label-class="text-lightblue"
                                          value="{{$project->term_extensions}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="contract_termination_date_text" label="Fecha terminacion contractual"
                                          placeholder="Fecha terminacion contractual" label-class="text-lightblue"
                                          value="{{$project->contract_termination_date_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="advance" label="Anticipo (%) porcentaje del valor del proyecto"
                                          placeholder="%" label-class="text-lightblue" value="{{$project->advance}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <?php
                        $price_adjustments_selected = $project->price_adjustments;
                        ?>
                        <x-adminlte-select name="price_adjustments" label="Ajuste de precios"
                                           label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                            </x-slot>
                            <option
                                value="SI" <?php echo ($price_adjustments_selected == 'SI') ? 'selected="selected"' : ''; ?> >
                                SI
                            </option>
                            <option
                                value="NO" <?php echo ($price_adjustments_selected == 'NO') ? 'selected="selected"' : ''; ?> >
                                NO
                            </option>
                        </x-adminlte-select>

                        <x-adminlte-textarea name="readjustment_formula" label="Reajuste de formula" rows=5
                                             label-class="text-lightblue"
                                             igroup-size="sm" placeholder="Insertar reajuste de formula...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                            {{$project->readjustment_formula}}
                        </x-adminlte-textarea>

                        <x-adminlte-textarea name="way_to_pay" label="Forma de pago" rows=5
                                             label-class="text-lightblue"
                                             igroup-size="sm" placeholder="Insertar reajuste de formula...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                            {{$project->way_to_pay}}
                        </x-adminlte-textarea>

                        <x-adminlte-input name="total_current_amount"
                                          label="Monto Total Vigente (usar . para decimales .00)"
                                          placeholder="Monto Total Vigente" label-class="text-lightblue"
                                          value="{{$project->total_current_amount}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-button label="Guardar" theme="primary btn-block" icon="fas fa-save" type="submit"/>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Valor Referencial del Contrato</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-three-home-tab"
                                               data-toggle="pill" href="#custom-tabs-three-home" role="tab"
                                               aria-controls="custom-tabs-three-home" aria-selected="false">Actividad</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                               href="#custom-tabs-three-profile" role="tab"
                                               aria-controls="custom-tabs-three-profile" aria-selected="false">Tipo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                               href="#custom-tabs-three-messages" role="tab"
                                               aria-controls="custom-tabs-three-messages"
                                               aria-selected="false">Infraestructura</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-three-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                            <form action="{{route('projects.infraestructures.activities.store')}}" method="post">
                                                @csrf
                                                @livewire('project.reference-value.activity')
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                             aria-labelledby="custom-tabs-three-profile-tab">
                                            <form action="{{route('projects.infraestructures.types.store')}}" method="post">
                                                @csrf
                                                <x-adminlte-select name="infraestructure_id" label="Infraestructura">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text bg-gradient-info">
                                                            <i class="fas fa-sitemap"></i>
                                                        </div>
                                                    </x-slot>
                                                    @foreach($project->infraestructures as $infraestructure)
                                                        <option value="{{$infraestructure->id}}">{{$infraestructure->infraestructure}}</option>
                                                    @endforeach
                                                </x-adminlte-select>

                                                <x-adminlte-input name="type" label="Tipo" placeholder="Tipo"
                                                                  label-class="text-lightblue">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user text-lightblue"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>

                                                <x-adminlte-input name="amount" label="Cantidad" placeholder="Cantidad"
                                                                  label-class="text-lightblue">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user text-lightblue"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                                <input type="hidden" name="project_id" value="{{$project->id}}">

                                                <x-adminlte-button label="Guardar" theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                            </form>

                                            <div class="card mt-5">
                                                <div class="card-header">
                                                    <h3 class="card-title">Tipos de Infraestructura</h3>
                                                </div>

                                                <div class="card-body">
                                                    @foreach($project->infraestructures as $infraestructure)
                                                        <table class="table table-bordered mt-1">
                                                            <tr>
                                                                <td>
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <strong>{{$infraestructure->infraestructure}}</strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong>Tipo</strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong>Cantidad</strong>
                                                                            </td>
                                                                        </tr>
                                                                        @foreach($infraestructure->types as $type)
                                                                            <tr>
                                                                                <td>
                                                                                    {{$type->type}}
                                                                                </td>
                                                                                <td>
                                                                                    {{$type->amount}}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach

                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    @endforeach
                                                </div>

                                                <div class="card-footer clearfix">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                                             aria-labelledby="custom-tabs-three-messages-tab">
                                            <form action="{{route('projects.infraestructures.store')}}" method="post">
                                                @csrf
                                                <x-adminlte-input name="infraestructure" label="Infraestructura" placeholder="Infraestructura"
                                                                  label-class="text-lightblue">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user text-lightblue"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                                <input type="hidden" name="project_id" value="{{$project->id}}">

                                                <x-adminlte-button label="Guardar" theme="primary btn-block" icon="fas fa-save" type="submit"/>
                                            </form>
                                            <table class="table table-hover mt-5">
                                                @foreach($project->infraestructures as $infraestructure)
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{$infraestructure->infraestructure}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop

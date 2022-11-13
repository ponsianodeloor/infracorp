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

                        <x-adminlte-input name="place" label="Localización" placeholder="Localización" label-class="text-lightblue" value="{{$project->place}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="date_start" label="Fecha de Inicio" placeholder="Fecha de inicio" label-class="text-lightblue" value="{{$project->date_start}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="date_end" label="Fecha Final" placeholder="Fecha final" label-class="text-lightblue" value="{{$project->date_end}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>



                        <x-adminlte-input name="contractor" label="Contratista" placeholder="Contratista" label-class="text-lightblue" value="{{$project->contractor}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="inspection" label="Fiscalizacion" placeholder="Fiscalizacion" label-class="text-lightblue" value="{{$project->inspection}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="reference_value_contract" label="Valor Referencial del Contrato (usar . para decimales .00)" placeholder="Valor Referencial del Contrato" label-class="text-lightblue" value="{{$project->reference_value_contract}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="date_start_text" label="Fecha de Suscripcion del Contrato" placeholder="Fecha de Suscripcion del Contrato" label-class="text-lightblue" value="{{$project->date_start_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="advance_payment_date_text" label="Fecha de Pago de Anticipo" placeholder="Fecha de Pago de Anticipo" label-class="text-lightblue" value="{{$project->advance_payment_date_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="project_term_start_date_text" label="Fecha de Inicio del plazo del Proyecto" placeholder="Fecha de Inicio del plazo del Proyecto" label-class="text-lightblue" value="{{$project->project_term_start_date_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="contract_term" label="Plazo Contractual (Dias Calendario)" placeholder="Plazo Contractual" label-class="text-lightblue" value="{{$project->contract_term}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="term_extensions" label="Ampliaciones de Plazo (dias)" placeholder="Ampliaciones de Plazo (dias)" label-class="text-lightblue" value="{{$project->term_extensions}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="contract_termination_date_text" label="Fecha terminacion contractual" placeholder="Fecha terminacion contractual" label-class="text-lightblue" value="{{$project->contract_termination_date_text}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="advance" label="Anticipo (%) porcentaje del valor del proyecto" placeholder="%" label-class="text-lightblue" value="{{$project->advance}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <?php
                        $price_adjustments_selected = $project->price_adjustments;
                        ?>
                        <x-adminlte-select name="price_adjustments" label="Ajuste de precios" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                            </x-slot>
                            <option value="SI" <?php echo ($price_adjustments_selected == 'SI') ? 'selected="selected"' : ''; ?> >SI</option>
                            <option value="NO" <?php echo ($price_adjustments_selected == 'NO') ? 'selected="selected"' : ''; ?> >NO</option>
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

                        <x-adminlte-input name="total_current_amount" label="Monto Total Vigente (usar . para decimales .00)" placeholder="Monto Total Vigente" label-class="text-lightblue" value="{{$project->total_current_amount}}">
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

                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

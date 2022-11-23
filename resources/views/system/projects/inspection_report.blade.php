<html>
<head>
    <style>
        /**
            Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
            puede ser de altura y anchura completas.
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Defina ahora los márgenes reales de cada página en el PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Definir las reglas del encabezado **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Definir las reglas del pie de página **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>
<body>
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->
<header>
    <img src="{{env('APP_URL')}}/storage/images/header.png" width="100%" height="100%"/>
</header>

<footer>
{{--    <img src="{{env('APP_URL')}}/storage/images/footer.png" width="100%" height="100%"/>--}}
</footer>

<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<div id="content">
    <h1>INFORME DE FISCALIZACION</h1>
    <h3>ELABORACION DE ESTUDIOS DEFINITIVOS</h3>
    <p>PERIODO:</p>
    <table>
        <tr>
            <td>
                <strong>Proyecto: </strong>
            </td>
            <td>
                {{$project->project}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Contratista: </strong>
            </td>
            <td>
                {{$project->contractor}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fiscalizador: </strong>
            </td>
            <td>
                {{$project->inspection}}
            </td>
        </tr>
    </table>
    <hr>
    <p><strong>1.- Generalidades</strong></p>
    <p><strong>1.1.- Antecedentes</strong></p>
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->antecedent);
        @endphp
    </div>

    <p><strong>1.2.- Contrato fiscalizado</strong></p>
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->audited_contract);
        @endphp
    </div>

    <p><strong>1.2.1- Resumen del Contrato</strong></p>
    <div style="text-align: justify; margin-bottom: 10px;">
        @php
            echo html_entity_decode($project->inspectionReport->resume_contract);
        @endphp
    </div>

    <table border="1">
        <tr>
            <td style="width: 20%;">
                Proyecto
            </td>
            <td style="width: 500px">
                {{$project->project}}
            </td>
        </tr>
        <tr>
            <td>
                Localizacion
            </td>
            <td>
                {{$project->place}}
            </td>
        </tr>
        <tr>
            <td>
                Contratista
            </td>
            <td>
                {{$project->contractor}}
            </td>
        </tr>
        <tr>
            <td>
                Fiscalizacion
            </td>
            <td>
                {{$project->inspection}}
            </td>
        </tr>
        <tr>
            <td>
                Valor Referencial del Contrato
            </td>
            <td>
                <?php echo "$ ".number_format($project->reference_value_contract, 2); ?>
            </td>
        </tr>
        <tr>
            <td>
                Fecha de Subcripcion del contrato
            </td>
            <td>
                {{$project->date_start_text}}
            </td>
        </tr>
        <tr>
            <td>
                Fecha de pago de anticipo
            </td>
            <td>
                {{$project->advance_payment_date_text}}
            </td>
        </tr>
        <tr>
            <td>
                Fecha de inicio del plazo del Proyecto
            </td>
            <td>
                {{$project->project_term_start_date_text}}
            </td>
        </tr>
        <tr>
            <td>
                Plazo contractual
            </td>
            <td>
                {{$project->contract_term}} días
            </td>
        </tr>
        <tr>
            <td>
                Ampliaciones de plazo
            </td>
            <td>
                {{$project->term_extensions}} días
            </td>
        </tr>
        <tr>
            <td>
                Fecha de Terminacion Contractual
            </td>
            <td>
                {{$project->contract_termination_date_text}}
            </td>
        </tr>
        <tr>
            <td>
                Anticipo
            </td>
            <td>
                {{$project->advance}} del valor del contrato
            </td>
        </tr>
        <tr>
            <td>
                Reajuste de precios
            </td>
            <td>
                {{$project->price_adjustments}}
            </td>
        </tr>
        <tr>
            <td>
                Formula de Reajuste
            </td>
            <td>
                <div style=" width:500px; word-wrap: break-word !important;">
                    {{$project->readjustment_formula}}
                </div>

            </td>
        </tr>
        <tr>
            <td>
                Forma de pago
            </td>
            <td>
                <div style="width:500px; word-wrap: break-word !important;">
                    {{$project->way_to_pay}}
                </div>

            </td>
        </tr>
        <tr>
            <td>
                Monto Total vigente
            </td>
            <td>
                <?php echo "$ ".number_format($project->total_current_amount, 2); ?>
            </td>
        </tr>

    </table>

    <p><strong>Valor Referencial del Contrato:</strong></p>
    @php
        $total_infraestructures = 0;
    @endphp
    @foreach($project->infraestructures as $infraestructure)
        <table border="1" class="table table-bordered mt-2">
            <tr>
                <td>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="3">
                                <strong>Infraestructura: {{$infraestructure->infraestructure}}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tipo</strong>
                            </td>
                            <td>
                                <strong>Cantidad</strong>
                            </td>
                            <td>

                            </td>
                        </tr>
                        @php
                            $sum_infraestructure = 0;
                        @endphp
                        @foreach($infraestructure->types as $type)
                            <tr>
                                <td>
                                    {{$type->type}}
                                </td>
                                <td>
                                    {{$type->amount}}
                                </td>
                                <td>
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
                                            </tr>
                                            @php
                                                $sum_activity_reference_value = 0;
                                            @endphp
                                            @foreach($type->activities as $infraestructureActivity)
                                                <tr>
                                                    <td>

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
                                $total_infraestructures += $sum_infraestructure;
                            @endphp
                            <td style="align-items: center">
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
                                </table>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    @endforeach
    <table border="1" class="table table-bordered">
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



    <p><strong>2.- OBRA INTERVENIDA</strong></p>
    <p><strong>2.1- Identificacion</strong></p>

    <table border="1" class="table table-bordered table-striped">
        <tr>
            <td colspan="4">
                {{$project->intervenedWorkIdentification->identification}}
            </td>
        </tr>
        <tr>
            <td colspan="3">Datos Referenciales:</td>
            <td>
                <strong>Numero de Obra:</strong>
                {{$project->intervenedWorkIdentification->work_number}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tipo de Unidad:</strong>
                {{$project->intervenedWorkIdentification->drive_type}}
            </td>
            <td colspan="2">
                <strong>Tipologia:</strong>
                {{$project->intervenedWorkIdentification->typology}}
            </td>
            <td>
                <strong>Etapa:</strong>
                {{$project->intervenedWorkIdentification->stage}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Ubicacion:</strong>
                {{$project->intervenedWorkIdentification->location}}
            </td>
            <td>
                <strong>Provincia:</strong>
                {{$project->intervenedWorkIdentification->province}}
            </td>
            </td>
            <td>
                <strong>Canton:</strong>
                {{$project->intervenedWorkIdentification->canton}}
            </td>
            <td>
                <strong>Parroquia:</strong>
                {{$project->intervenedWorkIdentification->parish}}
            </td>
        </tr>
        <tr>
            <td>Coordenadas:</td>
            <td>
                <strong>X:</strong>
                {{$project->intervenedWorkIdentification->coordinate_x}}
            </td>
            <td>
                <strong>Y:</strong>
                {{$project->intervenedWorkIdentification->coordinate_y}}
            </td>
            <td>
                <strong>Altitud:</strong>
                {{$project->intervenedWorkIdentification->altitude}}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <strong>Documentacion Existente:</strong>
                <div style="text-align: justify">
                    @php
                        echo html_entity_decode($project->intervenedWorkIdentification->existing_documentation);
                    @endphp
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Localización:</strong>
                {{$project->intervenedWorkIdentification->land_deeds}}
            </td>
            <td colspan="2">
                <strong>Fecha Predio: </strong>
                {{$project->intervenedWorkIdentification->date_deeds}}
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <strong>Municipio:</strong>
                {{$project->intervenedWorkIdentification->municipality}}
            </td>
            <td>
                <strong>Predio:</strong>
                {{$project->intervenedWorkIdentification->cadastral_code}}
            </td>
            <td>
                <strong>IRM/FECH:</strong>
                {{$project->intervenedWorkIdentification->irm_date}}
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <strong>COS Total:</strong>
                {{$project->intervenedWorkIdentification->total_cos}}
            </td>
            <td>
                <strong>Pisos:</strong>
                {{$project->intervenedWorkIdentification->floors}}

            </td>
            <td>
                <strong>COS PB:</strong>
                {{$project->intervenedWorkIdentification->pb_cos}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Retiro Frontal:</strong>
                {{$project->intervenedWorkIdentification->front_removal}}
            </td>
            <td>
                <strong>Bloque:</strong>
                {{$project->intervenedWorkIdentification->block}}
            </td>
            <td>
                <strong>Retiro PST:</strong>
                {{$project->intervenedWorkIdentification->pst_removal}}
            </td>
            <td>
                <strong>Retiro LAT:</strong>
                {{$project->intervenedWorkIdentification->side_removal}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha Entrega del Predio:</strong>
            </td>
            <td colspan="3">
                {{$project->intervenedWorkIdentification->delivery_date_property}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha Entrega de Planos:</strong>
            </td>
            <td colspan="3">
                {{$project->intervenedWorkIdentification->delivery_date_plans}}
            </td>
        </tr>
    </table>

    <p><strong>2.2- Ubicacion Geografica del proyecto:</strong></p>
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->geographic_location);
        @endphp
    </div>

    <p><strong>2.3- Grafico del Proyecto</strong></p>

    @if($project->url_image_location)
        <div style="overflow: hidden;">
            <img src="{{env('APP_URL')}}{{$project->url_image_location}}" width="100%" alt="image project">
        </div>
    @endif

    <p><strong>3.- CONTRATO DE FISCALIZACION</strong></p>
    <p><strong>3.1- Fiscalizacion Temporal anterior</strong></p>
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->previous_temporary_control);
        @endphp
    </div>

    <p><strong>3.2- Fiscalizacion contratada</strong></p>
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->contracted_control);
        @endphp
    </div>

    <p><strong>3.3 Resumen del Contrato de fiscalización</strong></p>
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->resume_audited_contract);
        @endphp
    </div>

    <table border="1">
        <tr>
            <td>
                <strong>Proyecto</strong>
            </td>
            <td>
                <div style="text-align: justify">
                    @php
                        echo html_entity_decode($project->inspectionContract->project_inspection);
                    @endphp
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Localización</strong>
            </td>
            <td>
                {{$project->inspectionContract->place}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Contratista</strong>
            </td>
            <td>
                {{$project->inspectionContract->contractor}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Valor referencial del Contrato</strong>
            </td>
            <td>
                {{$project->inspectionContract->reference_value_contract}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de suscripción del contrato</strong>
            </td>
            <td>
                {{$project->inspectionContract->date_start_text}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Inicio del plazo del Proyecto</strong>
            </td>
            <td>
                {{$project->inspectionContract->project_term_start_date_text}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Plazo contractual</strong>
            </td>
            <td>
                {{$project->inspectionContract->contract_term}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Ampliaciones de plazo</strong>
            </td>
            <td>
                {{$project->inspectionContract->term_extensions}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de terminación contractual</strong>
            </td>
            <td>
                {{$project->inspectionContract->contract_termination_date_text}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Anticipo</strong>
            </td>
            <td>
                {{$project->inspectionContract->advance}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Proyecto</strong>
            </td>
            <td>
                {{$project->inspectionContract->project_inspection}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Reajuste de precios</strong>
            </td>
            <td>
                {{$project->inspectionContract->price_adjustments}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fórmula de Reajuste</strong>
            </td>
            <td>
                {{$project->inspectionContract->readjustment_formula}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Forma de pago</strong>
            </td>
            <td>
                {{$project->inspectionContract->way_to_pay}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Forma de pago</strong>
            </td>
            <td>
                {{$project->inspectionContract->total_current_amount}}
            </td>
        </tr>
    </table>

    <p><strong>3.4.- Valor referencial del contrato de fiscalización.</strong></p>
    @php
        $total_infraestructures = 0;
    @endphp
    @foreach($project->infraestructures as $infraestructure)
        <table border="1" class="table table-bordered mt-2">
            <tr>
                <td>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">
                                <strong> Infraestructura:</strong> {{$infraestructure->infraestructure}}
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
                                <td>
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
                                            </tr>
                                            @php
                                                $sum_activity_reference_value_inspection = 0;
                                            @endphp
                                            @foreach($type->activities as $infraestructureActivity)
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{$infraestructureActivity->activity}}
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
                                $total_infraestructures += $sum_inspection;
                            @endphp
                            <td>
                                <table class="table table-bordered">
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
    <table border="1" class="table table-bordered">
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


    <p><strong>4.- EJECUCION DEL CONTRATO</strong></p>
    <p><strong>4.1.- ESTADO DE EJECUCION DE LOS ESTUDIOS</strong></p>

    <p><strong>4.2- Monto Ejecutado y aprobado de los estudios</strong></p>

    @if(count($project->executeApprovedAmounts)>0)
        <table border="1">
            <tr>
                <td><strong>Proyecto</strong></td>
                <td><strong>Monto Estudios Definitivos</strong></td>
                <td><strong>Monto Aprobado Estudios</strong></td>
            </tr>
            @php
                $sum_value_definitive_studies = 0;
            @endphp
            @foreach($project->executeApprovedAmounts as $executeApprovedAmount)
                <tr>
                    <td>{{$executeApprovedAmount->project}}</td>
                    <td><?php echo "$ ".number_format($executeApprovedAmount->value_definitive_studies, 2); ?></td>
                    <td><?php echo "$ ".number_format($executeApprovedAmount->value_approved_studies, 2); ?></td>
                    @php
                        $sum_value_definitive_studies += $executeApprovedAmount->value_definitive_studies;
                    @endphp
                </tr>
            @endforeach
                <tr>
                    <td>
                        <strong>Total:</strong>
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

    <p><strong>4.3- Personal del Contratista</strong></p>

    @if(count($project->contractorWorkers)>0)
        <table border="1">
            <tr>
                <td><strong>Cargo</strong></td>
                <td><strong>Cantidad</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Observaciones</strong></td>
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

    <p><strong>5.- Productos de los trabajos ejecutados por la empresa contratista</strong></p>
    <p>En el presente periodo de trabajos el contratista realiza:</p>

    @if(count($project->productWorkContractors)>0)
        <table border="1" style=" font-size: 8px;" width="100%">
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

    <p><strong>6.- RESULTADOS DE LA REVISION DE ESUDIOS DEFINITIVOS</strong></p>
    <p><strong>7.- EVALUACION DE LOS ESTUDIOS DE PRESUPUESTOS DE ESTUDIOS DEFINITIVOS</strong></p>
    <p><strong>8.- CONTROL DE CUMPLIMIENTO DE CRONOGRAMA.-</strong></p>
    <p>Se lo realiza, analizando lo ejecutado, versus lo programado</p>

    @if(count($project->scheduleComplianceControls)>0)
        <table border="1">
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

    <p><strong>9.- LABORES DE FISCALIZACION</strong></p>
    <p><strong>9.1.- Revisión de documentación del proyecto:</strong></p>

    <p><strong>9.2.- Revisión de Garantías:</strong></p>

    @if(count($project->warrantyReviews)>0)
        <table border="1" style="font-size: 10px" class="table table-bordered table-striped mt-3 small">
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

    <p><strong>9.3.- Actividades de Fiscalización en el periodo</strong></p>

    <p><strong>10.- PERSONAL DE LA FISCALIZACION</strong></p>

    @if(count($project->inspectionPersonals)>0)
        <table border="1">
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

    <p><strong>11.- Estado económico del contrato de fiscalización</strong></p>

    @if(count($project->economicStates)>0)
        <table border="1">
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

    <p><strong>12.- INFORMACION DEL PROCESO DE APROBACION DE PLANOS:</strong></p>
    <p><strong>12.1.- INGRESO DE ESTUDIOS A MUNICIPIO</strong></p>

    @if(count($project->entranceStudies)>0)
        <table border="1">
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

    <p><strong>13.- CONCLUSIONES Y RECOMENDACIONES (ENTREGA RECEPCION)</strong></p>

    <p><strong>14.- ASUNTOS PENDIENTES</strong></p>
    <p><strong>14.1.- Atención a asuntos pendientes</strong></p>

    <p><strong>14.2 DOCUMENTACION CURSADA</strong></p>

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

    <p><strong>15.- Anexos.-</strong></p>

    <p>Atentamente,</p>





</div>
</body>
</html>

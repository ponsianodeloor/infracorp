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
    <img src="{{env('APP_URL')}}/storage/images/footer.png" width="100%" height="100%"/>
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
    <div style="text-align: justify">
        @php
            echo html_entity_decode($project->inspectionReport->resume_contract);
        @endphp
    </div>

</div>
</body>
</html>

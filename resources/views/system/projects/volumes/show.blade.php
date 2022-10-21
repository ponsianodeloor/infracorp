@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto:</h1>
@stop

@section('content')
    <h4>
        {{$volume->project->project}}
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Anexo de Volumen: {{$volume->item}}</h3>
                </div>
                <div class="card-body">
                    <a href="{{route('projects.volumes.edit', $volume)}}" class="btn btn-primary mb-4"> <i class="fa fa-edit"></i>Editar Columnas</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Codigo</th>
                            <th>Unidad de Medida</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$volume->description}}</td>
                            <td>{{$volume->code}}</td>
                            <td>{{$volume->metric_unit}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('projects.volumes.update', $volume)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Registro de elementos</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="item">Unidades</label>
                            <input type="text" name="u" class="form-control" id="u" placeholder="Ingrese las Unidades">
                        </div>

                        @if($volume->element_name == 'on')
                            <div class="form-group">
                                <label for="item">Nombre del elemento</label>
                                <input type="text" name="element_name" class="form-control" placeholder="Ingrese el nombre del elemento">
                            </div>
                        @else
                            <input type="hidden" name="element_name">
                        @endif

                        @if($volume->mc == 'on')
                            <div class="form-group">
                                <label for="mc">MC</label>
                                <input type="text" name="mc" class="form-control" placeholder="Ingrese el MC">
                            </div>
                        @else
                            <input type="hidden" name="mc">
                        @endif

                        @if($volume->theta == 'on')
                            <div class="form-group">
                                <label for="theta">Ø</label>
                                <input type="text" name="theta" class="form-control" placeholder="Ingrese el Ø">
                            </div>
                        @else
                            <input type="hidden" name="theta">
                        @endif

                        @if($volume->type == 'on')
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <input type="text" name="type" class="form-control" placeholder="Ingrese el tipo">
                            </div>
                        @else
                            <input type="hidden" name="type">
                        @endif

                        @if($volume->a == 'on')
                            <div class="form-group">
                                <label for="a">a</label>
                                <input type="text" name="a" class="form-control" placeholder="Ingrese la altura">
                            </div>
                        @else
                            <input type="hidden" name="a">
                        @endif

                        @if($volume->b == 'on')
                            <div class="form-group">
                                <label for="b">b</label>
                                <input type="text" name="b" class="form-control" placeholder="Ingrese la base">
                            </div>
                        @else
                            <input type="hidden" name="b">
                        @endif

                        @if($volume->c == 'on')
                            <div class="form-group">
                                <label for="c">c</label>
                                <input type="text" name="c" class="form-control" placeholder="Ingrese la c">
                            </div>
                        @else
                            <input type="hidden" name="c">
                        @endif

                        @if($volume->g == 'on')
                            <div class="form-group">
                                <label for="g">g</label>
                                <input type="text" name="g" class="form-control" placeholder="Ingrese la g">
                            </div>
                        @else
                            <input type="hidden" name="g">
                        @endif

                        @if($volume->perimeter_m == 'on')
                            <div class="form-group">
                                <label for="perimeter_m">Perimetro</label>
                                <input type="text" name="perimeter_m" class="form-control" placeholder="Ingrese el perimetro">
                            </div>
                        @else
                            <input type="hidden" name="perimeter_m">
                        @endif

                        @if($volume->area_m2 == 'on')
                            <div class="form-group">
                                <label for="area_m2">Area m2</label>
                                <input type="text" name="area_m2" class="form-control" placeholder="Ingrese el area m2">
                            </div>
                        @else
                            <input type="hidden" name="area_m2">
                        @endif

                        @if($volume->volume_m3 == 'on')
                            <div class="form-group">
                                <label for="volume_m3">Volume m3</label>
                                <input type="text" name="volume_m3" class="form-control" placeholder="Ingrese el Volumen m3">
                            </div>
                        @else
                            <input type="hidden" name="volume_m3">
                        @endif

                        @if($volume->location == 'on')
                            <div class="form-group">
                                <label for="location">Ubicacion</label>
                                <input type="text" name="location" class="form-control" placeholder="Ingrese la ubicacion">
                            </div>
                        @else
                            <input type="hidden" name="location">
                        @endif

                        @if($volume->figure == 'on')
                            <div class="form-group">
                                <label for="figure">Figura</label>
                                <input type="text" name="figure" class="form-control" placeholder="Ingrese la figura">
                            </div>
                        @else
                            <input type="hidden" name="figure">
                        @endif

                        @if($volume->codigo == 'on')
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" name="codigo" class="form-control" placeholder="Ingrese el codigo">
                            </div>
                        @else
                            <input type="hidden" name="codigo">
                        @endif

                        @if($volume->travels == 'on')
                            <div class="form-group">
                                <label for="travels">Viajes</label>
                                <input type="text" name="travels" class="form-control" placeholder="Ingrese la cantidad de viajes">
                            </div>
                        @else
                            <input type="hidden" name="travels">
                        @endif

                        @if($volume->referential_income == 'on')
                            <div class="form-group">
                                <label for="referential_income">Ingreso Referencial</label>
                                <input type="text" name="referential_income" class="form-control" placeholder="Ingreso referencial">
                            </div>
                        @else
                            <input type="hidden" name="referential_income">
                        @endif

                        @if($volume->total_m3 == 'on')
                            <div class="form-group">
                                <label for="total_m3">Total (m3): Se realiza el calculo entre Volumen (m3) y Viajes</label>
                            </div>
                        @else
                            <input type="hidden" name="total_m3">
                        @endif

                        @if($volume->section == 'on')
                            <div class="form-group">
                                <label for="section">Seccion</label>
                                <input type="text" name="section" class="form-control" placeholder="Ingreso de Seccion">
                            </div>
                        @else
                            <input type="hidden" name="section">
                        @endif

                        @if($volume->amount == 'on')
                            <div class="form-group">
                                <label for="amount">Cantidad</label>
                                <input type="text" name="amount" class="form-control" placeholder="Ingrese la cantidad">
                            </div>
                        @else
                            <input type="hidden" name="amount">
                        @endif

                        @if($volume->weight_mass == 'on')
                            <div class="form-group">
                                <label for="weight_mass">Peso/Masa (kg/m)</label>
                                <input type="text" name="weight_mass" class="form-control" placeholder="Ingrese el Peso Masa">
                            </div>
                        @else
                            <input type="hidden" name="weight_mass">
                        @endif

                        @if($volume->length_m == 'on')
                            <div class="form-group">
                                <label for="length_m">Longitud (m)</label>
                                <input type="text" name="length_m" class="form-control" placeholder="Ingrese la longitud (m)">
                            </div>
                        @else
                            <input type="hidden" name="length_m">
                        @endif

                        @if($volume->weight_kg == 'on')
                            <div class="form-group">
                                <label for="weight_kg">Peso (kg): Se realiza el calculo entre Cantidad * Peso (kg) * longitud (m) </label>
                            </div>
                        @else
                            <input type="hidden" name="weight_kg">
                        @endif

                        @if($volume->num == 'on')
                            <div class="form-group">
                                <label for="num">Num</label>
                                <input type="text" name="num" class="form-control" placeholder="Ingrese el Num">
                            </div>
                        @else
                            <input type="hidden" name="num">
                        @endif

                        @if($volume->part_length == 'on')
                            <div class="form-group">
                                <label for="part_length">Longitud Parcial</label>
                                <input type="text" name="part_length" class="form-control" placeholder="Ingrese la longitud parcial">
                            </div>
                        @else
                            <input type="hidden" name="part_length">
                        @endif

                        @if($volume->total_length == 'on')
                            <div class="form-group">
                                <label for="total_length">Longitud Total: Se realiza el calculo entre Num * Longitud Parcial </label>
                            </div>
                        @else
                            <input type="hidden" name="total_length">
                        @endif

                        @if($volume->observations == 'on')
                            <div class="form-group">
                                <x-adminlte-textarea name="observations" label="Observacion" rows=5 igroup-size="sm" placeholder="Ingrese la observacion...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                    {{$volume->description}}
                                </x-adminlte-textarea>
                            </div>
                        @else
                            <input type="hidden" name="observations">
                        @endif
                    </div>

                    <div class="card-footer">

                    </div>

                </div>
            </div>

            <div class="col-md-6">

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop

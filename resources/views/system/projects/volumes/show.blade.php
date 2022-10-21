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
                            <input type="hidden" name="element_name" value="">
                        @endif

                        <div class="custom-control custom-switch col-6">
                            <input type="hidden" name="mc" value="off">
                            <input type="checkbox" class="custom-control-input" id="mc" name="mc" @if($volume->mc == 'on') checked @endif />
                            <label class="custom-control-label" for="mc">MC</label>
                        </div>

                        <div class="custom-control custom-switch col-6">
                            <input type="hidden" name="theta" value="off">
                            <input type="checkbox" class="custom-control-input" id="theta" name="theta" @if($volume->theta == 'on') checked @endif />
                            <label class="custom-control-label" for="theta">Ø</label>
                        </div>

                        <div class="custom-control custom-switch col-6">
                            <input type="hidden" name="a" value="off">
                            <input type="checkbox" class="custom-control-input" id="a" name="a" @if($volume->a == 'on') checked @endif />
                            <label class="custom-control-label" for="a">a</label>
                        </div>


                        <div class="custom-control custom-switch">
                            <input type="hidden" name="b" value="off">
                            <input type="checkbox" class="custom-control-input" id="b" name="b" @if($volume->b == 'on') checked @endif />
                            <label class="custom-control-label" for="b">b</label>
                        </div>


                        <div class="custom-control custom-switch">
                            <input type="hidden" name="c" value="off">
                            <input type="checkbox" class="custom-control-input" id="c" name="c" @if($volume->c == 'on') checked @endif />
                            <label class="custom-control-label" for="c">c</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="g" value="off">
                            <input type="checkbox" class="custom-control-input" id="g" name="g" @if($volume->g == 'on') checked @endif />
                            <label class="custom-control-label" for="g">g</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="perimeter_m" value="off">
                            <input type="checkbox" class="custom-control-input" id="perimeter_m" name="perimeter_m" @if($volume->perimeter_m == 'on') checked @endif />
                            <label class="custom-control-label" for="perimeter_m">Perimetro (m)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="area_m2" value="off">
                            <input type="checkbox" class="custom-control-input" id="area_m2" name="area_m2" @if($volume->area_m2 == 'on') checked @endif />
                            <label class="custom-control-label" for="area_m2">Area (m2)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="volume_m3" value="off">
                            <input type="checkbox" class="custom-control-input" id="volume_m3" name="volume_m3" @if($volume->volume_m3 == 'on') checked @endif />
                            <label class="custom-control-label" for="volume_m3">Volumen (m3)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="location" value="off">
                            <input type="checkbox" class="custom-control-input" id="location" name="location" @if($volume->location == 'on') checked @endif />
                            <label class="custom-control-label" for="location">Ubicacion</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="figure" value="off">
                            <input type="checkbox" class="custom-control-input" id="figure" name="figure" @if($volume->figure == 'on') checked @endif />
                            <label class="custom-control-label" for="figure">Figura</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="codigo" value="off">
                            <input type="checkbox" class="custom-control-input" id="codigo" name="codigo" @if($volume->codigo == 'on') checked @endif />
                            <label class="custom-control-label" for="codigo">Codigo</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="travels" value="off">
                            <input type="checkbox" class="custom-control-input" id="travels" name="travels" @if($volume->travels == 'on') checked @endif />
                            <label class="custom-control-label" for="travels">Viajes</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="referential_income" value="off">
                            <input type="checkbox" class="custom-control-input" id="referential_income" name="referential_income" @if($volume->referential_income == 'on') checked @endif />
                            <label class="custom-control-label" for="referential_income">Ingreso Referencial</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="total_m3" value="off">
                            <input type="checkbox" class="custom-control-input" id="total_m3" name="total_m3" @if($volume->total_m3 == 'on') checked @endif />
                            <label class="custom-control-label" for="total_m3">Total (m3)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="section" value="off">
                            <input type="checkbox" class="custom-control-input" id="section" name="section" @if($volume->section == 'on') checked @endif />
                            <label class="custom-control-label" for="section">Seccion</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="amount" value="off">
                            <input type="checkbox" class="custom-control-input" id="amount" name="amount" @if($volume->amount == 'on') checked @endif />
                            <label class="custom-control-label" for="amount">Cantidad</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="weight_mass" value="off">
                            <input type="checkbox" class="custom-control-input" id="weight_mass" name="weight_mass" @if($volume->weight_mass == 'on') checked @endif />
                            <label class="custom-control-label" for="weight_mass">Peso/masa (kg/m)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="length_m" value="off">
                            <input type="checkbox" class="custom-control-input" id="length_m" name="length_m" @if($volume->length_m == 'on') checked @endif />
                            <label class="custom-control-label" for="length_m">Longitud (m)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="weight_kg" value="off">
                            <input type="checkbox" class="custom-control-input" id="weight_kg" name="weight_kg" @if($volume->weight_kg == 'on') checked @endif />
                            <label class="custom-control-label" for="weight_kg">Peso (kg)</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="num" value="off">
                            <input type="checkbox" class="custom-control-input" id="num" name="num" @if($volume->num == 'on') checked @endif />
                            <label class="custom-control-label" for="num">Num</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="part_length" value="off">
                            <input type="checkbox" class="custom-control-input" id="part_length" name="part_length" @if($volume->part_length == 'on') checked @endif />
                            <label class="custom-control-label" for="part_length">Long Parcial</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="total_length" value="off">
                            <input type="checkbox" class="custom-control-input" id="total_length" name="total_length" @if($volume->total_length == 'on') checked @endif />
                            <label class="custom-control-label" for="total_length">Long Total</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="hidden" name="observations" value="off">
                            <input type="checkbox" class="custom-control-input" id="observations" name="observations" @if($volume->observations == 'on') checked @endif />
                            <label class="custom-control-label" for="observations">Observaciones</label>
                        </div>
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

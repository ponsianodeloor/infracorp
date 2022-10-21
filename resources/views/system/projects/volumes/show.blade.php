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

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Registro de Elementos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Tipos de elemento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Elementos</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{route('projects.volumes.update', $volume)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Registro de elementos</h3>
                                            </div>

                                            <div class="card-body">

                                                <x-adminlte-select name="type_item_id" label="Tipo de Elemento">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text bg-gradient-info">
                                                            <i class="fas fa-sitemap"></i>
                                                        </div>
                                                    </x-slot>
                                                    @foreach($volume->typeItems as $typeItem)
                                                        <option value="{{$typeItem->id}}">{{$typeItem->type_item}}</option>
                                                    @endforeach
                                                </x-adminlte-select>

                                                @if($volume->units == 'on')
                                                    <div class="form-group">
                                                        <label for="units">Unidades</label>
                                                        <input type="text" name="units" class="form-control" placeholder="Ingrese las Unidades">
                                                    </div>
                                                @else
                                                    <input type="hidden" name="units">
                                                @endif

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
                                                <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Nuevo Tipo de Elemento</h3>
                                        </div>
                                        <form action="{{route('project.volumes.type-items.store', $volume)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="volume_id" value="{{$volume->id}}">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="item">Tipo de elemento</label>
                                                    <input type="text" name="type_item" class="form-control" placeholder="Ingrese el tipo de elemento">
                                                    <input type="submit" class="btn btn-primary btn-block mt-4" value="Guardar">
                                                </div>
                                            </div>

                                            <div class="card-footer">

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    @if(count($volume->typeItems)>0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Tipo de Elemento</th>
                                                <th>Accciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($volume->typeItems as $typeItem)
                                                <tr>
                                                    <td>{{$typeItem->type_item}}</td>
                                                    <td>Edit Delete</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
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
    <script>
    </script>
@stop

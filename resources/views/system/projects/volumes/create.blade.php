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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Nuevo Anexo de volumen</h3>
                </div>
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="item">Item</label>
                            <input type="text" name="item" class="form-control" id="item" placeholder="Ingrese el Item">
                        </div>
                        <div class="form-group">
                            <x-adminlte-textarea name="descripcion" label="Descripcion" rows=5
                                                 igroup-size="sm" placeholder="Insert descripcion...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-textarea>
                        </div>
                        <div class="form-group">
                            <label for="code">Codigo</label>
                            <input type="text" name="code" class="form-control" id="code"
                                   placeholder="Ingrese el Codigo">
                        </div>
                        <div class="form-group">
                            <label for="metric_unit">Unidad Metrica</label>
                            <input type="text" name="metric_unit" class="form-control" id="metric_unit"
                                   placeholder="unidad metrica ejm: m2, m3, kg">
                        </div>
                    </div>

                    <div class="card-footer">

                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Columnas habilitadas</h3>
                </div>

                <div class="card-body">
                    <div class="custom-control custom-switch col-6">
                        <input type="checkbox" class="custom-control-input" id="element_name" name="element_name">
                        <label class="custom-control-label" for="element_name">Nombre Elemento</label>
                    </div>
                    <div class="custom-control custom-switch col-6">
                        <input type="checkbox" class="custom-control-input" id="a" name="a">
                        <label class="custom-control-label" for="a">a</label>
                    </div>


                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="b" name="b">
                        <label class="custom-control-label" for="b">b</label>
                    </div>


                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="c" name="c">
                        <label class="custom-control-label" for="c">c</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="g" name="g">
                        <label class="custom-control-label" for="g">g</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="perimetro_ml" name="perimetro_ml">
                        <label class="custom-control-label" for="perimetro_ml">Perimetro (ml)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="area_m2" name="area_m2">
                        <label class="custom-control-label" for="area_m2">Area (m2)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="volumen_m3" name="volumen_m3">
                        <label class="custom-control-label" for="volumen_m3">Volumen (m3)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="ubicacion" name="ubicacion">
                        <label class="custom-control-label" for="ubicacion">Ubicacion</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="figura" name="figura">
                        <label class="custom-control-label" for="figura">Figura</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="codigo" name="codigo">
                        <label class="custom-control-label" for="codigo">Codigo</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="viajes" name="viajes">
                        <label class="custom-control-label" for="viajes">Viajes</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="ingreso_referencial"
                               name="ingreso_referencial">
                        <label class="custom-control-label" for="ingreso_referencial">Ingreso Referencial</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="total_m3" name="total_m3">
                        <label class="custom-control-label" for="total_m3">Total (m3)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="seccion" name="seccion">
                        <label class="custom-control-label" for="seccion">Seccion</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="cantidad" name="cantidad">
                        <label class="custom-control-label" for="cantidad">Cantidad</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="peso_masa" name="peso_masa">
                        <label class="custom-control-label" for="peso_masa">Peso/masa (kg/m)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="longitud" name="longitud">
                        <label class="custom-control-label" for="longitud">Longitud (m)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="peso_kg" name="peso_kg">
                        <label class="custom-control-label" for="peso_kg">Peso (kg)</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="num" name="num">
                        <label class="custom-control-label" for="num">Num</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="long_parcial" name="long_parcial">
                        <label class="custom-control-label" for="long_parcial">Long Parcial</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="long_total" name="long_total">
                        <label class="custom-control-label" for="long_total">Long Total</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="observaciones" name="observaciones">
                        <label class="custom-control-label" for="observaciones">Observaciones</label>
                    </div>
                </div>

                <div class="card-footer">

                </div>

            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
                <div class="card-footer">

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

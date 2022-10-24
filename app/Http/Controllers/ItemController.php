<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\Volume;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $item = new Item();

        $item->units = $request->units;
        $item->element_name = $request->element_name;
        $item->mc = $request->mc;
        $item->theta = $request->theta;
        $item->type = $request->type;
        $item->license_plate = $request->license_plate;
        $item->a = $request->a;
        $item->b = $request->b;
        $item->c = $request->c;
        $item->g = $request->g;
        $item->h = $request->h;
        $item->perimeter_m = $request->perimeter_m;
        $item->area_m2 = $request->area_m2;
        $item->volume_m3 = $request->volume_m3;
        $item->location = $request->location;
        $item->figure = $request->figure;
        $item->codigo = $request->codigo;
        $item->travels = $request->travels;
        $item->referential_income = $request->referential_income;
        $item->total_m3 = $request->total_m3;
        $item->section = $request->section;
        $item->amount = $request->amount;
        $item->weight_mass = $request->weight_mass;
        $item->length_m = $request->length_m;
        $item->weight_kg = $request->weight_kg;
        $item->num = $request->num;
        $item->part_length = $request->part_length;
        $item->total_length = $request->total_length;
        $item->observations = $request->observations;
        $item->item_type_id = $request->item_type_id;

        //calculo previo a guardar se pregunta por el volume_id
        $volume = Volume::findOrFail($request->volume_id);

        //campo perimeter_m Perimetro (m): Se realiza el calculo entre Unidades * b
        if ($volume->perimeter_m == 'on'){
            $item->perimeter_m = $request->units * $request->b;
        }

        //campo area_m2 Area (m2): Se realiza el calculo entre Unidades * a * b
        if ($volume->area_m2 == 'on'){
            $item->area_m2 = $request->units * $request->a * $request->b;
        }

        $item->save();

        return redirect()->route('projects.volumes.show', $volume);

    }

    public function show(Item $item){

    }

    public function edit(Item $item){

    }

    public function update(Request $request, Item $item){

    }

    public function destroy(Item $item){
        $item_type_id = $item->item_type_id;
        $itemType = ItemType::find($item_type_id);
        $volume = Volume::find($itemType->volume_id);
        $item->delete();

        return redirect()->route('projects.volumes.show', compact('volume'));
        //return view('system.projects.volumes.show', compact('volume'));
    }
}

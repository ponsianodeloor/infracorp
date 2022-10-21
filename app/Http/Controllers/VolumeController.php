<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Volume;
use Illuminate\Http\Request;

class VolumeController extends Controller
{
    public function index(){

    }

    public function create(Project $project){
        return view('system.projects.volumes.create', compact('project'));
    }

    public function store(Request $request){
        $volume = new Volume();

        $volume->item = $request->item;
        $volume->code = $request->code;
        $volume->description = $request->description;
        $volume->metric_unit = $request->metric_unit;
        $volume->project_id = $request->project_id;

        $volume->units = $request->units;
        $volume->element_name = $request->element_name;
        $volume->mc = $request->mc;
        $volume->theta = $request->theta;
        $volume->type = $request->type;
        $volume->a = $request->a;
        $volume->b = $request->b;
        $volume->c = $request->c;
        $volume->g = $request->g;
        $volume->perimeter_m = $request->perimeter_m;
        $volume->area_m2 = $request->area_m2;
        $volume->volume_m3 = $request->volume_m3;
        $volume->location = $request->location;
        $volume->figure = $request->figure;
        $volume->codigo = $request->codigo;
        $volume->travels = $request->travels;
        $volume->referential_income = $request->referential_income;
        $volume->total_m3 = $request->total_m3;
        $volume->section = $request->section;
        $volume->amount = $request->amount;
        $volume->weight_mass = $request->weight_mass;
        $volume->length_m = $request->length_m;
        $volume->weight_kg = $request->weight_kg;
        $volume->num = $request->num;
        $volume->part_length = $request->part_length;
        $volume->total_length = $request->total_length;
        $volume->observations = $request->observations;

        $volume->save();

        return redirect()->route('projects.show', $request->project_id);

    }

    public function show(Volume $volume){
        return view('system.projects.volumes.show', compact('volume'));
    }

    public function edit(Volume $volume){
        return view('system.projects.volumes.edit', compact('volume'));
    }

    public function update(Request $request, Volume $volume){

        $volume->item = $request->item;
        $volume->code = $request->code;
        $volume->description = $request->description;
        $volume->metric_unit = $request->metric_unit;

        $volume->units = $request->units;
        $volume->element_name = $request->element_name;
        $volume->mc = $request->mc;
        $volume->theta = $request->theta;
        $volume->type = $request->type;
        $volume->a = $request->a;
        $volume->b = $request->b;
        $volume->c = $request->c;
        $volume->g = $request->g;
        $volume->perimeter_m = $request->perimeter_m;
        $volume->area_m2 = $request->area_m2;
        $volume->volume_m3 = $request->volume_m3;
        $volume->location = $request->location;
        $volume->figure = $request->figure;
        $volume->codigo = $request->codigo;
        $volume->travels = $request->travels;
        $volume->referential_income = $request->referential_income;
        $volume->total_m3 = $request->total_m3;
        $volume->section = $request->section;
        $volume->amount = $request->amount;
        $volume->weight_mass = $request->weight_mass;
        $volume->length_m = $request->length_m;
        $volume->weight_kg = $request->weight_kg;
        $volume->num = $request->num;
        $volume->part_length = $request->part_length;
        $volume->total_length = $request->total_length;
        $volume->observations = $request->observations;

        $volume->save();

        return redirect()->route('projects.volumes.edit', $volume);

    }

    public function destroy(Volume $volume){

    }
}

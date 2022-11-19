<?php

namespace App\Http\Controllers;

use App\Models\InfraestructureActivity;
use Illuminate\Http\Request;

class InfraestructureActivityController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $infraestructureActivity = new InfraestructureActivity;
        $infraestructureActivity->infraestructure_type_id = $request->lst_infraestructure_types;
        $infraestructureActivity->activity =  $request->activity;
        $infraestructureActivity->reference_value = $request->reference_value;
        $infraestructureActivity->reference_value_inspection = $request->reference_value_inspection;

        $infraestructureActivity->save();
        $type = $infraestructureActivity->infraestructureType;
        $infraestructure = $type->infraestructure;
        $project = $infraestructure->project;

        return redirect()->route('projects.edit', $project);
    }

    public function show(InfraestructureActivity $infraestructureActivity){

    }

    public function edit(InfraestructureActivity $infraestructureActivity){

    }

    public function update(Request $request, InfraestructureActivity $infraestructureActivity){

    }

    public function destroy(InfraestructureActivity $infraestructureActivity){

    }
}

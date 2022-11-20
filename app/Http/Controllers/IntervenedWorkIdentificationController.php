<?php

namespace App\Http\Controllers;

use App\Models\IntervenedWorkIdentification;
use Illuminate\Http\Request;

class IntervenedWorkIdentificationController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(IntervenedWorkIdentification $intervenedWorkIdentification){

    }

    public function edit(IntervenedWorkIdentification $intervenedWorkIdentification){

    }

    public function update(Request $request, IntervenedWorkIdentification $intervenedWorkIdentification){
        $intervenedWorkIdentification->identification = $request->identification;
        $intervenedWorkIdentification->work_number = $request->work_number;
        $intervenedWorkIdentification->drive_type = $request->drive_type;
        $intervenedWorkIdentification->typology = $request->typology;
        $intervenedWorkIdentification->stage = $request->stage;
        $intervenedWorkIdentification->location = $request->location;
        $intervenedWorkIdentification->province = $request->province;
        $intervenedWorkIdentification->canton = $request->canton;
        $intervenedWorkIdentification->parish = $request->parish;
        $intervenedWorkIdentification->coordinate_x = $request->coordinate_x;
        $intervenedWorkIdentification->coordinate_y = $request->coordinate_y;
        $intervenedWorkIdentification->altitude = $request->altitude;
        $intervenedWorkIdentification->existing_documentation = $request->existing_documentation;
        $intervenedWorkIdentification->land_deeds = $request->land_deeds;
        $intervenedWorkIdentification->date_deeds = $request->date_deeds;
        $intervenedWorkIdentification->municipality = $request->municipality;
        $intervenedWorkIdentification->cadastral_code = $request->cadastral_code;
        $intervenedWorkIdentification->irm_date = $request->irm_date;
        $intervenedWorkIdentification->total_cos = $request->total_cos;
        $intervenedWorkIdentification->floors = $request->floors;
        $intervenedWorkIdentification->pb_cos = $request->pb_cos;
        $intervenedWorkIdentification->front_removal = $request->front_removal;
        $intervenedWorkIdentification->block = $request->block;
        $intervenedWorkIdentification->pst_removal = $request->pst_removal;
        $intervenedWorkIdentification->side_removal = $request->side_removal;
        $intervenedWorkIdentification->delivery_date_property = $request->delivery_date_property;
        $intervenedWorkIdentification->delivery_date_plans = $request->delivery_date_plans;
        $intervenedWorkIdentification->save();

        $project = $intervenedWorkIdentification->project;
        return redirect()->route('projects.show', compact('project'));
    }

    public function destroy(IntervenedWorkIdentification $intervenedWorkIdentification){

    }
}

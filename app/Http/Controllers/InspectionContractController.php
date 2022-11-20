<?php

namespace App\Http\Controllers;

use App\Models\InspectionContract;
use Illuminate\Http\Request;

class InspectionContractController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(InspectionContract $inspectionContract){

    }

    public function edit(InspectionContract $inspectionContract){

    }

    public function update(Request $request, InspectionContract $inspectionContract){
        $inspectionContract->project_inspection = $request->project_inspection;
        $inspectionContract->place = $request->place;
        $inspectionContract->contractor = $request->contractor;
        $inspectionContract->reference_value_contract = $request->reference_value_contract;
        $inspectionContract->date_start_text = $request->date_start_text;
        $inspectionContract->project_term_start_date_text = $request->project_term_start_date_text;
        $inspectionContract->contract_term = $request->contract_term ;
        $inspectionContract->term_extensions = $request->term_extensions;
        $inspectionContract->contract_termination_date_text = $request->contract_termination_date_text;
        $inspectionContract->advance = $request->advance;
        $inspectionContract->price_adjustments = $request->price_adjustments;
        $inspectionContract->readjustment_formula = $request->readjustment_formula;
        $inspectionContract->way_to_pay = $request->way_to_pay;
        $inspectionContract->total_current_amount = $request->total_current_amount;

        $inspectionContract->save();

        $project = $inspectionContract->project;
        return redirect()->route('projects.edit', compact('project'));
    }

    public function destroy(InspectionContract $inspectionContract){

    }
}

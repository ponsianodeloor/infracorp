<?php

namespace App\Http\Controllers;

use App\Models\InspectionReport;
use Illuminate\Http\Request;

class InspectionReportController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(InspectionReport $inspectionReport){

    }

    public function edit(InspectionReport $inspectionReport){

    }

    public function update(Request $request, InspectionReport $inspectionReport){

    }

    public function updateAntecedent(Request $request, InspectionReport $inspectionReport){
        $inspectionReport->antecedent = $request->antecedent;
        $inspectionReport->save();

        $project = $inspectionReport->project->id;

        return redirect()->route('projects.show', $project);
    }

    public function updateAuditedContract(Request $request, InspectionReport $inspectionReport){
        $inspectionReport->audited_contract = $request->audited_contract;
        $inspectionReport->save();

        $project = $inspectionReport->project->id;

        return redirect()->route('projects.show', $project);
    }

    public function updateResumeContract(Request $request, InspectionReport $inspectionReport){
        $inspectionReport->resume_contract = $request->resume_contract;
        $inspectionReport->save();

        $project = $inspectionReport->project->id;

        return redirect()->route('projects.show', $project);
    }

    public function updateGeographicLocation(Request $request, InspectionReport $inspectionReport){
        $inspectionReport->geographic_location = $request->geographic_location;
        $inspectionReport->save();

        $project = $inspectionReport->project->id;

        return redirect()->route('projects.show', $project);
    }

    public function updatePreviousTemporaryControl(Request $request, InspectionReport $inspectionReport){
        $inspectionReport->previous_temporary_control = $request->previous_temporary_control;
        $inspectionReport->save();

        $project = $inspectionReport->project->id;

        return redirect()->route('projects.show', $project);
    }

    public function updateContractedControl(Request $request, InspectionReport $inspectionReport){
        $inspectionReport->contracted_control = $request->contracted_control;
        $inspectionReport->save();

        $project = $inspectionReport->project->id;

        return redirect()->route('projects.show', $project);
    }

    public function destroy(InspectionReport $inspectionReport){

    }
}

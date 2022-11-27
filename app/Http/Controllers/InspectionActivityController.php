<?php

namespace App\Http\Controllers;

use App\Imports\InspectionActivityImport;
use App\Models\InspectionActivity;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InspectionActivityController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        InspectionActivity::where('project_id', $project->id)->delete();
        $file_xls_inspection_activity = $request->file('file_xls_inspection_activity');
        Excel::import(new InspectionActivityImport($project->id), $file_xls_inspection_activity);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(InspectionActivity $inspectionActivity){

    }

    public function edit(InspectionActivity $inspectionActivity){

    }

    public function update(Request $request, InspectionActivity $inspectionActivity){

    }

    public function destroy(InspectionActivity $inspectionActivity){

    }
}

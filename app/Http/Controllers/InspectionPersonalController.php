<?php

namespace App\Http\Controllers;

use App\Imports\InspectionPersonalImport;
use App\Models\InspectionPersonal;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InspectionPersonalController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        InspectionPersonal::where('project_id', $project->id)->delete();
        $file_xls_inspection_personals = $request->file('file_xls_inspection_personals');
        Excel::import(new InspectionPersonalImport($project->id), $file_xls_inspection_personals);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(InspectionPersonal $inspectionPersonal){

    }

    public function edit(InspectionPersonal $inspectionPersonal){

    }

    public function update(Request $request, InspectionPersonal $inspectionPersonal){

    }

    public function destroy(InspectionPersonal $inspectionPersonal){

    }
}

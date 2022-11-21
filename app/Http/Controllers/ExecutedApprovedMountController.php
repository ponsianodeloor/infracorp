<?php

namespace App\Http\Controllers;

use App\Imports\ExecutedApprovedMountImport;
use App\Models\ExecutedApprovedMount;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExecutedApprovedMountController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        ExecutedApprovedMount::where('project_id', $project->id)->delete();
        $file_xls_executed_approved_amount = $request->file('file_xls_executed_approved_amount');
        Excel::import(new ExecutedApprovedMountImport($project->id), $file_xls_executed_approved_amount);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(ExecutedApprovedMount $executedApprovedMount){

    }

    public function edit(ExecutedApprovedMount $executedApprovedMount){

    }

    public function update(Request $request, ExecutedApprovedMount $executedApprovedMount){

    }

    public function destroy(ExecutedApprovedMount $executedApprovedMount){

    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\ContractorWorkerImport;
use App\Models\ContractorWorker;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContractorWorkerController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        ContractorWorker::where('project_id', $project->id)->delete();
        $file_xls_contractor_workers = $request->file('file_xls_contractor_workers');
        Excel::import(new ContractorWorkerImport($project->id), $file_xls_contractor_workers);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(ContractorWorker $contractorWorker){

    }

    public function edit(ContractorWorker $contractorWorker){

    }

    public function update(Request $request, ContractorWorker $contractorWorker){

    }

    public function destroy(ContractorWorker $contractorWorker){

    }
}

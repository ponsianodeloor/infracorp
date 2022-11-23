<?php

namespace App\Http\Controllers;

use App\Imports\EconomicStateImport;
use App\Models\EconomicState;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EconomicStateController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        EconomicState::where('project_id', $project->id)->delete();
        $file_xls_economic_state = $request->file('file_xls_economic_state');
        Excel::import(new EconomicStateImport($project->id), $file_xls_economic_state);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(EconomicState $economicState){

    }

    public function edit(EconomicState $economicState){

    }

    public function update(Request $request, EconomicState $economicState){

    }

    public function destroy(EconomicState $economicState){

    }
}

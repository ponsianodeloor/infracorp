<?php

namespace App\Http\Controllers;

use App\Models\executionStatus;
use App\Models\Project;
use Illuminate\Http\Request;

class ExecutionStatusController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request, Project $project){
        $execution_status = new executionStatus();

        $execution_status->stage = $request->stage;
        $execution_status->start_date = $request->start_date;
        $execution_status->final_date = $request->final_date;
        $execution_status->project_id = $project->id;

        $execution_status->save();

        return redirect()->route('projects.show', $project);
    }

    public function show(executionStatus $executionStatus){

    }

    public function edit(executionStatus $executionStatus){

    }

    public function update(Request $request, executionStatus $executionStatus){

    }

    public function destroy(executionStatus $executionStatus){

    }
}

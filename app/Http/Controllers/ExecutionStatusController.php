<?php

namespace App\Http\Controllers;

use App\Models\ExecutionStatus;
use App\Models\Project;
use Illuminate\Http\Request;

class ExecutionStatusController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request, Project $project){
        $execution_status = new ExecutionStatus();

        $execution_status->stage = $request->stage;
        $execution_status->start_date = $request->start_date;
        $execution_status->final_date = $request->final_date;
        $execution_status->project_id = $project->id;

        $execution_status->save();

        return redirect()->route('projects.show', $project);
    }

    public function show(ExecutionStatus $executionStatus){

    }

    public function edit(ExecutionStatus $executionStatus){

    }

    public function update(Request $request, ExecutionStatus $executionStatus){

    }

    public function destroy(ExecutionStatus $executionStatus){

    }
}

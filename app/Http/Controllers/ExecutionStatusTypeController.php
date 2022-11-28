<?php

namespace App\Http\Controllers;

use App\Models\ExecutionStatusType;
use App\Models\Project;
use Illuminate\Http\Request;

class ExecutionStatusTypeController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request, Project $project){
        $execution_status_type = new ExecutionStatusType();
        $execution_status_type->type_and_description = $request->type.'$$'.$request->description;
        $execution_status_type->execution_status_id = $request->execution_status_id;

        $execution_status_type->save();

        return redirect()->route('projects.show', $project);
    }

    public function show(ExecutionStatusType $executionStatusType){

    }

    public function edit(ExecutionStatusType $executionStatusType){

    }

    public function update(Request $request, ExecutionStatusType $executionStatusType){

    }

    public function destroy(ExecutionStatusType $executionStatusType){
        $executionStatus = $executionStatusType->executionStatus;
        $project = $executionStatus->project;
        $executionStatusType->delete();

        return redirect()->route('projects.show', $project);

    }
}

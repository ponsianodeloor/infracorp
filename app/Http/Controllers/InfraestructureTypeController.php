<?php

namespace App\Http\Controllers;

use App\Models\InfraestructureType;
use Illuminate\Http\Request;

class InfraestructureTypeController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $infraestructureType = new InfraestructureType();

        $infraestructureType->infraestructure_id = $request->infraestructure_id;
        $infraestructureType->type = $request->type;
        $infraestructureType->amount = $request->amount;

        $infraestructureType->save();

        $infraestructure = $infraestructureType->infraestructure;
        $project = $infraestructure->project;

        return redirect()->route('projects.edit', compact('project'));
    }

    public function show(InfraestructureType $infraestructureType){

    }

    public function edit(InfraestructureType $infraestructureType){
        //
    }

    public function update(Request $request, InfraestructureType $infraestructureType){

    }

    public function destroy(InfraestructureType $infraestructureType){

    }
}

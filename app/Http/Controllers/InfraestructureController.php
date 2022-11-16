<?php

namespace App\Http\Controllers;

use App\Models\Infraestructure;
use Illuminate\Http\Request;

class InfraestructureController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $infraestructure = new Infraestructure();
        $infraestructure->infraestructure = $request->infraestructure;
        $infraestructure->project_id = $request->project_id;

        $infraestructure->save();
        $project = $infraestructure->project;

        return redirect()->route('projects.edit', compact('project'));
    }

    public function show(Infraestructure $infraestructure){

    }

    public function edit(Infraestructure $infraestructure){

    }

    public function update(Request $request, Infraestructure $infraestructure){

    }

    public function destroy(Infraestructure $infraestructure){

    }
}

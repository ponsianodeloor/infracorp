<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Volume;
use Illuminate\Http\Request;

class VolumeController extends Controller
{
    public function index(){

    }

    public function create(Project $project){
        return view('system.projects.volumes.create', compact('project'));
    }

    public function store(Request $request){

    }

    public function show(Volume $volume){

    }

    public function edit(Volume $volume){

    }

    public function update(Request $request, Volume $volume){

    }

    public function destroy(Volume $volume){

    }
}

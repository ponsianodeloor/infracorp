<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('system.projects.index', compact('projects'));
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show($id){
        $project = Project::findOrFail($id);
        return view('system.projects.show', compact('project'));
    }

    public function edit(Project $project){

    }

    public function update(Request $request, Project $project){

    }

    public function destroy(Project $project){

    }

    public function printInspectionReport(Project $project){
        $pdf = PDF::loadView('system.projects.inspection_report', compact('project'));
        return $pdf->download('inpection_report.pdf');
    }
}

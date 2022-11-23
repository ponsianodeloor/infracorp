<?php

namespace App\Http\Controllers;

use App\Imports\CrossDocumentationImport;
use App\Models\CrossDocumentation;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CrossDocumentationController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        CrossDocumentation::where('project_id', $project->id)->delete();
        $file_xls_cross_documentation = $request->file('file_xls_cross_documentation');
        Excel::import(new CrossDocumentationImport($project->id), $file_xls_cross_documentation);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(CrossDocumentation $crossDocumentation){

    }

    public function edit(CrossDocumentation $crossDocumentation){

    }

    public function update(Request $request, CrossDocumentation $crossDocumentation){

    }

    public function destroy(CrossDocumentation $crossDocumentation){

    }
}

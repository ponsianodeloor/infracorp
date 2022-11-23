<?php

namespace App\Http\Controllers;

use App\Imports\EntranceStudyImport;
use App\Models\EntranceStudy;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EntranceStudyController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        EntranceStudy::where('project_id', $project->id)->delete();
        $file_xls_entrance_study = $request->file('file_xls_entrance_study');
        Excel::import(new EntranceStudyImport($project->id), $file_xls_entrance_study);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(EntranceStudy $entranceStudy){

    }

    public function edit(EntranceStudy $entranceStudy){

    }

    public function update(Request $request, EntranceStudy $entranceStudy){

    }

    public function destroy(EntranceStudy $entranceStudy){

    }
}

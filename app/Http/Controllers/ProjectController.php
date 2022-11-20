<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
        return view('system.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project){
        $project->project = $request->project;
        $project->contractor = $request->contractor;
        $project->inspection = $request->inspection;
        $project->place = $request->place;
        $project->date_start = $request->date_start;
        $project->date_end = $request->date_end;
        $project->reference_value_contract = $request->reference_value_contract;
        $project->date_start_text = $request->date_start_text;
        $project->advance_payment_date_text = $request->advance_payment_date_text;
        $project->project_term_start_date_text = $request->project_term_start_date_text;
        $project->contract_term = $request->contract_term;
        $project->term_extensions = $request->term_extensions;
        $project->contract_termination_date_text = $request->contract_termination_date_text;
        $project->advance = $request->advance;
        $project->price_adjustments = $request->price_adjustments;
        $project->readjustment_formula = $request->readjustment_formula;
        $project->way_to_pay = $request->way_to_pay;
        $project->total_current_amount = $request->total_current_amount;
        $project->save();

        return redirect()->route('projects.show', compact('project'));

        //return view('system.projects.show', compact('project'));
    }

    public function updateUrlImageLocation(Request $request, Project $project){
        $request->validate([
            'file_url_image_location' => 'required|image|max:2048'
        ]);
        $file_url_image_location = $request->file('file_url_image_location')->store('public/images/projects');
        $url_image_location = Storage::url($file_url_image_location);
        $project->url_image_location = $url_image_location;
        $project->save();

        return redirect()->route('projects.show', compact(['project']));
    }

    public function destroy(Project $project){

    }

    public function printInspectionReport(Project $project){
        $pdf = PDF::loadView('system.projects.inspection_report', compact('project'));
        return $pdf->download('inpection_report.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\WarrantyReviewImport;
use App\Models\Project;
use App\Models\WarrantyReview;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarrantyReviewController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        WarrantyReview::where('project_id', $project->id)->delete();
        $file_xls_warranty_review = $request->file('file_xls_warranty_review');
        Excel::import(new WarrantyReviewImport($project->id), $file_xls_warranty_review);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(WarrantyReview $warrantyReview){

    }

    public function edit(WarrantyReview $warrantyReview){

    }

    public function update(Request $request, WarrantyReview $warrantyReview){

    }

    public function destroy(WarrantyReview $warrantyReview){

    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\ProductWorkContractorImport;
use App\Models\ProductWorkContractor;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductWorkContractorController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        ProductWorkContractor::where('project_id', $project->id)->delete();
        $file_xls_product_work_contractor = $request->file('file_xls_product_work_contractor');
        Excel::import(new ProductWorkContractorImport($project->id), $file_xls_product_work_contractor);
        
        return redirect()->route('projects.show', compact('project'));
    }

    public function show(ProductWorkContractor $productWorkContractor){

    }

    public function edit(ProductWorkContractor $productWorkContractor){

    }

    public function update(Request $request, ProductWorkContractor $productWorkContractor){

    }

    public function destroy(ProductWorkContractor $productWorkContractor){

    }
}

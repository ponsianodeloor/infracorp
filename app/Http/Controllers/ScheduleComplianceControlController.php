<?php

namespace App\Http\Controllers;

use App\Imports\ScheduleComplianceControlImport;
use App\Models\Project;
use App\Models\ScheduleComplianceControl;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleComplianceControlController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function storeExcel(Project $project, Request $request){
        ScheduleComplianceControl::where('project_id', $project->id)->delete();
        $file_xls_schedule_compliance_control = $request->file('file_xls_schedule_compliance_control');
        Excel::import(new ScheduleComplianceControlImport($project->id), $file_xls_schedule_compliance_control);

        return redirect()->route('projects.show', compact('project'));
    }

    public function show(ScheduleComplianceControl $scheduleComplianceControl){

    }

    public function edit(ScheduleComplianceControl $scheduleComplianceControl){

    }

    public function update(Request $request, ScheduleComplianceControl $scheduleComplianceControl){

    }

    public function destroy(ScheduleComplianceControl $scheduleComplianceControl){

    }
}

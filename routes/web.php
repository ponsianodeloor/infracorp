<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InspectionReportController;
use App\Http\Controllers\InfraestructureController;
use App\Http\Controllers\InfraestructureTypeController;
use App\Http\Controllers\InfraestructureActivityController;
use App\Http\Controllers\IntervenedWorkIdentificationController;
use App\Http\Controllers\InspectionContractController;
use App\Http\Controllers\ExecutionStatusController;
use App\Http\Controllers\ExecutionStatusTypeController;
use App\Http\Controllers\ExecutedApprovedMountController;
use App\Http\Controllers\ContractorWorkerController;
use App\Http\Controllers\ProductWorkContractorController;
use App\Http\Controllers\ScheduleComplianceControlController;
use App\Http\Controllers\InspectionActivitiesPeriodController;
use App\Http\Controllers\WarrantyReviewController;
use App\Http\Controllers\InspectionPersonalController;
use App\Http\Controllers\EconomicStateController;
use App\Http\Controllers\EntranceStudyController;
use App\Http\Controllers\CrossDocumentationController;
use App\Http\Controllers\InspectionActivityController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/system', function () {
        return view('system.index');
    })->name('system');

    Route::controller(ProjectController::class)->group(function (){
        Route::get('/projects', 'index')->name('projects.index');
        Route::get('/projects/show/{project}', 'show')->name('projects.show');
        Route::get('/projects/edit/{project}', 'edit')->name('projects.edit');
        Route::get('/projects/print_inspection_report/{project}', 'printInspectionReport')->name('projects.print_inspection_report');

        Route::put('/projects/update/{project}', 'update')->name('projects.update');
        Route::put('/projects/update/url_image_location/{project}', 'updateUrlImageLocation')->name('projects.update.url_image_location');
    });

    Route::controller(InfraestructureController::class)->group(function (){
        Route::post('/projects/infraestructures', 'store')->name('projects.infraestructures.store');
    });

    Route::controller(InfraestructureTypeController::class)->group(function (){
        Route::post('/projects/infraestructures/types', 'store')->name('projects.infraestructures.types.store');
    });

    Route::controller(InfraestructureActivityController::class)->group(function (){
        Route::post('/projects/infraestructures/activities', 'store')->name('projects.infraestructures.activities.store');
        Route::delete('/projects/infraestructures/activities/{infraestructureActivity}', 'destroy')->name('projects.infraestructures.activities.destroy');
    });

    Route::controller(InspectionContractController::class)->group(function (){
        Route::put('/projects/inspection_contracts/{inspectionContract}', 'update')->name('projects.inspections_contract.update');
    });

    Route::controller(InspectionReportController::class)->group(function(){
        Route::put('/projects/inspection_reports/antecedent/{inspectionReport}', 'updateAntecedent')->name('projects.inspection_reports.antecedent.update');
        Route::put('/projects/inspection_reports/audited_contract/{inspectionReport}', 'updateAuditedContract')->name('projects.inspection_reports.audited_contract.update');
        Route::put('/projects/inspection_reports/resume_contract/{inspectionReport}', 'updateResumeContract')->name('projects.inspection_reports.resume_contract.update');
        Route::put('/projects/inspection_reports/geographic_location/{inspectionReport}', 'updateGeographicLocation')->name('projects.inspection_reports.geographic_location.update');
        Route::put('/projects/inspection_reports/previous_temporary_control/{inspectionReport}', 'updatePreviousTemporaryControl')->name('projects.inspection_reports.previous_temporary_control.update');
        Route::put('/projects/inspection_reports/contracted_control/{inspectionReport}', 'updateContractedControl')->name('projects.inspection_reports.contracted_control.update');
        Route::put('/projects/inspection_reports/resume_audited_contract/{inspectionReport}', 'updateResumeAuditedContract')->name('projects.inspection_reports.resume_audited_contract.update');
        Route::put('/projects/inspection_reports/project_documentation_review/{inspectionReport}', 'updateProjectDocumentationReview')->name('projects.inspection_reports.project_documentation_review.update');
        Route::put('/projects/inspection_reports/warranty_review/{inspectionReport}', 'updateWarrantyReview')->name('projects.inspection_reports.warranty_review.update');
        Route::put('/projects/inspection_reports/conclusions_recommendations/{inspectionReport}', 'updateConclusionsRecommendations')->name('projects.inspection_reports.conclusions_recommendations.update');
        Route::put('/projects/inspection_reports/attention_pending_issues/{inspectionReport}', 'updateAttentionPendingIssues')->name('projects.inspection_reports.attention_pending_issues.update');
        Route::put('/projects/inspection_reports/annexes/{inspectionReport}', 'updateAnnexes')->name('projects.inspection_reports.annexes.update');
        Route::put('/projects/inspection_reports/signature/{inspectionReport}', 'updateSignature')->name('projects.inspection_reports.signature.update');
    });

    Route::controller(ExecutionStatusController::class)->group(function (){
        Route::post('/projects/execution_status/{project}', 'store')->name('projects.execution_status.store');
    });

    Route::controller(ExecutionStatusTypeController::class)->group(function (){
        Route::post('/projects/execution_status/types/{project}', 'store')->name('projects.execution_status.types.store');
        Route::delete('/projects/execution_status/types/{executionStatusType}', 'destroy')->name('projects.execution_status.types.destroy');
    });


    Route::controller(IntervenedWorkIdentificationController::class)->group(function (){
        Route::put('/projects/intervened_work_identification/{intervenedWorkIdentification}', 'update')->name('projects.intervened_work_identification.update');
    });

    Route::controller(ExecutedApprovedMountController::class)->group(function (){
        Route::post('/projects/execute_approved_mounts/imports_excel/{project}', 'storeExcel')->name('projects.execute_approved_mounts.imports_excel.store_excel');
    });

    Route::controller(ContractorWorkerController::class)->group(function (){
        Route::post('/projects/contractor_workers/imports_excel/{project}', 'storeExcel')->name('projects.contractor_workers.imports_excel.store_excel');
    });

    Route::controller(ProductWorkContractorController::class)->group(function (){
        Route::post('/projects/product_work_contractors/imports_excel/{project}', 'storeExcel')->name('projects.product_work_contractors.imports_excel.store_excel');
    });

    Route::controller(ScheduleComplianceControlController::class)->group(function (){
        Route::post('/projects/schedule_compliance_control/imports_excel/{project}', 'storeExcel')->name('projects.schedule_compliance_control.imports_excel.store_excel');
    });

    Route::controller(InspectionActivitiesPeriodController::class)->group(function (){
        Route::post('/projects/inspection_activities_period/imports_excel/{project}', 'storeExcel')->name('projects.inspection-activities-period.imports-excel.store_excel');
    });

    Route::controller(WarrantyReviewController::class)->group(function (){
        Route::post('/projects/warranty_review/imports_excel/{project}', 'storeExcel')->name('projects.warranty_review.imports_excel.store_excel');
    });

    Route::controller(InspectionPersonalController::class)->group(function (){
        Route::post('/projects/inspection_personals/imports_excel/{project}', 'storeExcel')->name('projects.inspection_personals.imports_excel.store_excel');
    });

    Route::controller(EconomicStateController::class)->group(function (){
        Route::post('/projects/economic_state/imports_excel/{project}', 'storeExcel')->name('projects.economic_state.imports_excel.store_excel');
    });

    Route::controller(EntranceStudyController::class)->group(function (){
        Route::post('/projects/entrance_study/imports_excel/{project}', 'storeExcel')->name('projects.entrance_study.imports_excel.store_excel');
    });

    Route::controller(CrossDocumentationController::class)->group(function (){
        Route::post('/projects/cross_documentation/imports_excel/{project}', 'storeExcel')->name('projects.cross_documentation.imports_excel.store_excel');
    });

    Route::controller(InspectionActivityController::class)->group(function (){
        Route::post('/projects/inspection_activity/imports_excel/{project}', 'storeExcel')->name('projects.inspection_activity.imports_excel.store_excel');
    });

    Route::controller(VolumeController::class)->group(function (){
        Route::get('/projects/volumes/create/{project}', 'create')->name('projects.volumes.create');
        Route::get('/projects/volumes/{volume}', 'show')->name('projects.volumes.show');
        Route::get('/projects/volumes/edit/{volume}', 'edit')->name('projects.volumes.edit');

        Route::post('/projects/volumes', 'store')->name('projects.volumes.store');
        Route::put('/projects/volumes/{volume}', 'update')->name('projects.volumes.update');
    });

    Route::controller(ItemTypeController::class)->group(function (){

        Route::post('/projects/volumes/item-type/', 'store')->name('project.volumes.item-type.store');
    });

    Route::controller(ItemController::class)->group(function (){

        Route::post('/projects/volumes/items', 'store')->name('projects.volumes.items.store');
        Route::delete('/projects/volumes/items/{item}', 'destroy')->name('projects.volumes.items.destroy');
    });

});

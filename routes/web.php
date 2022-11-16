<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InspectionReportController;
use App\Http\Controllers\InfraestructureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
    });

    Route::controller(InfraestructureController::class)->group(function (){
        Route::post('/projects/infraestructures', 'store')->name('projects.infraestructures.store');
    });


    Route::controller(InspectionReportController::class)->group(function(){
        Route::put('projects/inspection_reports/antecedent/{inspectionReport}', 'updateAntecedent')->name('projects.inspection_reports.antecedent.update');
        Route::put('projects/inspection_reports/audited_contract/{inspectionReport}', 'updateAuditedContract')->name('projects.inspection_reports.audited_contract.update');
        Route::put('projects/inspection_reports/resume_contract/{inspectionReport}', 'updateResumeContract')->name('projects.inspection_reports.resume_contract.update');
        Route::put('projects/inspection_reports/geographic_location/{inspectionReport}', 'updateGeographicLocation')->name('projects.inspection_reports.geographic_location.update');
        Route::put('projects/inspection_reports/previous_temporary_control/{inspectionReport}', 'updatePreviousTemporaryControl')->name('projects.inspection_reports.previous_temporary_control.update');
        Route::put('projects/inspection_reports/contracted_control/{inspectionReport}', 'updateContractedControl')->name('projects.inspection_reports.contracted_control.update');
        Route::put('projects/inspection_reports/resume_audited_contract/{inspectionReport}', 'updateResumeAuditedContract')->name('projects.inspection_reports.resume_audited_contract.update');
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VolumeController;
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
        Route::get('/projects/show/{id}', 'show')->name('projects.show');
    });

    Route::controller(VolumeController::class)->group(function (){
        Route::get('/projects/volumes/{project}', 'create')->name('projects.volumes.create');
        Route::get('/projects/volumes/edit/{volume}', 'edit')->name('projects.volumes.edit');

        Route::post('/projects/volumes', 'store')->name('projects.volumes.store');
        Route::put('/projects/volumes/{volume}', 'update')->name('projects.volumes.update');
    });
});

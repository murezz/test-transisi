<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/companies', CompaniesController::class)->middleware('auth');
// Route::get('/companies', [CompaniesController::class, 'index']);
Route::resource('/employees', EmployeesController::class)->middleware('auth');
Route::get('/pdf', [PdfController::class, 'print'])->name('print');

Route::get('importExportView', [EmployeesController::class, 'fileImportExport'])->name('importExportView');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [EmployeesController::class, 'exportExcel'])->name('exportExcel');
// Route for import excel data to database.
Route::post('importExcel', [EmployeesController::class, 'importExcel'])->name('importExcel');

<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('list_report',[ReportController::class,'index'])->name('report.list')->middleware('auth');
Route::get('generate-pdf/{id}',[ReportController::class,'generatePDF'])->name('report.pdf')->middleware('auth');
Route::get('list_edit/{id}',[ReportController::class,'edit'])->name('report.edit')->middleware('auth');
Route::get('list_view/{id}',[ReportController::class,'view'])->name('report.view')->middleware('auth');
Route::put('comment/{id}',[ReportController::class,'comentCreate'])->name('report.update')->middleware('auth');
Route::get('create_report',[ReportController::class,'create'])->name('report.create')->middleware('auth');
Route::post('store_report',[ReportController::class,'store'])->name('report.store')->middleware('auth');



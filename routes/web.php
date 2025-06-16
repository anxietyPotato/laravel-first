<?php

use App\Models\Grades;
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
   $grades = \App\Models\grades::all();

   return view('welcome',compact('grades'));
});


Route::post('/admin/Add-Grades', [App\Http\Controllers\AddGradesController::class, 'AddGrades']);

Route::get('/admin/Add-Grades', [App\Http\Controllers\AddGradesController::class, 'showForm']);

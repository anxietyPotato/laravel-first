<?php

use App\Models\Grades;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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



Route::get('/admin/all-products', [ProductController::class, 'index']);

Route::get('/', function () {
   $grades = \App\Models\Grades::all();

   return view('welcome',compact('grades'));
});


Route::post('/admin/Add-Grades', [App\Http\Controllers\AddGradesController::class, 'AddGrades']);

Route::get('/admin/Add-Grades', [App\Http\Controllers\AddGradesController::class, 'showForm']);

Route::post('/admin/add-product', [\App\Http\Controllers\shopPage::class, 'addProduct']);

Route::get('/admin/add-product', [\App\Http\Controllers\shopPage::class, 'showForm']);

Route::get('/admin/Delete-Products/{products}', [\App\Http\Controllers\ProductController::class, 'Delete']);


Route::get('/shop',[\App\Http\Controllers\shopPage::class, 'index']);

Route::get('/AllContact', [\App\Http\Controllers\ContactController::class, 'AllContact']);

Route::get('/admin/Delete-Contact/{Contact}', [\App\Http\Controllers\ContactController::class, 'Delete'])->name('contact.delete');
Route::get('/admin/edit-contact/{Contact}', [\App\Http\Controllers\ContactController::class, 'Edit'])->name('contact.edit');

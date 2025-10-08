<?php


use App\Models\Grades;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



use App\Http\Controllers\AddGradesController;
use App\Http\Controllers\shopPage;
use App\Http\Controllers\ContactController;

// Public Home
Route::get('/', function () {
    $grades = \App\Models\Grades::all();
    return view('welcome', compact('grades'));
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// ==========================
// 🛍️ Product Management
// ==========================
Route::prefix('admin')
    ->middleware(['auth', App\Http\Middleware\checkIsAdminMiddleware::class])
    ->group(function () {
    Route::get('/all-products', [ProductController::class, 'index'])->name('all.products');
    Route::get('/product/edit/{product}', [ProductController::class, 'singleProduct'])->name('product.single');
    Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/Delete-Products/{products}', [ProductController::class, 'Delete'])->name('Delete.products');

        Route::get('/add-product', [shopPage::class, 'showForm'])->name('add.product.form');
        Route::post('/add-product', [shopPage::class, 'addProduct'])->name('add.product');

    });

// ==========================
// 🏫 Grades Management
// ==========================
Route::prefix('admin')
    ->middleware(['auth', App\Http\Middleware\checkIsAdminMiddleware::class])
    ->group(function () {
    Route::get('/Add-Grades', [AddGradesController::class, 'showForm']);
    Route::post('/Add-Grades', [AddGradesController::class, 'AddGrades']);
});

// ==========================
// 📞 Contact Management
// ==========================
Route::prefix('admin')
    ->middleware(['auth', App\Http\Middleware\checkIsAdminMiddleware::class])
    ->group(function () {
    Route::get('/Delete-Contact/{Contact}', [ContactController::class, 'Delete'])->name('contact.delete');
    Route::get('/edit-contact/{Contact}', [ContactController::class, 'showEditForm'])->name('contact.form');
    Route::post('/edit-contact/{Contact}', [ContactController::class, 'edit'])->name('contact.edit');
});

// ==========================
// 🛒 Shop Page
// ==========================
Route::get('/shop', [shopPage::class, 'index']);

// All contacts (not under admin)
Route::get('/AllContact', [ContactController::class, 'AllContact'])
    ->middleware(['auth', App\Http\Middleware\checkIsAdminMiddleware::class])
    ->name('all.contact');


//** Route::get('/admin/all-products', [ProductController::class, 'index'])->name('all.products');
//
//Route::get('/admin/product/edit/{product}', [ProductController::class, 'singleProduct'])->name('product.single');
//Route::post('/admin/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
//
//Route::get('/', function () {
//    $grades = \App\Models\Grades::all(); group routes named in laravel without changing any structure of names please
//
//    return view('welcome', compact('grades'));
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';
//
//Route::post('/admin/Add-Grades', [App\Http\Controllers\AddGradesController::class, 'AddGrades']);
//
//Route::get('/admin/Add-Grades', [App\Http\Controllers\AddGradesController::class, 'showForm']);
//
//Route::post('/admin/add-product', [\App\Http\Controllers\shopPage::class, 'addProduct']);
//
//Route::get('/admin/add-product', [\App\Http\Controllers\shopPage::class, 'showForm']);
//
//Route::get('/admin/Delete-Products/{products}', [\App\Http\Controllers\ProductController::class, 'Delete'])->name('Delete.products');
//
//
//Route::get('/shop', [\App\Http\Controllers\shopPage::class, 'index']);
//
//Route::get('/AllContact', [\App\Http\Controllers\ContactController::class, 'AllContact'])->name('all.contact');
//
//Route::get('/admin/Delete-Contact/{Contact}', [\App\Http\Controllers\ContactController::class, 'Delete'])->name('contact.delete');
//
//Route::get('/admin/edit-contact/{Contact}', [\App\Http\Controllers\ContactController::class, 'showEditForm'])->name('contact.form');
//
//// Handle the submitted form
//Route::post('/admin/edit-contact/{Contact}', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
//* */

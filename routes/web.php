<?php



use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AddGradesController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\checkIsAdminMiddleware;

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
// 🛒 Admin Product Management
// ==========================
Route::prefix('admin')
    ->middleware(['auth', checkIsAdminMiddleware::class])
    ->controller(ProductController::class)
    ->group(function () {
        Route::get('/all-products', 'index')->name('all.products');
        Route::get('/delete-product/{id}', 'delete')->name('delete.product');
        Route::get('/product/edit/{product}', 'singleProduct')->name('product.single');
        Route::post('/product/update/{product}', 'update')->name('product.update');
    });

// ==========================
// 🛍️ Admin Shop Management
// ==========================
Route::prefix('admin')
    ->middleware(['auth', checkIsAdminMiddleware::class])
    ->controller(ShopController::class)
    ->group(function () {
        Route::get('/add-product', 'showForm')->name('add.product');
        Route::post('/add-product', 'addProduct');
    });

// ==========================
// 🏫 Grades Management
// ==========================
Route::prefix('admin')
    ->middleware(['auth', checkIsAdminMiddleware::class])
    ->controller(AddGradesController::class)
    ->group(function () {
        Route::get('/Add-Grades', 'showForm');
        Route::post('/Add-Grades', 'AddGrades');
    });

// ==========================
// 📞 Contact Management (Admin)
// ==========================
Route::prefix('admin')
    ->middleware(['auth', checkIsAdminMiddleware::class])
    ->controller(ContactController::class)
    ->group(function () {
        Route::get('/Delete-Contact/{Contact}', 'Delete')->name('contact.delete');
        Route::get('/edit-contact/{Contact}', 'showEditForm')->name('contact.form');
        Route::post('/edit-contact/{Contact}', 'edit')->name('contact.edit');
    });

// ==========================
// 📞 Contact Management (Public)
// ==========================
Route::get('/AllContact', [ContactController::class, 'AllContact'])
    ->middleware(['auth', checkIsAdminMiddleware::class])
    ->name('all.contact');

// ==========================
// 🛍️ Public Shop Page
// ==========================
Route::controller(ProductController::class)->group(function () {
    Route::get('/shop', 'showShop')->name('shop');
    Route::get('/shop/product/{product}-{slug}', 'showSingle')->name('shop.single');
});

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

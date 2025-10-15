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
    ->name('contact.')
    ->group(function () {
        Route::get('/Delete-Contact/{Contact}', 'Delete')->name('delete');
        Route::get('/edit-contact/{Contact}', 'showEditForm')->name('form');
        Route::post('/edit-contact/{Contact}', 'edit')->name('edit');
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



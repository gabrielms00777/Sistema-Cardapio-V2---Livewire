<?php

use App\Http\Controllers\Site\TokenController;
use App\Http\Middleware\CheckSessionExpiration;
use App\Http\Middleware\CheckSessionMiddleware;
use App\Livewire\Site;
use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', Site\Index::class)->name('site.index');
Route::get('/mesa/{token}', TokenController::class)->name('site.token');

Route::middleware(CheckSessionMiddleware::class)->group(function () {
    Route::get('/home', Site\Home::class)->name('site.home');
    Route::get('/home/product/{product}', Site\Product::class)->name('site.product');
    Route::get('/home/cart', Site\Cart::class)->name('site.cart');
    Route::get('/home/confirmation', Site\Confirmation::class)->name('site.confirmation');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/kitchen', Admin\Kitchen\Index::class)->name('kitchen.index');
    // Route::get('/orders', [KitchenController::class, 'orders'])->name('kitchen.orders');
    // Route::put('/order-items/{item}/update-status', [KitchenController::class, 'updateItemStatus']);
    // Route::put('/order/{order}/status', [KitchenController::class, 'updateOrderStatus']);

    Route::get('/table', Admin\Table\Index::class)->name('table.index');
    Route::get('/table/create', Admin\Table\Create::class)->name('table.create');
    Route::get('/table/{table}/edit', Admin\Table\Edit::class)->name('table.edit');
    Route::get('/table/orders', Admin\Table\Orders::class)->name('table.orders');
    // Route::get('/tables/qrcode/{table_id}', [TableController::class, 'qrcode'])->name('table.qrcode');
    // Route::get('/tables/orders', [TableController::class, 'orders'])->name('table.orders');

    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('reports', 'reports')->name('reports');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';

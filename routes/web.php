<?php

use App\Livewire\Site;
use Illuminate\Support\Facades\Route;

Route::get('/', Site\Index::class)->name('site.index');
Route::get('/mesa/{token}', Site\Token::class)->name('site.token');
Route::get('/home', Site\Home::class)->name('site.home');
Route::get('/home/product/{product}', Site\Product::class)->name('site.product');
Route::get('/home/cart', Site\Cart::class)->name('site.cart');
Route::get('/home/confirmation', Site\Confirmation::class)->name('site.confirmation');
// Route::get('/home/name', Site\Index::class)->name('site.name');
// Route::post('/home/order', Site\Order::class)->name('site.order');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

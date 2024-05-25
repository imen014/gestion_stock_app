<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;



Route::get('/create_product', [ProductController::class, 'create']);
Route::post('/create_product', [ProductController::class, 'store'])->name('store_products');

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('update_products');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');

Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('show_product');

Route::middleware('auth')->get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy_product');


Route::get('/create_event', [EventController::class, 'create'])->name('create_event');
Route::post('/create_event', [EventController::class, 'store'])->name('post_event');
Route::get('/show_events', [EventController::class, 'index'])->name('show_events');

Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('edit_event');
Route::put('/events/{id}/edit', [EventController::class, 'update'])->name('update_event');

Route::get('/events/{id}/show', [EventController::class, 'show'])->name('show_event');
Route::get('/events/{id}/delete', [EventController::class, 'destroy'])->name('destroy_event');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




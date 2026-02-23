<?php

use App\Http\Controllers\Front\Homepage;
use Illuminate\Support\Facades\Route;


Route::get('/', [Homepage::class, 'index'])->name('homepage');
Route::get('sayfa', [Homepage::class, 'index']);
Route::get('/iletisim', [Homepage::class,'contact'])->name('contact');
Route::post('/iletisim',[Homepage::class,'contactpost'])->name('contact.post');
Route::get('/category/{slug}', [Homepage::class, 'category'])->name('category');

Route::get('/{category}/{slug}', [Homepage::class, 'single'])->name('single');

Route::get('/{sayfa}', [Homepage::class, 'page'])->name('page');







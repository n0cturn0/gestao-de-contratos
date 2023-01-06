<?php

use App\Http\Livewire\ProdutoEventView;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/produto', [App\Http\Controllers\HomeController::class, 'produto'])->name('produto');
//Route::get('/produto-cadastro', [App\Http\Controllers\HomeController::class, 'cadastro'])->name('produto.cadastro');
Route::get('/produto', [App\Http\Controllers\HomeController::class, 'produto'])->name('produto.principal');
Route::get('/cliente', [App\Http\Controllers\HomeController::class, 'cliente'])->name('cliente.principal');
//Route::get('/produto/{event}', ProdutoEventView::class, 'teste')->name('event.view');


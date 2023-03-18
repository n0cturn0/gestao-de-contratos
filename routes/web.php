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

//Route::get('/', function () {
//    return view('livewire-base');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/produto', [App\Http\Controllers\HomeController::class, 'produto'])->name('produto');
//Route::get('/produto-cadastro', [App\Http\Controllers\HomeController::class, 'cadastro'])->name('produto.cadastro');
Route::get('/produto', [App\Http\Controllers\HomeController::class, 'produto'])->name('produto.principal');
Route::get('/servico', [App\Http\Controllers\HomeController::class, 'servico'])->name('servico.principal');
Route::get('/cliente', [App\Http\Controllers\HomeController::class, 'cliente'])->name('cliente.principal');
Route::get('/vendedor', [App\Http\Controllers\HomeController::class, 'vendedor'])->name('vendedor.principal');
Route::get('/grupo', [App\Http\Controllers\HomeController::class, 'grupo'])->name('grupo.principal');
//Contrato
Route::get('/contrato', [App\Http\Controllers\HomeController::class, 'contrato'])->name('contrato.principal');
Route::post('/cadastrocontrato', [App\Http\Controllers\HomeController::class, 'cadastrocontrato'])->name('cadastro-contrato');
Route::get('/lista-contrato', [App\Http\Controllers\HomeController::class, 'listacontrato'])->name('lista-contrato');
Route::get('/situacao-contrato/{id}', [App\Http\Controllers\HomeController::class, 'situacaocontrato'])->name('situacao-contrato');
Route::post('/atualizastatuscontrato', [App\Http\Controllers\HomeController::class, 'atualizastatuscontrato'])->name('atualiza-status-contrato');
Route::get('/configura-contrato/{id}', [App\Http\Controllers\HomeController::class, 'configuracontrato'])->name('configura-contrato');
Route::post('/insere-contrato-configuraca', [App\Http\Controllers\HomeController::class, 'insereconfiguracao'])->name('insere-contrato-configuraca');
Route::post('/atualiza-contrato-configuraca', [App\Http\Controllers\HomeController::class, 'atualizacontratoconfiguraca'])->name('atualiza-contrato-configuraca');
Route::get('/insere-servico/{id}', [App\Http\Controllers\HomeController::class, 'adicionaservico'])->name('insere-servico');
Route::get('/insere-produto/{id}', [App\Http\Controllers\HomeController::class, 'adicionaproduto'])->name('insere-produto');
Route::post('/insereativo', [App\Http\Controllers\HomeController::class, 'adicionaativo'])->name('insereativo');
Route::get('/apaga-servico/{id}', [App\Http\Controllers\HomeController::class, 'apagaservico'])->name('apaga-servico');
Route::get('/edita-contrato/{id}', [App\Http\Controllers\HomeController::class, 'editacontrato'])->name('edita-contrato');
Route::get('/edita-contrato-full/{id}', [App\Http\Controllers\HomeController::class, 'editacontratofull'])->name('edita-contrato-full');
Route::get('/alteravendedor/{id}', [App\Http\Controllers\HomeController::class, 'alteravendedor'])->name('alteravendedor');
Route::post('/atualizaedicao', [App\Http\Controllers\HomeController::class, 'atualizaedicao'])->name('atualizaedicao');
Route::post('/processcontratofull', [App\Http\Controllers\HomeController::class, 'processcontratofull'])->name('processcontratofull');
Route::get('/teste', [App\Http\Controllers\HomeController::class, 'rmaster'])->name('teste');



//Route::get('/produto/{event}', ProdutoEventView::class, 'teste')->name('event.view');


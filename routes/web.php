<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CardapiosController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;


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


Route::get('/', [PagesController::class, 'index'])->name('pages.index');



/* Rotas para Produtos: */
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');

Route::get('/produtos/cadastro', [ProdutosController::class, 'create'])->name('form_cadastro_produto');

Route::post('/produtos/cadastro', [ProdutosController::class, 'store']);

Route::delete('/produtos/remover/{id}', [ProdutosController::class, 'destroy']);

Route::post('/produtos/status/{id}', [ProdutosController::class, 'status']);

Route::post('/produtos/editar/{id}', [ProdutosController::class, 'update']);



/* Rotas para Categorias: */
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');

Route::get('/categorias/cadastro', [CategoriasController::class, 'create'])->name('form_cadastro_categoria');

Route::post('/categorias/cadastro', [CategoriasController::class, 'store']);

Route::delete('/categorias/remover/{id}', [CategoriasController::class, 'destroy']);

Route::post('/categorias/editar/{id}', [CategoriasController::class, 'update']);


/* Rotas para Cardápios: */
Route::get('/cardapio', [CardapiosController::class, 'index'])->name('cardapios.index');

Route::get('/cardapio/gerar', [CardapiosController::class, 'create'])->name('cardapios.qrcode');



/* Rotas para Mesas */
Route::get('/mesas', [MesasController::class, 'index'])->name('mesas.index');

Route::get('/mesas/cadastro', [MesasController::class, 'create'])->name('form_cadastro_mesa')->middleware('auth');

Route::post('/mesas/cadastro', [MesasController::class, 'store']);

Route::delete('/mesas/remover/{id}', [MesasController::class, 'destroy']);

Route::post('/mesas/editar/{id}', [MesasController::class, 'update']);


/* Outras Rotas */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
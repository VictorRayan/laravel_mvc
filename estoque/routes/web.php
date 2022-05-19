<?php


use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
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

Route::get('/lista', [ProdutoController::class, 'lista']);

Route::get('/lista/mostrar/{id}', [ProdutoController::class, 'mostrar'])
    ->where('id', '[0-9]+'); /*where condition returns the route only is numeric semantic 
    parameter*/


//invokes the product registration form
Route::get('/produtos/novo', [ProdutoController::class, 'novo']);

//Below, call the method 'adiciona' to add a new product into database
Route::post('/produtos/adiciona', [ProdutoController::class, 'adiciona']);

Route::get('/produtos/remover/{id}', [ProdutoController::class, 'remover'])
    ->where('id', '[0-9]+');

Route::get('/produtos/alterar/{id}', [ProdutoController::class, 'alterar'])
    ->where('id', '[0-9]+');

Route::post('/produtos/makeupdate/{id}', [ProdutoController::class, 'makeUpdate'])
    ->where('id', '[0-9]+');


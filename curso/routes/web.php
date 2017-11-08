<?php

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
//    return view('welcome');
//});

	

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clientes', 'ClientesController@index');
Route::get('/clientes/{cliente}/contatos', 'ContatosController@contatos');
Route::get('/clientes/novo', 'ClientesController@novo');
Route::get('/clientes/{cliente}/editar', 'ClientesController@editar');
Route::post('/clientes/salvar', 'ClientesController@salvar');
Route::patch('/clientes/{cliente}', 'ClientesController@atualizar');
Route::delete('/clientes/{cliente}', 'ClientesController@deletar');




Route::get('/clientespdf', 'ClientesController@generate_pdf');






Route::group(['prefix' => 'api'], function()
{
   Route::get('/ListarCliente', 'ApiController@ListarCliente');
   Route::post('/InserirCliente', 'ApiController@InserirCliente');
   Route::put('/AtualizarCliente/{cliente}', 'ApiController@AtualizarCliente');
   Route::delete('/DeletarCliente/{cliente}', 'ApiController@DeletarCliente');
});	

//Route::get('api/ListarCliente', 'ApiController@ListarCliente');
//Route::post('api/InserirCliente', 'ApiController@InserirCliente');




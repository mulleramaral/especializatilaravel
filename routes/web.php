<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('models',function(){
    $produtos = new App\Models\Painel\Produto;
    return $produtos->get();
});

Route::get('test-models','TesteModelsController@index');
Route::get('test-models-update/{id}','TesteModelsController@update');
Route::get('test-models-delete/{id}','TesteModelsController@delete');

Route::get('query-builder','QueryBuilderController@tests');
Route::get('query-builder2','QueryBuilderController@testsDois');
Route::get('query-builder3','QueryBuilderController@testsTres');
Route::get('query-builder4','QueryBuilderController@testsQuatro');
Route::get('where','QueryBuilderController@where');


Route::get('users',function (){
    return DB::table('users')->get();
});


Route::resource('produto','Painel\ProdutoController');

Route::get('/', function () {
    return view('welcome');
});

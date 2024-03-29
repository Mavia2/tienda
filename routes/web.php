<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware'=>'auth'], function(){
    Route::post('stock/stock/update2', 'StockController@update2');
    Route::get('/', function () {
        return Redirect::to('dashboard');
    });
    Route::get('buscar/check/ajax/destroy', 'BuscarcheckController@destroyAjax');
    Route::post('buscar/check/ajax/destroy', 'BuscarcheckController@destroyAjax');
    Route::get('buscar/check/ajax/edit', 'BuscarcheckController@editAjax');
    Route::post('buscar/check/ajax/edit', 'BuscarcheckController@editAjax');
    Route::get('buscar/check/ajax', 'BuscarcheckController@busquedaAjax');
    Route::post('buscar/check/ajax', 'BuscarcheckController@busquedaAjax');
    Route::post('buscar/check/del','BuscarcheckController@destroySelected');
    Route::resource('buscar/check', 'BuscarcheckController');
    Route::resource('buscar/comparar', 'CompararController');
    #Route::resource('buscar/scrap', 'ScrapController');
    Route::resource('buscar', 'BuscarController');
    Route::get('sync/elimi', 'SyncController@elimi');
    Route::get('sync/album', 'SyncController@album');
    Route::resource('sync', 'SyncController');
    #Route::resource('formavieja', 'FormaviejaController');
    #Route::get('importExport', 'MaatwebsiteDemoController@importExport');
    #Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
    #Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
    #Route::post('importEx', 'MaatwebsiteDemoController@importExport');
    #Route::get('importEx', 'MaatwebsiteDemoController@importExport');
    Route::post('stock/producto/update2', 'ProductoController@update2');
    Route::post('stock/producto/edit2', 'ProductoController@edit2');
    Route::get('stock/producto/edit2', 'ProductoController@edit2');
    Route::resource('stock/producto', 'ProductoController');

    Route::resource('stock/stock', 'StockController');
    Route::get('ventas/venta/vstock{id}', 'VentaController@vstock');
    Route::post('ventas/venta/edit2', 'VentaController@update2');
    Route::get('ventas/venta/comment', 'VentaController@comment');
    Route::post('ventas/venta/vstock{id}', 'VentaController@vstock');
    Route::resource('ventas/venta', 'VentaController');
    Route::resource('ventas/detalleventa', 'DetalleventaController');
    Route::resource('ventas/cliente', 'ClienteController');
    Route::resource('compra/estado', 'EstadoController');
    Route::resource('compra/tipos', 'TiposController');
    Route::get('compra/pedidos/venta/{id}', 'PedidosController@venta');
    Route::resource('compra/pedidos', 'PedidosController');
    Route::resource('compra/orden', 'OrdenController');
    Route::resource('compra/detalleorden', 'DetalleordenController');
    Route::get('compra/pedidos/detalle/{id}', 'PedidosController@detalle');

    Route::get('compra/importweb/login', 'ImportwebController@login');
    Route::get('compra/importweb/grab_page', 'ImportwebController@grab_page');
    Route::get('compra/importweb/post_data', 'ImportwebController@post_data');
    Route::resource('compra/importweb', 'ImportwebController');
    Route::resource('compra/actual', 'ActualController');
    Route::post('dashboard/update2', 'DashController@todo');
    Route::get('dashboard/update2', 'DashController@todo');
    Route::get('dashboard/cale', 'DashController@cale');
    Route::get('dashboard/calr', 'DashController@calr');
    Route::get('dashboard/calc', 'DashController@calc');
    Route::resource('dashboard','DashController');
    #Route::get('compra/actual2', 'ActualController@show');
    #Route::get('ventas/detalleventa', 'DetalleventaController@storess');
    Route::get('cal', 'gCalendarController@index2');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

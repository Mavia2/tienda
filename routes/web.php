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

Route::resource('buscar', 'BuscarController');

Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
Route::post('importEx', 'MaatwebsiteDemoController@importExport');
Route::get('importEx', 'MaatwebsiteDemoController@importExport');

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

Route::get('cal', 'gCalendarController@index2');
Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Send an array of permissions to request
    $login_url = $fb->getLoginUrl(['email']);

    // Obviously you'd do this in blade :)
     return redirect($login_url);
});

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    $user = App\User::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel
    Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
});

Route::match(['get', 'post'], '/facebook/page-tab', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    try {
        $token = $fb->getPageTabHelper()->getAccessToken();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // Failed to obtain access token
        dd($e->getMessage());
    }

    // $token will be null if the user hasn't authenticated your app yet
    if (! $token) {
        // . . .
    }
});


});
Auth::routes();

Route::get('/home', 'HomeController@index');

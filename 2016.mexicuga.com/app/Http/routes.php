<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::group(['middleware' => 'web'], function () {
    // ALWAYS SET IT VERY FIRST
    Route::auth();
    // REDIRECT PAGE AFTER LOGIN OR REGISTER
    Route::get('/usercheck', 'FrontController@CheckUser');

    Route::get('/makeorder', function () {
        echo 'Payment Done Successfully';
    });

});

Route::group(['middleware' => ['web']], function () {
// FRONT PAGE ROUTE    
    Route::get('/productlist/sortby/{sortby}','ShopController@SortIt');
    Route::get('/productlist/sortbybrand/{sortby}','ShopController@SortBrand');
    
    Route::get('/cart/{productid}/{priceid}/{qty}', 'ShopController@addproduct');
    Route::get('/productremove/{productid}','ShopController@RemoveProduct');
    Route::get('/cart/{hashid}/{qty}', 'ShopController@UpdateCart');
    Route::get('/comprar', 'ShopController@checkout');
    Route::get('/minicart', 'ShopController@minicart');
    Route::post('/pay', 'ShopController@PayNow');
    Route::get('/payment/success', 'ShopController@PaySuccess');
    Route::get('/pagescroll', 'ShopController@PageScroll');
    Route::get('/resultados-busquedas/{search}', 'FrontController@Search');
    Route::get('/resultados-busquedas/{department}/{search}', 'FrontController@DepartmentSearch');
    Route::get('/resultados-busquedas/{department}/{category}/{search}', 'FrontController@CategorySearch');
    Route::get('/productlist', 'FrontController@ProductList');
// POST OF CONTACT
    Route::post('/contact', 'ContactController@save');
});

Route::group(['middleware' => 'web'], function () {
    // USER LOGIN, REGISTRATION, FORGET PASSWORD 
    Route::get('/login', 'FrontController@login');
    Route::get('/crear-cuenta', 'FrontController@register');
    Route::get('/recuperar-contrasena', 'FrontController@forgerpassword');
    //Route::get('/terminos-condiciones-uso', 'FrontController@termandconditions');
    Route::get('/zipaddress/{code}', 'FrontController@GetAddress');
    // -------------------------------------------------------------------------
    // USER PROFILE
    Route::get('/mi-perfil', 'ProfileController@index');
    Route::get('/mi-perfil-detalle-compras', 'ProfileController@shopping');
    Route::get('/mi-perfil-detalle-pedido', 'ProfileController@order');
    Route::get('/mi-perfil-detalle-pedido/{odrder_number}', 'ProfileController@view_order');
    Route::get('/mi-perfil-detalle-mexipuntos', 'ProfileController@mexipuntos');

    Route::post('/mi-perfil', 'ProfileController@SaveProfile');
    Route::post('/mi-perfil-password', 'ProfileController@SavePassword');
    Route::post('/mi-perfil-billing-info', 'ProfileController@SaveBillinfo');
    Route::post('/mi-perfil-shipping-info', 'ProfileController@SaveShipinfo');
});






/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */


Route::group(['middleware' => ['web']], function () {

    // PRODUCT DESCRIPTION ROUTE
    Route::get('product/{department}/{category}/{product}', 'FrontController@Pdesc');

    // PRODUCT CATEGORY
    Route::get('product/{department}/{category}', 'FrontController@Category');

    // ALWAYS USE IT AT LAST
    Route::get('/', 'FrontController@pages');
    Route::get('/mapa-sitio','FrontController@sitemap');
    Route::get('/{page}', 'FrontController@pages');
});



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
});






Route::group([ 'middleware' => ['web']], function() {
    // ADMIN LOGIN 
    Route::get('/', 'FrontController@adminlogin');
    
});

Route::group(['middleware' => ['web']], function () {

    Route::get('/admin/send_mail_to_customer/{order_id}', 'OrderController@send_mail_to_customer');
    

    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/dashboard', 'AdminController@index');
    Route::get('/admin/mi_perfil', 'AdminController@profile');
    Route::get('/admin/users', 'AdminController@users');

    // POST OF BANNER
    Route::post('/admin/banner', 'BannerController@save');
    Route::get('/admin/deletebanner/{id}', 'BannerController@delete');
    Route::get('/admin/banners_view', 'BannerController@index');
    Route::post('/admin/offerimg', 'BannerController@SaveFrontofferImg');
    Route::get('/admin/banners/{id}/{direction}', 'BannerController@SetOrder');



    Route::get('/admin/comentarios_detail', function () {
        return view('admin.pages.comentarios_detail');
    });
    Route::get('/admin/comentarios_view', function () {
        return view('admin.pages.comentarios_view');
    });

    /* DEPARTMENT GETS AND POST */
    Route::get('/admin/departamentos_add', 'DeparmentController@index');
    Route::get('/admin/departamentos_edit/{id}', 'DeparmentController@edit');
    Route::get('/admin/departamentos_view', 'DeparmentController@view');
    Route::post('/admin/departamentos_create', 'DeparmentController@create');
    Route::post('/admin/departamentos_edit', 'DeparmentController@update');
    Route::get('/admin/departamentos_del/{id}', 'DeparmentController@delete');
    Route::get('/admin/departs/{id}/{direction}', 'DeparmentController@SetOrder');

    /* CATEGORY GETS AND POST */
    Route::get('/admin/categorias_add', 'CategoryController@index');
    Route::get('/admin/categorias_view', 'CategoryController@view');
    Route::get('/admin/categorias_edit/{id}', 'CategoryController@edit');
    Route::post('/admin/categorias_create', 'CategoryController@create');
    Route::post('/admin/categorias_edit', 'CategoryController@update');
    Route::get('/admin/categorias_del/{id}', 'CategoryController@delete');

    /* UNITS GETS AND POST */
    Route::get('/admin/productos_unidades_venta_add', 'UnitsController@index');
    Route::get('/admin/productos_unidades_venta_edit/{id}', 'UnitsController@edit');
    Route::get('/admin/productos_unidades_venta_view', 'UnitsController@view');
    Route::post('/admin/productos_unidades_venta_create', 'UnitsController@create');
    Route::post('/admin/productos_unidades_venta_edit', 'UnitsController@update');
    Route::get('/admin/productos_unidades_venta_del/{id}', 'UnitsController@delete');

    /* CATALOGUE GETS AND POST */
    Route::get('/admin/productos_catalogos_add', 'CatalogueController@index');
    Route::get('/admin/productos_catalogos_edit/{id}', 'CatalogueController@edit');
    Route::get('/admin/productos_catalogos_view', 'CatalogueController@view');
    Route::post('/admin/productos_catalogos_create', 'CatalogueController@create');
    Route::post('/admin/productos_catalogos_edit', 'CatalogueController@update');
    Route::get('/admin/productos_catalogos_del/{id}', 'CatalogueController@delete');

    /* TRADEMARK GETS AND POST */
    Route::get('/admin/productos_marcas_add', 'BrandController@index');
    Route::get('/admin/productos_marcas_edit/{id}', 'BrandController@edit');
    Route::get('/admin/productos_marcas_view', 'BrandController@view');
    Route::post('/admin/productos_marcas_create', 'BrandController@create');
    Route::post('/admin/productos_marcas_edit', 'BrandController@update');
    Route::get('/admin/productos_marcas_del/{id}', 'BrandController@delete');

    /* PROVIDERS GETS AND POST */
    Route::get('/admin/productos_proveedores_add', 'ProvidersController@index');
    Route::get('/admin/productos_proveedores_edit/{id}', 'ProvidersController@edit');
    Route::get('/admin/productos_proveedores_view', 'ProvidersController@view');
    Route::post('/admin/productos_proveedores_create', 'ProvidersController@create');
    Route::post('/admin/productos_proveedores_edit', 'ProvidersController@update');
    Route::get('/admin/productos_proveedores_del/{id}', 'ProvidersController@delete');

    /* TRANSPORT GETS AND POST */
    Route::get('/admin/productos_transportistas_add', 'CarriersController@index');
    Route::get('/admin/productos_transportistas_edit/{id}', 'CarriersController@edit');
    Route::get('/admin/productos_transportistas_view', 'CarriersController@view');
    Route::post('/admin/productos_transportistas_create', 'CarriersController@create');
    Route::post('/admin/productos_transportistas_edit', 'CarriersController@update');
    Route::get('/admin/productos_transportistas_del/{id}', 'CarriersController@delete');

    /* PRODUCT GETS AND POST */
    Route::get('/admin/productos_add', 'ProductController@index');
    Route::get('/admin/productos_edit/{id}', 'ProductController@edit');
    Route::get('/admin/productos_view', 'ProductController@view');
    Route::post('/admin/product_create', 'ProductController@create');
    Route::post('/admin/productos_edit', 'ProductController@update');
    Route::get('/admin/productos_del/{id}', 'ProductController@delete');
    Route::get('/admin/productos_del_gallery/{id}', 'ProductController@deletegallery');
    
    /* ACCESS GETS AND POST */
    Route::get('/admin/accesos_add', 'AccessController@index');
    Route::get('/admin/accesos_view', 'AccessController@view');
    Route::get('/admin/accesos_edit/{id}', 'AccessController@edit');
    Route::post('/admin/accesos_create', 'AccessController@create');
    Route::post('/admin/accesos_edit', 'AccessController@update');
    Route::get('/admin/accesos_del/{id}', 'AccessController@delete');
    


    Route::get('/admin/destinos_view', function () {
        $data=DB::table("destinations")->whereId(1)->get();
        return view('admin.pages.destinos_view',compact("data"));
    });
    Route::post('/admin/destinos_update', 'OrderController@destinos_update');
    Route::get('/admin/mexipuntos_edit/{id}', 'MexiPuntosController@editPoint');
    Route::post('/admin/mexipuntos_edit/{id}', 'MexiPuntosController@updatePoint');
//        function () {
//        return view('admin.pages.mexipuntos_edit');
//    });
    Route::get('/admin/mexipuntos_view',[
        'as' => 'mexipuntos',
        'uses' => 'MexiPuntosController@index'
    ]);
    Route::post('/admin/mexipuntos_view','MexiPuntosController@updateMexiPuntos');
    Route::get('/admin/reportes_view', 'ReportController@index');

    /**************************ROUTES FOR ORDERS****************************************/
    Route::get('/admin/orders', 'OrderController@index');
    Route::get('/admin/confirm_order/{order_id}', 'OrderController@confirm_order');
    Route::get('/admin/cancel_order/{order_id}', 'OrderController@cancel_order');
    Route::get('/admin/delivered_order/{order_id}', 'OrderController@delivered_order');
    Route::get('/admin/on_the_road/{order_id}', 'OrderController@on_the_road');
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


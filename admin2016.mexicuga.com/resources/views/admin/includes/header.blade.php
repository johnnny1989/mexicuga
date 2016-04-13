<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('resources/assets/admin/img/favicon.ico') }}" type="image/x-icon">
        <title>Dashboard :: Mexicuga</title>
        <!--Footable-->
        <link href="{{ asset('resources/assets/admin/assets/plugins/jquery.steps/demo/css/jquery.steps.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/plugins/footable/css/footable.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/assets/css/stilo.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="{{ asset('resources/assets/admin/assets/js/modernizr.min.js') }}"></script>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ url('admin') }}" class="logo"><img src="{{ asset('resources/assets/admin/assets/images/mexicuga-logo.png') }}" class="img-responsive"></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                <input type="text" placeholder="Buscar..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-comment"></i> <span class="badge badge-xs badge-danger">23</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-danger pull-right">23 por atender</span>Comentarios</li>
                                        <li class="list-group nicescroll notification-list">
                                            <!-- comentario-->
                                            <a href="{{ url('/admin/comentarios_detail') }}" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-comment-o fa-2x text-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Me gustaría saber ¿qué costo tiene este rotomartillo? Gracias</h5>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- comentario-->
                                            <a href="{{ url('/admin/comentarios_detail') }}" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-comment-o fa-2x text-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Cuánto cuesta al C.P. 80520? Gracias</h5>

                                                    </div>
                                                </div>
                                            </a>

                                            <!-- comentario-->
                                            <a href="{{ url('/admin/comentarios_detail') }}" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-comment-o fa-2x text-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">¿Envías a domicilio? Gracias</h5>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ ('/admin/comentarios_view') }}" class="list-group-item text-right">
                                                <small class="font-600">Ver todos </small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/admin/mi_perfil') }}"><i class="ti-user m-r-5"></i> Mi Perfil</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="ti-power-off m-r-5"></i> Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="has_sub">
                                <a href="{{ url('/admin') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current())?>"><i class="ti-home"></i> <span> Dashboard</span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="{{ url('/admin/orders') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['order'])?>"><i class="fa fa-shopping-basket"></i> <span> Orders</span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="{{ url('/admin/banners_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['banners_view'])?>"><i class="fa fa-picture-o"></i> <span> Banners</span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="{{ url('/admin/departamentos_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['departamentos_view'])?>"><i class="fa fa-cubes"></i> <span> Departamentos</span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="{{ url('/admin/categorias_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['categorias_view'])?>"><i class="fa fa-th-list"></i> <span> Categorías</span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['productos_add','productos_view','productos_unidades_venta_view','productos_catalogos_view','productos_marcas_view','productos_proveedores_view','productos_transportistas_view'])?>"><i class="fa fa-cube"></i> <span> Productos</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/admin/productos_add') }}"><i class="fa fa-upload"></i> Subir a Tienda</a></li>
                                    <li><a href="{{ url('/admin/productos_view') }}"><i class="fa fa-search"></i> Ver Productos</a></li>
                                    <li><a href="{{ url('/admin/productos_unidades_venta_view') }}"><i class="fa fa-th"></i> Uni. de Venta</a></li>
                                    <li><a href="{{ url('/admin/productos_catalogos_view') }}"><i class="fa fa-folder-open"></i> Catálogos</a></li>
                                    <li><a href="{{ url('/admin/productos_marcas_view') }}"><i class="fa fa-trademark"></i> Marcas</a></li>
                                    <li><a href="{{ url('/admin/productos_proveedores_view') }}"><i class="fa fa-users"></i>  Proveedores</a></li>
                                    <li><a href="{{ url('/admin/productos_transportistas_view') }}"><i class="fa fa-truck"></i> Transportistas</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="{{ url('/admin/mexipuntos_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['mexipuntos_view'])?>"><i class="fa fa-circle"></i> <span> MexiPuntos </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ url('/admin/destinos_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['destinos_view'])?>"><i class="fa fa-map-marker"></i><span> Destinos </span></a>
                            </li>
                            @if(Auth::check() && Auth::user()->usertype == 'admin') 
                            <li class="has_sub">
                                <a href="{{ url('/admin/reportes_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['reportes_view'])?>"><i class="fa fa-bar-chart"></i><span> Reportes </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ url('/admin/accesos_view') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['accesos_view'])?>"><i class="fa fa-key"></i> Accesos </span></a>
                            </li>
                            @endif
                            <li class="has_sub">
                                <a href="{{ url('/admin/users') }}" class="waves-effect waves-light <?PHP echo App\Common::CurrentUrl(URL::current(),['users'])?>"><i class="fa fa-user"></i> Usuarios </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ url('/logout') }}" class="waves-effect waves-light"><i class="ti-power-off m-r-5"></i><span> Cerrar Sesión </span></a>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Empieza el contenido, derecha -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
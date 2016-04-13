<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
        <![endif]-->
        <title>Tlapalería y Ferretería  Mexicuga México DF</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/theme-style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/ie.style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/stilo.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/stilo_botones.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/royalslider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/rs-default.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/chat.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/font-awesome.min.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <!--[if IE 7]>
          <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/front/css/font-awesome-ie7.css') }}">
        <![endif]-->
        <script type="text/javascript" src="{{ asset('resources/assets/front/js/vendor/modernizr.js') }}"></script>
        <!--[if IE 8]><script src="{{ asset('resources/assets/front/js/vendor/less-1.3.3.js') }}"></script><![endif]-->
        <!--[if gt IE 8]><!--><script type="text/javascript" src="{{ asset('resources/assets/front/js/vendor/less.js') }}"></script><!--<![endif]-->

    </head>
    <body>
        <!-- Header-->
        <header id="header" class="light-header">
            <div class="header-top-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">

                                <!-- header- cerrar sesión -->
                                <div class="socials-block pull-right">
                                    <ul class="list-unstyled list-inline">
                                        @if(Auth::check() && Auth::user()->usertype == 'user')
                                        <li><a href="{{ url('logout') }}" title="Cerrar Sesión"><i class="fa fa-sign-out"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- /header cerrar sesión -->
                                 @if(Auth::check() && Auth::user()->usertype == 'user') 
                                <!-- mexipuntos menu usuario -->
                                <div id="account-menu" class="pull-right">
                                    <a href="{{ url('mi-perfil-detalle-mexipuntos') }}" class="account-menu-title"> <strong>0 MexiPuntos</strong></a>
                                </div>
                                <!-- /mexipuntos menu usuario -->	                               
                                @endif
                                <!-- header- menu usuario -->
                                <div id="account-menu" class="pull-right">
                                    
                                        @if(Auth::check() && Auth::user()->usertype == 'user') 
                                        <a href="" class="account-menu-title"><i class="fa fa-user"></i>&nbsp; 
                                            {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ url('login') }}" class="account-menu-title"><i class="fa fa-user"></i>&nbsp;
                                            Login
                                        </a>  
                                        @endif
                                   
                                    <ul class="list-unstyled account-menu-item">
                                        @if(Auth::check() && Auth::user()->usertype == 'user')
                                        <li><a href="{{ url('mi-perfil') }}"><i class="fa fa-pencil"></i>&nbsp; Mi Perfil</a></li>
                                        <li><a href="{{ url('mi-perfil-detalle-pedido') }}"><i class="fa fa-list"></i>&nbsp; Pedidos</a></li>
                                        <li><a href="{{ url('mi-perfil-detalle-compras') }}"><i class="fa fa-check"></i>&nbsp; Compras</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- /header menu usuario -->

                                <!-- header - redes sociales -->
                                <div class="socials-block pull-right">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /header - redes sociales -->
                            </div>

                        </div>
                    </div>



                </div>
            </div>
            <!-- /header-top-row -->
            <div class="header-bg">
                <div class="header-main" id="header-main-fixed">
                    <div class="header-main-block1">
                        <div class="container container_padding">
                            <div id="container-fixed">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ url('/') }}" class="header-logo"> <img src="{{ asset('resources/assets/front/img/mexicuga-logo.png') }}" alt=""></a>        
                                    </div>

                                    <div class="col-md-4">
                                        <div class="top-search-form pull-left">
                                            <form action="{{ url('resultados-busquedas') }}" method="post">
                                                {!! csrf_field() !!}
                                                <input type="text" placeholder="Buscar ..." required="required" name="Search" class="form-control">
                                                       <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>  
                                                
                                        </div>        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="header-mini-cart  pull-right" id="minicart">
                                                {{ \App\Shop::MiniCart() }}
                                            </div>
                                        </div><!-- /header-mini-cart -->
                                        <div class="top-icons">
                                            <ul class="tels_email">
                                                <li class="telefonos"><i class="fa fa-phone"></i> 6798-6452 <i class="fa fa-phone"></i> 7045-4837 </li>
                                                <li><a href="mailto:info@mexicuga.com" class="email_info"><i class="fa fa-envelope"></i> info@mexicuga.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="header-main-block2">
                        <nav class="navbar yamm  navbar-main" role="navigation">

                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                    <!--<a href="{{ url('admin') }}" class="navbar-brand"><i class="fa fa-home"></i></a>-->
                                </div>
                                <div id="navbar-collapse-1" class="navbar-collapse collapse ">
                                    <?PHP \App\Common::MainMenu(); ?>
                                </div>
                            </div> 
                        </nav>
                    </div>
                </div>

                <!-- /header-main-menu -->
            </div>
        </header>
        <!-- End header -->
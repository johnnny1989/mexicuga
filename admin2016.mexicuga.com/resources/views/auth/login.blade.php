<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('resources/assets/admin/img/favicon.ico') }}" type="image/x-icon">
    <title>Login :: Mexicuga </title>
    <link href="{{ asset('resources/assets/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/assets/admin/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/assets/admin/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/assets/admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/assets/admin/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/assets/admin/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('resources/assets/admin/assets/js/modernizr.min.js') }}"></script>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Ingresa al <strong class="text-primary">ADMIN :: Mexicuga</strong> </h3>
        </div>

        <div class="panel-body">
            @if(Session::has( 'error' ))
            <div class="row">
                <div class="col-md-12 alert alert-danger">
                    {{ Session::get( 'error' ) }}
                </div>
            </div>
            @endif
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" placeholder="Usuario">
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>




<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/detect.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/fastclick.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.blockUI.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/waves.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.nicescroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.scrollTo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.core.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/jquery.app.js') }}"></script>

</body>
</html>		
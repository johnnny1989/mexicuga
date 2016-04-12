{{--@extends('front')--}}
{{--@section('content')--}}
    <section class="top_margin_container">
        <div class="color-scheme-2">
            <div class="container">
                <div class="row">
                    <article class="col-md-6">
                        <h1>Password Reset</h1>
                        <div class="box-border block-form">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                {!! csrf_field() !!}
                                <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <p class="col-md-8">* E-mail: <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif</p>
                                </div>
                                <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <p class="col-md-8">* Contraseña: <input type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <p class="col-md-8">* Confirm Password: <input type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                                </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-sign-in"></i> Entrar</button>
                                    <p class="col-md-12">
                                        <label>
                                            Si no tienes cuenta, <a href="{{ url('crear-cuenta') }}" class="link_mexicuga">Regístrate</a>
                                        </label>
                                        <br>
                                        <label><a href="{{ url('/login') }}" class="link_mexicuga">Login</a>.</label>
                                        <br>
                                </div>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
{{--@endsection--}}

{{--@section('footjs')--}}

    {{--<script type="text/javascript">--}}
        {{--$('#LoadMore').click(function(){--}}
            {{--//var scroll = $(window).scrollTop();--}}
            {{--// var Scheight = $(window).height();--}}

            {{--//if(scroll >= Scheight - parseInt(Scheight)*.75 ){--}}
            {{--$.get(PageUrl+'/pagescroll',function(data){--}}
                {{--if(parseInt(data) === 1){--}}
                    {{--ProductList();--}}
                {{--}else{--}}
                    {{--$('#LoadMore').css("display","none");--}}
                {{--}--}}
            {{--});--}}
            {{--//}--}}
        {{--});--}}
    {{--</script>--}}

{{--@endsection--}}

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Reset Password</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">--}}
                        {{--{!! csrf_field() !!}--}}

                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="password" class="form-control" name="password">--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Confirm Password</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="password" class="form-control" name="password_confirmation">--}}

                                {{--@if ($errors->has('password_confirmation'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--<i class="fa fa-btn fa-refresh"></i>Reset Password--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

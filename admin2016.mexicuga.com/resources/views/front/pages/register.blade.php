@extends('front')
@section('content')
<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <article class="col-md-6">
                    <h1>Creando mi Cuenta</h1>
                    <div class="box-border block-form">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}
                            <div class="row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <p class="col-md-8">* Nombre: <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </div>
                            <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <p class="col-md-8">* E-mail: <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </p>
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
                            <div class="row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <p class="col-md-8">* Confirmar Contraseña: <input type="password" class="form-control" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-md-12">
                                    <label>
                                        <input type="checkbox" name="" value="" required=""> He leído y acepto las condiciones del <a href="{{ url('terminos-condiciones-uso') }}" class="link_mexicuga">Aviso de Privacidad</a>
                                    </label>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-check"></i> Registrarme</button>
                            </div>
                        </form>
                    </div>
                </article>
            </div>
        </div>  
    </div>
</section>

@endsection
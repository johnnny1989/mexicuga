@extends('front')
@section('content')
 <section class="top_margin_container">
            <div class="color-scheme-2">
                <div class="container">
                	<div class="row">
                		<article class="col-md-6">
                			<h1>Login</h1>
                			<div class="box-border block-form">
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
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
								<div class="row">
									<button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-sign-in"></i> Entrar</button>
									<p class="col-md-12">
										<label>
											Si no tienes cuenta, <a href="{{ url('crear-cuenta') }}" class="link_mexicuga">Regístrate</a>
										</label>
									<br>
                                                                        <label>¿No recuerdas tu contraseña? <a href="{{ url('recuperar-contrasena') }}" class="link_mexicuga">Recupérala aquí</a>.</label>
									<br>
								</div>
                                            </form>
                                        </div>
                		</article>
                	</div>
                </div>  
            </div>
</section>
@endsection
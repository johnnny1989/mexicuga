@extends('front')
@section('content')
<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <article class="col-md-6">
                    <h1>Recuperando contraseña</h1>
                    <div class="box-border block-form">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            {{ session()->forget('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}
                            
                            <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <p class="col-md-8">* E-mail: <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </p>
                            </div>
                            
                            <div class="row">
                                <p class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-check"></i>  Enviar</button>
                            </div>
                        </form>
                    </div>
                </article>
            </div>
        </div>  
    </div>
</section>

@endsection
@extends('front')
@section('content')


<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                
                
                <article class="col-md-6">
                    <h1>Contacto</h1>
                    <div class="box-border block-form">
                @if(Session::has( 'message' ))
                <div class="row">
                    <div class="col-md-12 alert alert-success" id="contactinfo">
                        {{ Session::get( 'message' ) }}
                    </div>
                </div>
                @endif
                <div class="col-md-12 alert" id="contactinfo" style="display: none;"></div>
               
                <form class="form-horizontal" id="ContactPage" role="form" method="POST" action="{{ url('contact') }}" accept-charset="UTF-8">
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
                                <p class="col-md-8">* E-mail: <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </div>
                            <div class="row{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <p class="col-md-8">Teléfono: <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control">
                                    @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </div>
                            <div class="row{{ $errors->has('message') ? ' has-error' : '' }}">
                                <div class="col-md-10">
                                    <p>Mensaje:</p>
                                    <textarea class="form-control" name="message">{{ old('message') }}</textarea>
                                    @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                                <button type="reset" id="ContactFormReset" style="display: none;"></button>
                                <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-send"></i> Enviar</button>
                            </div>
                        </form>
                    </div>
                </article>
                <article class="col-md-6">
                    <br><br><br><br>
                    <img src="{{ asset('resources/assets/front/img/banner-ventas-mayoreo.jpg') }}" class="img-responsive"/>
                </article>
            </div>
        </div>  
    </div>
</section>



@endsection
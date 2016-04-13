@extends('front')
@section('content')
<section class="top_margin_container">
            <div class="color-scheme-2">
                <div class="container">
                	<div class="row">
                		<article class="col-md-6">
                			<h1><i class="fa fa-frown-o"></i> Página no encontrada</h1>
                			<h3>Al parecer la página que buscas, no existe</h3>
                			<br>
                			<a href="{{ url('/') }}" class="btn btn-lg btn_verde"><i class="fa fa-arrow-left"></i> Regresar a Inicio</a>
                			<br><br>
                		</article>
                	</div>
                </div>  
            </div>
        </section>
@endsection
@extends('front')
@section('content')
        
        <section class="top_margin_container">
            <div class="color-scheme-2">
                <div class="container">
                	<div class="row">
                		<article class="col-md-12">
                			<h1><i class="fa fa-search"></i> Resultados relacionados a <span class="tipo_resultados">"{{ $searched }}"</span>...</h1>
                		</article>
                	</div>
                </div>
            </div>
        </section>
        
       
        <section>
            <div class="color-scheme-2">
                <div class="container productos_container">
 			@include('front.pages.productlist')                   
                </div>  
            </div>
        </section>

@endsection
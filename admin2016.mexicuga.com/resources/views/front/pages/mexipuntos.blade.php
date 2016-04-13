@extends('front')
@section('content')
<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    <h1 class="mexipuntos">Tienda MexiPuntos</h1>
                </article>
            </div>
            <div class="row">
                @foreach($products as $key => $vals)
                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                    <article class="product light">
                        <figure class="figure-hover-overlay" alt="{{ strtoupper($vals->userName) }}" title="{{ strtoupper($vals->userName) }}">                                                                        
                            <a href="{{ \App\Common::ProductUrl($vals->department,$vals->category,$vals->userName,$vals->trademark,$vals->code) }}" class="figure-href"></a>
                            <div class="imagenes_container">
                                <div class="imagenes_container_center">
                                    <img src="{{ asset('public/images/product/'.$vals->imagename) }}" alt="{{ strtoupper($vals->userName) }}" title="{{ strtoupper($vals->userName) }}">
                                </div>
                            </div>
                        </figure>
                        <div class="product-caption">
                            <div class="block-name">
                                <a href="{{ \App\Common::ProductUrl($vals->department,$vals->category,$vals->userName,$vals->trademark,$vals->code) }}" class="product-name" title="{{ strtoupper($vals->userName) }}">{{ strtoupper($vals->userName) }}</a>
                                <div class="product-rating">
                                    <div class="stars">
                                        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                    </div>
                                    <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
                                </div>	
                                <p class="tipo_precio">850 MexiPuntos</p>
                                <p>Código: {{ strtoupper($vals->code) }}</p>
                            </div>

                            <div class="product-cart">
                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                            </div>

                        </div>

                    </article> 
                </div>
                @endforeach
            </div>                   
        </div>  
    </div>
</section>
@endsection
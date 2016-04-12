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
                    <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25" id="Product_id_{{ $vals->id }}">
                        <article class="product light">
                            <?PHP $prices = App\ProductPrice::where('product_id', $vals->id)->get(); ?>
                            <figure class="figure-hover-overlay" alt="{{ strtoupper($vals->userName) }}" title="{{ strtoupper($vals->userName) }}">
                                <?PHP $n = 1; ?>
                                @foreach($prices as $key => $valsd)
                                    @if($valsd->discount > 0)
                                        <div class="product-sale" @if($n > 1) style="display: none;" @endif id="Discountshowid_{{ $valsd->id }}"><i class="fa fa-tag"></i> {{ $valsd->discount }}%</div>
                                    @endif
                                    <?PHP $n++; ?>
                                @endforeach
                                <a href="{{ \App\Common::ProductUrl($vals->department,$vals->category,$vals->userName,$vals->trademark,$vals->code) }}" class="figure-href"></a>
                                <div class="imagenes_container">
                                    <div class="imagenes_container_center">
                                        <img src="{{ asset('public/images/product') }}/{{ $vals->imagename }}" alt="{{ strtoupper($vals->userName) }}" title="{{ strtoupper($vals->userName) }}">
                                    </div>
                                </div>
                            </figure>
                            <div class="product-caption">
                                <div class="block-name" id="product-list_{{ $vals->id }}">
                                    <a href="{{ \App\Common::ProductUrl($vals->department,$vals->category,$vals->userName,$vals->trademark,$vals->code) }}" class="product-name" title="{{ strtoupper($vals->userName) }}">{{ strtoupper($vals->userName) }}</a>

                                    @if(count($prices) > 1)
                                        <p>
                                            <select class="form-control form-control2" id="Priceidform_{{ $vals->id }}" onchange="ShowPrice({{ $vals->id }})">
                                                <?PHP $m = 1; ?>
                                                @foreach($prices as $key => $measure)
                                                    <option value="{{ $measure->id }}" @if($m === 1) selected="selected" @endif >{{ $measure->measures }} {{ $vals->unitname }}</option>
                                                    <?PHP $m++; ?>
                                                @endforeach
                                            </select>
                                        </p>
                                    @else
                                        @foreach($prices as $key => $measure)
                                            <p class="sin_medidas"><strong>Medidas</strong> : {{ $measure->measures }} {{ $vals->unitname }}&nbsp;</p>
                                            <input type="hidden" value="{{ $measure->id }}"  id="Priceidform_{{ $vals->id }}" />
                                        @endforeach
                                    @endif


                                    <div class="product-rating">
                                        <div class="stars">
                                            <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                        </div>
                                        <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a>
                                    </div>
                                    <?PHP $n = 1; ?>
                                    @foreach($prices as $key => $vals2)
                                        <p class="tipo_precio" @if($n > 1) style="display: none;" @endif id="Priceshowid_{{ $vals2->id }}">
                                            @if($vals2->discount != '0.00') <span>$ {{ $vals2->public_price }}</span>
                                            $ {{ number_format(($vals2->public_price - ($vals2->public_price*$vals2->discount) / 100),2) }}
                                            @else
                                                $ {{ number_format($vals2->public_price,2) }}
                                            @endif

                                        </p>
                                        <input type="hidden" id="Priceid_{{ $vals2->id }}" value="{{ $vals2->id }}" />
                                        <?PHP $n++; ?>
                                        @endforeach
                                            <!-- <p class="tipo_precio"><span>$ 100.00</span> $ 80.00</p> -->
                                        <p><strong>I.V.A incluído</strong></p>
                                        <p>Código: {{ $vals->code }}</p>
                                        <p>Entrega: {{ $vals->deleveryfrom }} a {{ $vals->deleveryto }} días hábiles</p>
                                </div>

                                <div class="product-cart">
                                    <input type="hidden" id="proqty_{{ $vals->id }}" value="1" />
                                    <button onclick="AddProduct({{ $vals->id }})" type="button"><i id="ItsAdded_{{ $vals->id }}" class="fa fa-shopping-cart"></i> Agregar a Carrito</button>
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
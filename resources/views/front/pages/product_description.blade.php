@extends('front')
@section('content')
<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('product/'.str_slug($department).'/'.str_slug($category->category)) }}"><i class="fa fa-th-large"></i> {{ $category->category }}</a></li>
                            <li class="active"><i class="fa fa-check"></i> {{ $product->userName }}</li>
                        </ul>
                    </div>
                </div>
                <article class="col-md-12">
                    <h1>{{ $product->userName }} <span class="tipo_nuevo"><i class="fa fa-certificate"></i></span> 
                         <?PHP $n = 1; ?>
                        @foreach($prices as $key => $vals)
                            @if($vals->discount > 0)
                            <span class="tipo_oferta" @if($n > 1) style="display: none;" @endif id="Discountshowid_{{ $vals->id }}"><i class="fa fa-tag"></i> {{ $vals->discount }}%</span>
                            @endif
                             <?PHP $n++; ?>
                        @endforeach
                    </h1>
                </article>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="color-scheme-4">
        <div class="container productos_container">
            <div class="row">

                <div class="col-md-12">
                    <div class="block-product-detail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                <div id="gallery-1" class="royalSlider rsDefault">
                                    @foreach($gallery as $key => $image)
                                    <a class="rsImg bugaga" href="{{ asset('public/images/product/gallery/'.$image->imagename) }}"></a>
                                    @endforeach
                                </div>
                                <div class="product-detail-section">
                                    <div class="product-information">
                                        <div class="clearfix"><img src="{{ asset('resources/assets/front/img/btn_redes_compartir.png') }}" class="img-responsive"></div>
                                    </div>
                                    <div class="product-rating">
                                        <div class="stars">
                                            <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                                        </div>
                                        <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
                                    </div>

                                    <div class="product-information">
                                        <div class="clearfix">
                                            <label class="pull-left">Medidas:</label>
                                            @if(count($prices) > 1)
                                            <p>
                                                <select class="form-control form-control2" id="Priceidform_{{ $product->id }}" onchange="ShowPriceAtDesc({{ $product->id }})">
                                                    <?PHP $m = 1; ?>
                                                    @foreach($prices as $key => $measure)
                                                    <option value="{{ $measure->id }}" @if($m === 1) selected="selected" @endif >{{ $measure->measures }} {{ $product->unitname }}</option>
                                                    <?PHP $m++; ?>
                                                    @endforeach
                                                </select>
                                            </p>
                                            @else
                                            @foreach($prices as $key => $measure)
                                            <p class="sin_medidas"><strong>Medidas</strong> : {{ $measure->measures }} {{ $product->unitname }}&nbsp;</p>
                                            <input type="hidden" value="{{ $measure->id }}"  id="Priceidform_{{ $product->id }}" />
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Incluye:</label> {{ $product->includes }}
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Código:</label> {{ $product->code }}
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Marca:</label> {{ $product->trademark }}
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Color:</label> {{ $product->color }}
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Disponibilidad:</label> 
                                            @if($product->availability == 1)
                                            En Existencia
                                            @elseif($product->availability == 2)
                                            Sujeto a Disponibilidad
                                            @elseif($product->availability == 3)
                                            Preguntar por Existencia
                                            @endif
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Descripción:</label>
                                            <p class="description">{{ $product->description }}</p> 
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Entrega de:</label> {{ $product->deleveryfrom }} a {{ $product->deleveryto }} días
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Precio:</label>
                                            <?PHP $n = 1; $amount = array(); ?>
                                            @foreach($prices as $key => $vals2)
                                            <p class="tipo_precio" @if($n > 1) style="display: none;" @endif id="Priceshowid_{{ $vals2->id }}">
                                               <?PHP 
                                                if($vals2->discount > 0){ 
                                                    echo '<span>$ '.$vals2->public_price.'</span> '; 
                                                    $amount[] = number_format(($vals2->public_price - ($vals2->public_price*$vals2->discount) / 100),2);
                                                }else{
                                                    $amount[] = number_format($vals2->public_price,2);
                                                }
                                                
                                                echo '$ '.$amount[$n-1];
                                                ?>
                                            </p>
                                            <input type="hidden" id="Priceid_{{ $vals2->id }}" value="{{ $vals2->id }}" />
                                            <input type="hidden" id="AmountPayble_{{ $vals2->id }}" value="{{ $amount[$n-1] }}" />
                                            <?PHP $n++; ?>
                                            @endforeach
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">&nbsp;</label> <strong>I.V.A. incluído</strong>
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Cantidad:</label>
                                            <input type="number" value="1" id="proqty_{{ $product->id }}" min="1" onchange="ShowPriceAtDesc({{ $product->id }})" class="form-control">
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Total:</label>
                                            <p id="TotalPrice" class="tipo_precio"> $ {{ $amount[0] }}</p>
                                        </div>
                                        <div class="shopping-cart-buttons">
                                            <p class="tipo_verde_2"><i class="glyphicon glyphicon-credit-card"></i> Pago contra entrega en efectivo o tarjeta de crédito *</p>
                                        </div>
                                        <div class="shopping-cart-buttons">
                                            <a href="#" data-toggle="modal" data-target="#cotizacion" class="llamada"><i class="fa fa-phone"></i>  Llama para Ordenar</a>

                                            <button class="shoping" onclick="AddProduct({{ $product->id }})" type="button"><i id="ItsAdded_{{ $product->id }}" class="fa fa-shopping-cart"></i> Agregar a Carrito</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

                                <div class="box-border block-form">


                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills  nav-justified">
                                        <li class="active"><a href="#informacion_adicional" data-toggle="tab" class="disabled"><i class="fa fa-info"></i> Información Adicional</a></li>
                                        <li><a href="#completa_tu_compra" data-toggle="tab"><i class="fa fa-plus"></i> Completa tu compra</a></li>
                                        <li><a href="#review" data-toggle="tab"><i class="fa fa-comments"></i> Comentarios y Dudas</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="informacion_adicional">
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{ $product->additional_information }}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="completa_tu_compra">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Productos relacionados</h3>
                                                    <hr>
                                                    @include('front.pages.relatedproductlist')
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="tab-pane" id="review">
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Comentarios y dudas sobre este producto</h3>

                                                    <form role="form" method="post" action="#">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="inputFirstName" class="control-label">* Nombre:</label>
                                                                    <div>
                                                                        <input type="text" class="form-control" id="inputFirstName">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="inputCompany" class="control-label">*E-mail</label>
                                                                    <div>
                                                                        <input type="text" class="form-control" id="inputCompany">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" placeholder="Duda o comentario..."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label  class="control-label">Tu calificación:</label>
                                                                    <div class="product-rating">
                                                                        <div class="stars">
                                                                            <span class="star" id="star_5" onclick="rateit(5)"></span>
                                                                            <span class="star" id="star_4" onclick="rateit(4)"></span>
                                                                            <span class="star" id="star_3" onclick="rateit(3)"></span>
                                                                            <span class="star" id="star_2" onclick="rateit(2)"></span>
                                                                            <span class="star" id="star_1" onclick="rateit(1)"></span>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit"  class="btn-default-1" value="Enviar">
                                                    </form>

                                                    <hr>

                                                    <div class="review-header">
                                                        <h5><i class="fa fa-user"></i> Rodrigo Garza</h5>
                                                        <div class="product-rating">
                                                            <div class="stars">
                                                                <span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted">29/ene/2016</small>
                                                    </div>
                                                    <div class="review-body">
                                                        <p><i class="fa fa-comment tipo_gris"></i> Buenas tardes lo mandas al C.P. 56908??.</p>
                                                    </div>
                                                    <div class="review-header-2">
                                                        <h5><i class="fa fa-user"></i> José Antonio</h5>
                                                        <small class="text-muted">29/ene/2016</small>
                                                    </div>
                                                    <div class="review-body-2">
                                                        <p><i class="fa fa-comment tipo_gris"></i> Hola amigo, claro que si, ¿cuántos necesitas?</p>
                                                    </div>
                                                    <div class="review-header">
                                                        <h5><i class="fa fa-user"></i> Rodrigo Garza</h5>
                                                        <div class="product-rating">
                                                            <div class="stars">
                                                                <span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted">29/ene/2016</small>
                                                    </div>
                                                    <div class="review-body">
                                                        <p><i class="fa fa-comment tipo_gris"></i> Necesito 4</p>
                                                    </div>
                                                    <hr>
                                                    <div class="review-header">
                                                        <h5><i class="fa fa-user"></i> Julián Martínez</h5>
                                                        <div class="product-rating">
                                                            <div class="stars">
                                                                <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted">28/ene/2016</small>
                                                    </div>
                                                    <div class="review-body">
                                                        <p><i class="fa fa-comment tipo_gris"></i> Tienen en color negro?</p>

                                                    </div>
                                                    <div class="review-header-2">
                                                        <h5><i class="fa fa-user"></i> Juan Carlos</h5>
                                                        <small class="text-muted">29/ene/2016</small>
                                                    </div>
                                                    <div class="review-body-2">
                                                        <p><i class="fa fa-comment tipo_gris"></i> Buena tarde, la próxima semana llegan.</p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>  
    </div>
</section>
@endsection
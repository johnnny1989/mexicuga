@extends('front')
@section('content')
    <section class="top_margin_container">
        <div class="color-scheme-2">
            <div class="container">
                <div class="row">
                    <article class="col-md-12">
                        <div class="box-border block-form">
                            <div class="row">
                                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="box-border block-form">
                                        <!-- Nav tabs -->
                                        {{--<ul class="nav nav-pills  nav-justified">--}}
                                            {{--<li class="active"><a href="#carrito_entrega" data-toggle="tab"><i class="fa fa-truck"></i>Entrega</a></li>--}}
                                            {{--<li><a href="#carrito_facturacion" data-toggle="tab"><i class="fa fa-file-text"></i>Facturación</a></li>--}}
                                            {{--<li><a href="#carrito_resumen" data-toggle="tab"><i class="fa fa-shopping-cart"></i>Resumen</a></li>--}}
                                        {{--</ul>--}}

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="carrito_resumen">
                                                <h3>Your Order:</h3>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table width="100%" cellpadding="4" cellspacing="0">
                                                                <tr>
                                                                    <td colspan="3"><font face="Verdana, Geneva, sans-serif" color="#333" size="+1"><strong>{{ Auth::user()->name }} :</strong></font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" align="justify"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">¡Gracias! En breve nos comunicaremos con usted para decirle la fecha y hora de entrega.
                                                                            <br /><br />
                                                                            Su <strong>número de pedido es {{ $orders->invoice_number }}</strong> e incluye lo siguiente:
                                                                        </font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <table width="100%">
                                                                            <tr><td colspan="4"  align="center"><hr /></td></tr>
                                                                            <tr>
                                                                                <td align="center"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Cantidad</strong></font></td>
                                                                                <td align="center"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Imagen</strong></font></td>
                                                                                <td align="center"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Producto</strong></font></td>
                                                                                <td align="center" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Precio</strong></font></td>
                                                                            </tr>
                                                                            @foreach($orders->getCart as $item)
                                                                                <tr bgcolor="#efefef">
                                                                                    <td align="center"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">{{ $item->qty }}</font></td>
                                                                                    <td align="center" style="padding: 5px"><img src="{{ asset('public/images/product/'.$item->image) }}" width="70" height="70" /></td>
                                                                                    <td align="center"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>{{ $item->code }}</strong>{{ $item->name }}</font></td>
                                                                                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">${{ number_format(($item->price*$item->qty),2) }}</font></td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Subtotal</font></td>
                                                                                <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ {{ $orders->amount-$orders->shipping_charge }}</font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">I.V.A.</font></td>
                                                                                <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ 0</font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Envío</font></td>
                                                                                <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ {{ $orders->shipping_charge }}</font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#1460ab" size="-1"><strong>Total</strong></font></td>
                                                                                <td align="right"><font face="Verdana, Geneva, sans-serif" color="#1460ab" size="-1"><strong>$ {{ $orders->amount }}</strong></font></td>
                                                                            </tr>
                                                                            <tr><td colspan="4"><hr /></td></tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <table width="100%" cellpadding="5">
                                                                            <tr>
                                                                                <td colspan="5"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Status de su Pedido</strong></font></td>
                                                                            </tr>
    <tr>
        @if($orders->status == 0)
            <td align="center" bgcolor="#f4f4f4">
                <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">1</font>
                <br />
                <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pedido Confirmado</font>
                <br />
                <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
            </td>
        @else
            <td align="center" bgcolor="#d8339c">
                <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">1</font>
                <br />
                <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pedido Confirmado</font>
                <br />
                <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
            </td>
        @endif

            @if($orders->status > 1)
                <td align="center" bgcolor="#d8339c">
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">2</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pedido en Ruta</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                </td>
            @else
                <td align="center" bgcolor="#f4f4f4">
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">2</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pedido en Ruta</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                </td>
            @endif

            @if($orders->payment_type != "cash_on_delivery")
                <td align="center" bgcolor="#d8339c">
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">3</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pago Confirmado</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                </td>
            @else
                <td align="center" bgcolor="#f4f4f4">
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">3</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pago Confirmado</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                </td>
            @endif

            @if($orders->status > 2)
                <td align="center" bgcolor="#d8339c">
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">4</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pedido Entregado</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                </td>
            @else
                <td align="center" bgcolor="#f4f4f4">
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">4</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pedido Entregado</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                </td>
            @endif

            @if($orders->status > 2)
                <td align="center" bgcolor="#d8339c">
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">5</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Disfrute su Compra</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-happy-face-active.png" width="25" height="23" />
                </td>
            @else
                <td align="center" bgcolor="#f4f4f4">
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">5</font>
                    <br />
                    <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Disfrute su Compra</font>
                    <br />
                    <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                </td>
            @endif
    </tr>
                                                                        </table>
                                                                    </td>
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" align="justify"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Atte,<br />
                                                                            <strong>Mexicuga.com</strong></font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            {{--<table width="600" cellpadding="4" cellspacing="0">--}}
                                                                {{--<tr>--}}
                                                                    {{--<td colspan="2">&nbsp;</td>--}}
                                                                {{--</tr>--}}
                                                                {{--<tr>--}}
                                                                    {{--<td width="54"><img src="{{ asset('resources/assets/front/img') }}/img-envio-gratis-emailing.jpg" width="54" height="55" alt="Envíos" /></td>--}}
                                                                    {{--<td bgcolor="#3aa9e4">&nbsp;&nbsp;<font face="Verdana, Geneva, sans-serif" color="#fff" size="+1"><strong>ENVÍOS GRATIS</strong></font>--}}
                                                                        {{--<br />--}}
                                                                        {{--<font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">&nbsp;&nbsp;*Sólo D.F. Mínimo de compra $599.00 pesos mx. Aplican restricciones.</font>--}}
                                                                    {{--</td>--}}
                                                                {{--</tr>--}}
                                                            {{--</table>--}}
                                                            {{--<table class="cart-table table">--}}
                                                                {{--<thead>--}}
                                                                {{--<tr>--}}
                                                                    {{--<th class="card_product_quantity">Cantidad</th>--}}
                                                                    {{--<th class="card_product_image">Imagen</th>--}}
                                                                    {{--<th class="card_product_name">Producto</th>--}}
                                                                    {{--<th class="card_product_total">Total</th>--}}
                                                                    {{--<th class="card_product_total">Eliminar</th>--}}
                                                                {{--</tr>--}}
                                                                {{--</thead>--}}
                                                                {{--<tbody>--}}
                                                                {{--@foreach($orders->getCart as $item)--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td class="card_product_quantity" data-th="Cantidad">{{ $item->qty }}--}}
                                                                            {{--&nbsp;--}}
                                                                            {{--&nbsp;<a href="#"><i class="icon-trash icon-large"></i> </a>--}}
                                                                        {{--</td>--}}
                                                                        {{--<td class="card_product_image" data-th="Imagen"><a href="#"><img title="{{ $item->name }}" alt="{{ $item->name }}" src="{{ asset('public/images/product/'.$item->image) }}"></a></td>--}}
                                                                        {{--<td class="card_product_name" data-th="Producto"><a href="#">{{ $item->name }}<strong>{{ $item->code }}</strong></a></td>--}}
                                                                        {{--<td class="card_product_total" data-th="Total">${{ number_format(($item->price*$item->qty),2) }}</td>--}}
                                                                        {{--<td data-th="Eliminar"><a href="#"><i class="fa fa-trash"></i></a></td>--}}
                                                                    {{--</tr>--}}
                                                                {{--@endforeach--}}
                                                                {{--</tbody>--}}
                                                            {{--</table>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </article>
                                {{--<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">--}}
                                    {{--<div class="block-form block-order-total box-border" data-wow-duration="1s">--}}
                                        {{--<h3 class="color_precio"><i class="fa fa-dollar"></i>Total: <strong>{{ LaraCart::total($formatted = false, $withDiscount = true) }}</strong></h3>--}}
                                        {{--<p>*El costo de envío se notificará vía email</p>--}}
                                        {{--<br>--}}
                                        {{--<a href="{{ url('pay') }}" class="btn btn-lg btn_verde center-block"><i class="fa fa-check"></i> PAGO SEGURO</a>--}}
                                        {{--<hr>--}}
                                        {{--<h3 class="text-center"><i class="fa fa-credit-card"></i> <strong>Forma de Pago</strong></h3>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-12">--}}
                                                {{--<div class="formas_pago">--}}
                                                    {{--<label for="contra_entrega_efectivo"><i class="fa fa-money tipo_verde fa-3x"></i><br>Contra Entrega Efectivo--}}
                                                        {{--<input type="radio" name="fruits" id="contra_entrega_efectivo">--}}
                                                    {{--</label>--}}

                                                    {{--<label for="contra_entrega_credito_debito"><i class="fa fa-cc-visa tipo_visa fa-3x"></i> <i class="fa fa-cc-mastercard tipo_mastercard fa-3x"></i> <i class="fa fa-cc-amex tipo_amex fa-3x"></i><br> Contra Entrega Tarjeta de Crédito / Débito--}}
                                                        {{--<input type="radio" name="fruits" id="contra_entrega_credito_debito">--}}
                                                    {{--</label>--}}

                                                    {{--<label for="deposito_transferencia"><i class="fa fa-laptop fa-3x"></i><br>Depósito o Transferencia Bancaria--}}
                                                        {{--<input type="radio" name="fruits" id="deposito_transferencia">--}}
                                                    {{--</label>--}}

                                                    {{--<label for="paypal"><i class="fa fa-cc-paypal tipo_paypal fa-3x"></i><br>PayPal--}}
                                                        {{--<input type="radio" name="fruits" id="paypal" checked>--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</article>--}}
                            </div>

                        </div>

                    </article>
                </div>


            </div>
        </div>
    </section>
    @endsection
    @section('footjs')
    <script type="text/javascript">

    </script>
@endsection
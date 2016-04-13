@extends('front')
@section('content')
<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    <h1><i class="fa fa-check"></i> PAGO SEGURO</h1>
                    <div class="box-border block-form">
                        <div class="row">
                            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="box-border block-form">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills  nav-justified">
                                        <li class="active"><a href="#carrito_entrega" data-toggle="tab"><i class="fa fa-truck"></i>Entrega</a></li>
                                        <li><a href="#carrito_facturacion" data-toggle="tab"><i class="fa fa-file-text"></i>Facturación</a></li>
                                        <li><a href="#carrito_resumen" data-toggle="tab"><i class="fa fa-shopping-cart"></i>Resumen</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="carrito_entrega">
                                            <div class="row">
                                                <h3 class="col-md-12">Entregar a:</h3>
                                                <p class="col-md-6">* Nombre: <input type="text" value="@if(Auth::check()){{ Auth::user()->name }}@endif" class="form-control"></p>
                                                <p class="col-md-6">* E-mail: <input type="text" value="@if(Auth::check()){{ Auth::user()->email }}@endif" class="form-control"></p>
                                                <p class="col-md-6">* Teléfono: <input type="text" value="@if(Auth::check()){{ $udtl->phone }}@endif" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <h3 class="col-md-12">Domicilio de Entrega</h3>
                                                <p class="col-md-3">* C.P. <input type="text" value="@if(Auth::check()){{ $udtl->ship_cp }}@endif" id="geocomplete2" name="ship_cp" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-md-6">* Calle: <input type="text" value="@if(Auth::check()){{ $udtl->ship_street }}@endif" name="bill_street" class="form-control"></p>
                                                <p class="col-md-3">* No. Ext: <input type="text" value="@if(Auth::check()){{ $udtl->ship_noext }}@endif" name="bill_noext" class="form-control"></p>
                                                <p class="col-md-3">No. Int: <input type="text" value="@if(Auth::check()){{ $udtl->ship_noint }}@endif" name="bill_noint" class="form-control"></p>
                                                <p class="col-md-4">* Colonia: <input type="text" value="@if(Auth::check()){{ $udtl->ship_colony }}@endif" id="ship_colony" class="form-control"></p>
                                                <p class="col-md-4">* Delegación / Municipio: <input type="text" value="@if(Auth::check()){{ $udtl->ship_muncipility }}@endif"id="ship_muncipility" name="ship_muncipility" class="form-control"></p>
                                                <p class="col-md-4">* Estado: <input type="text" value="@if(Auth::check()){{ $udtl->ship_state }}@endif" name="ship_state" id="ship_state" required="required" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-md-12">Por favor señala tu ubicación exacta</p>
                                                <div class="col-md-12">
                                                    <div id="mapa_usuario" style="width: 100%; height: 400px;"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <br>
                                                <p class="col-md-12">Referencias: <textarea class="form-control"></textarea></p>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn_azul">Siguiente <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                        <div class="tab-pane" id="carrito_facturacion">
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="radio">
                                                        <label><input type="radio" name="optradio" checked>No requiero factura</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="optradio">Solicitar factura</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h3 class="col-md-12">R.F.C.</h3>
                                                <p class="col-md-8">* Nombre o Razón Social: <input type="text" value="@if(Auth::check()){{ $udtl->bill_name }}@endif" class="form-control"></p>
                                                <p class="col-md-4">*R.F.C. <input type="text" value="@if(Auth::check()){{ $udtl->bill_rfc }}@endif" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <h3 class="col-md-12">Domicilio de Facturación</h3>
                                                <p class="col-md-3">* C.P. <input type="text" value="@if(Auth::check()){{ $udtl->bill_cp }}@endif" name="bill_cp" id="geocomplete" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-md-6">* Calle: <input type="text" value="@if(Auth::check()){{ $udtl->bill_street }}@endif" class="form-control"></p>
                                                <p class="col-md-3">* No. Ext: <input type="text" value="@if(Auth::check()){{ $udtl->bill_noext }}@endif" class="form-control"></p>
                                                <p class="col-md-3">No. Int: <input type="text" value="@if(Auth::check()){{ $udtl->bill_noint }}@endif" class="form-control"></p>
                                                <p class="col-md-4">* Colonia: <input type="text" value="@if(Auth::check()){{ $udtl->bill_colony }}@endif" name="bill_colony" id="bill_colony" class="form-control"></p>
                                                <p class="col-md-4">* Delegación / Municipio: <input type="text" value="@if(Auth::check()){{ $udtl->bill_muncipility }}@endif" id="bill_muncipility" name="bill_muncipility" class="form-control"></p>
                                                <p class="col-md-4">* Estado: <input type="text" value="@if(Auth::check()){{ $udtl->bill_state }}@endif" name="bill_state" id="bill_state" required="required" class="form-control"></p>
                                            </div>

                                            <hr>

                                            <button type="submit" class="btn btn_azul"><i class="fa fa-chevron-left"></i> Atrás</button>
                                            <button type="submit" class="btn btn_azul">Siguiente <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                        <div class="tab-pane" id="carrito_resumen">
                                            <h3>Resumen de mi Carrito</h3>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="cart-table table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="card_product_quantity">Cantidad</th>
                                                                    <th class="card_product_image">Imagen</th>
                                                                    <th class="card_product_name">Producto</th>
                                                                    <th class="card_product_total">Total</th>
                                                                    <th class="card_product_total">Eliminar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach(LaraCart::getItems() as $key => $item)
                                                                <tr>
                                                                    <td class="card_product_quantity" data-th="Cantidad"><input type="number" min="1" id="CartItem_{{ $item->id }}" style="width:50px;" onchange="UpdateMinicart('{{ $item->itemHash }} ',{{ $item->id }})" value="{{ $item->qty }}" class="styler">
                                                                        &nbsp;
                                                                        &nbsp;<a href="#"><i class="icon-trash icon-large"></i> </a>
                                                                    </td>
                                                                    <td class="card_product_image" data-th="Imagen"><a href="#"><img title="{{ $item->name }}" alt="{{ $item->name }}" src="{{ asset('public/images/product/'.$item->image) }}"></a></td>
                                                                    <td class="card_product_name" data-th="Producto"><a href="#">{{ $item->name }}<strong>{{ $item->code }}</strong></a></td>
                                                                    <td class="card_product_total" data-th="Total">${{ number_format(($item->price*$item->qty),2) }}</td>
                                                                    <td data-th="Eliminar"><a href="#"><i class="fa fa-trash"></i></a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </article>
                            <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="block-form block-order-total box-border" data-wow-duration="1s">
                                    <h3 class="color_precio"><i class="fa fa-dollar"></i>Total: <strong>{{ LaraCart::total($formatted = false, $withDiscount = true) }}</strong></h3>
                                    <p>*El costo de envío se notificará vía email</p>
                                    <br>
                                    <a href="{{ url('pay') }}" class="btn btn-lg btn_verde center-block"><i class="fa fa-check"></i> PAGO SEGURO</a>
                                    <hr>
                                    <h3 class="text-center"><i class="fa fa-credit-card"></i> <strong>Forma de Pago</strong></h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="formas_pago">
                                                <label for="contra_entrega_efectivo"><i class="fa fa-money tipo_verde fa-3x"></i><br>Contra Entrega Efectivo
                                                    <input type="radio" name="fruits" id="contra_entrega_efectivo">
                                                </label>

                                                <label for="contra_entrega_credito_debito"><i class="fa fa-cc-visa tipo_visa fa-3x"></i> <i class="fa fa-cc-mastercard tipo_mastercard fa-3x"></i> <i class="fa fa-cc-amex tipo_amex fa-3x"></i><br> Contra Entrega Tarjeta de Crédito / Débito
                                                    <input type="radio" name="fruits" id="contra_entrega_credito_debito">
                                                </label>

                                                <label for="deposito_transferencia"><i class="fa fa-laptop fa-3x"></i><br>Depósito o Transferencia Bancaria
                                                    <input type="radio" name="fruits" id="deposito_transferencia">
                                                </label>

                                                <label for="paypal"><i class="fa fa-cc-paypal tipo_paypal fa-3x"></i><br>PayPal
                                                    <input type="radio" name="fruits" id="paypal" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>

                    </div>

                </article>
            </div>


        </div>  
    </div>
</section>
@endsection


@section('footjs')

<!-- Google Map -->
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script type="text/javascript" src="{{ asset('resources/assets/front/js/locationpicker.jquery.min.js') }}"></script>
<script type="text/javascript">
    $('#mapa_usuario').locationpicker({
        location: {latitude: 19.33800842950329, longitude: - 99.20590474856567},
        locationName: "",
        radius: 500,
        zoom: 15,
        scrollwheel: true,
        inputBinding: {
        latitudeInput: null,
        longitudeInput: null,
        radiusInput: null,
        locationNameInput: null
        },
        enableAutocomplete: false,
        enableReverseGeocode: true,
        streetViewControl: true
    });


</script>
@endsection
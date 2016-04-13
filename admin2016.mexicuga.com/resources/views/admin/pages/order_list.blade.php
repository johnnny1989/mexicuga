@extends('admin')
@section('content')

        <!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Mexicuga :: Orders</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>BARRA DE ESTADO</b></h4>


            <div class="table-responsive">
                <table id="demo-foo-row-toggler" class="table toggle-circle table-hover" data-page-size="50">
                    <thead>
                    <tr>
                        <th><i class="fa fa-calendar text-muted"></i> Date</th>
                        <th><i class="fa fa-user text-muted"></i> User</th>
                        <th><i class="fa fa-envelope text-muted"></i> E-mail</th>
                        <th><i class="fa fa-usd text-muted"></i> Total</th>
                        <th><i class="fa fa-check-square-o text-muted"></i> Confirm</th>
                        <th><i class="fa fa-truck text-muted"></i> on the <br>road</th>
                        <th><i class="fa fa-smile-o text-muted"></i> deliverd</th>
                        <th><i class="fa fa-smile-o text-muted"></i> Action</th>
                        <th data-hide="all"><!--no borrar th por que es el que ayuda a mostrar la descripción del pedido--></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $o)
                        <tr>
                            <td><?php  $date=explode(" ",$o->created_at); ?> {{ $date[0] }}</td>
                            <td>
                                <?php
                                   $user=DB::table("users")->whereId($o->user_id)->get();
                                    echo $user[0]->name;
                                 ?>
                            </td>
                            <td><a href="{{ $user[0]->email }}">{{ $user[0]->email }}</a></td>
                            <td>$ {{ $o->amount }}</td>
                            <td>
                                <div class="checkbox checkbox-success checkbox-circle">
                                    @if($o->status >= 1)
                                        <input id="checkboxz-10" type="checkbox" checked disabled>
                                    @else
                                        <input id="checkboxz-10" type="checkbox" onclick="ChangeStatusOrder('/admin/confirm_order/','{{ $o->order_id }}')">
                                    @endif
                                    <label for="checkboxz-10">
                                        <a href="" title="Notificar vía e-mail"></a>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success checkbox-circle">
                                    @if($o->status >= 2)
                                        <input id="checkboxz-11" type="checkbox" checked disabled>
                                    @else
                                        <input id="checkboxz-11" type="checkbox" onclick="ChangeStatusOrder('/admin/on_the_road/','{{ $o->order_id }}')">
                                    @endif
                                    <label for="checkboxz-11">
                                        <a href="" title="Notificar vía e-mail"></a>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success checkbox-circle">
                                    @if($o->status >= 3)
                                        <input id="checkboxz-12" type="checkbox" checked disabled>
                                    @else
                                        <input id="checkboxz-12" type="checkbox" onclick="ChangeStatusOrder('/admin/delivered_order/','{{ $o->order_id }}')">
                                    @endif
                                    <label for="checkboxz-12">
                                        <a href="" title="Notificar vía e-mail"></a>
                                    </label>
                                </div>
                            </td>
                            <td>
                                @if($o->status == 4)
                                    <a href="#" title="cancel order"><input type="button" class="btn btn-danger btn-xs" value="Canceled"></a>
                                @else
                                    <a href="{{ url('/admin/cancel_order')."/".$o->order_id }}" title="Cancel order"><input type="button" class="btn btn-danger btn-xs" value="Cancel"></a>
                                @endif
                            </td>
                            <td>
                                <table class="table">
                                    <tr><td colspan="5"><div id="mapa_usuario_order{{ $o->order_id }}" style="width: 650px; height: 300px;"></div></td></tr>
                                    <tr ><td colspan="5"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Payment Type : {{ $o->payment_type }}</font></td></tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <p><b>Billing Address</b></p>
                                            <p>Bill name : {{ $o->bill_name }}</p>
                                            <p>Bill rfc : {{ $o->bill_rfc }}</p>
                                            <p>Bill cp : {{ $o->bill_cp }}</p>
                                            <p>Bill street : {{ $o->bill_street }}</p>
                                            <p>Bill noext : {{ $o->bill_noext }}</p>
                                            <p>Bill noint : {{ $o->bill_noint }}</p>
                                            <p>Bill colony : {{ $o->bill_colony }}</p>
                                            <p>Bill muncipility : {{ $o->bill_muncipility }}</p>
                                            <p>Bill muncipility : {{ $o->bill_muncipility }}</p>
                                            <p>Bill state : {{ $o->bill_state }}</p>
                                            <p>Bill country : {{ $o->bill_country }}</p>
                                        </td>
                                        <td colspan="2" style="text-align: right;">
                                            <p><b>Shipping Address</b></p>
                                            <p>ship cp :    {{ $o->ship_cp }}</p>
                                            <p>ship street :{{ $o->ship_street }}</p>
                                            <p>ship noext : {{ $o->ship_noext }}</p>
                                            <p>ship noint : {{ $o->ship_noint }}</p>
                                            <p>ship colony :{{ $o->ship_colony }}</p>
                                            <p>ship muncipility : {{ $o->ship_muncipility }}</p>
                                            <p>ship muncipility : {{ $o->ship_muncipility }}</p>
                                            <p>ship state : {{ $o->ship_state }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Cantidad</strong></font></td>
                                        <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Imagen</strong></font></td>
                                        <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Producto</strong></font></td>
                                        <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Qty</strong></font></td>
                                        <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Precio</strong></font></td>
                                    </tr>
                                    <?php
                                      $cart = DB::table("cart")->whereOrder_id($o->order_id)->get();
                                      $kram=1;
                                    ?>

                                    @foreach($cart as $c)
                                        <tr bgcolor="#efefef">
                                            <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">{{ $kram }}</font></td>
                                            <td><img src="http://www.2016.mexicuga.com/public/images/product/{{ $c->image }}" width="40" height="40" /></td>
                                            <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>{{ $c->code }}</strong> {{ $c->name }}</font></td>
                                            <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>{{ $c->qty }}</strong></font></td>
                                            <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">${{ $c->price }}</font></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Shipping Charge</font></td>
                                        <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ {{ $o->shipping_charge }}</font></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right"><font face="Verdana, Geneva, sans-serif" color="#1460ab" size="-1"><strong>Total</strong></font></td>
                                        <td align="right"><font face="Verdana, Geneva, sans-serif" color="#1460ab" size="-1"><strong>$ {{ $o->amount }}</strong></font></td>
                                    </tr>
                                    <tr><td colspan="4"><hr /></td></tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="text-left">
                                <ul class="pagination pagination-split m-t-30"></ul>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

@section('footjs')
    @foreach($orders as $o)
        <script>
            $('#mapa_usuario_order{{ $o->order_id }}').locationpicker({
                location: {latitude: '{{ $o->latitude }}', longitude: '{{ $o->longitude }}'},
                locationName: "",
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
    @endforeach
    <script>
        function ChangeStatusOrder(path,orderid)
        {
            var URL =path+orderid;
            $.ajax({
                type: "GET",
                url: URL,
                success: function(data) {
                    //alert('it worked');
                },
                error: function() {
                    //alert('it broke');
                },
                complete: function() {
                    //alert('it completed');
                }
            });
        }
    </script>
@endsection
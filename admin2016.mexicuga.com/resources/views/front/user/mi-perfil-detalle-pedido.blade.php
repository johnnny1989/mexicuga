@extends('front')
@section('content')
<section class="top_margin_container">
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    <h1>Mi Perfil</h1>

                    <div class="box-border block-form">
                        <div class="row">
                            <div> 
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#mi_perfil" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Mi Perfil</a></li>
                                    <li role="presentation"><a href="#contrasena" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-lock"></i> Contraseña</a></li>
                                    <li role="presentation"><a href="#info_facturacion" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-file-text"></i> Datos de Facturación</a></li>
                                    <li role="presentation"><a href="#domicilio_entrega" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-truck"></i> Domicilio de Entrega</a></li>
                                    <li role="presentation" class="active"><a href="#mis_pedidos" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Mis Pedidos</a></li>
                                    <li role="presentation"><a href="#mis_compras" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-check"></i> Mis Compras</a></li>
                                    <li role="presentation"><a href="#mis_mexipuntos" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-circle"></i> Mis MexiPuntos</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="mi_perfil">
                                        <div class="row">
                                            @if(Session::has( 'message' ))
                                            <div class="row">
                                                <div class="col-md-12 alert alert-success">
                                                    {{ Session::get( 'message' ) }}
                                                </div>
                                            </div>
                                            @endif

                                            <form class="form-horizontal" id="UpdateProfile" role="form" method="POST" action="{{ url('/mi-perfil') }}">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 alert alert-success" id="alertprofile" style="display: none;"></div>
                                                <h3 class="col-md-12">Datos Personales</h3>
                                                <p class="col-md-4">Primer nombre: <input type="text" value="{{ Auth::user()->name }}" name="fname" class="form-control"></p>
                                                <p class="col-md-4">Apellido paterno: <input type="text" value="{{ $udtl->lastname }}" name="lname" class="form-control"></p>
                                                <p class="col-md-4">Apellido materno: <input type="text" value="{{ $udtl->maternalname }}" name="maternalname" class="form-control"></p>
                                                <h3 class="col-md-12">Datos de Contacto</h3>
                                                <p class="col-md-4"><i class="fa fa-phone"></i> Teléfono: <input type="text" value="{{ $udtl->phone }}" name="phone" class="form-control"></p>
                                                <p class="col-md-4"><i class="fa fa-phone"></i> Teléfono Móvil: <input type="text"  value="{{ $udtl->mobile }}" name="mobile" class="form-control"></p>
                                                <!-- <p class="col-md-4"><i class="fa fa-phone"></i> Nextel: <input type="text" class="form-control"></p> -->
                                                <p class="col-md-4"><i class="fa fa-building"></i> Empresa: <input type="text" value="{{ $udtl->company }}" name="company" class="form-control"></p>
                                                <p class="col-md-4"><i class="fa fa-link"></i> Página Web: <input type="text" value="{{ $udtl->webpage }}" name="webpage" class="form-control"></p>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-floppy-o"></i> Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="contrasena">
                                        <div class="row">
                                            <form class="form-horizontal" id="UpdatePassword" role="form" method="POST" action="{{ url('/mi-perfil-password') }}">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 alert alert-success" id="alertprofilepass" style="display: none;"></div>

                                                <h3 class="col-md-12">Cambiar contraseña</h3>
                                                <p class="col-md-4">* Contraseña actual: <input type="password" name="oldpassword" class="form-control"></p>
                                                <p class="col-md-4">* Contraseña nueva: <input type="password" name="password" class="form-control"></p>
                                                <p class="col-md-4">* Confirmar Contraseña: <input type="password" name="password_confirmation" class="form-control"></p>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12">
                                                    <button type="reset" id="resetpasses" style="display: none;"></button>
                                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-floppy-o"></i> Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="info_facturacion">
                                        <form class="form-horizontal" id="UpdateBilling" role="form" method="POST" action="{{ url('/mi-perfil-billing-info') }}">
                                            {!! csrf_field() !!}
                                            <div class="col-md-12 alert alert-success" id="alertbilling" style="display: none;"></div>
                                            <div class="row">
                                                <h3 class="col-md-12">R.F.C.</h3>
                                                <p class="col-md-6">* Nombre o Razón Social: <input type="text" value="{{ $udtl->bill_name }}" name="bill_name" class="form-control"></p>
                                                <p class="col-md-3">* R.F.C. <input type="text" maxlength="13" value="{{ $udtl->bill_rfc }}" name="bill_rfc" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <h3 class="col-md-12">Domicilio de Facturación</h3>
                                                <p class="col-md-3">* C.P. <input type="text" value="{{ $udtl->bill_cp }}" name="bill_cp" id="geocomplete" maxlength="5" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-md-6">* Calle: <input type="text" value="{{ $udtl->bill_street }}" name="bill_street" class="form-control"></p>
                                                <p class="col-md-3">* No. Ext: <input type="text" value="{{ $udtl->bill_noext }}" name="bill_noext" class="form-control"></p>
                                                <p class="col-md-3">No. Int: <input type="text" value="{{ $udtl->bill_noint }}" name="bill_noint" class="form-control"></p>
                                                <p class="col-md-4">* Colonia: <input type="text" value="{{ $udtl->bill_colony }}" name="bill_colony" id="bill_colony" class="form-control"></p>
                                                <p class="col-md-4">* Delegación / Municipio: <input type="text" value="{{ $udtl->bill_muncipility }}" id="bill_muncipility" name="bill_muncipility" class="form-control"></p>
                                                <p class="col-md-4">* Estado: <input type="text" value="{{ $udtl->bill_state }}" name="bill_state" id="bill_state" class="form-control"></p>
                                                <p class="col-md-4">* País: <input type="text" value="{{ $udtl->bill_country }}" name="bill_country" id="bill_country" class="form-control"></p>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-floppy-o"></i> Guardar</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="domicilio_entrega">
                                        <form class="form-horizontal" id="UpdateShipping" role="form" method="POST" action="{{ url('/mi-perfil-shipping-info') }}">
                                            {!! csrf_field() !!}
                                            <div class="col-md-12 alert alert-success" id="alertshipping" style="display: none;"></div>
                                            <div class="row">
                                                <h3 class="col-md-12">Entregar en:</h3>
                                                <p class="col-md-3">* C.P. <input type="text" value="{{ $udtl->ship_cp }}"  id="geocomplete2" name="ship_cp" maxlength="5" class="form-control"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-md-6">* Calle: <input type="text" value="{{ $udtl->ship_street }}" name="ship_street" class="form-control"></p>
                                                <p class="col-md-3">* No. Ext: <input type="text" value="{{ $udtl->ship_noext }}" name="ship_noext" class="form-control"></p>
                                                <p class="col-md-3">No. Int: <input type="text" value="{{ $udtl->ship_noint }}" name="ship_noint" class="form-control"></p>
                                                <p class="col-md-4">* Colonia: <input type="text" value="{{ $udtl->ship_colony }}" name="ship_colony" id="ship_colony" class="form-control"></p>
                                                <p class="col-md-4">* Delegación / Municipio: <input type="text" value="{{ $udtl->ship_muncipility }}" id="ship_muncipility" name="ship_muncipility" class="form-control"></p>
                                                <p class="col-md-4">* Estado: <input type="text" value="{{ $udtl->ship_state }}" name="ship_state" id="ship_state" class="form-control"></p>
                                                <p class="col-md-4">* País: <input type="text" value="{{ $udtl->ship_country }}" name="ship_country" id="ship_country" class="form-control"></p>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-lg btn_verde"><i class="fa fa-floppy-o"></i> Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="mis_pedidos">
                                        <div class="row">
                                            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <h3>Mis Pedidos</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Pedido No.</th>
                                                                <th>Fecha</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>#758</td>
                                                                <td>3/feb/2014</td>
                                                                <td>$ 6,450.00</td>
                                                                <td><span class="label status_nuevo"><i class="fa fa-plus"></i> Nuevo</span></td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-pedido') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#757</td>
                                                                <td>28/ene/2014</td>
                                                                <td>$ 980.00</td>
                                                                <td><span class="label status_nuevo"><i class="fa fa-plus"></i> Nuevo</span></td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-pedido') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#756</td>
                                                                <td>25/ene/2014</td>
                                                                <td>$ 12,520.00</td>
                                                                <td><span class="label status_en_ruta"><i class="fa fa-truck"></i> En Ruta</span></td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-pedido') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#755</td>
                                                                <td>22/ene/2014</td>
                                                                <td>$ 3,650.00</td>
                                                                <td><span class="label status_en_ruta"><i class="fa fa-truck"></i> En Ruta</span></td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-pedido') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="mis_compras">
                                        <div class="row">
                                            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <h3>Mis Compras</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Pedido No.</th>
                                                                <th>Fecha</th>
                                                                <th>Total</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>#758</td>
                                                                <td>3/feb/2014</td>
                                                                <td>$ 6,450.00</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-compras') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#757</td>
                                                                <td>28/ene/2014</td>
                                                                <td>$ 980.00</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-compras') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#756</td>
                                                                <td>25/ene/2014</td>
                                                                <td>$ 12,520.00</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-compras') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#755</td>
                                                                <td>22/ene/2014</td>
                                                                <td>$ 3,650.00</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-compras') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="mis_mexipuntos">
                                        <div class="row">
                                            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <h3>Mis MexiPuntos (1233)</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Pedido No.</th>
                                                                <th>Fecha</th>
                                                                <th>Total</th>
                                                                <th>MexiPuntos</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>#758</td>
                                                                <td>3/feb/2014</td>
                                                                <td>$ 6,450.00</td>
                                                                <td>645</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-mexipuntos') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#757</td>
                                                                <td>28/ene/2014</td>
                                                                <td>$ 980.00</td>
                                                                <td>98</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-mexipuntos') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#756</td>
                                                                <td>25/ene/2014</td>
                                                                <td>$ 12,520.00</td>
                                                                <td>125</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-mexipuntos') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#755</td>
                                                                <td>22/ene/2014</td>
                                                                <td>$ 3,650.00</td>
                                                                <td>365</td>
                                                                <td class="text-right"><a class="btn btn-mini" href="{{ url('mi-perfil-detalle-mexipuntos') }}"><i class="fa fa-search"></i> Ver Detalle</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">&nbsp;</td>
                                                                <td><span class="tipo_precio">$ 13,933</span></td>
                                                                <td><span class="tipo_precio">1333</span></td>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>  
    </div>
</section>
@endsection
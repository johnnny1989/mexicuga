@extends('admin')
@section('content')

<!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="page-title">Mexicuga :: Dashboard</h1>
                                <p class="text-muted page-title-alt">Hola <strong>{{ Auth::user()->name }}</strong>, hoy es 29 enero 2016</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <a href="{{ url('admin/comentarios_view') }}">
                                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                                        <div class="bg-icon bg-icon-danger pull-left">
                                            <i class="fa fa-comment text-danger"></i>
                                        </div>
                                        <div class="text-right">
                                            <h3 class="text-dark"><b class="counter">23</b></h3>
                                            <p class="text-muted">Comentarios</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <a href="{{ url('admin/banners_view') }}">
                                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                                        <div class="bg-icon bg-icon-purple pull-left">
                                            <i class="fa fa-picture-o text-purple"></i>
                                        </div>
                                        <div class="text-right">
                                            <h3 class="text-dark"><b>Subir</b></h3>
                                            <p class="text-muted">Banner</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <a href="productos_add.html">
                                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                                        <div class="bg-icon bg-icon-custom pull-left">
                                            <i class="fa fa-upload text-success"></i>
                                        </div>
                                        <div class="text-right">
                                            <h3 class="text-dark"><b>Subir</b></h3>
                                            <p class="text-muted">Producto</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-lg-9">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>STATUS DE PEDIDOS / 1-ene-2016 al 29-ene-2016</b></h4>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group range">
                                                <input type="text" name="starts" id="range" class="form-control" value="01-01-2016 / 29-01-2016">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="list-inline chart-detail-list text-center">
                                        <li><h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa"></i>Ventas</h5></li>
                                        <li><h5><i class="fa fa-circle m-r-5" style="color: #F18A02"></i>En Ruta</h5></li>
                                        <li><h5><i class="fa fa-circle m-r-5" style="color: #fe0000"></i>Cancelados</h5></li>
                                        <li><h5><i class="fa fa-circle m-r-5" style="color: #5D9CEC"></i>MexiPuntos (Pendiente de Entregar)</h5></li>
                                    </ul>
                                    <canvas id="doughnut" height="260"></canvas>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>BARRA DE ESTADO</b></h4>


                                    <div class="table-responsive">
                                        <table id="demo-foo-row-toggler" class="table toggle-circle table-hover" data-page-size="50">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-calendar text-muted"></i> Fecha del Pedido</th>
                                                    <th><i class="fa fa-hashtag text-muted"></i> Pedido</th>
                                                    <th><i class="fa fa-user text-muted"></i> Cliente</th>
                                                    <th><i class="fa fa-envelope text-muted"></i> E-mail</th>
                                                    <th><i class="fa fa-usd text-muted"></i> Total</th>
                                                    <th><i class="fa fa-check-square-o text-muted"></i> PAGO CONFIRMADO</th>
                                                    <th><i class="fa fa-truck text-muted"></i> PEDIDO EN RUTA</th>
                                                    <th><i class="fa fa-smile-o text-muted"></i> ENTREGADOS</th>
                                                    <th data-hide="all"><!--no borrar th por que es el que ayuda a mostrar la descripción del pedido--></th>
                                                    <th data-hide="all">Acciones</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>4-ene-2016</td>
                                                    <td>750</td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">email@dominio.com</a></td>
                                                    <td>$ 8,500.00</td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-10" type="checkbox">
                                                            <label for="checkbox-10">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-11" type="checkbox">
                                                            <label for="checkbox-11">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-12" type="checkbox">
                                                            <label for="checkbox-12">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <div id="mapa_usuario" style="width: 650px; height: 300px;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Datos de Facturación</strong>
                                                                    <br>
                                                                    Razón Social: EMPRESA REGISTRADA EN MEXICO SA DE CV
                                                                    <br> 
                                                                    R.F.C: EMM890939IJ8
                                                                </td>
                                                                <td>
                                                                    <strong>Datos de Envío</strong>
                                                                    <br>
                                                                    Dirección: Calle número 1 Colonia Nuevo México Del. Tlalpan México D.F. C.P. 01800
                                                                    <br>
                                                                    Entrega en: $X días
                                                                </td>
                                                                <td>
                                                                    <strong>Forma de Pago</strong>
                                                                    <br>
                                                                    Contra Entrega Efectivo
                                                                    <br>
                                                                    <strong>Teléfono</strong>
                                                                    <br>
                                                                    5487-5487
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><a href="" title="Ver Detalle"><i class="fa fa-search"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>4-ene-2016</td>
                                                    <td>751</td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">email@dominio.com</a></td>
                                                    <td>$ 8,500.00</td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-13" type="checkbox">
                                                            <label for="checkbox-13">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-14" type="checkbox">
                                                            <label for="checkbox-14">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-15" type="checkbox">
                                                            <label for="checkbox-15">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <div id="mapa_usuario2" style="width: 650px; height: 300px;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Datos de Facturación</strong>
                                                                    <br>
                                                                    Razón Social: EMPRESA REGISTRADA EN MEXICO SA DE CV
                                                                    <br> 
                                                                    R.F.C: EMM890939IJ8
                                                                </td>
                                                                <td>
                                                                    <strong>Datos de Envío</strong>
                                                                    <br>
                                                                    Dirección: Calle número 1 Colonia Nuevo México Del. Tlalpan México D.F. C.P. 01800
                                                                    <br>
                                                                    Entrega en: $X días
                                                                </td>
                                                                <td>
                                                                    <strong>Forma de Pago</strong>
                                                                    <br>
                                                                    Contra Entrega TDC / TDD
                                                                    <br>
                                                                    <strong>Teléfono</strong>
                                                                    <br>
                                                                    5487-5487
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><a href="" title="Ver Detalle"><i class="fa fa-search"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>4-ene-2016</td>
                                                    <td>752</td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">email@dominio.com</a></td>
                                                    <td>$ 8,500.00</td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-16" type="checkbox">
                                                            <label for="checkbox-16">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-16" type="checkbox">
                                                            <label for="checkbox-16">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-17" type="checkbox">
                                                            <label for="checkbox-17">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <div id="mapa_usuario3" style="width: 650px; height: 300px;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Datos de Facturación</strong>
                                                                    <br>
                                                                    Razón Social: EMPRESA REGISTRADA EN MEXICO SA DE CV
                                                                    <br> 
                                                                    R.F.C: EMM890939IJ8
                                                                </td>
                                                                <td>
                                                                    <strong>Datos de Envío</strong>
                                                                    <br>
                                                                    Dirección: Calle número 1 Colonia Nuevo México Del. Tlalpan México D.F. C.P. 01800
                                                                    <br>
                                                                    Entrega en: $X días
                                                                </td>
                                                                <td>
                                                                    <strong>Forma de Pago</strong>
                                                                    <br>
                                                                    PayPal
                                                                    <br>
                                                                    <strong>Teléfono</strong>
                                                                    <br>
                                                                    5487-5487
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><a href="" title="Ver Detalle"><i class="fa fa-search"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>4-ene-2016</td>
                                                    <td>753</td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">email@dominio.com</a></td>
                                                    <td>$ 8,500.00</td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-18" type="checkbox">
                                                            <label for="checkbox-18">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-19" type="checkbox">
                                                            <label for="checkbox-19">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-20" type="checkbox">
                                                            <label for="checkbox-20">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <div id="mapa_usuario4" style="width: 650px; height: 300px;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Datos de Facturación</strong>
                                                                    <br>
                                                                    Razón Social: EMPRESA REGISTRADA EN MEXICO SA DE CV
                                                                    <br> 
                                                                    R.F.C: EMM890939IJ8
                                                                </td>
                                                                <td>
                                                                    <strong>Datos de Envío</strong>
                                                                    <br>
                                                                    Dirección: Calle número 1 Colonia Nuevo México Del. Tlalpan México D.F. C.P. 01800
                                                                    <br>
                                                                    Entrega en: $X días
                                                                </td>
                                                                <td>
                                                                    <strong>Forma de Pago</strong>
                                                                    <br>
                                                                    Transferencia Bancaria / Depósito
                                                                    <br>
                                                                    <strong>Teléfono</strong>
                                                                    <br>
                                                                    5487-5487
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><a href="" title="Ver Detalle"><i class="fa fa-search"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>4-ene-2016</td>
                                                    <td>754</td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">email@dominio.com</a></td>
                                                    <td>$ 8,500.00</td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-21" type="checkbox">
                                                            <label for="checkbox-21">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-22" type="checkbox">
                                                            <label for="checkbox-22">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-23" type="checkbox">
                                                            <label for="checkbox-23">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <div id="mapa_usuario5" style="width: 650px; height: 300px;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Datos de Facturación</strong>
                                                                    <br>
                                                                    Razón Social: EMPRESA REGISTRADA EN MEXICO SA DE CV
                                                                    <br> 
                                                                    R.F.C: EMM890939IJ8
                                                                </td>
                                                                <td>
                                                                    <strong>Datos de Envío</strong>
                                                                    <br>
                                                                    Dirección: Calle número 1 Colonia Nuevo México Del. Tlalpan México D.F. C.P. 01800
                                                                    <br>
                                                                    Entrega en: $X días
                                                                </td>
                                                                <td>
                                                                    <strong>Forma de Pago</strong>
                                                                    <br>
                                                                    Transferencia Bancaria / Depósito
                                                                    <br>
                                                                    <strong>Teléfono</strong>
                                                                    <br>
                                                                    5487-5487
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><a href="" title="Ver Detalle"><i class="fa fa-search"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>4-ene-2016</td>
                                                    <td>755</td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">email@dominio.com</a></td>
                                                    <td>$ 8,500.00</td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-24" type="checkbox">
                                                            <label for="checkbox-24">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-25" type="checkbox">
                                                            <label for="checkbox-25">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                            <input id="checkbox-26" type="checkbox">
                                                            <label for="checkbox-26">
                                                                <a href="" title="Notificar vía e-mail"><i class="fa fa-envelope fa-2x"></i></a>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <div id="mapa_usuario6" style="width: 650px; height: 300px;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Datos de Facturación</strong>
                                                                    <br>
                                                                    Razón Social: EMPRESA REGISTRADA EN MEXICO SA DE CV
                                                                    <br> 
                                                                    R.F.C: EMM890939IJ8
                                                                </td>
                                                                <td>
                                                                    <strong>Datos de Envío</strong>
                                                                    <br>
                                                                    Dirección: Calle número 1 Colonia Nuevo México Del. Tlalpan México D.F. C.P. 01800
                                                                    <br>
                                                                    Entrega en: $X días
                                                                </td>
                                                                <td>
                                                                    <strong>Forma de Pago</strong>
                                                                    <br>
                                                                    PayPal
                                                                    <br>
                                                                    <strong>Teléfono</strong>
                                                                    <br>
                                                                    5487-5487
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><a href="" title="Ver Detalle"><i class="fa fa-search"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                                                </tr>
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



                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <!--<a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">View All</a> -->
                                    <h4 class="text-dark header-title m-t-0">TOP 5 CLICKS.</h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Conoce cuales son los productos más clickeados
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Clicks</th>
                                                    <th style="min-width: 80px;">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                                    <td><span class="text-custom">230</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/samsung.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Samsung Phone </td>
                                                    <td><span class="text-custom">184</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/imac.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                                    <td><span class="text-custom">150</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/macbook.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                                    <td><span class="text-custom">120</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/lumia.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Lumia iPhone </td>
                                                    <td><span class="text-custom">103</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">TOP 5 Solicitados</h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Conoce cuales son los productos más solicitados en los pedidos
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Solicitudes</th>
                                                    <th style="min-width: 80px;">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                                    <td><span class="text-custom">45</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/samsung.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Samsung Phone </td>
                                                    <td><span class="text-custom">32</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/imac.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                                    <td><span class="text-custom">24</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/macbook.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                                    <td><span class="text-custom">20</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{ asset('resources/assets/admin/assets/images/products/lumia.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""> Lumia iPhone </td>
                                                    <td><span class="text-custom">13</span></td>
                                                    <td>
                                                        <a href="{{ url('admin/productos_edit') }}" class="table-action-btn"><i class="md md-edit"></i></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- end col -->



                        </div>
                        <!-- end row -->


                    


@endsection
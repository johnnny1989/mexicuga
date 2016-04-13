@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">REPORTES</h1>
        </div>
    </div>


</div> <!-- container -->


<div class="container">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group range">
                <input type="text" name="starts" id="range" class="form-control" value="01-01-2016 / 29-01-2016">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <select class="form-control" name="kind">
                <option value="">Selecciona el Reporte…</option>
                <option value="" selected="selected">Pedidos</option>
                <option value="">Ventas</option>
                <option value="">Pedidos en Ruta</option>
                <option value="">Pedidos Entregados</option>
                <option value="">Cancelados</option>
                <option value="">MexiPuntos Ventas</option>
                <option value="">MexiPuntos Ventas (entrega pendiente)</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>REPORTE DE PEDIDOS / 1-ene-2016 al 29-ene-2016</b></h4>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Descargar reporte</button>
                    </div>
                </div>
                <br>
                <label class="form-inline">Mostrar
                    <select id="demo-show-entries" class="form-control input-sm">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                    </select>
                    resultados
                </label>
                <br><br>
                <div class="table-responsive">
                    <table id="demo-foo-row-toggler" class="table toggle-circle table-hover" data-page-size="50">
                        <thead>
                            <tr>
                                <th><i class="fa fa-calendar text-muted"></i> Fecha del Pedido</th>
                                <th><i class="fa fa-calendar text-muted"></i> Fecha de Pago</th>
                                <th><i class="fa fa-hashtag text-muted"></i> Pedido</th>
                                <th><i class="fa fa-user text-muted"></i> Cliente</th>
                                <th><i class="fa fa-envelope text-muted"></i> E-mail</th>
                                <th><i class="fa fa-usd text-muted"></i> Total</th>
                                <th data-hide="all"><!--no borrar th por que es el que ayuda a mostrar la descripción del pedido--></th>
                                <th data-hide="all">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>4-ene-2016</td>
                                <td>5-ene-2016</td>
                                <td>750</td>
                                <td>Juan Pérez</td>
                                <td><a href="#">email@dominio.com</a></td>
                                <td>$ 8,500.00</td>
                                <td>
                                    <table class="table">
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
                                                <strong>Datos de Pago</strong>
                                                <br>
                                                Fecha de pago: 5-ene-2015
                                                <br>
                                                Forma de pago: Paypal
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>4-ene-2016</td>
                                <td>5-ene-2016</td>
                                <td>751</td>
                                <td>Juan Pérez</td>
                                <td><a href="#">email@dominio.com</a></td>
                                <td>$ 8,500.00</td>
                                <td>
                                    <table class="table">
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
                                                <strong>Datos de Pago</strong>
                                                <br>
                                                Fecha de pago: 5-ene-2015
                                                <br>
                                                Forma de pago: Paypal
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>4-ene-2016</td>
                                <td>5-ene-2016</td>
                                <td>752</td>
                                <td>Juan Pérez</td>
                                <td><a href="#">email@dominio.com</a></td>
                                <td>$ 8,500.00</td>
                                <td>
                                    <table class="table">
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
                                                <strong>Datos de Pago</strong>
                                                <br>
                                                Fecha de pago: 5-ene-2015
                                                <br>
                                                Forma de pago: Paypal
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>4-ene-2016</td>
                                <td>5-ene-2016</td>
                                <td>753</td>
                                <td>Juan Pérez</td>
                                <td><a href="#">email@dominio.com</a></td>
                                <td>$ 8,500.00</td>
                                <td>
                                    <table class="table">
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
                                                <strong>Datos de Pago</strong>
                                                <br>
                                                Fecha de pago: 5-ene-2015
                                                <br>
                                                Forma de pago: Paypal
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>4-ene-2016</td>
                                <td>5-ene-2016</td>
                                <td>754</td>
                                <td>Juan Pérez</td>
                                <td><a href="#">email@dominio.com</a></td>
                                <td>$ 8,500.00</td>
                                <td>
                                    <table class="table">
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
                                                <strong>Datos de Pago</strong>
                                                <br>
                                                Fecha de pago: 5-ene-2015
                                                <br>
                                                Forma de pago: Paypal
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>4-ene-2016</td>
                                <td>5-ene-2016</td>
                                <td>755</td>
                                <td>Juan Pérez</td>
                                <td><a href="#">email@dominio.com</a></td>
                                <td>$ 8,500.00</td>
                                <td>
                                    <table class="table">
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
                                                <strong>Datos de Pago</strong>
                                                <br>
                                                Fecha de pago: 5-ene-2015
                                                <br>
                                                Forma de pago: Paypal
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
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
</div> <!-- container -->
@endsection
@extends('admin')
@section('content')
<form action="{{ url('admin/departamentos_add') }}">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">Subir a tienda</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin/productos_view') }}"><i class="fa fa-cube"></i> Productos</a>
                </li>
                <li class="active">
                    <i class="fa fa-upload text-muted"></i> Subiendo...
                </li>
            </ol>
        </div>
    </div>
</form>

<!-- Basic Form Wizard -->
<div class="row">
    <div class="col-md-12 alert" id="productmsg" style="display: none;"></div>
    <div class="col-md-12">
        <div class="card-box">
            <form class="form-horizontal" id="productForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/productos_catalogos_edit') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <div>
                    <h3>Tipo</h3>
                    <section>
                        <div class="col-md-6">
                            <h4>Tipo de Producto</h4>
                            <div class="radio radio-success">
                                <input type="radio" name="producttype" id="radio14" value="Mexicuga" checked="">
                                <label for="radio14"> Mexicuga</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="producttype" id="radio19" value="Mexicuga_Familia">
                                <label for="radio19"> Mexicuga Familia</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="producttype" id="radio18" value="MexiPuntos">
                                <label for="radio18"> MexiPuntos</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Mostrar como</h4>
                            <div class="radio radio-success">
                                <input type="radio" name="showas" id="lo_nuevo" value="Producto_Normal" checked="">
                                <label for="lo_nuevo"> Producto Normal</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="showas" id="lo_nuevo" value="Lo_Nuevo">
                                <label for="lo_nuevo"> Lo Nuevo</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="showas" id="oferta" value="Oferta">
                                <label for="oferta"> Oferta</label>
                            </div>
                        </div>
                    </section>
                    <h3>Características</h3>
                    <section>
                        <div class="col-md-12">
                            <h4>Ubicación</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Departamento*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="LisUni">
                                        <option value="">Listado de Departamentos</option>
                                        <option value="10">Cerraduras y candados</option>
                                        <option value="9">Clavos y tornillos</option>
                                        <option value="11">Ferretería en general</option>
                                        <option value="12">Herramientas</option>
                                        <option value="52">Iluminación</option>
                                        <option value="18">Material eléctrico</option>
                                        <option value="54">MexiPuntos</option>
                                        <option value="20">Pinturas y brochas</option>
                                        <option value="21">Plomería</option>
                                        <option value="24">Tubos y conexiones</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Categoría*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="LisDep" id="filtro1" onchange="crgCat();">
                                        <option value="">Listado de Categorías</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Marca*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="LisUni">
                                        <option value="">Listado de Marcas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Disponibilidad*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="LisUni">
                                        <option value="1">En Existencia</option>
                                        <option value="2">Sujeto a Disponibilidad</option>
                                        <option value="3">Preguntar por Existencia</option>
                                    </select>
                                </div>
                            </div>
                            <h4>Características</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="userName">Incluye *</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" id="userName" name="userName" type="text">
                                </div>
                                <label class="col-lg-2 control-label " for="userName">Código *</label>
                                <div class="col-lg-3">
                                    <input class="form-control required" id="userName" name="userName" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="userName">Nombre *</label>
                                <div class="col-lg-10">
                                    <input class="form-control required" id="userName" name="userName" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="userName">Medidas *</label>
                                <div class="col-lg-4">
                                    <input class="form-control required" id="userName" name="userName" type="text">
                                    <!--<br>
                                    <input class="form-control required" id="userName" name="userName" type="text">
                                    <br>
                                    <input class="form-control required" id="userName" name="userName" type="text">
                                    <a href="#">+ Agregar</a>-->
                                </div>
                                <div class="col-lg-3">

                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label"> Descripción</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label"> Precio Normal *</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text" placeholder="0.00">
                                </div>
                                <label class="col-lg-2 control-label"> % de Descuento</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text" placeholder="0%">
                                </div>
                                <label class="col-lg-2 control-label"> Precio Público *</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text" placeholder="0.00">
                                </div>
                            </div>	
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Unidad de Venta *</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="LisUni">
                                        <option value="">Listado de Unidades de Venta</option>
                                        <option value="1">Caja</option>
                                        <option value="7">Juego</option>
                                        <option value="6">Kilogramo</option>
                                        <option value="19">Kilogramos</option>
                                        <option value="17">Litro</option>
                                        <option value="18">Litros</option>
                                        <option value="3">Metro</option>
                                        <option value="20">Metros</option>
                                        <option value="21">Mililitros</option>
                                        <option value="2">Pieza</option>
                                        <option value="16">Piezas</option>
                                        <option value="4">Rollo</option>
                                        <option value="5">Tramo</option>
                                        <option value="22">UNIDAD DEMO</option>
                                        <option value="15">UNIDAD VENTA DEMO</option>
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label " for="confirm">Color</label>
                                <div class="col-lg-4">
                                    <input class="form-control required" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Alto</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text">
                                </div>
                                <label class="col-lg-2 control-label">Ancho</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Largo</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text">
                                </div>
                                <label class="col-lg-2 control-label">Peso</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text">
                                </div>
                            </div>	
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Información Adicional</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row"><hr></div>
                            <h4>Entrega</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">De</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text">
                                </div>
                                <label class="col-lg-1 control-label">a</label>
                                <div class="col-lg-2">
                                    <input class="form-control required" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Condiciones de Entrega</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row"><hr></div>
                            <h4>Información Adicional</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Proveedor</label>
                                <div class="col-lg-4">
                                    <select id="LisProv" name="LisProv" class="form-control valid" aria-invalid="false">
                                        <option value="0">Listado de Proveedores</option>
                                        <option value="3">ENVIOS MEXICANOS</option>
                                        <option value="4">MEXICUGA NORTE</option>
                                        <option value="7">TRANSPORTES EL RUTAS</option>
                                        <option value="1">TRUPER</option>
                                        <option value="5">Ups</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Catálogo</label>
                                <div class="col-lg-4">
                                    <select id="LisCata" name="LisCata" class="form-control valid" aria-invalid="false">
                                        <option value="0">Listado de Catálogos</option>
                                        <option value="3">Helvex 2014</option>
                                        <option value="1">Helvex Otoño 2014</option>
                                        <option value="5">NAcombre 2015</option>
                                        <option value="4">Truper 2014</option>
                                        <option value="2">Urrea 2015</option>
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label " for="confirm">No. Página</label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- fin col derecha -->

                    </section>
                    <h3>Ligar con:</h3>
                    <section>
                        <div class="form-group clearfix">
                            <p>Por favor ingrese hasta 12 códigos de producto en el siguiente formato.</p>
                            <div class="col-lg-10">
                                <textarea class="form-control" placeholder="Ej. 0015, 5487, 6598, 3215"></textarea>
                            </div>
                        </div>
                    </section>
                    <h3>Galería</h3>
                    <section>
                        <div class="form-group clearfix">
                            <div class="col-md-6">
                                <h4>Imagen Principal</h4>
                                <div class="form-group">
                                    <input type="file" class="filestyle" data-input="false">
                                </div>
                                <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                                <img src="{{ asset('resources/assets/admin/assets/images/img-producto-demo.jpg') }}" class"img-responsive">
                            </div>
                            <div class="col-md-6">
                                <h4>Galería</h4>
                                <div class="form-group">
                                    <input type="file" class="filestyle" data-input="false">
                                </div>
                                <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                                <img src="{{ asset('resources/assets/admin/assets/images/img-producto-demo.jpg') }}" class"img-responsive">
                                     <br>
                                <a href="#"><i class="fa fa-arrow-down fa-2x"></i></a>
                                <br>
                                <a href="#" class="tipo_roja">X Eliminar</a>
                                <br>
                                <a href="#">+ Agregar</a>
                                <div class="row"><hr></div>
                                <div class="form-group">
                                    <input type="file" class="filestyle" data-input="false">
                                </div>
                                <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                                <img src="{{ asset('resources/assets/admin/assets/images/img-producto-demo.jpg') }}" class"img-responsive">
                                     <br>
                                <a href="#"><i class="fa fa-arrow-up fa-2x"></i></a> <a href="#"><i class="fa fa-arrow-down fa-2x"></i></a>
                                <br>
                                <a href="#" class="tipo_roja">X Eliminar</a>
                                <br>
                                <a href="#">+ Agregar</a>
                                <div class="row"><hr></div>
                                <div class="form-group">
                                    <input type="file" class="filestyle" data-input="false">
                                </div>
                                <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                                <img src="{{ asset('resources/assets/admin/assets/images/img-producto-demo.jpg') }}" class"img-responsive">
                                     <br>
                                <a href="#"><i class="fa fa-arrow-up fa-2x"></i></a>
                                <br>
                                <a href="#" class="tipo_roja">X Eliminar</a>
                                <br>
                                <a href="#">+ Agregar</a>
                            </div>
                        </div>
                    </section>
                    <h3>Palabras Clave</h3>
                    <section>
                        <div class="form-group clearfix">
                            <p>Ingrese palabras clave, sinóminos o términos relacionados al producto para su localización.</p>
                            <div class="col-lg-10">
                                <textarea class="form-control" placeholder="Ej. martillo, martillo truper, martillo construcción, martillo construccion"></textarea>
                            </div>
                        </div>
                    </section>
                </div>
            </form> 

        </div>
    </div>
</div>
<!-- End row -->
@endsection
@extends('admin')
@section('content')
<form action="{{ url('admin/departamentos_add') }}">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">Productos</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin/productos_view') }}"><i class="fa fa-cube"></i> Productos</a>
                </li>
                <li class="active">
                    <i class="fa fa-search text-muted"></i> Ver Productos...
                </li>
            </ol>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-sm-12">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            <?PHP session()->forget('status'); ?>
        </div>
        @endif
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>FILTRAR POR</b></h4>
            <div class="row">
                <div class="col-sm-3 text-xs-center">
                    <div class="form-group">
                        <label class="control-label m-r-5">Ubicación</label>
                        <select id="demo-foo-filter-status" class="form-control input-sm">
                            <option value="">Todas</option>
                            <option value="">Mexicuga</option>
                            <option value="">Promociones</option>
                            <option value="">Banner Productos Nuevos</option>
                            <option value="">Banner Ofertas</option>
                            <option value="">MexiPuntos</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 text-xs-center">
                    <div class="form-group">
                        <label class="control-label m-r-5">Departamento</label>
                        <select id="demo-foo-filter-status" class="form-control input-sm">
                            <option value="">Cerraduras y Candados</option>
                            @foreach($departments as $key => $vals)
                            <option value="{{ $vals->id }}">{{ $vals->department }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 text-xs-center">
                    <div class="form-group">
                        <label class="control-label m-r-5">Categoría</label>
                        <select id="demo-foo-filter-status" class="form-control input-sm">
                            <option value="">Accesorios para Carpintería</option>
                            @foreach($categories as $key => $vals)
                            <option value="{{ $vals->id }}">{{ $vals->category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 text-xs-center">
                    <div class="form-group">
                        <label class="control-label m-r-5">Marca</label>
                        <select id="demo-foo-filter-status" class="form-control input-sm">
                            <option value="">Trupper</option>
                            @foreach($brands as $key => $vals)
                            <option value="{{ $vals->id }}">{{ $vals->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>LISTADO DE PRODUCTOS</b></h4>
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
            <table id="demo-foo-row-toggler" class="table toggle-circle table-hover" data-page-size="50">
                <thead>
                    <tr>
                        <th data-toggle="true"> <i class="fa fa-hashtag text-muted"></i> Código </th>
                        <th data-hide="phone"> <i class="fa fa-cube text-muted"></i> Producto </th>
                        <th data-hide="phone"> <i class="fa fa-usd text-muted"></i> Precio </th>
                        <th data-hide="all"> <i class="fa fa-picture-o text-muted"></i> Imagen </th>
                        <th data-hide="all"> Incluye </th>
                        <th data-hide="all"> Descripción </th>
                        <th data-hide="all"> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP $n = 1; ?>
                    @foreach($products as $key => $product)
                    <tr id="Product_{{ $n }}">
                        <td>{{ $product->code }}</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('public/images/product/'.$product->imagename ) }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 {{ $product->unitname }}</td>
                        <td>{{ $product->description }}</td>
                        <td><a href="{{ url('admin/productos_edit') }}/{{ $product->id }} " title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <button type="button" style="background: none; border: none;" onclick="Deleteit('Product_{{ $n }}','{{ url('admin/productos_del') }}/{{ $product->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                    </tr>
                    <?PHP $n++; ?>
                    @endforeach
                   <!-- <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr>
                    <tr>
                        <td>SC907A</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td>$ 599.00</td>
                        <td><img src="{{ asset('resources/assets/admin/assets/images/products/iphone.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                        <td>1 Pieza</td>
                        <td>SIERRA CIRCULAR 7"1/4, EXTRA PESADO 1,800 W URREA</td>
                        <td><a href="{{ url('admin/productos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                    </tr> -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="text-right">
                                <ul class="pagination pagination-split m-t-30"></ul>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
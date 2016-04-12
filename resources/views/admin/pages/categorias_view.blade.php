@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->
    <form action="{{ url('admin/categorias_add') }}">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">CATEGORÍAS</h1>
                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span> Agregar</button>
            </div>
        </div>
    </form>

</div> <!-- container -->


<div class="container">

    <div class="row">
        <div class="col-sm-12">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <?PHP session()->forget('status'); ?>
            </div>
            @endif
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>LISTADO DE CATEGORÍAS</b></h4>
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
                            <th><i class="fa fa-th-list text-muted"></i> Categoría</th>
                            <th><i class="fa fa-cubes text-muted"></i> Pertenece al Departamento</th>
                            <th data-hide="all"><i class="fa fa-picture-o text-muted"></i> Botón Normal</th>
                            <th data-hide="all"><i class="fa fa-picture-o text-muted"></i> Botón Activo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?PHP $n = 1; ?>
                        @foreach($category as $key => $vals)
                        <tr id="category_{{ $n }}">
                            <td>{{ $vals->category }}</td>
                            <td>{{ $vals->department }}</td>
                            <td><span id="removehiddenrow"></span><img src="{{ asset('public/images/category/'.$vals->image) }}" style="max-height: 50px; max-width: 50px;" class="img-responsive"></td>
                            <td><img src="{{ asset('public/images/category/small/'.$vals->imagesmall) }}" style="max-height: 50px; max-width: 50px;" class="img-responsive bg_morado"></td>
                            <td><a href="{{ url('admin/categorias_edit') }}/{{ $vals->id }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <button type="button" style="background: none; border: none;" onclick="Deleteit('category_{{ $n }}','{{ url('admin/categorias_del') }}/{{ $vals->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                        </tr>
                        <?PHP $n++; ?>
                        @endforeach
                            <!-- <tr>
                                    <td>Accesorios de Ferretería</td>
                                    <td>Ferretería en general</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Accesorios para Carpintería</td>
                                    <td>Cerraduras y candados</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Accesorios para Herramientas</td>
                                    <td>Herramientas</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Accesorios para jardineria</td>
                                    <td>Herramientas</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Accesorios para plomeria</td>
                                    <td>Plomería</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Accesorios para tinacos y cisternas</td>
                                    <td>Plomería</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Aceites y Lubricantes</td>
                                    <td>Ferretería en general</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                    <td>Adhesivos</td>
                                    <td>Ferretería en general</td>																								
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" class="img-responsive"></td>
                                    <td><img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" class="img-responsive bg_morado"></td>
                                    <td><a href="{{ url('admin/categorias_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
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


</div> <!-- container -->
@endsection
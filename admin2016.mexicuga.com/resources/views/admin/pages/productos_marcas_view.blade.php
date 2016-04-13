@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->
    <form action="{{ url('admin/productos_marcas_add') }}">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">MARCAS</h1>
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
                <h4 class="m-t-0 header-title"><b>LISTADO DE MARCAS</b></h4>
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
                            <th><i class="fa fa-trademark text-muted"></i> Marca</th>
                            <th data-hide="all">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?PHP $n = 1; ?>
                        @foreach($trademarks as $key => $vals)
                        <tr id="trademark_{{ $n }}">
                            <td>{{ $vals->name }}</td>
                            <td><a href="{{ url('admin/productos_marcas_edit') }}/{{ $vals->id }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <button type="button" style="background: none; border: none;" onclick="Deleteit('trademark_{{ $n }}','{{ url('admin/productos_marcas_del') }}/{{ $vals->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                        </tr>
                        <?PHP $n++; ?>
                        @endforeach
                          <!--  <tr>
                                <td>3 en 1</td>
                                <td><a href="{{ url('admin/productos_marcas_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>3M</td>
                                <td><a href="{{ url('admin/productos_marcas_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>Abeja</td>
                                <td><a href="{{ url('admin/productos_marcas_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            <tr>
                                <td>Adex</td>
                                <td><a href="{{ url('admin/productos_marcas_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>  -->
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
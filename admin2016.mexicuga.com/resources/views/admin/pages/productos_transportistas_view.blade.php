@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->
    <form action="{{ url('admin/productos_transportistas_add') }}">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">TRANSPORTISTAS</h1>
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
                <h4 class="m-t-0 header-title"><b>LISTADO DE TRANSPORTISTAS</b></h4>
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
                                <th><i class="fa fa-building text-muted"></i> Empresa</th>
                                <th><i class="fa fa-user text-muted"></i> Contacto</th>
                                <th><i class="fa fa-phone text-muted"></i> Teléfonos</th>
                                <th><i class="fa fa-envelope text-muted"></i> Correo Electrónico</th>
                                <th><i class="fa fa-link text-muted"></i> Página Web</th>
                                <th data-hide="all">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP $n = 1; ?>
                            @foreach($transporters as $key => $vals)
                            <tr id="transport_{{ $n }}">
                                <td>{{ $vals->company }}</td>
                                <td>{{ $vals->personname }}</td>
                                <td>{{ $vals->phoneno }}</td>
                                <td><a href="#">{{ $vals->email }}</a></td>
                                <td><a href="{{ $vals->website }}" target="_blank">{{ $vals->website }}</a></td>
                                <td><a href="{{ url('admin/productos_transportistas_edit') }}/{{ $vals->id }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a> <button type="button" style="background: none; border: none;" onclick="Deleteit('transport_{{ $n }}','{{ url('admin/productos_transportistas_del') }}/{{ $vals->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                            </tr>
                            <?PHP $n++; ?>
                            @endforeach										
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
    </div>
    @endsection
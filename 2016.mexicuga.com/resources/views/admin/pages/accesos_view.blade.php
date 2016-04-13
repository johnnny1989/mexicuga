@extends('admin')
@section('content')

<!-- Start content -->
<!-- Page-Title -->
<form action="{{ url('admin/accesos_add') }}">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">ACCESOS</h1>
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
        </div>
        <div class="col-sm-12">

            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>LISTADO DE ACCESOS AL ADMIN DE MEXICUGA</b></h4>
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
                                <th><i class="fa fa-calendar text-muted"></i> Fecha de Alta</th>
                                <th><i class="fa fa-user text-muted"></i> Nombre</th>
                                <th><i class="fa fa-envelope text-muted"></i> Correo Electrónico</th>
                                <th><i class="fa fa-key text-muted"></i> Tipo de Usuario</th>
                                <th data-hide="all">Teléfono</th>
                                <th data-hide="all">Domicilio</th>
                                <th data-hide="all">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP $n = 1; ?>
                            @foreach($accessors as $key => $vals)
                            <tr id="User_{{ $n }}">
                                <td>{{ date('d M, Y',strtotime($vals->created_at)) }}</td>
                                <td>{{ $vals->name }}</td>
                                <td>{{ $vals->email }}</td>
                                <td>@if($vals->usertype === 'admin')Administrador General @else Usuario Operación @endif</td>
                                <td>{{ $vals->contactno }}</td>
                                <td>{{ $vals->homeaddress }}</td>
                                <td><a href="{{ url('admin/accesos_edit') }}/{{ $vals->id }}" title="Eliminar"><i class="fa fa-pencil type_amarilla"></i></a> <button type="button" style="background: none; border: none;" onclick="Deleteit('User_{{ $n }}','{{ url('admin/accesos_del') }}/{{ $vals->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                            </tr>
                            <?PHP $n++; ?>
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
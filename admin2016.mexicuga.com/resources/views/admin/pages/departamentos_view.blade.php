@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->
    <form action="{{ url('admin/departamentos_add') }}">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">DEPARTAMENTOS</h1>
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
                <h4 class="m-t-0 header-title"><b>LISTADO DE DEPARTAMENTOS </b></h4>

                <table id="demo-custom-toolbar"  data-toggle="table"
                       data-sort-name="id"
                       data-page-list="[5, 10, 20]"
                       data-page-size="10"
                       data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                    <thead>
                    <tr>
                        <th><i class="fa fa-list-ol text-muted"></i> Orden</th>
                        <th><i class="fa fa-arrows text-muted"></i> Mover</th>
                        <th><i class="fa fa-cubes text-muted"></i> Nombre</th>
                        <th><i class="fa fa-picture-o text-muted"></i> Botón Normal</th>
                        <th><i class="fa fa-picture-o text-muted"></i> Botón Activo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP $n = 1; ?>
                    @foreach($departments as $key => $department)
                        <tr id="departments_{{ $n }}">
                            <td>{{ $n }}</td>
                            <td><a href="javascript:ChangeOrder('{{ $department->id }}', 'down','{{ url('admin/departs')}}/','departments_{{ $n }}');"><i class="fa fa-arrow-down"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:ChangeOrder('{{ $department->id }}', 'up','{{ url('admin/departs')}}/','departments_{{ $n }}');"><i class="fa fa-arrow-up"></i></a></td>
                            <td>{{ $department->department }}</td>
                            <td><img src="{{ asset('public/images/department') }}/{{ $department->image }}" style="max-height: 50px; max-width: 50px;" class="img-responsive"></td>
                            <td><img src="{{ asset('public/images/department/small') }}/{{ $department->imagesmall }}" style="max-height: 50px; max-width: 50px;" class="img-responsive bg_morado"></td>
                            <td><a href="{{ url('admin/departamentos_edit') }}/{{ $department->id }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a><button style="background: none; border: none;" onclick="Deleteit('department_{{ $n }}','{{ url('admin/departamentos_del') }}/{{ $department->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                        </tr>
                        <?PHP $n++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div> <!-- container -->
@endsection
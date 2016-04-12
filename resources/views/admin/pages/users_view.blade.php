@extends('admin')
@section('content')

<!-- Start content -->
<!-- Page-Title -->
<!-- <form action="{{ url('admin/accesos_add') }}">  -->
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">USUARIOS</h1>
       <!-- <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span> Agregar</button> -->
    </div>
</div>
<!-- </form> -->

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
                <h4 class="m-t-0 header-title"><b>LISTADO DE USUARIOS</b></h4>
                <br>
                <!-- <label class="form-inline">Mostrar
                    <select id="demo-show-entries" class="form-control input-sm">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                    </select>
                    resultados
                </label> 
                <br><br>-->
                <div class="table-responsive">
                    <table  class="table toggle-circle table-hover" data-page-size="50">
                        <thead>
                            <tr>
                                <th><i class="fa fa-calendar text-muted"></i> Date</th>
                                <th><i class="fa fa-user text-muted"></i> Nombre</th>
                                <th><i class="fa fa-envelope text-muted"></i> Correo Electrónico</th>
                                <th><i class="fa fa-key text-muted"></i> Bill Name</th>
                                <th data-hide="all">Teléfono</th>
                                <th data-hide="all">Mobile</th>
                                <th data-hide="all">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($user as $key => $val)
                            <tr>
                                <td>{{ date('d M, Y',strtotime($val->created_at)) }}</td>
                                <td>{{ $val->name }} {{ $val->lastname }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->bill_name }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>{{ $val->mobile }}</td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr>
                            @endforeach
                           <!-- <tr>
                                <td>1-ene-2015</td>
                                <td>José Antonio Cuevas Garcia</td>
                                <td>jacuga2006@gmail.com</td>
                                <td>Administrador General</td>
                                <td>9865-3254</td>
                                <td></td>
                                <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                            </tr> -->
                        </tbody>
                    </table>
                    {!! $user->links() !!}
                </div>
            </div>
        </div>
    </div>
    @endsection
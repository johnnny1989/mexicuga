@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">MEXIPUNTOS</h1>
        </div>
    </div>


</div> <!-- container -->


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>PORCENTAJE DE MEXIPUNTOS</b></h4>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            <input type="number" id="percentage" name="percentage" value="{{ $percentage->percentage_of_mexipuntos }}" class="form-control" required>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-refresh"></i> Actualizar</button>
                        </div>
                    </div>
                </form>
                <br>
                <p>Última modificación : {{ $percentage->mexi_last_updated }}    </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>RANKING DE MEXIPUNTOS</b></h4>
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
                                <th><i class="fa fa-building text-muted"></i> Cliente</th>
                                <th><i class="fa fa-envelope text-muted"></i> Correo Electrónico</th>
                                <th><i class="fa fa-circle text-muted"></i> Total de MexiPuntos</th>
                                <th><i class="fa fa-pencil text-muted"></i> Editar</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td><a href="#">{{ $user->email }}</a></td>
                                <td>{{ $user->getProfile['mexipuntos'] }}</td>
                                <td><a href="{{ url('admin/mexipuntos_edit')."/".$user->getProfile['id'] }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a></td>
                            </tr>
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
</div> <!-- container -->
@endsection
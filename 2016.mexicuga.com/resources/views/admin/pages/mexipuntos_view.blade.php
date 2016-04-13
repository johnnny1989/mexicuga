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
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
                <br>
                <p>Última modificación : 29-ene-2016</p>
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
                            <tr>
                                <td>Marco Antonio Mendoza</td>
                                <td><a href="#">mendozamorfinmarco@gmail.com</a></td>
                                <td>1200</td>
                                <td><a href="{{ url('admin/mexipuntos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a></td>
                            </tr>
                            <tr>
                                <td>Estela Pineda</td>
                                <td><a href="#">creandograficos@yahoo.com.mx</a></td>
                                <td>750</td>
                                <td><a href="{{ url('admin/mexipuntos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a></td>
                            </tr>
                            <tr>
                                <td>HECTOR MIRANDA</td>
                                <td><a href="#">hmtorres0@hotmail.com</a></td>
                                <td>500</td>
                                <td><a href="{{ url('admin/mexipuntos_edit') }}" title="Editar"><i class="fa fa-pencil type_amarilla"></i></a></td>
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
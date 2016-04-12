@extends('admin')
@section('content')
<div class="container">

    <!-- Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">DESTINOS</h1>
        </div>
    </div>


</div> <!-- container -->

<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <p>C.P. Origen</p>
                        <input type="number" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <p>Costo por KM</p>
                        <input type="text" class="form-control" placeholder="0.00">
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
</div> <!-- container -->
@endsection
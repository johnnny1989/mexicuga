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
                <form action="/admin/destinos_update" method="post">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <p>C.P. Origen</p>
                        <input type="number" name="cp_origin" class="form-control" value="{{ $data[0]->cp_origin }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <p>Costo por KM</p>
                        <input type="text" name="cost" class="form-control" placeholder="0.00" value="{{ $data[0]->cost }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- container -->
@endsection
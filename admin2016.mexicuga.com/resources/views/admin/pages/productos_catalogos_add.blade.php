@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Agregando catálogo</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/productos_catalogos_view') }}"><i class="fa fa-folder-open"></i> Catálogos</a>
            </li>
            <li class="active">
                <i class="fa fa-plus text-muted"></i> Agregando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="cataloguemsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="catalogueForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/productos_catalogos_create') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nombre de Catálogo:</p>
                        <input type="text" name="catalogue" class="form-control" placeholder="*">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button type="reset" style="display: none"></button>
                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
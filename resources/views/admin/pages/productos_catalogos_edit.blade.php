@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Editando catálogo</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/productos_catalogos_view') }}"><i class="fa fa-folder-open"></i> Catálogos</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil text-muted"></i> Editando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="cataloguemsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="catalogueForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/productos_catalogos_edit') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
            <input type="hidden" name="catalogueid" value="{{ $catalogue->id }}" />
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nombre de Catálogo:</p>
                        <input type="text" name="catalogue" value="{{ $catalogue->name }}" class="form-control" placeholder="*">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
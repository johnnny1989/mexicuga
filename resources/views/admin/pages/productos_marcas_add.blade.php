@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Agregando marca</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/productos_marcas_view') }}"><i class="fa fa-trademark"></i> Marcas</a>
            </li>
            <li class="active">
                <i class="fa fa-plus text-muted"></i> Agregando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="trademarkmsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="trademarkForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/productos_marcas_create') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nombre de Marca:</p>
                        <input type="text" class="form-control" name="trademark" placeholder="*">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button type="reset" style="display: none;"></button>
                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
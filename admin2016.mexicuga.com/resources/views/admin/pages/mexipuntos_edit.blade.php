@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Editando valor de MexiPuntos</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/mexipuntos_view') }}"><i class="fa fa-circle"></i> MexiPuntos</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil text-muted"></i> Editando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <form action="" method="post">
        <div class="col-sm-4">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Cliente: {{ $name }}</p>
                        <p>MexiPuntos: {{ $data[0]->mexipuntos }}</p>
                        <br>
                        <p>Escribe el nuevo valor:</p>
                        <input type="text" class="form-control" name="mexipuntos" placeholder="*">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Editando categoría</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/categorias_view') }}"><i class="fa fa-th-list"></i> Categorías</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil text-muted"></i> Editando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="categorymsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="categoryForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/categorias_edit') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <input type="hidden" name="categoryid" value="{{ $category->id }}" />
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nombre de la Categoría:</p>
                        <input type="text" class="form-control" name="Category" value="{{ $category->category }}" placeholder="*">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Asignar a Departamento:</p>
                         <select class="form-control" name="Department">
                            <option value="0">*Seleccione un Departamento</option>
                            @foreach($department as $key => $depart)
                            <option value="{{ $depart->id }}" @if( $category->department_id == $depart->id ) selected="selected" @endif >{{ $depart->department }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Botón Normal</p>
                        <div class="form-group">
                            <input type="file" class="filestyle" name="ImageNormal" onchange="ImagePreview(this.files[0],'NormalImg','categorymsg')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        <img src="{{ asset('public/images/category') }}/{{ $category->image }}" id="NormalImg" class="img-responsive">
                        <br>
                        <p>Botón Activo</p>
                        <div class="form-group">
                            <input type="file" class="filestyle" name="ImageSmall" onchange="ImagePreview(this.files[0],'SmallImg','categorymsg')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        <img src="{{ asset('public/images/category/small') }}/{{ $category->imagesmall }}" id="SmallImg"class="img-responsive bg_morado">
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
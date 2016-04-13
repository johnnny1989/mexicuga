@extends('admin')
@section('content')
<form action="{{ url('admin/departamentos_add') }}">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">Editando departamento</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin/departamentos_view') }}"><i class="fa fa-cubes"></i> Departamentos</a>
                </li>
                <li class="active">
                    <i class="fa fa-pencil text-muted"></i> Editando...
                </li>
            </ol>
        </div>
    </div>
</form>

<div class="row">
        <div class="col-md-12 alert" id="departmentmsg" style="display: none;"></div>
        
        <div class="col-md-4">
        <form class="form-horizontal" id="departmentForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/departamentos_edit') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <input type="hidden" name="departmentid" value="{{ $department->id }}" />
        
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nombre del Departamento:</p>
                        <input type="text" name="Department" value="{{ $department->department }}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Botón Normal</p>
                        <div class="form-group">
                            <input type="file" class="filestyle" name="ImageNormal" onchange="ImagePreview(this.files[0],'NormalImg','departmentmsg')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        <img src="{{ asset('public/images/department') }}/{{ $department->image }}" id="NormalImg" class="img-responsive">
                        <br>
                        <p>Botón Activo</p>
                        <div class="form-group">
                            <input type="file" class="filestyle" name="ImageSmall" onchange="ImagePreview(this.files[0],'SmallImg','departmentmsg')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        <img src="{{ asset('public/images/department/small') }}/{{ $department->imagesmall }}" id="SmallImg" class="img-responsive bg_morado">
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
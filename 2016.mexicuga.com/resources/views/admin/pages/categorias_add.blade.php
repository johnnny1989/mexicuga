@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Agregando categoría</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/categorias_view') }}"><i class="fa fa-th-list"></i> Categorías</a>
            </li>
            <li class="active">
                <i class="fa fa-plus text-muted"></i> Agregando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="categorymsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="categoryForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/categorias_create') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nombre de la Categoría:</p>
                        <input type="text" class="form-control" name="Category" placeholder="*">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Asignar a Departamento:</p>
                        <select class="form-control" name="Department">
                            <option value="0">*Seleccione un Departamento</option>
                            @foreach($department as $key => $depart)
                            <option value="{{ $depart->id }}">{{ $depart->department }}</option>
                            @endforeach
                           <!-- <option value="9">Clavos y tornillos</option>
                            <option value="11">Ferretería en general</option>
                            <option value="12">Herramientas</option>
                            <option value="52">Iluminación</option>
                            <option value="18">Material eléctrico</option>
                            <option value="54">MexiPuntos</option>
                            <option value="20">Pinturas y brochas</option>
                            <option value="21">Plomería</option>
                            <option value="24">Tubos y conexiones</option> -->
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
                        <img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_normal.png') }}" id="NormalImg" class="img-responsive">
                        <br>
                        <p>Botón Activo</p>
                        <div class="form-group">
                            <input type="file" class="filestyle" name="ImageSmall" onchange="ImagePreview(this.files[0],'SmallImg','categorymsg')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        <img src="{{ asset('resources/assets/admin/assets/images/img_demo_btn_activo.png') }}" id="SmallImg" class="img-responsive bg_morado">
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
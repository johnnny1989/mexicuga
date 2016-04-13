@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Agregando proveedor</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/productos_proveedores_view') }}"><i class="fa fa-users"></i> Proveedores</a>
            </li>
            <li class="active">
                <i class="fa fa-plus text-muted"></i> Agregando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="providermsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="providerForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/productos_proveedores_create') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <p>Empresa:</p>
                        <input type="text" name="company" class="form-control">
                        </div>
                        <div class="form-group">
                        <p>Nombre de Contacto:</p>
                        <input type="text" name="personname" class="form-control" placeholder="*">
                        </div>
                        <hr>
                        <div class="form-group">
                        <p>Tipo Teléfono</p>
                        <select class="form-control" name="phonetype">
                            <option value="0">Trabajo</option>
                            <option value="1">Móvil</option>
                            <option value="2">Nextel</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <p>Teléfono</p>
                        <input type="text" class="form-control" name="phoneno">
                        </div>
                        
                        <hr>
                        <div class="form-group">
                        <p>Correo Electrónico</p>
                        <input type="text" class="form-control" name="email">
                        </div>
                        
                        <hr>
                        <div class="form-group">
                        <p>Página Web</p>
                        <input type="text" class="form-control" name="website">
                        </div>
                        
                        <hr>
                        <div class="form-group">
                        <p>Comentarios</p>
                        <textarea class="form-control" name="comments"></textarea>
                        </div>
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
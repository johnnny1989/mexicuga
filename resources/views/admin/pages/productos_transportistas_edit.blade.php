@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Editando transportista</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/productos_transportistas_view') }}"><i class="fa fa-truck"></i> Transportistas</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil text-muted"></i> Editando...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12 alert" id="transportmsg" style="display: none;"></div>
        <div class="col-md-4">
        <form class="form-horizontal" id="transportForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/productos_transportistas_edit') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <input type="hidden" name="transporterid" value="{{ $transporter->id }}" />
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <p>Empresa:</p>
                        <input type="text" name="company" value="{{ $transporter->company }}" class="form-control">
                        </div>
                        <div class="form-group">
                        <p>Nombre de Contacto:</p>
                        <input type="text" name="personname" class="form-control" value="{{ $transporter->personname }}" placeholder="*">
                        </div>
                        <hr>
                        <div class="form-group">
                        <p>Tipo Teléfono</p>
                        <select class="form-control" name="phonetype">
                            <option value="0" @if($transporter->phonetype == 0) selected="selected" @endif>Trabajo</option>
                            <option value="1" @if($transporter->phonetype == 1) selected="selected" @endif>Móvil</option>
                            <option value="2" @if($transporter->phonetype == 2) selected="selected" @endif>Nextel</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <p>Teléfono</p>
                        <input type="text" class="form-control" value="{{ $transporter->phoneno }}" name="phoneno">
                        </div>
                        <a href="#">+ Agregar</a>
                        <hr>
                        <div class="form-group">
                        <p>Correo Electrónico</p>
                        <input type="text" class="form-control" value="{{ $transporter->email }}" name="email">
                        </div>
                        <a href="#">+ Agregar</a>
                        <hr>
                        <div class="form-group">
                        <p>Página Web</p>
                        <input type="text" class="form-control" value="{{ $transporter->website }}" name="website">
                        </div>
                        <a href="#">+ Agregar</a>
                        <hr>
                        <div class="form-group">
                        <p>Comentarios</p>
                        <textarea class="form-control" name="comments">{{ $transporter->comments }}</textarea>
                        </div>
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
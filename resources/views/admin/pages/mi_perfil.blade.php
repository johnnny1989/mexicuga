@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Mi Perfil</h1>
    </div>
</div>

<div class="row">
    <form action="{{ url('admin') }}">
        <div class="col-sm-4">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('resources/assets/admin/assets/images/users/avatar-1.jpg') }}" alt="user-img" class="img-circle">
                        <br><br>
                        <div class="form-group">
                            <input type="file" class="filestyle" data-input="false">
                        </div>
                        <p>Tipo de Usuario: Administrador General</p>
                        <p>Correo Electrónico: jose.antonio@mexicuga.com</p>
                        <p>Nombre:</p>
                        <input type="text" class="form-control" placeholder="José Antonio">
                        <hr>
                        <p>Teléfono</p>
                        <input type="text" class="form-control">
                        <br>
                        <a href="#">+ Agregar</a>
                        <hr>
                        <p>Domicilio</p>
                        <textarea class="form-control"></textarea>
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
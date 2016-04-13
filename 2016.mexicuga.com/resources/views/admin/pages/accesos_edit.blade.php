@extends('admin')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Editando  acceso</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/accesos_view') }}"><i class="fa fa-key"></i> Accesos</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil text-muted"></i> Editando ...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    
    <div class="col-sm-4">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/accesos_edit') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="userid" value="{{ $user->id }}" />
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('usertype') ? ' has-error' : '' }}">
                            <p>Tipo de Usuario</p>
                            <select class="form-control" name="usertype">
                                <option @if($user->usertype == 'admin' ) selected="selected"  @endif value="admin">Administrador General</option>
                                <option @if($user->usertype == 'operator' ) selected="selected"  @endif value="operator">Usuario Operación</option>
                            </select>
                            @if($errors->has('usertype'))
                                <span class="help-block"><strong>{{ $errors->first('usertype') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <p>Correo Electrónico:</p>
                            <input type="text" class="form-control" name="email" value="{{ $user->email or old('email') }}" placeholder="*">
                            @if($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <p>Contraseña:</p>
                            <input type="password" name="password" class="form-control" placeholder="*">
                            @if($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <p>Confirmar Contraseña:</p>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="*">
                            @if($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <p>Nombre:</p>
                            <input type="text" class="form-control" name="name" value="{{ $user->name or old('name') }}" placeholder="*">
                            @if($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}">
                            <p>Teléfono</p>
                            <input type="text" class="form-control" name="phoneno" value="{{ $user->contactno or old('phoneno') }}">
                            @if($errors->has('phoneno'))
                                <span class="help-block"><strong>{{ $errors->first('phoneno') }}</strong></span>
                            @endif
                            <br>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('homeaddress') ? ' has-error' : '' }}">
                            <p>Domicilio</p>
                            <textarea class="form-control" name="homeaddress">{{ $user->homeaddress or old('homeaddress') }}</textarea>
                            @if($errors->has('homeaddress'))
                                <span class="help-block"><strong>{{ $errors->first('homeaddress') }}</strong></span>
                            @endif
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
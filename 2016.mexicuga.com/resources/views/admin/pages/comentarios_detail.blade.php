@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">COMENTARIOS</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin') }}"><i class="ti-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('admin/comentarios_view') }}"><i class="fa fa-comment"></i> Comentarios</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil text-muted"></i> Atendiendo...
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="m-t-0 m-b-20 header-title"><b>MANGUERA FLEXIBLE PARA BOILER DE 80 CMS FOSET</b></h4>
            <p>Código: T49134</p>
            <p>Precio: $5,590.00</p>
            <img src="{{ asset('resources/assets/admin/assets/images/img-producto-demo.jpg') }}" class="img-thumbnail img-responsive">
            <br><br>
        </div>
    </div> <!-- end col-lg-8-->



    <div class="col-lg-8">
        <div class="card-box">
            <h4 class="m-t-0 m-b-20 header-title"><b>MENSAJES</b></h4>
            <div class="chat-conversation">
                <ul class="conversation-list nicescroll">
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="{{ asset('resources/assets/admin/assets/images/users/avatar-5.jpg') }}" alt="Female">
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Erick</i>
                                <p>
                                    Buenas tardes, quisiera saber si lo entregan gratis en Coyoacán?
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="{{ asset('resources/assets/admin/assets/images/avatar-1.jpg') }}" alt="male">
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>José Antonio</i>
                                <p>
                                    Por su puesto, nos puedes enviar a info@mexicuga.com la dirección exacta? Gracias!
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="{{ asset('resources/assets/admin/assets/images/users/avatar-5.jpg') }}" alt="male">
                            <i>10:02</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Erick</i>
                                <p>
                                    Pero, si es gratis? Dónde están ubicados?
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-sm-9 chat-inputbar">
                        <input type="text" class="form-control chat-input" placeholder="Atender...">
                    </div>
                    <div class="col-sm-3 chat-send">
                        <button type="submit" class="btn btn-md btn-info btn-block waves-effect waves-light"><i class="fa fa-paper-plane"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end col-lg-4-->


</div> <!-- end col -->
@endsection
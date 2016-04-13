@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">COMENTARIOS</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin') }}"><i class="ti-home"></i> Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-comment text-muted"></i> Comentarios
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            <?PHP session()->forget('status'); ?>
        </div>
        @endif
        <div class="card-box">
            <h4 class="m-t-0 m-b-20 header-title"><b>LISTADO DE COMENTARIOS</b></h4>

            <div class="inbox-widget nicescroll mx-box">
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-1.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Daniel</p>
                        <p class="inbox-item-text">Cuánto al C.P. 87520?</p>
                        <p class="inbox-item-date">13:40 PM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-2.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Tomas</p>
                        <p class="inbox-item-text">Tienen para uso industrial?</p>
                        <p class="inbox-item-date">13:34 PM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-3.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Ricardo</p>
                        <p class="inbox-item-text">En color rojo tiene el mismo precio?</p>
                        <p class="inbox-item-date">13:17 PM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-4.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Efrén</p>
                        <p class="inbox-item-text">Excelente producto!</p>
                        <p class="inbox-item-date">12:20 PM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-5.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Marcos</p>
                        <p class="inbox-item-text">Lo tienen disponible a Puebla?</p>
                        <p class="inbox-item-date">10:15 AM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-6.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Andrés</p>
                        <p class="inbox-item-text">Este martillo, pero en marca trupper?</p>
                        <p class="inbox-item-date">9:56 AM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-8.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Augusto</p>
                        <p class="inbox-item-text">Rotomartillo Bosch, tienes?</p>
                        <p class="inbox-item-date">10:15 AM</p>
                    </div>
                </a>
                <a href="{{ url('admin/comentarios_detail') }}">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('resources/assets/admin/assets/images/users/avatar-9.jpg') }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">Josué</p>
                        <p class="inbox-item-text">Tienen la versión 2016?</p>
                        <p class="inbox-item-date">9:56 AM</p>
                    </div>
                </a>
            </div>
        </div>

    </div> <!-- end col -->

</div> <!-- container -->

@endsection
@extends('admin')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-title">Banners</h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <br>
                <h4 class="m-t-0 header-title"><b>LISTADO DE BANNERS</b></h4>
                <table id="demo-custom-toolbar"  data-toggle="table"
                       data-sort-name="id"
                       data-page-list="[5, 10, 20]"
                       data-page-size="5"
                       data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                    <thead>
                        <tr>
                            <th><i class="fa fa-list-ol text-muted"></i> Orden</th>
                            <th><i class="fa fa-arrows text-muted"></i> Mover</th>
                            <th><i class="fa fa-calendar text-muted"></i> Fecha de Publicación</th>
                            <th><i class="fa fa-picture-o text-muted"></i> Vista Previa</th>
                            <th><i class="fa fa-link text-muted"></i> Link</th>
                            <th><i class="fa fa-list-alt text-muted"></i> Descripción</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?PHP $n = 1; ?>
                    @foreach($banners as $key => $banner)
                    <tr id="banner_{{ $n }}">
                            <td>{{ $n }}</td>
                            <td><a href="javascript:ChangeOrder('{{ $banner->id }}', 'down','{{ url('admin/banners')}}/','banner_{{ $n }}');"><i class="fa fa-arrow-down"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:ChangeOrder('{{ $banner->id }}', 'up','{{ url('admin/banners')}}/','banner_{{ $n }}');"><i class="fa fa-arrow-up"></i></a></td>
                            <td>{{ date('d M, Y',strtotime($banner->created_at)) }}</td>												
                            <td><img src="{{ url('public/images/bannerimage/' . $banner->imagename) }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                            <td><a href="{{ $banner->imageurl }}" target="_blank">{{ $banner->imageurl }}</a></td>
                            <td>{{ $banner->imagedescription }}</td>
                            <td><button style="background: none; border: none;" onclick="Deleteit('banner_{{ $n }}','{{ url("/admin/deletebanner") }}/{{ $banner->id }}')" title="Eliminar"><i class="fa fa-times tipo_roja"></i></button></td>
                        </tr>
                        <?PHP $n++; ?>
                    @endforeach
                       <!-- <tr>
                            <td>2</td>
                            <td><a href="#"><i class="fa fa-arrow-down"></i></a> <a href="#"><i class="fa fa-arrow-up"></i></a></td>
                            <td>27 ene 2016</td>												
                            <td><img src="{{ asset('resources/assets/admin/assets/images/products/samsung.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                            <td><a href="https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO" target="_blank">https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO</a></td>
                            <td>Campaña Productos B</td>
                            <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="#"><i class="fa fa-arrow-down"></i></a> <a href="#"><i class="fa fa-arrow-up"></i></a></td>
                            <td>28 ene 2016</td>												
                            <td><img src="{{ asset('resources/assets/admin/assets/images/products/imac.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                            <td><a href="https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO" target="_blank">https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO</a></td>
                            <td>Campaña Productos C</td>
                            <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="#"><i class="fa fa-arrow-down"></i></a> <a href="#"><i class="fa fa-arrow-up"></i></a></td>
                            <td>28 ene 2016</td>												
                            <td><img src="{{ asset('resources/assets/admin/assets/images/products/macbook.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                            <td><a href="https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO" target="_blank">https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO</a></td>
                            <td>Campaña Productos D</td>
                            <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="#"><i class="fa fa-arrow-up"></i></a></td>
                            <td>29 ene 2016</td>												
                            <td><img src="{{ asset('resources/assets/admin/assets/images/products/lumia.jpg') }}" class="thumb-sm pull-left m-r-10" alt=""></td>
                            <td><a href="https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO" target="_blank">https://www.mexicuga.com/producto/2460-ACEITE-LINAZA-1-LTO</a></td>
                            <td>Campaña Productos E</td>
                            <td><a href="" title="Eliminar"><i class="fa fa-times tipo_roja"></i></a></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h4 class="m-t-0 header-title"><b>BANNERS HOME</b></h4>
                    <div class="col-md-12 alert" id="bannerform" style="display: none;"></div>
                    <form class="form-horizontal" id="BannerForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/banner') }}" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <p>Tamaño de imagen: 2400px × 1080px</p>
                        <br>
                        <div class="form-group">
                            <input type="file" class="filestyle" onchange="ImagePreview(this.files[0],'image_preview','bannerform')" name="ImageFile" accept="image/*" value="{{ old('ImageFile')}}" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        <img id="image_preview" src="{{ asset('resources/assets/admin/assets/images/mexicuga-jardineria-20151026-82.jpg') }}" class="img-responsive">
                        <br>
                        <input type="text" class="form-control" name="ImageLink" value="{{ old('ImageLink')}}" placeholder="Link">
                        <br>
                        <input type="text" class="form-control" name="ImageDescription" value="{{ old('ImageDescription')}}" placeholder="Descripción">
                        <br>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-upload"></i> Subir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- container -->



<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title"><b>BANNER LO NUEVO</b></h4>
                        <p>Tamaño de imagen: 900px × 677px</p>
                        <br>
                        <div class="col-md-12 alert" id="BANNERLONUEVOform" style="display: none;"></div>
                        <form class="form-horizontal" id="BANNERLONUEVO" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/offerimg') }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="hidden" name="formtype" value="BANNERLONUEVO"/>
                            <input type="file" name="FrontImage" onchange="ImagePreview(this.files[0],'ImageLonue','BANNERLONUEVOform')" class="filestyle" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        @if($frontimgs->nuevo)
                        <img src="{{ url('public/images/frontimage') }}/{{ $frontimgs->nuevo }}" id="ImageLonue" class="img-responsive">
                        @endif
                        <br>
                        <button type="reset" style="display: none;"></button>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-upload"></i> Subir</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title"><b>BANNER OFERTAS</b></h4>
                        <p>Tamaño de imagen: 900px × 677px</p>
                        <br>
                        <div class="col-md-12 alert" id="OFERTASform" style="display: none;"></div>
                    <form class="form-horizontal" id="BannerOFERTASForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/offerimg') }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="hidden" name="formtype" value="OFERTAS"/>
                            <input type="file" class="filestyle" name="FrontImage" onchange="ImagePreview(this.files[0],'OFERTASImg','OFERTASform')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        @if($frontimgs->ofertas)
                        <img src="{{ url('public/images/frontimage') }}/{{ $frontimgs->ofertas }}" id='OFERTASImg' class="img-responsive">
                        @endif
                        <br>
                        <button type="reset" style="display: none;"></button>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-upload"></i> Subir</button>
                    </form>
                    </div>
                </div>
                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title"><b>BANNER MEXIPUNTOS</b></h4>
                        <p>Tamaño de imagen: 900px × 677px</p>
                        <br>
                        <div class="col-md-12 alert" id="MEXIPUNTOSform" style="display: none;"></div>
                    <form class="form-horizontal" id="BannerMEXIPUNTOSForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/offerimg') }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="hidden" name="formtype" value="MEXIPUNTOS"/>
                            <input type="file" name="FrontImage" class="filestyle" onchange="ImagePreview(this.files[0],'MEXIPUNTOSImg','MEXIPUNTOSform')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        @if($frontimgs->maxipuntos)
                        <img src="{{ url('public/images/frontimage') }}/{{ $frontimgs->maxipuntos }}" id='MEXIPUNTOSImg' class="img-responsive">
                        @endif
                        <br>
                        <button type="reset" style="display: none;"></button>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-upload"></i> Subir</button>
                    </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title"><b>BANNER VENTAS AL MAYOREO</b></h4>
                        <p>Tamaño de imagen: 900px × 677px</p>
                        <br>
                        <div class="col-md-12 alert" id="MAYOREOform" style="display: none;"></div>
                    <form class="form-horizontal" id="BannerMAYOREOForm" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/offerimg') }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="hidden" name="formtype" value="MAYOREO"/>
                            <input type="file" class="filestyle" name="FrontImage" onchange="ImagePreview(this.files[0],'MAYOREOImg','MAYOREOform')" data-input="false">
                        </div>
                        <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                        @if($frontimgs->mayoreo)
                        <img src="{{ url('public/images/frontimage') }}/{{ $frontimgs->mayoreo }}" id='MAYOREOImg' class="img-responsive">
                        @endif
                        <br>
                        <button type="reset" style="display: none;"></button>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-upload"></i> Subir</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
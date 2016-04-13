@extends('front')
@section('content')
<!-- Banner Principal -->        
@if(count($banners) > 0)
<section class="banners_container">
    <div class="royalSlider rsDefault">
       @foreach($banners as  $banner)
        <div class="rsContent">
            <a class="rsContent" href="{{ $banner->imageurl }}"><img src="{{ url('public/images/bannerimage') }}/{{ $banner->imagename }}" class="rsImg"/></a>
        </div>
       @endforeach
    </div>	
</section>
@endif
<!-- /Banner Principal -->



<section>
    <div class="color-scheme-2">
        <div class="container">
            @if($webconfig->nuevo != '' || $webconfig->ofertas != '')
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <article class="banner">
                        @if($webconfig->maxipuntos != '')
                        <a href="{{ url('productos_nuevos') }}">
                            <img src="{{ asset('public/images/frontimage') }}/{{ $webconfig->maxipuntos }}" class="img-responsive" alt="">
                        </a> 
                        @endif
                    </article>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <article class="banner">
                        @if($webconfig->ofertas != '')
                        <a href="{{ url('ofertas') }}">
                            <img src="{{ asset('public/images/frontimage') }}/{{ $webconfig->ofertas }}" class="img-responsive" alt="">
                        </a> 
                        @endif
                    </article>
                </div>
            </div>
            @endif
            @if($webconfig->maxipuntos != '' || $webconfig->mayoreo != '')
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <article class="banner">
                        @if($webconfig->maxipuntos != '')
                        <a href="{{ url('mexipuntos') }}">
                            <img src="{{ asset('public/images/frontimage') }}/{{ $webconfig->maxipuntos }}" class="img-responsive" alt="">
                        </a> 
                        @endif
                    </article>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <article class="banner">
                        @if($webconfig->mayoreo != '')
                        <a href="{{ url('contacto') }}">
                            <img src="{{ asset('public/images/frontimage') }}/{{ $webconfig->mayoreo }}" class="img-responsive" alt="">
                        </a>
                        @endif
                    </article>
                </div>
            </div>
            @endif
        </div>  
    </div>
</section>
@endsection
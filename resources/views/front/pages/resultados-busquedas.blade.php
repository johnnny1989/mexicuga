@extends('front')
@section('content')
        
        <section class="top_margin_container">
            <div class="color-scheme-2">
                <div class="container">
                	<div class="row">
                		<article class="col-md-12">
                			<h1><i class="fa fa-search"></i> Resultados relacionados a <span class="tipo_resultados">"{{ $searched }}"</span>...</h1>
                		</article>
                	</div>
                </div>
            </div>
        </section>
<script>
    function ChangeDepartamentosSearch(){
        var id = $("#departmentsort").children(":selected").attr("id");
//        alert(id);
        var url = "{{ url('/resultados-busquedas') }}"+"/"+id+"/{{ $searched }}";
        location.href = url;
    }
</script>
        <section>
            <div class="color-scheme-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <p>
                                <strong><i class="fa fa-th-large"></i> Departamentos</strong>
                                <select class="form-control" id="departmentsort" onchange='ChangeDepartamentosSearch()'>
                                    @foreach($department as $key => $depart)
                                        <option id="{{ ($depart->department) }}" @if(isset($department_id) && $department_id == $depart->id) {{ "selected" }} @endif  value="{{ str_slug($depart->department) }}">{{ $depart->department }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <br>
                        </div>
                        <?php $segment = Request::segment(3); ?>
                        @if($segment != "")
                            <?php $department = Request::segment(2); ?>
                                @if(isset($category_id)) {{ \App\Search::Category($department,$searched,$category_id) }} @else {{ \App\Search::Category($department,$searched) }} @endif
{{--                            {{ \App\Search::Category($department,$searched) }}--}}
                        @endif
                        <div class="col-md-3">
                            <p>
                                <strong><i class="fa fa-star"></i> Marcas</strong>
                                <select class="form-control" id="brand" onchange="sortBrand()">
                                    <option value="*">All</option>
                                    @foreach($marcas as $key => $brand)
                                        <option @if(session('brand') === $brand->id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name  }} </option>
                                    @endforeach
                                </select>
                            </p>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <p>
                                <strong><i class="fa fa-sort"></i> Ordenar por:</strong>
                                <select class="form-control" id="sort" onchange="sortIt()">
                                    <option value="a-z">A - Z</option>
                                    <option value="z-a">Z - A</option>
                                    <option value="l2h">Precio más bajo a más alto</option>
                                    <option value="h2l">Precio más alto a más bajo</option>
                                </select>
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="color-scheme-2">
                <div class="container productos_container">
                    <div class="row" id="productlist">
                        @include('front.pages.productlist')
                    </div>
                    <button type="button" id="LoadMore">Load More</button>
                </div>
            </div>
        </section>

@endsection

@section('footjs')

    <script type="text/javascript">
        $('#LoadMore').click(function(){
            //var scroll = $(window).scrollTop();
            // var Scheight = $(window).height();

            //if(scroll >= Scheight - parseInt(Scheight)*.75 ){
            $.get(PageUrl+'/pagescroll',function(data){
                if(parseInt(data) === 1){
                    ProductList();
                }else{
                    $('#LoadMore').css("display","none");
                }
            });
            //}
        });
    </script>

@endsection
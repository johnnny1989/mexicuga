@extends('admin')
@section('content')
<form action="departamentos_add.html">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">Subir a tienda</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="productos_view.html"><i class="fa fa-cube"></i> Productos</a>
                </li>
                <li class="active">
                    <i class="fa fa-upload text-muted"></i> Subiendo...
                </li>
            </ol>
        </div>
    </div>
</form>

<!-- Basic Form Wizard -->
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12 alert" id="cataloguemsg" style="display: none;"></div>
        <div class="card-box">

            <form class="form-horizontal" id="basic-form" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/product_create') }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <div>
                    <h3>Tipo</h3>
                    <section>
                        <div class="col-md-6">
                            <h4>Tipo de Producto</h4>
                            <div class="radio radio-success">
                                <input type="radio" name="producttype" id="radio14" value="Mexicuga" checked="">
                                <label for="radio14"> Mexicuga</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="producttype" id="radio19" value="Mexicuga_Familia">
                                <label for="radio19"> Mexicuga Familia</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="producttype" id="radio18" value="MexiPuntos">
                                <label for="radio18"> MexiPuntos</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Mostrar como</h4>
                            <div class="radio radio-success">
                                <input type="radio" name="showas" id="Producto_Normal" value="Producto_Normal" checked="">
                                <label for="lo_nuevo"> Producto Normal</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="showas" id="lo_nuevo" value="Lo_Nuevo">
                                <label for="lo_nuevo"> Lo Nuevo</label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="showas" id="oferta" value="Oferta">
                                <label for="oferta"> Oferta</label>
                            </div>
                        </div>
                    </section>
                    <h3>Características</h3>
                    <section>
                        <div class="col-md-12">
                            <h4>Ubicación</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Departamento*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="department">
                                        <option value="">Listado de Departamentos</option>
                                        @foreach($departments as $key => $vals)
                                        <option value="{{ $vals->id }}">{{ $vals->department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Categoría*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="category" id="filtro1" onchange="crgCat();">
                                        <option value="">Listado de Categorías</option>
                                        @foreach($categories as $key => $vals)
                                        <option value="{{ $vals->id }}">{{ $vals->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Marca*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="brand">
                                        <option value="">Listado de Marcas</option>
                                        @foreach($brands as $key => $vals)
                                        <option value="{{ $vals->id }}">{{ $vals->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Disponibilidad*</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="availability">
                                        <option value="1">En Existencia</option>
                                        <option value="2">Sujeto a Disponibilidad</option>
                                        <option value="3">Preguntar por Existencia</option>
                                    </select>
                                </div>
                            </div>
                            <h4>Características</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="userName">Incluye *</label>
                                <div class="col-lg-2{{ $errors->has('includes') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('includes') }}" id="includes" name="includes" type="text">
                                    @if ($errors->has('includes')) <span class="help-block"><strong>{{ $errors->first('includes') }}</strong></span>@endif
                                </div>
                                <label class="col-lg-2 control-label " for="userName">Código *</label>
                                <div class="col-lg-3{{ $errors->has('code') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('code') }}" id="userName" name="code" type="text">
                                    @if ($errors->has('code')) <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="userName">Nombre *</label>
                                <div class="col-lg-10{{ $errors->has('userName') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('userName') }}" id="userName" name="userName" type="text">
                                    @if ($errors->has('userName')) <span class="help-block"><strong>{{ $errors->first('userName') }}</strong></span>@endif
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <span id="appendForm">
                                    <?PHP $x = old('noofinput') ? old('noofinput') : 1; ?>
                                    <input id="appendinput" type="hidden" name="noofinput" value="{{ $x }}" />
                                    @for($n = 1; $n <= $x; $n++)
                                    <div class="row" id="price_row_{{ $n }}">

                                        <div class="col-lg-12">
                                            <hr>
                                            <span class="btn btn-min pull-right" style="cursor: pointer;" onclick="RemovePrice({{ $n }})"><strong>x</strong></span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <label class="col-lg-2 control-label " for="userName">Medidas *</label>
                                        <div class="col-lg-4{{ $errors->has('measures_'.$n) ? ' has-error' : '' }}">
                                            <input class="form-control required" value="{{ old('measures_'.$n) }}" id="measures_{{ $n }}" name="measures_{{ $n }}" type="text">
                                            @if ($errors->has('measures_'.$n)) <span class="help-block"><strong>{{ $errors->first('measures_'.$n) }}</strong></span>@endif
                                        </div>
                                        <div class="col-lg-3">

                                        </div>
                                        <div class="clearfix"></div>
                                        <label class="col-lg-2 control-label"> Precio Normal *</label>
                                        <div class="col-lg-2{{ $errors->has('normalprice_'.$n) ? ' has-error' : '' }}">
                                            <input class="form-control required" value="{{ old('normalprice_'.$n) }}" id="normalprice_{{ $n }}" name="normalprice_{{ $n }}" type="text" placeholder="0.00">
                                            @if ($errors->has('normalprice_'.$n)) <span class="help-block"><strong>{{ $errors->first('normalprice_'.$n) }}</strong></span>@endif
                                        </div>
                                        <label class="col-lg-2 control-label"> % de Descuento</label>
                                        <div class="col-lg-2{{ $errors->has('discount_'.$n) ? ' has-error' : '' }}">
                                            <input class="form-control required" value="{{ old('discount_'.$n) }}" id="discount_{{ $n }}" name="discount_{{ $n }}" type="text" placeholder="0%">
                                            @if ($errors->has('discount_'.$n)) <span class="help-block"><strong>{{ $errors->first('discount_'.$n) }}</strong></span>@endif
                                        </div>
                                        <label class="col-lg-2 control-label"> Precio Público *</label>
                                        <div class="col-lg-2{{ $errors->has('publicprice_'.$n) ? ' has-error' : '' }}">
                                            <input class="form-control required" value="{{ old('publicprice_'.$n) }}" id="publicprice_{{ $n }}" name="publicprice_{{ $n }}" type="text" placeholder="0.00">
                                            @if ($errors->has('publicprice_'.$n)) <span class="help-block"><strong>{{ $errors->first('publicprice_'.$n) }}</strong></span>@endif
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>
                                    @endfor
                                </span>
                                <div class="row">
                                    <label class="col-lg-2 control-label">&nbsp;</label>
                                    <div class="col-lg-8">
                                        <button onclick="AddSection()" class="btn" type="button">+ Agregar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label"> Descripción</label>
                                <div class="col-lg-10{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <textarea class="form-control" name="description"> {{ old('description') }}</textarea>
                                    @if ($errors->has('description')) <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>@endif
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Unidad de Venta *</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="LisUni" name="salesunit">
                                        <option value="">Listado de Unidades de Venta</option>
                                        @foreach($units as $key => $vals)
                                        <option value="{{ $vals->id }}">{{ $vals->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label " for="confirm">Color</label>
                                <div class="col-lg-4{{ $errors->has('color') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('color') }}" name="color" type="text">
                                    @if ($errors->has('color')) <span class="help-block"><strong>{{ $errors->first('color') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Alto</label>
                                <div class="col-lg-2{{ $errors->has('alto') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('alto') }}" name="alto" type="text">
                                    @if ($errors->has('alto')) <span class="help-block"><strong>{{ $errors->first('alto') }}</strong></span>@endif
                                </div>
                                <label class="col-lg-2 control-label">Ancho</label>
                                <div class="col-lg-2{{ $errors->has('width') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('width') }}" name="width" type="text">
                                    @if ($errors->has('width')) <span class="help-block"><strong>{{ $errors->first('width') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Largo</label>
                                <div class="col-lg-2{{ $errors->has('long') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('long') }}" name="long" type="text">
                                    @if ($errors->has('long')) <span class="help-block"><strong>{{ $errors->first('long') }}</strong></span>@endif
                                </div>
                                <label class="col-lg-2 control-label">Peso</label>
                                <div class="col-lg-2{{ $errors->has('Weight') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('Weight') }}" name="Weight" type="text">
                                    @if ($errors->has('Weight')) <span class="help-block"><strong>{{ $errors->first('Weight') }}</strong></span>@endif
                                </div>
                            </div>	
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Información Adicional</label>
                                <div class="col-lg-10{{ $errors->has('additional_information') ? ' has-error' : '' }}">
                                    <textarea class="form-control" name="additional_information">{{ old('additional_information') }}</textarea>
                                    @if ($errors->has('additional_information')) <span class="help-block"><strong>{{ $errors->first('additional_information') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="row"><hr></div>
                            <h4>Entrega</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">De</label>
                                <div class="col-lg-2{{ $errors->has('deleveryfrom') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('deleveryfrom') }}" name="deleveryfrom" type="text">
                                    @if ($errors->has('deleveryfrom')) <span class="help-block"><strong>{{ $errors->first('deleveryfrom') }}</strong></span>@endif
                                </div>
                                <label class="col-lg-1 control-label">a</label>
                                <div class="col-lg-2{{ $errors->has('deleveryto') ? ' has-error' : '' }}">
                                    <input class="form-control required" value="{{ old('deleveryto') }}" name="deleveryto" type="text">
                                    @if ($errors->has('deleveryto')) <span class="help-block"><strong>{{ $errors->first('deleveryto') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label">Condiciones de Entrega</label>
                                <div class="col-lg-10{{ $errors->has('deleverycondition') ? ' has-error' : '' }}">
                                    <textarea class="form-control" name="deleverycondition">{{ old('deleverycondition') }}</textarea>
                                    @if ($errors->has('deleverycondition')) <span class="help-block"><strong>{{ $errors->first('deleverycondition') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="row"><hr></div>
                            <h4>Información Adicional</h4>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Proveedor</label>
                                <div class="col-lg-4">
                                    <select id="LisProv" name="provider" class="form-control valid" aria-invalid="false">
                                        <option value="">Listado de Proveedores</option>
                                        @foreach($providers as $key => $vals)
                                        <option value="{{ $vals->id }}">{{ $vals->company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm">Catálogo</label>
                                <div class="col-lg-4">
                                    <select id="LisCata" name="catalogue" class="form-control valid" aria-invalid="false">
                                        <option value="">Listado de Catálogos</option>
                                        @foreach($catalogues as $key => $vals)
                                        <option value="{{ $vals->id }}">{{ $vals->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label " for="confirm">No. Página</label>
                                <div class="col-lg-3{{ $errors->has('nopage') ? ' has-error' : '' }}">
                                    <input class="form-control" value="{{ old('nopage') }}" name="nopage" type="text">
                                    @if ($errors->has('nopage')) <span class="help-block"><strong>{{ $errors->first('nopage') }}</strong></span>@endif
                                </div>
                            </div>
                        </div>
                        <!-- fin col derecha -->

                    </section>
                    <h3>Ligar con:</h3>
                    <section>
                        <div class="form-group clearfix">
                            <p>Por favor ingrese hasta 12 códigos de producto en el siguiente formato.</p>
                            <div class="col-lg-10{{ $errors->has('productcode') ? ' has-error' : '' }}">
                                <textarea class="form-control" name="productcode" placeholder="Ej. 0015, 5487, 6598, 3215">{{ old('productcode') }}</textarea>
                                @if ($errors->has('productcode')) <span class="help-block"><strong>{{ $errors->first('productcode') }}</strong></span>@endif
                            </div>
                        </div>
                    </section>
                    <h3>Galería</h3>
                    <section>
                        <div class="form-group clearfix">
                            <div class="col-md-6">
                                <h4>Imagen Principal</h4>
                                <div class="form-group{{ $errors->has('mainimage') ? ' has-error' : '' }}">
                                    <input type="file" accept="image/*" onchange="ImagePreview(this.files[0], 'primeimage', 'filemsg')" name="mainimage">
                                    @if ($errors->has('mainimage')) <span class="help-block"><strong>{{ $errors->first('mainimage') }}</strong></span>@endif
                                    <span id="filemsg"></span>
                                </div>
                                <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                                <img src="{{ asset('resources/assets/admin/assets/images/image.jpg') }}" id="primeimage" style="max-height: 250px; max-width: 250px;" class"img-responsive">
                            </div>
                            <div class="col-md-6">
                                <h4>Galería</h4>
                                <div class="form-group{{ $errors->has('files') ? ' has-error' : '' }}">
                                    <input type="file" accept="image/*" class="filestyle" id="files" name="files[]" multiple>
                                    @if ($errors->has('files')) <span class="help-block"><strong>{{ $errors->first('files') }}</strong></span>@endif
                                </div>
                                <div class="form-group">
                                    <p><i class="fa fa-search text-muted"></i> Vista Previa</p>
                                    <output id="list" style="padding: 0;">
                                        <img src="{{ asset('resources/assets/admin/assets/images/gallery.png') }}" id="primeimage" style="max-height: 158px; max-width: 250px;" class"img-responsive">

                                    </output>
                                </div>                               
                            </div>
                        </div>
                    </section>
                    <h3>Palabras Clave</h3>
                    <section>
                        <div class="form-group clearfix">
                            <p>Ingrese palabras clave, sinóminos o términos relacionados al producto para su localización.</p>
                            <div class="col-lg-10{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <textarea class="form-control" name="keywords" placeholder="Ej. martillo, martillo truper, martillo construcción, martillo construccion">{{ old('keywords') }}</textarea>
                                @if ($errors->has('keywords')) <span class="help-block"><strong>{{ $errors->first('keywords') }}</strong></span>@endif
                            </div>
                        </div>
                    </section>
                </div>
            </form> 

        </div>
    </div>
</div>

<!-- End row -->
@endsection
@section('footjs')
<script type="text/javascript">

            var sectionid = {{ $x + 1 }};
            function AddSection(){

            var form = '<div class="row"id="price_row_' + sectionid + '"><div class="col-lg-12"><hr>';
                    form += '<span class="btn btn-min pull-right" style="cursor: pointer;" onclick="RemovePrice(' + sectionid + ')"><strong>x</strong></span>';
                    form += '</div><div class="clearfix"></div>';
                    form += '<label class="col-lg-2 control-label " for="userName">Medidas *</label>';
                    form += '<div class="col-lg-4">';
                    form += '<input class="form-control required" id="measures_' + sectionid + '" name="measures_' + sectionid + '" type="text">';
                    form += '</div><div class="col-lg-3"></div><div class="clearfix"></div>';
                    form += '<label class="col-lg-2 control-label"> Precio Normal *</label>';
                    form += '<div class="col-lg-2">';
                    form += '<input class="form-control required" id="normalprice_' + sectionid + '" name="normalprice_' + sectionid + '" type="text" placeholder="0.00">';
                    form += '</div>';
                    form += '<label class="col-lg-2 control-label"> % de Descuento</label>';
                    form += '<div class="col-lg-2">';
                    form += '<input class="form-control required" id="discount_' + sectionid + '" name="discount_' + sectionid + '" type="text" placeholder="0%">';
                    form += '</div>';
                    form += '<label class="col-lg-2 control-label"> Precio Público *</label>';
                    form += '<div class="col-lg-2">';
                    form += '<input class="form-control required" id="publicprice_' + sectionid + '" name="publicprice_' + sectionid + '" type="text" placeholder="0.00">';
                    form += '</div>';
                    form += '</div>';
                    $('#appendForm').append(form);
                    $('#appendinput').val(sectionid);
                    sectionid++;
                    }

    $('#basic-form a[href="#finish"]').css("display", "none").parent().append('<button type="submit" style="background: #ad2bb7; padding: 7px 10px; border:none; border-radius: 2px;color: #ffffff;">Terminar</button>');
    $('#basic-form').submit(function(){
        SaveImage(this, 'cataloguemsg', 'admin/productos_view');
        return false;
    });
    
    function RemovePrice(value){
        $('#price_row_' + value).css("display", "none");
        $('#measures_' + value).val("0");
        $('#normalprice_' + value).val("0.00");
        $('#discount_' + value).val("0");
        $('#publicprice_' + value).val("0.00");
    }

    function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
            $('#list').html('');
            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

    // Only process image files.
    if (!f.type.match('image.*')) {
    continue;
    }

    var reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function(theFile) {
            return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '" style="max-height:150px; max-width:150px; margin:3px;"/>'].join('');
                    document.getElementById('list').insertBefore(span, null);
            };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
    }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, true);
</script>




@endsection
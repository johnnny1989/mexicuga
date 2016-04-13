@extends('front')
@section('content')
 <section class="top_margin_container">
            <div class="color-scheme-2">
                <div class="container">
                	<div class="row">
                		<article class="col-md-12">
                			<h1 class="producto_nuevos"><i class="fa fa-certificate"></i> Productos Nuevos</h1>
                		</article>
                	</div>
                </div>
            </div>
        </section>
        
        <section>
            <div class="color-scheme-4">
                <div class="container">
                	<div class="row">
                		<div class="col-md-3">
                			<p>
                				<strong>Departamento</strong>
								<select class="form-control">
                                  	<option>Todos</option>
                                    <option>Cerraduras y Candados</option>
                                    <option>Clavos y Tornillos</option>
                                    <option>Ferretería en General</option>
                                    <option>Herramientas</option>
                                    <option>Iluminación</option>
                                    <option>Material Eléctrico</option>
                                    <option>Pinturas y Brocas</option>
                                    <option>Plomería</option>
                                    <option>Tubos y Conexiones</option>
                                </select>
                            </p>
                            <br>
                		</div>
                		<div class="col-md-3">
                			<p>
                				<strong>Categorías</strong>
								<select class="form-control">
									<option>Todas</option>
                                  	<option>Accesorios para Herramientas</option>
                                    <option>Brocas</option>
                                    <option>Herramientas Eléctricas</option>
                                    <option>Herramientas Manuales</option>
                                    <option>Herramientas para Construcción</option>
                                    <option>Otras Herramientas</option>
                                    <option>Seguetas</option>
                                    <option>Seguridad Industrial</option>
                                </select>
                            </p>
                            <br>
                		</div>
                		<div class="col-md-3">
                			<p>
                				<strong>Marcas</strong>
								<select class="form-control">
                                  	<option>Todas</option>
                                    <option>Infra (1)</option>
                                    <option>Santul (1)</option>
                                    <option>Bosch (2)</option>
                                    <option>Goni (2)</option>
                                    <option>Lincoln (2)</option>
                                    <option>Pretul (2)</option>
                                    <option>Stanley (2)</option>
                                    <option>Libre (15)</option>
                                    <option>Truper (23)</option>
                                </select>
                            </p>
                            <br>
                		</div>
                		<div class="col-md-3">
                			<p>
                				<strong>Ordenar por:</strong>
								<select class="form-control">
                                  	<option>A - Z</option>
                                    <option>Z - A</option>
                                    <option>Precio más bajo a más alto</option>
                                    <option>Precio más alto a más bajo</option>
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
 					<div class="row">
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay" alt="ACOPLADOR RAPIDO JGO 5 PIEZAS" title="ACOPLADOR RAPIDO JGO 5 PIEZAS">
                                        	<div class="enviogratis"><p class="envio_gratis"><i class="fa fa-truck"></i> Envío Gratis DF</p></div>                                                                        
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href"></a>
                                            <div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-acoplador-rapido-jgo-5-piezas-20150107-70.jpg') }}" alt="ACOPLADOR RAPIDO JGO 5 PIEZAS" title="ACOPLADOR RAPIDO JGO 5 PIEZAS">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="ACOPLADOR RAPIDO JGO 5 PIEZAS">ACOPLADOR RAPIDO JGO 5 PIEZAS</a>
                                                
                                                <p class="sin_medidas">&nbsp;</p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 609.00</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: 3981</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">  
                                        	<div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>                                                                      
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href" alt="ACOPLADOR RAPIDO JGO 5 PIEZAS LATON" title="ACOPLADOR RAPIDO JGO 5 PIEZAS LATON"></a>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-acoplador-rapido-jgo-5-piezas-laton-20150107-9.jpg') }}" alt="ACOPLADOR RAPIDO JGO 5 PIEZAS LATON" title="ACOPLADOR RAPIDO JGO 5 PIEZAS LATON">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="ACOPLADOR RAPIDO JGO 5 PIEZAS LATON">ACOPLADOR RAPIDO JGO 5 PIEZAS LATON</a>
                                                <p class="sin_medidas">&nbsp;</p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 80.00</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: 1620</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay"> 
                                        	<div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>                                                                       
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href" alt="BALEROS PARA CARRETILLA TRUPER " title="BALEROS PARA CARRETILLA TRUPER"></a>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-balero-carretilla-truper-19784-20150104-79.jpg') }}" alt="BALEROS PARA CARRETILLA TRUPER" title="BALEROS PARA CARRETILLA TRUPER">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="BALEROS PARA CARRETILLA TRUPER">BALEROS PARA CARRETILLA TRUPER</a>
                                                <p class="sin_medidas">&nbsp;</p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 18.50</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: T19784</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                        	<div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>                                                                        
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href" alt="BROQUERO" title="BROQUERO"></a>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-broquero-12-x-12-20150330-29.png') }}" alt="BROQUERO" title="BROQUERO">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="BROQUERO">BROQUERO</a>
                                                <p>
                                                	<select class="form-control">
                                                    	<option value="2279">1/2" x 1/2" DE PULGADA</option>
                                                        <option value="2280">1/2" x 3/8" DE PULGADA</option>
                                                    </select>
                                                </p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 103.00</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: 3390</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                                
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                        	<div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>                                                                        
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href" alt="CARTUCHO MASCARILLA GASES TRUPER 23396" title="CARTUCHO MASCARILLA GASES TRUPER 23396"></a>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-cartucho-mascarilla-gases-truper-23396-20150107-23.jpg') }}" alt="CARTUCHO MASCARILLA GASES TRUPER 23396" title="CARTUCHO MASCARILLA GASES TRUPER 23396">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="CARTUCHO MASCARILLA GASES TRUPER 23396">CARTUCHO MASCARILLA GASES TRUPER 23396</a>
                                                <p class="sin_medidas">&nbsp;</p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 58.00</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: 4948</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                                
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                        	<div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>                                                                        
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href" alt="CUCHILLA CORTADOR TUBO TRUPER 12862" title="CUCHILLA CORTADOR TUBO TRUPER 12862"></a>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-cuchilla-cortador-tubo-truper-12862-20150107-40.jpg') }}" alt="CUCHILLA CORTADOR TUBO TRUPER 12862" title="CUCHILLA CORTADOR TUBO TRUPER 12862">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="CUCHILLA CORTADOR TUBO TRUPER 12862">CUCHILLA CORTADOR TUBO TRUPER 12862</a>
                                                <p class="sin_medidas">&nbsp;</p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 42.00</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: C4064</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                                
                                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                        	<div class="product-new"><i class="fa fa-certificate"></i> nuevo</div>                                                                        
                                            <a href="{{ url('producto_descripcion') }}" class="figure-href" alt="CUCHILLA CORTADORA AZULEJO 10MM" title="CUCHILLA CORTADORA AZULEJO 10MM "></a>
                                            <div class="imagenes_container">
                                            	<div class="imagenes_container_center">
        		                                    <img src="{{ asset('resources/assets/front/img/mexicuga-cuchilla-cortadora-azulejo-10mm-cvastago-truper-12941-20150107-28.jpg') }}" alt="CUCHILLA CORTADORA AZULEJO 10MM " title="CUCHILLA CORTADORA AZULEJO 10MM ">
                	                            </div>
                                            </div>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{ url('producto_descripcion') }}" class="product-name" title="CUCHILLA CORTADORA AZULEJO 10MM ">CUCHILLA CORTADORA AZULEJO 10MM </a>
                                                <p class="sin_medidas">&nbsp;</p>
                                                <div class="product-rating">
	                                                <div class="stars">
	                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
	                                                </div>
	                                                <a href="" class="review">3 <i class="fa fa-comments" title="Comentarios"></i></a> 
	                                            </div>
                                                <p class="tipo_precio">$ 77.00</p>
                                                <p><strong>I.V.A incluído</strong></p>
                                                <p>Código: 1627</p>
                                                <p>Entrega: 1 a 2 días hábiles</p>
                                            </div>
                                            
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</a>
                                            </div>
                                            
                                        </div>

                                    </article> 
                                </div>
                            </div>                   
                </div>  
            </div>
        </section>
@endsection
@extends('base')

@section('content')
<section class="container">
    <div class="grid">
        <div class="row cells2">
            <div class="cell">
                <div data-height="300" class="carousel" data-role="carousel" data-direction="right">
                    @foreach($productos_stock as $producto)
                        <div class="slide">
                            <div class="image-container image-format-fill" style="width: 100%; height: 100%;">
                                <div class="frame">
                                    <div style="width: 100%; height: 100%; background-image: url({{$producto->imagen}}); background-position: center center; background-size: auto 101%; background-repeat: no-repeat; border-radius: 0px;"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
            </div>
            <div style="padding: 20px; text-align: center;" class="cell">
				<h1>Bienvenido a <strong>Tolinpel</strong><br><small>¡Mejoramos tu vida!</small></h1>
				<br>
				<p>Aquí podrás encontrar toda clase de productos y electrodomésticos para comprar para tu hogar. ¡Nos gusta ofrecerte lo mejor de las mejores marcas al mejor de los precios! Ven y aprovecha nuestros descuentos de Diciembre.</p>
            </div>
        </div>
        <hr><br>
        <h2>Destacados</h2>
        <h5>Productos apunto de agotarse:</h5>
        <div class="row">
            @foreach($productos_destacados as $producto)
                <a href="/producto/{{$producto->id}}" class="tile tile-wide-x tile-wide-y producto_comprar">
                    <div class="tile-content slide-up">
                        <div class="slide">
                            <div class="image-container image-format-fill" style="width: 100%; height: 100%;">
                                <div class="frame">
                                    <div style="width: 100%; height: 100%; background-image: url({{$producto->imagen}}); background-position: center center; background-size: auto 101%; background-repeat: no-repeat; border-radius: 0px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-over op-dark">
                            <h3>
                                {{$producto->nombre}} <br>
                                <small>
                                    <del>$ {{$producto->costo}} MXN</del>
                                </small>
                            </h3>
                            <h3>$ {{ $producto->costo - ( $producto->costo * ( $producto->descuento * 0.01 ) ) }} MXN</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
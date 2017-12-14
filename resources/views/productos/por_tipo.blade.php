@extends('base')

@section('content')
<div class="container">
	<h1>Productos disponibles</h1>
	<hr>
	<h3>{{$mostrar}}</h3>
    <div class="grid">
        <div class="row">
        	@foreach( $productos as $producto )
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
</div>
@endsection
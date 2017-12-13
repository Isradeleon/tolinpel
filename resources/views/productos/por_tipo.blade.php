@extends('base')

@section('content')
<div class="container">
	<h1>Productos disponibles</h1>
	<hr>
	<h3>{{$mostrar}}</h3>
	@foreach( $productos as $producto )
		<a href="/producto/{{$producto->id}}" class="tile tile-wide-x tile-wide-y producto_comprar">
            <div class="tile-content slide-up">
                <div class="slide">
                   <img src="{{$producto->imagen}}" alt="">
                </div>
                <div class="slide-over">
                	<h3>
                		{{$producto->nombre}} <br><small>$ {{$producto->costo}} MXN</small>
                	</h3>
                </div>
            </div>
        </a>
	@endforeach
</div>
@endsection
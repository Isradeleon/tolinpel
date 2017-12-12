@extends('base')

@section('css')
<style type="text/css">

.datos_producto,.imgaen_producto{
	padding: 20px;
}
#imagen_producto{
	height: 330px;
	width: 100%;
	background-position:center center; 
	background-size: auto 335px;
	background-color: #fefefe;
	/*border:1px #424242 solid;*/
	margin:auto !important;
	background-repeat: no-repeat;
}
</style>
@endsection

@section('content')
<section class="container">
	<div class="grid">
	    <div class="row cells2">
	        <div class="cell imagen_producto">
	        	<div style="background-image: url(http://lorempixel.com/560/500/);" id="imagen_producto"></div>
	        	<!-- <img src="http://lorempixel.com/240/500/"> -->
	         </div>
	        <div class="cell datos_producto">
	            <h2><strong>{{ $producto->nombre }}</strong></h2>
	            <hr>
	            <h4><strong>Costo:</strong> $ {{$producto->costo}} MXN</h4>
	            <h4><strong>Descuento:</strong> %{{$producto->descuento}}</h4>
	            <h4><strong>Costo ahora:</strong> $ {{ $producto->costo - ( $producto->costo * ( $producto->descuento * 0.01 ) ) }} MXN <br><small><i class="fa fa-money"></i> Te ahorras {{ $producto->costo * ( $producto->descuento * 0.01 ) }}</small></h4>
	            <br><button id="comprar" class="button success block-shadow-success text-shadow"><i class="fa fa-shopping-cart"></i> COMPRAR AHORA</button>
	        </div>
	    </div>
	</div>
</section>

<div class="dialog" data-overlay="true" data-overlay-click-close="true" data-close-button="true" data-role="dialog" id="dialog">
    <h1>Comprar</h1>
    <p>
        <form action="/comprar" method="post">
        	<input type="hidden" name="producto_id" value="{{ $producto->id }}">
        	<label>Número de tarjeta:</label>
        	<div class="input-control text full-size">
			    <input autofocus type="text" name="">
			</div>

			<label>Tipo:</label>
			<div class="input-control select full-size">
			    <select class="marca_tarjeta">
			        <option value="1">VISA</option>
			        <option value="2">MasterCard</option>
			    </select>
			</div>

			<label>Tipo de tarjeta:</label>
			<div class="input-control select full-size">
			    <select class="marca_tarjeta">
			        <option value="1">Crédito</option>
			        <option value="2">Débito</option>
			    </select>
			</div>
        </form>
    </p>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(function(){
	$('#comprar').on('click',function(){
		metroDialog.open('#dialog')
	})
})
</script>
@endsection
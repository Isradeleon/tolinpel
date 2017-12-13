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
	        	<div style="background-image: url({{$producto->imagen}});" id="imagen_producto"></div>
	         </div>
	        <div class="cell datos_producto">
	            <h2><strong>{{ $producto->nombre }}</strong></h2>
	            <hr>
	            <h4><strong>Costo:</strong> <del>$ {{$producto->costo}}</del> MXN</h4>
	            <h4><strong>Descuento:</strong> %{{$producto->descuento}}</h4>
	            <h4><strong>Marca:</strong> {{$producto->marca}}</h4>
	            <h4><strong>Costo ahora:</strong> $ {{ $producto->costo - ( $producto->costo * ( $producto->descuento * 0.01 ) ) }} MXN <br><small><i class="fa fa-money"></i> Te ahorras $ {{ $producto->costo * ( $producto->descuento * 0.01 ) }} MXN!</small></h4>
	            <br><button id="comprar" class="button success block-shadow-success text-shadow"><i class="fa fa-shopping-cart"></i> COMPRAR AHORA</button>
	        </div>
	    </div>
	</div>
</section>

<div class="dialog" data-overlay="true" data-overlay-click-close="true" data-close-button="true" data-role="dialog" id="dialog" data-overlay-color="op-dark">
    <h1>Comprar</h1>
    <p>
        <form action="/comprar" method="post">
        	{{csrf_field()}}
        	
        	<input type="hidden" name="producto_id" value="{{ $producto->id }}">
        	
        	<label><i class="fa fa-credit-card-alt"></i> Número de tarjeta:</label>
        	<div class="input-control text full-size">
			    <input autofocus type="text" name="numero_tarjeta">
			</div>

			<label><i class="fa fa-cc"></i> Tipo:</label>
			<div class="input-control select full-size">
			    <select class="marca_tarjeta">
			        <option value="1">VISA</option>
			        <option value="2">MasterCard</option>
			    </select>
			</div>

			<label><i class="fa fa-bank"></i> Tipo de tarjeta:</label>
			<div class="input-control select full-size">
			    <select class="tipo_tarjeta">
			        <option value="1">Crédito</option>
			        <option value="2">Débito</option>
			    </select>
			</div>

			<label><i class="fa fa-lock"></i> Pin:</label>
        	<div class="input-control text full-size">
			    <input type="text" name="pin">
			</div>
        </form>
    </p>
</div>

<!-- <div class="dialog-overlay op-dark"></div> -->
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
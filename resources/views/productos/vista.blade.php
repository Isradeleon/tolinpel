@extends('base')

@section('css')
<style type="text/css">
.datos_producto,.imgaen_producto{
	padding: 10px;
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
.calendar{
	margin-bottom: 10px;
}
.error{
	color: #ce352c;
	padding-bottom: 15px;
}
.dialog{
	max-height: 100%;
}
</style>
@endsection

@section('content')
<section class="container">
	<div class="grid">
	    <div class="row cells2">
	        <div class="cell imagen_producto">
	        	<div style="background-image: url({{$producto->imagen}});" id="imagen_producto"></div>
	        	<br><br>
	         </div>
	        <div class="cell datos_producto">
	            <h2><strong>{{ $producto->nombre }}</strong></h2>
	            <hr>
	            <h4><strong>Costo:</strong> <del>$ {{$producto->costo}} MXN</del></h4>
	            <h4><strong>Descuento:</strong> %{{$producto->descuento}}</h4>
	            <h4><strong>Marca:</strong> {{$producto->marca}}</h4>
	            <h4><strong><span class="mif mif-tag"></span> Costo ahora:</strong> $ {{ $producto->costo - ( $producto->costo * ( $producto->descuento * 0.01 ) ) }} MXN <br><br><small><span class="mif-dollars mif-lg"></span> Te ahorras $ {{ $producto->costo * ( $producto->descuento * 0.01 ) }} MXN!</small></h4>
	            <br><button id="comprar" class="button success block-shadow-success text-shadow"><span class="mif-cart"></span> COMPRAR AHORA</button>
	        </div>
	    </div>
	</div>
</section>

<div style="overflow-y: auto;" class="dialog" data-overlay="true" data-overlay-click-close="true" data-close-button="true" data-role="dialog" id="dialog" data-overlay-color="op-dark">
    <h1>Comprar</h1>
    <hr>
    <form action="/comprar" method="post">
    	<input type="hidden" name="producto_id" value="{{$producto->id}}">
        {{csrf_field()}}
	    <div class="grid">
	    	<div class="row">
	    		<label><span class="mif-user"></span> Cliente:</label>
	        	<div class="input-control text full-size">
				    <input disabled value="CLIENTE FUNDADOR" type="text" name="cliente">
				</div>
	    	</div>

	    	<div class="row">
	    		<label><span class="mif-credit-card"></span> Número de tarjeta:</label>
	        	<div class="input-control text full-size">
				    <input value="{{old('numero_tarjeta')}}" type="text" name="numero_tarjeta">
				</div>
		    	@if($errors->has('numero_tarjeta'))
					<div class="error">
						{{ $errors->first('numero_tarjeta') }}
					</div>
				@endif
	    	</div>

	    	<div class="row">
	    		<label><i class="fa fa-bank"></i> Tipo de tarjeta:</label>
				<div class="input-control select full-size">
				    <select name="tipo_tarjeta">
				        <option value="1">Crédito</option>
				        <option value="2">Débito</option>
				    </select>
				</div>
	    	</div>

	    	<div class="row">
	    		<label class="input-control radio small-check">
				    <input checked name="marca_tarjeta" value="1" type="radio">
				    <span class="check"></span>
				    <span class="caption"><span class="mif-visa mif-2x"></span> VISA</span>
				</label>
				<label class="input-control radio small-check">
				    <input name="marca_tarjeta" value="2" type="radio">
				    <span class="check"></span>
				    <span class="caption"><span class="mif-mastercard mif-2x"></span> MasterCard</span>
				</label>
	    	</div>

	    	<div class="row">
	    		<label><span class="mif-lock"></span> Pin:</label>
	        	<div class="input-control text full-size">
				    <input value="{{old('pin')}}" type="text" name="pin">
				</div>
				@if($errors->has('pin'))
					<div class="error">
						{{ $errors->first('pin') }}
					</div>
				@endif
	    	</div>

	    	<div class="row">
	    		<label>Expedición:</label>
	    		<div class="input-control text full-size" data-role="datepicker">
				    <input name="fecha_expedicion" type="text">
				    <button class="button"><span class="mif-calendar"></span></button>
				</div>
				@if($errors->has('fecha_expedicion'))
					<div class="error">
						{{ $errors->first('fecha_expedicion') }}
					</div>
				@endif
				<br>
	    	</div>

	    	<div class="row">
	    		<button class="button success block-shadow-success full-size"><span class="mif-checkmark"></span> COMPRAR</button>
	    	</div>
	    </div>
	</form>
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

	@if($errors->any())
	<script type="text/javascript">
		metroDialog.open('#dialog')
	</script>
	@endif
@endsection

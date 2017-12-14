<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tolinpel</title>
	<!-- <link rel="stylesheet" type="text/css" href="/css/icons/css/font-awesome.min.css"> -->
	<link rel="stylesheet" type="text/css" href="/css/metro.min.css">
	<link rel="stylesheet" type="text/css" href="/css/metro-icons.min.css">
	<link rel="stylesheet" type="text/css" href="/css/metro-responsive.min.css">
	<link rel="stylesheet" type="text/css" href="/css/metro-schemes.min.css">
	<link rel="icon" href="/imgs/icono.png">
	<style type="text/css">
		.slide-over{
			padding: 10px;
		}
		#main{
			padding-top: 40px;
		}
		.dialog{
			padding:20px;
		}
		.op-dark{
			background-color: rgba(29, 29, 29, 0.7);
		}
		.logo{
			text-align: center;
		}
		.footer{
			text-align: center;
			padding: 30px;
			display: block;
		}
		.slide-over, .slide-over small{
			color:white;
		}
	</style>
	@yield('css')
</head>
<body>
<div class="logo">
	<a href="/"><img style="width: auto; max-height: 120px; padding: 10px;" src="/imgs/logo.png"></a>
</div>
<div class="app-bar darcula" data-role="appbar">
    <a href="/" class="app-bar-element"><span class="mif-home"></span> Tolinpel</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <li><a href="/lista_productos/1">Celulares</a></li>
        <li><a href="/lista_productos/2">Tablets</a></li>
        <li><a href="/lista_productos/3">Consolas</a></li>
        <li><a href="/lista_productos/4">Computación</a></li>
        <li><a href="/lista_productos/5">TV</a></li>
        <li><a href="/lista_productos/6">Audio</a></li>
        <li><a href="/lista_productos/7">Fotos e impresoras</a></li>
    </ul>
</div>
	<section id="main">
		@yield('content')
	</section>
	<br>
	<div class="footer"><small><span class="mif-copyright"></span> Copyright Tolinpel 2017. Todos los derechos robados.</small></div>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/metro.min.js"></script>
	@yield('js')
</body>
</html>
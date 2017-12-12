<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tolinpel</title>
	<link rel="stylesheet" type="text/css" href="/css/icons/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/metro.min.css">
	<link rel="stylesheet" type="text/css" href="/css/metro-responsive.min.css">
	<link rel="stylesheet" type="text/css" href="/css/metro-schemes.min.css">
	<style type="text/css">
		.slide-over{
			padding: 10px;
		}
		#main{
			padding-top: 30px;
		}
		.dialog{
			padding:20px;
		}
	</style>
	@yield('css')
</head>
<body>
<div class="logo">
	<img src="img/logo.png" alt="">
</div>
<div class="app-bar darcula">
	 {{-- <a class="app-bar-element"><span class=""></span></a> --}}
	<ul class="app-bar-menu">
        <li><a href="/"><img src="img/logo.png" alt=""></a></li>
        <span class="app-bar-divider"></span>
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
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/metro.min.js"></script>
	@yield('js')
</body>
</html>
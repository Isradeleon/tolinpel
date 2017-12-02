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
	@yield('css')
</head>
<body>
	@yield('content')
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/metro.min.js"></script>
	@yield('js')
</body>
</html>
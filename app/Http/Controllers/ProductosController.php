<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductosController extends Controller
{
    public function lista_productos(Request $request, $tipo){
    	$productos = Producto::where('tipo',$tipo)->where('existencia','>',0)->get();
    	if (count( $productos ) > 0) {
    		return view('productos.por_tipo',[
    			"productos" => $productos
    		]);
    	}
    	return "No hay productos de ese tipo";
    }

    public function producto(Request $request, $id){
    	$producto = Producto::find($id);
    	if ($producto) {
    		return view('productos.vista',[
    			"producto" => $producto
    		]);
    	}
    	return "No se ha encontrado ese producto";
    }

    public function comprar(Request $request, $id){
    	$producto = Producto::find($id);
    	if ($producto) {
    		return [
	    		"result" => true
	    	];
    	}
    	return [
    		"result" => false
    	];
    }
}

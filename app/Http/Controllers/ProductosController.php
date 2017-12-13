<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductosController extends Controller
{
    public function index(Request $request){
        $productos_stock = Producto::orderBy('existencia','desc')->take(4)->get();
        $productos_destacados = Producto::orderBy('existencia')->take(4)->get();
        return view('home',[
            "productos_stock"=>$productos_stock,
            "productos_destacados"=>$productos_destacados
        ]);
    }

    public function lista_productos(Request $request, $tipo){
    	$productos = Producto::where('tipo',$tipo)->where('existencia','>',0)->get();
    	if (count( $productos ) > 0) {
            $mostrar="";
            switch($tipo){
                case 1:
                    $mostrar="Celulares";
                break;
                case 2:
                    $mostrar="Tablets";
                break;
                case 3:
                    $mostrar="Consolas";
                break;
                case 4:
                    $mostrar="Computación";
                break;
                case 5:
                    $mostrar="TV";
                break;
                case 6:
                    $mostrar="Audio";
                break;
                case 7:
                    $mostrar="Fotos e impresoras";
                break;
            }

    		return view('productos.por_tipo',[
    			"productos" => $productos,
                "mostrar" => $mostrar
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

    public function comprar(Request $request){
    	$producto = Producto::find($request['producto_id']);
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

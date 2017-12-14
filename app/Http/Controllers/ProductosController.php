<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Validator;

class ProductosController extends Controller
{
    public function index(Request $request){
        $productos_stock = Producto::orderBy('existencia','desc')->take(4)->get();
        $productos_destacados = Producto::where('existencia','>','0')->orderBy('existencia')->take(3)->get();
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
    	return view('errors.vista',[
            "msg" => "No hay registro de productos."
        ]);
    }

    public function producto(Request $request, $id){
    	$producto = Producto::find($id);
    	if ($producto) {
    		return view('productos.vista',[
    			"producto" => $producto
    		]);
    	}
    	return view('errors.vista',[
            "msg" => "Producto no encontrado."
        ]);
    }

    public function comprar(Request $request){
    	$producto = Producto::find($request['producto_id']);
    	if ($producto && $producto->existencia > 0) {
            $rules=[
                "numero_tarjeta"=>"required|digits:16",
                "pin"=>"required|digits:3",
                "fecha_expedicion"=>"required"
            ];

            $trad=[
                'numero_tarjeta.required' => 'Indique el número de tarjeta.',
                'numero_tarjeta.digits' => 'Proporcione 16 dígitos (0-9).',
                'pin.required'  => 'Indique el PIN.',
                'pin.digits'  => 'Proporcione 3 dígitos (0-9).',
                'fecha_expedicion.required'  => 'Indique la expedición.'
            ];
            $request['fecha_expedicion']=str_replace(".", "_", $request['fecha_expedicion']);
            
            $validation=Validator::make($request->all(),$rules,$trad);
            if ($validation->fails()) {
                return back()
                ->withInput($request->only(['numero_tarjeta','pin']))
                ->withErrors($validation);
            }

            $compra_url = 'http://127.0.0.1:8001/transaction/'.
                $request['numero_tarjeta']
                .'/'.
                $request['pin']
                .'/'.
                $request['fecha_expedicion']
                .'/'.
                $request['marca_tarjeta']
                .'/'.
                $request['tipo_tarjeta']
                .'/'.
                ( $producto->costo - ( $producto->costo * ( $producto->descuento * 0.01 ) ) )
                .'/'.
                $producto->nombre;

            $compra_url=str_replace(" ", "_", $compra_url);
            
            $json = json_decode(file_get_contents($compra_url), true);
            $type="alert";
            $icon="warning";
            if ($json['result']) {
                $producto->existencia = $producto->existencia-1;
                $producto->save();
                $type="success";
                $icon="checkmark";
            }

            return back()
            ->with('type_msg',$type)
            ->with('icon', $icon)
            ->with('message',$json['message']);
    	}
    	return [
    		"result" => false
    	];
    }
}

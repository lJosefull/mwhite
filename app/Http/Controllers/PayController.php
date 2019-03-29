<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 1/06/2018
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\AddresCliente;
use App\Clientes;
use App\DomicilioCost;
use App\Pedido;
use App\Producto;
use App\ProductoPurchase;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    public function GoPedido(Request $request){
        try
        {
            if ($request->isMethod('post')){
                $subtotal = 0;
                session_start();
                if(session()->has('car')){
                    for($i=1;$i<=session()->get('car');$i++){
                        if($_SESSION['id_product'][$i] <> ""){
                            $producto = Producto::find($_SESSION['id_product'][$i]);
                            $precio = str_replace(".", "", $producto->precio);
                            if($producto->descuento > 0){
                                $suma = $precio - ($precio * $producto->descuento / 100);
                            }else{
                                $suma = $precio;
                            }
                            $precioTotal = $suma * $_SESSION['cant'][$i];
                            $subtotal = $subtotal + $precioTotal;
                        }
                    }
                }

                $address = AddresCliente::find(session()->get('addresOrder'));

                $domicilio = DomicilioCost::find(1);
                if($address->city == 4242){
                    $valorEnvio = $domicilio->quilla;
                }else{
                    $valorEnvio = $domicilio->other;
                }

                $total = $subtotal + $valorEnvio;

                setlocale(LC_ALL,"es_ES");
                $hoy = date("Y-m-d");

                $id = DB::table('pedido')->insertGetId(
                    ['cliente_id' => session()->get('id'),'subtotal' => $subtotal,'envio' => $valorEnvio,'total' => $total,
                        'fecha' => $hoy,'addres_id' => $address->id,'city'=>$address->city,'status' => 3,'status_progreso' =>1,'validate' => 1]
                );

                if($id > 0){
                    $reference_ped = uniqid("VJBQ{$id}");

                    DB::table('pedido')
                        ->where('id',$id)
                        ->where('cliente_id',session()->get('id'))
                        ->update(['referencia' => $reference_ped]);

                    if(session()->has('car')){
                        for($i=1;$i<=session()->get('car');$i++){
                            if($_SESSION['id_product'][$i] <> ""){
                                $producto = Producto::find($_SESSION['id_product'][$i]);
                                $id_producto = $producto->id;
                                $price = str_replace(".", "", $producto->precio);
                                $descuento = $producto->descuento;
                                if($descuento > 0){
                                    $total = $price - ($price * $descuento / 100);
                                }else{
                                    $total = $price;
                                }
                                $total = $total * $_SESSION['cant'][$i];
                                $proPur = new ProductoPurchase();
                                $proPur->id_pedido = $id;
                                $proPur->id_producto = $id_producto;
                                $proPur->price_pro = $price;
                                $proPur->cant = $_SESSION['cant'][$i];
                                $proPur->descuento = $descuento;
                                $proPur->total = $total;
                                $proPur->save();
                                $_SESSION['id_product'][$i] = "";
                                $_SESSION['cant'][$i] = "";
                                $_SESSION['id_mil_rel'][$i] = "";
                                
                        $porcentaje = ((float)$total * 1) / 100; // Regla de tres
                        $porcentaje = round($porcentaje, 0); 
                        
                         $cliente = Clientes::find(session()->get('id'));
                         $puntos = $cliente->puntos;
                         $totalpuntos = $porcentaje + $puntos;
                         
                         
                        DB::table('cliente')
                        ->where('id',$id)
                        ->where('cliente_id',session()->get('id'))
                        ->update(['puntos' => $totalpuntos]); 
                            }
                        }
                        
                    }

                    session(['id_pedido_epayco' => $id]);

                    $titulo ='¡Pedido realizado!';

                    $cliente = Clientes::find(session()->get('id'));

                    $request->session()->forget('addresOrder');

                    Mail::send('emails.EmailPedido', ['cliente'=>$cliente,'id_pedido'=>$id], function ($m) use ($titulo,$cliente) {
                            $m->from('no-reply@videojuegosbaq.com.co', 'VideoJuegos Barranquilla');
                            $m->to($cliente->email, 'Pedido realizado')->subject($titulo);
                    });

                    Mail::send('emails.EmailAlertaPedido', ['cliente'=>$cliente,'id_pedido'=>$id], function ($m) use ($titulo,$cliente) {
                            $m->from('no-reply@videojuegosbaq.com.co', 'VideoJuegos Barranquilla');
                            $m->to('ventas@videojuegosbaq.com.co', 'Han realizado un pedido')->subject($titulo);
                    });

                    return 'complet';
                }
            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
}
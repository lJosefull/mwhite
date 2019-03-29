<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 5/06/2018
 * Time: 9:12 AM
 */

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class OrderController extends controller
{
    public function PlusMoreOrder(Request $request)
    {
        try
        {
            if ($request->isMethod('post')){
                $id = $request->id;
                $id_product  = $request->id_product;

                session_start();
                if(session()->has('car')){
                    $car = session()->get('car');
                    for($i=1;$i<=$car;$i++) {
                        if($_SESSION['id_product'][$i] == $id_product){
                            $_SESSION['cant'][$i] = $_SESSION['cant'][$i] + 1;
                        }
                    }
                }else{
                    return 0;
                }
                $data = Producto::where('id','=',$id_product)
                    ->get();
                return response(json_encode($data), 200)->header('Content-Type', 'text/json');
            }else{
                return 0;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function LessMoreOrder(Request $request)
    {
        try
        {
            if ($request->isMethod('post')){
                $id = $request->id;
                $id_product  = $request->id_product;

                session_start();
                if(session()->has('car')){
                    $car = session()->get('car');
                    for($i=1;$i<=$car;$i++) {
                        if($_SESSION['id_product'][$i] <> "")
                        {
                            if($_SESSION['id_product'][$i] == $id_product){
                                $_SESSION['cant'][$i] = $_SESSION['cant'][$i] - 1;
                            }
                        }
                    }

                    for($i=1;$i<=$car;$i++) {
                        if($_SESSION['cant'][$i] <= 0){
                            $_SESSION['id_product'][$i] = "";
                            $_SESSION['cant'][$i] = "";
                            $_SESSION['id_mil_rel'][$i] = "";
                        }
                    }

                }else{
                    return 0;
                }
                $data = Producto::where('id','=',$id_product)
                    ->get();
                return response(json_encode($data), 200)->header('Content-Type', 'text/json');
            }else{
                return 0;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function SubTotalPay(Request $request){
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
                return $subtotal;

            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function SelectAddress(Request $request){
        try
        {
            if ($request->isMethod('post')){
                $id = $request->input("addressSelect");
                session(['addresOrder' => $id]);
                return 1;
            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 1/06/2018
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Milimetros;
use App\MilimetrosRelacion;
use App\Producto;
use App\Productos;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class ProductController
{

    public function BuyProductAddCar(Request $request){
        try
        {
            if ($request->isMethod('post')){
                $id_product = $request->input("id");
                $cant = $request->input("cant");

                session_start();
                if(session()->has('car')){
                    $car = session()->get('car');
                    $i = 0;
                    $vali = 0;
                    for($i=1;$i<=$car;$i++){
                        if($_SESSION['id_product'][$i] == $id_product){
                            $vali = 1;
                            $_SESSION['cant'][$i] = $_SESSION['cant'][$i] + $cant;
                        }
                    }

                    if($vali == 0){
                        $car = $car + 1;
                        session(['car' => $car]);
                        $_SESSION['id_product'][$car] = $id_product;
                        $_SESSION['cant'][$car] = $cant;
                    }
                }else{
                    session(['car' => 1]);
                    $car = session()->get('car');
                    $_SESSION['id_product'][1] = $id_product;
                    $_SESSION['cant'][1] = $cant;
                }

                $contador = 0;

                for($i=1;$i<=session()->get('car');$i++){
                    if($_SESSION['id_product'][$i] <> ""){
                        $contador =  $contador + 1;
                    }
                }

                $request->session()->forget('addresOrder');
                return $contador;

            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/2018
 * Time: 8:23 AM
 */

namespace App\Http\Controllers;

use App\AddresCliente;
use App\Ciudades;
use App\Clientes;
use App\Distritos;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class RegisterController
{

    public function Deparment(Request $request)
    {
        try
        {
            $data= Distritos::where('CodPais', $request->id)
                ->orderBy("DisNombre")
                ->get();
            return response(json_encode($data), 200)->header('Content-Type', 'text/json');
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function Cities(Request $request)
    {
        try
        {
            $data= Ciudades::where('CodDistrito', $request->id)
                ->orderBy("CiuNombre")
                ->get();
            return response(json_encode($data), 200)->header('Content-Type', 'text/json');
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function Registro(Request $request)
    {
        try
        {
            $veri = $request->input("emailRe");

            $email = Clientes::whereNull('deleted_at')
                ->select('email')
                ->get();

            $num = 0;
            foreach ($email as $key => $row){
                if($row->email == $veri){
                    $num = $num + 1 ;
                }
            }

            if($num == 0){
                $cliente = new Clientes();
                $cliente->name = $request->input("nameRe");
                $cliente->lastName = $request->input("lastname");
                $cliente->email = $request->input("emailRe");
                $cliente->password = $request->input("password");
                $cliente->born = $request->input("born");
                $cliente->identi = $request->input("id");
                $cliente->country = $request->input("country");
                $cliente->deparment = $request->input("deparment");
                $cliente->city = $request->input("city");
                $cliente->address = $request->input("address");
                $cliente->town = $request->input("town");
                $cliente->cellphone = $request->input("cellphone");
                $cliente->phone = $request->input("phone");
                if ($cliente->save()) {

                    $titulo ='¡Registro exitoso!';

                    Mail::send('emails.EmailRegistro', ['cliente'=>$cliente], function ($m) use ($titulo,$cliente) {
                        $m->from('no-reply@videojuegosbaq.com.co', 'VideoJuegos Barranquilla');

                        $m->to($cliente->email, 'Registro exitoso')->subject($titulo);
                    });

                    $address = new AddresCliente();
                    $address->cliente_id = $cliente->id;
                    $address->name = 'Casa';
                    $address->descripcion = 'Descripcion';
                    $address->address = $request->input("address");
                    $address->city = $request->input("city");
                    $address->deparment = $request->input("deparment");
                    $address->phone = $request->input("phone");
                    $address->save();

                    return 1;
                } else {
                    return 0;
                }
            }else{
                return 2;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
}
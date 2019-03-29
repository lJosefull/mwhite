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
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class AccountController
{
    public function UpdateInfo(Request $request)
    {
        try
        {
            if ($request->isMethod('post')){
                $veri = $request->input("emailModInfo");

                $email = Clientes::whereNull('deleted_at')
                    ->select('email','id')
                    ->get();

                $num = 0;
                foreach ($email as $key => $row){
                    if($row->email == $veri && $row->id != session()->get('id')){
                        $num = $num + 1 ;
                    }
                }

                if($num == 0){
                    $cliente = Clientes::find(session()->get('id'));
                    $cliente->name = $request->input("nameModInfo");
                    $cliente->lastName = $request->input("lastnameModInfo");
                    $cliente->email = $request->input("emailModInfo");
                    $cliente->born = $request->input("bornModInfo");
                    $cliente->identi = $request->input("idModInfo");
                    $cliente->country = $request->input("countryModInfo");
                    $cliente->deparment = $request->input("deparmentModInfo");
                    $cliente->city = $request->input("cityModInfo");
                    $cliente->address = $request->input("addressModInfo");
                    $cliente->town = $request->input("townModInfo");
                    $cliente->cellphone = $request->input("cellphoneModInfo");
                    $cliente->phone = $request->input("phoneModInfo");

                    //Avatar
                    if ($request->file('frontal_file')) {
                        $frontal_file = $request->file('frontal_file');
                        $frontal_file_name = "avatar".rand().'.'. $frontal_file->getClientOriginalExtension();
                        $frontal_file->move(public_path('uploads'), $frontal_file_name);                    
                        $cliente->avatar = 'uploads/'.$frontal_file_name;       
                    }

                    if ($cliente->save()) {
                        return 1;
                    } else {
                        return 0;
                    }
                }else{
                    $cliente = Clientes::find(session()->get('id'));
                    $cliente->name = $request->input("nameModInfo");
                    $cliente->lastName = $request->input("lastnameModInfo");
                    $cliente->born = $request->input("bornModInfo");
                    $cliente->identi = $request->input("idModInfo");
                    $cliente->country = $request->input("countryModInfo");
                    $cliente->deparment = $request->input("deparmentModInfo");
                    $cliente->city = $request->input("cityModInfo");
                    $cliente->address = $request->input("addressModInfo");
                    $cliente->town = $request->input("townModInfo");
                    $cliente->cellphone = $request->input("cellphoneModInfo");
                    $cliente->phone = $request->input("phoneModInfo");

                    //Avatar
                    if ($request->file('frontal_file')) {
                        $frontal_file = $request->file('frontal_file');
                        $frontal_file_name = "avatar".rand().'.'. $frontal_file->getClientOriginalExtension();
                        $frontal_file->move(public_path('uploads'), $frontal_file_name);                    
                        $cliente->avatar = 'uploads/'.$frontal_file_name;       
                    }
                    
                    if ($cliente->save()) {
                        return 2;
                    } else {
                        return 0;
                    }
                }
            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function NewAddress(Request $request){
        try
        {
            if ($request->isMethod('post')){

                $id = session()->get('id');
                $name = $request->input("nameAddAddressInfo");
                $descripcion = $request->input("descripcionAddAddressInfo");
                $address1 = $request->input("addressAddAddressInfo");
                $deparment = $request->input("deparmentAddAddressInfo");
                $city = $request->input("cityAddAddressInfo");
                $phone = $request->input("phoneAddAddressInfo");

                $address = new AddresCliente();
                $address->cliente_id = $id;
                $address->name = $name;
                $address->descripcion = $descripcion;
                $address->address = $address1;
                $address->deparment = $deparment;
                $address->city = $city;
                $address->phone = $phone;

                if ($address->save())
                {
                    return 1;
                } else {
                    return 0;
                }

            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function DeletedAddress(Request $request){
        try{
            if ($request->isMethod('post')) {
                $id = $request->id;

                $address = AddresCliente::find($id);

                if($address->delete()){
                    return 1;
                }else{
                    return 0;
                }

            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function EditAddres(Request $request)
    {
        try
        {
            $data= AddresCliente::find($request->id);
            return response(json_encode($data), 200)->header('Content-Type', 'text/json');
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function editAddresEnv(Request $request)
    {
        try
        {
            if ($request->isMethod('post')){

                $id = $request->input("idEditAddressInfo");
                $name = $request->input("nameEditAddressInfo");
                $descripcion = $request->input("descripcionEditAddressInfo");
                $address1 = $request->input("addressEditAddressInfo");
                $deparment = $request->input("deparmentEditAddressInfo");
                $city = $request->input("cityEditAddressInfo");
                $phone = $request->input("phoneEditAddressInfo");

                $address = AddresCliente::find($id);
                $address->name = $name;
                $address->descripcion = $descripcion;
                $address->address = $address1;
                $address->deparment = $deparment;
                $address->city = $city;
                $address->phone = $phone;

                if ($address->save())
                {
                    return 1;
                } else {
                    return 0;
                }

            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
}
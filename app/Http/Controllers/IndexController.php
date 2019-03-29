<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/2018
 * Time: 8:23 AM
 */

namespace App\Http\Controllers;

use App\Ciudades;
use App\Clientes;
use App\Newsletter;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class IndexController
{
    public function newsletter(Request $request)
    {
        try
        {
            $email = $request->input('emailNewsletter');
            $news = Newsletter::all();
            foreach ($news as $key => $n)
            {
                if($n->email == $email)
                {
                    return 2;
                }
            }
            $new = new Newsletter();
            $new->email = $email;
            if ($new->save())
            {
                return 1;
            } else {
                return 0;
            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function ForgetPassword(Request $request){
        try
        {
            $email = $request->data;
            $users = Clientes::where('email', $email)->count();
            if($users > 0){
                $cliente =  Clientes::where('email', $email)->get();
                $password = $cliente[0]->password;

                $titulo ='¡Recuperacion de contraseña!';

                Mail::send('emails.EmailForgetPassword', ['cliente'=>$cliente], function ($m) use ($titulo,$cliente) {
                    $m->from('no-reply@videojuegosbaq.com.co', 'VideoJuegos Barranquilla');
                    $m->to($cliente[0]->email, 'Recuperacion de contraseña')->subject($titulo);
                });

                return 1;
            }else{
                return 2;
            }

            return 0;

        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function cerrar(Request $request)
    {
        $request->session()->forget('id');
        return redirect('/');
    }

    public function Login(Request $request)
    {
        try
        {
            if ($request->isMethod('post')){
                $email = $request->input("email");
                $password = $request->input('pass');
                $cliente = Clientes::where('email', $email)
                    ->get();

                $users = Clientes::where('email', $email)->count();
                if($users > 0){
                    if($cliente[0]->password == $password){
                        redirect('cuenta');
                        session(['id' => $cliente[0]->id]);
                        session(['name' => $cliente[0]->name]);
                        session(['lastname' => $cliente[0]->lastName]);
                        session(['email' => $cliente[0]->email]);
                        session(['born' => $cliente[0]->born]);
                        session(['identi' => $cliente[0]->identi]);
                        session(['country' => $cliente[0]->country]);
                        session(['deparment' => $cliente[0]->deparment]);
                        session(['city' => $cliente[0]->city]);
                        session(['address' => $cliente[0]->address]);
                        session(['town' => $cliente[0]->town]);
                        session(['cellphone' => $cliente[0]->cellphone]);
                        session(['phone' => $cliente[0]->phone]);
                        session(['puntos' => $cliente[0]->puntos]);
                        return "1";
                    }else{
                        return "Usuario o contraseña incorrecta";
                    }
                }else{
                    return "usuario no registrado";
                }
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

}
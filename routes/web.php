<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ViewsController@home')->name('home');
Route::get('/producto/{id}','ViewsController@product')->name('product')->where(array("id" => "[0-9]+"));
Route::get('/como-nuevo','ViewsController@howNew')->name('howNew');
Route::get('/sobre-nosotros','ViewsController@about')->name('about');
Route::get('/registro','ViewsController@register')->name('register');
Route::get('/trucos','ViewsController@trucos')->name('trucos');
Route::get('/trucos/{id}','ViewsController@trucosDetail')->name('trucosDetail')->where(array("id" => "[0-9]+"));
Route::get('/contacto','ViewsController@contact')->name('contact');

Route::get('/categoria/{id}','ViewsController@category')->name('category')->where(array("id" => "[0-9]+"));
Route::get('/categoria/{id}/subcategoria/{idSub}','ViewsController@subcategory')->name('subcategory')->where(array("id" => "[0-9]+","idSub" => "[0-9]+"));
Route::get('/categoria/{id}/subcategoria/{idSub}/sub_subcategoria/{idSub_sub}','ViewsController@sub_subcategory')
    ->name('subcategory')
    ->where(array("id" => "[0-9]+","idSub" => "[0-9]+","idSub_sub" => "[0-9]+"));
Route::get('/hot-sale','ViewsController@hotSale')->name('hotSale');

Route::get('/email',function (){
    return view('emails.EmailPedido');
})->name('email');

Route::get('/buscar/{name}','ViewsController@buscar')
    ->where(array("name" => "[A-Z-a-z-0-9]+"))
    ->name('buscar');

Route::get('/buscar','ViewsController@buscarSolo')
    ->where(array("name" => "[A-Z-a-z-0-9]+"))
    ->name('buscar-solo');

Route::get('/buscar-trucos/{name}','ViewsController@buscarTrucos')
    ->where(array("name" => "[A-Z-a-z-0-9]+"))
    ->name('buscar-trucos');

Route::get('/buscar-trucos','ViewsController@buscarTrucosSolo')
    ->where(array("name" => "[A-Z-a-z-0-9]+"))
    ->name('buscar-trucos-solo');

Route::get('/validarBono', 'ViewsController@validarBono');
Route::post('validarBonoEpayco','ControllerMore@ValidarBonoEpayco');

/*cuenta & carrito*/
Route::get('/cuenta','ViewsController@account')->name('account');
Route::get('/resumen/{id}','ViewsController@resume')
    ->name('resume')
    ->where(array("id" => "[0-9]+"));
Route::get('/seguir-pedido','ViewsController@SeguirPedido')->name('FollowPedid');
Route::get('/pedidos','ViewsController@listPedidos')->name('listPedidos');
Route::get('/seleccionar','ViewsController@address')->name('address');
Route::get('/carrito','ViewsController@CarShop')->name('carShop');
Route::get('/epayco','ViewsController@epayco');
Route::get('/validarPago','ViewsController@validarPago');
Route::get('/mis-puntos','ViewsController@MyPoints')->name('myPoints');
Route::get('/membrecias','ViewsController@Membrecia')->name('membrecia');

/*Controladores*/
Route::post('newsletter','IndexController@newsletter');
Route::post('contact','ControllerMore@Contact');
Route::post('ModalBono','ControllerMore@ModalBono');

Route::post('buyProduct', 'ProductController@BuyProductAddCar');

Route::post('Deparment','RegisterController@Deparment');
Route::post('City','RegisterController@Cities');
Route::post('Registro','RegisterController@Registro');

Route::post('forgetPassword', 'IndexController@ForgetPassword');
Route::post('Login','IndexController@Login');
Route::get('Logout', 'IndexController@cerrar');


Route::any('/searchProductsFilter/{min}/{max}/{cat_id}/{subcat_id}/{sub_subcat_id}', [
    'as' => '/products/searchProductsFilter',
    'uses' => 'ViewsController@SearchProductsFilter'
]);

Route::post('UpdateInfo', 'AccountController@UpdateInfo');
Route::post('newAddress', 'AccountController@NewAddress');
Route::post('deletedAddres', 'AccountController@DeletedAddress');
Route::post('editAddres', 'AccountController@EditAddres');
Route::post('editAddresEnv', 'AccountController@editAddresEnv');

Route::post('plusMoreOrder', 'OrderController@PlusMoreOrder');
Route::post('lessMoreOrder', 'OrderController@LessMoreOrder');
Route::post('subtotalpay', 'OrderController@SubTotalPay');
Route::post('selectAddress', 'OrderController@SelectAddress');

Route::post('goPedido', 'PayController@GoPedido');
Route::post('validarPagoEpayco','ControllerMore@ValidarPagoEpayco');
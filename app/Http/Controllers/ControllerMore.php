<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 30/05/2018
 * Time: 8:16 AM
 */

namespace App\Http\Controllers;

use App\AddresCliente;
use App\Banner;
use App\BannerDown;
use App\BrandsHome;
use App\Categorias;
use App\CategoriasHome;
use App\Ciudades;
use App\Clientes;
use App\Distritos;
use App\DomicilioCost;
use App\GaleriaAbout;
use App\Imagenes;
use App\Info;
use App\Lugares;
use App\MarcasHome;
use App\Paises;
use App\Pedido;
use App\Producto;
use App\ProductoPurchase;
use App\Sub_SubCategorias;
use App\SubCategorias;
use App\Textos;
use App\Trucos;
use App\VideosAbout;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;

class ViewsController extends Controller
{
    public function home()
    {
        
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $banner = Banner::orderby('id','desc','url')->get();
        $marcas_home = MarcasHome::all();
        $cliente = Clientes::find(session()->get('id'));
        $moreVendidos = Producto::whereNull('deleted_at')
            ->orderby('cant_ven','desc')
            ->limit(10)
            ->get();
        $novedades = Producto::whereNull('deleted_at')
            ->where('nuevo','SI')
            ->get();
        $promociones = Producto::whereNull('deleted_at')
            ->where('descuento','>',0)
            ->orderby(DB::raw('RAND()'))
            ->limit(10)
            ->get();

        $categorias_home = CategoriasHome::all();

        $logos = BrandsHome::all();

        $banner_down = BannerDown::find(1);

        return view('index', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'banner' => $banner,
            'cliente' => $cliente,
            'marcas_home' => $marcas_home,
            'moreVendidos' => $moreVendidos,
            'novedades' => $novedades,
            'promociones' => $promociones,
            'categorias_home' => $categorias_home,
            'logos'=>$logos,
            'banner_down'=>$banner_down
        ]);
    }

    public function product($id)
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $product = Producto::find($id);
        $categoria = Categorias::find($product->categorias_id);
        $subCategoria = SubCategorias::find($product->subcategorias_id);
        $sub_subCategoria = Sub_SubCategorias::find($product->sub_subcategorias_id);

        $interesar = Producto::whereNull('deleted_at')
            ->where('categorias_id',$product->categorias_id)
            ->where('subcategorias_id',$product->subcategorias_id)
            ->where('sub_subcategorias_id',$product->sub_subcategorias_id)
            ->orderby(DB::raw('RAND()'))
            ->limit(10)
            ->get();

        $promociones = Producto::whereNull('deleted_at')
            ->where('descuento','>',0)
            ->where('categorias_id',$product->categorias_id)
            ->where('subcategorias_id',$product->subcategorias_id)
            ->where('sub_subcategorias_id',$product->sub_subcategorias_id)
            ->orderby(DB::raw('RAND()'))
            ->limit(10)
            ->get();

        $sub_SubCategorias = Sub_SubCategorias::where('deleted_at')
            ->where('categorias_id',$product->categorias_id)
            ->where('subcategorias_id',$product->subcategorias_id)
            ->get();

        return view('product', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'product' => $product,
            'cliente' => $cliente,
            'categoria' => $categoria,
            'subCategoria' =>$subCategoria,
            'sub_subCategoria' =>$sub_subCategoria,
            'interesar'=>$interesar,
            'promociones'=>$promociones,
            'sub_SubCategorias'=>$sub_SubCategorias
        ]);
    }

    public function howNew()
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        return view('howNew', [
            'info' => $info,
            'cliente' => $cliente,
            'imagenes' => $imagenes,
            'categorias' => $categorias
        ]);
    }

    public function category($id)
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $cat_id = $id;
        $categoria = Categorias::find($id);
        $subcat_id = 0;
        $subcategoria = SubCategorias::find($subcat_id);
        $sub_subcat_id = 0;
        $sub_subcategoria = Sub_SubCategorias::find($sub_subcat_id);

        $subcategorias = SubCategorias::where('deleted_at')->where('categorias_id',$cat_id)->get();
        if($subcat_id >=1){
            $sub_subcategorias = Sub_SubCategorias::where('deleted_at')
                ->where('categorias_id',$cat_id)
                ->where('subcategorias_id',$subcat_id)
                ->get();
        }else{
            $sub_subcategorias = Sub_SubCategorias::where('deleted_at')
                ->where('categorias_id',$cat_id)
                ->get();
        }

        return view('category', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'cliente' => $cliente,
            'cat_id'=>$cat_id,'categoria'=>$categoria,'subcat_id'=>$subcat_id,'subcategoria'=>$subcategoria,
            'sub_subcat_id'=>$sub_subcat_id,'sub_subcategoria'=>$sub_subcategoria,
            'subcategorias'=>$subcategorias,'sub_subcategorias'=>$sub_subcategorias,
        ]);
    }

    public function subcategory($id,$idsubCat)
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $cat_id = $id;
        $categoria = Categorias::find($id);
        $subcat_id = $idsubCat;
        $subcategoria = SubCategorias::find($subcat_id);
        $sub_subcat_id = 0;
        $sub_subcategoria = Sub_SubCategorias::find($sub_subcat_id);

        $subcategorias = SubCategorias::where('deleted_at')->where('categorias_id',$cat_id)->get();
        if($subcat_id >=1){
            $sub_subcategorias = Sub_SubCategorias::where('deleted_at')
                ->where('categorias_id',$cat_id)
                ->where('subcategorias_id',$subcat_id)
                ->get();
        }else{
            $sub_subcategorias = Sub_SubCategorias::where('deleted_at')
                ->where('categorias_id',$cat_id)
                ->get();
        }

        return view('category', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'cliente' => $cliente,
            'cat_id'=>$cat_id,'categoria'=>$categoria,'subcat_id'=>$subcat_id,'subcategoria'=>$subcategoria,
            'sub_subcat_id'=>$sub_subcat_id,'sub_subcategoria'=>$sub_subcategoria,
            'subcategorias'=>$subcategorias,'sub_subcategorias'=>$sub_subcategorias,
        ]);
    }

    public function sub_subcategory($id,$idsubCat,$idSub_sub)
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $cat_id = $id;
        $categoria = Categorias::find($id);
        $subcat_id = $idsubCat;
        $subcategoria = SubCategorias::find($subcat_id);
        $sub_subcat_id = $idSub_sub;
        $sub_subcategoria = Sub_SubCategorias::find($sub_subcat_id);

        $subcategorias = SubCategorias::where('deleted_at')->where('categorias_id',$cat_id)->get();
        if($subcat_id >=1){
            $sub_subcategorias = Sub_SubCategorias::where('deleted_at')
                ->where('categorias_id',$cat_id)
                ->where('subcategorias_id',$subcat_id)
                ->get();
        }else{
            $sub_subcategorias = Sub_SubCategorias::where('deleted_at')
                ->where('categorias_id',$cat_id)
                ->get();
        }

        return view('category', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'cliente' => $cliente,
            'cat_id'=>$cat_id,'categoria'=>$categoria,'subcat_id'=>$subcat_id,'subcategoria'=>$subcategoria,
            'sub_subcat_id'=>$sub_subcat_id,'sub_subcategoria'=>$sub_subcategoria,
            'subcategorias'=>$subcategorias,'sub_subcategorias'=>$sub_subcategorias,
        ]);
    }

    public function about()
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $textos = Textos::all();
        $galeria_imagenes = GaleriaAbout::all();
        $galeria_videos = VideosAbout::orderby('id','desc')->get();

        return view('about', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'cliente' => $cliente,
            'textos' => $textos,
            'galeria_imagenes' => $galeria_imagenes,
            'galeria_videos' => $galeria_videos
        ]);
    }

    public function register()
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $paises = Paises::all();
        return view('register', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'cliente' => $cliente,
            'paises'=>$paises,
        ]);
    }

    public function hotSale(){
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $cliente = Clientes::find(session()->get('id'));
        $products = Producto::whereNull('deleted_at')
            ->where('descuento','>',0)
            ->paginate(24);

        return view('hotSale', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'cliente' => $cliente,
            'products' => $products
        ]);
    }

    public function trucos(){
   

        return 'trucos';
   
    }

    public function trucosDetail($id)
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();

        $truco = Trucos::find($id);
        $moreTrucos = Trucos::where('id','!=',$id)
            ->whereNull('deleted_at')
            ->orderBy(DB::raw('RAND()'))
            ->take(2)
            ->get();

        return view('trucosDetail', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'truco' => $truco,
            'moreTrucos' => $moreTrucos
        ]);
    }

    public function contact()
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();
        $lugares = Lugares::whereNull('deleted_at')
            ->get();
        return view('contact', [
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'lugares' => $lugares
        ]);
    }

    public function validarBono(Request $request)
    {
        return view('validarBono');
    }

    public function info()
    {
        $info = Info::find(1);
        return $info;
    }

    public function categorias()
    {
        $categorias = Categorias::whereNull('deleted_at')
            ->where('mostrar','SI')
            ->limit(13)
            ->get();
        return $categorias;
    }

    public function imagenes()
    {
        $imagenes = Imagenes::all();
        return $imagenes;
    }

    public function SearchProductsFilter($min,$max,$cat_id,$subcat_id,$sub_subcat_id)
    {
        $query = Producto::whereNull('deleted_at');
        $query->where('precio','>=',$min);
        $query->where('precio','<=',$max);
        if($cat_id >= 1){
            $query->where('categorias_id',$cat_id);
        }
        if($subcat_id >= 1){
            $query->where('subcategorias_id',$subcat_id);
        }
        if($sub_subcat_id >= 1){
            $query->where('sub_subcategorias_id',$sub_subcat_id);
        }
        $products = $query->get();
        return view('partials.productos',[
            'products'=>$products
        ]);
    }

    public function buscar($name)
    {
        $name = str_replace("-", " ", $name);
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();

        $products = Producto::where('name','like', '%'.$name.'%')
            ->whereNull('deleted_at')
            ->orderBy("cant_ven",'desc')
            ->paginate(8);
        return view('buscar',[
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'products' => $products
        ]);
    }

    public function buscarSolo()
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();

        $name = "";
        $products = Producto::where('name','like', '%'.$name.'%')
            ->whereNull('deleted_at')
            ->take(24)
            ->orderBy("cant_ven",'desc')
            ->paginate(24);

        return view('buscar',[
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'products' => $products
        ]);
    }

    public function buscarTrucos($name)
    {
        $name = str_replace("-", " ", $name);
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();

        $trucos = Trucos::where('title','like', '%'.$name.'%')
            ->whereNull('deleted_at')
            ->orderBy("fecha",'desc')
            ->paginate(8);
        return view('buscarTrucos',[
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'trucos' => $trucos,
            'name' => $name
        ]);
    }

    public function buscarTrucosSolo()
    {
        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();

        $name = "";
        $trucos = Producto::where('title','like', '%'.$name.'%')
            ->whereNull('deleted_at')
            ->take(24)
            ->orderBy("cant_ven",'desc')
            ->paginate(24);

        return view('buscarTrucos',[
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'trucos' => $trucos,
            'name' => $name
        ]);
    }

    /*cuenta & carrito*/
    function account(){
        if(session()->get('id')){
            $info = ViewsController::info();
            $imagenes = ViewsController::imagenes();
            $categorias = ViewsController::categorias();

            $cliente = Clientes::find(session()->get('id'));
            $addreses = AddresCliente::whereNull('deleted_at')
                ->where('cliente_id',session()->get('id'))
                ->get();

            $pedidos = Pedido::whereNull('deleted_at')
                ->where('cliente_id',session()->get('id'))
                ->orderBy('id','desc')
                ->get();

            $paises = Paises::all();
            $distritos = Distritos::where('CodPais', $cliente->country)
                ->orderBy("DisNombre")
                ->get();
            $ciudades = Ciudades::where('CodDistrito', $cliente->deparment)
                ->orderBy("CiuNombre")
                ->get();

            $distritosAddress = Distritos::where('CodPais', session()->get('country'))
                ->orderBy("DisNombre")
                ->get();

            return view('account',[
                'info' => $info,
                'imagenes' => $imagenes,
                'categorias' => $categorias,
                'cliente' => $cliente,
                'addreses' => $addreses,
                'pedidos' => $pedidos,
                'paises' => $paises,
                'distritos' => $distritos,
                'ciudades' => $ciudades,
                'distritosAddress' => $distritosAddress
            ]);
        }else{
            return redirect('/');
        }
    }

    function CarShop(){
        if(session()->get('id')){
            if(session()->has('addresOrder')){

                $info = ViewsController::info();
                $imagenes = ViewsController::imagenes();
                $categorias = ViewsController::categorias();

                $cliente = Clientes::find(session()->get('id'));

                $address = AddresCliente::find(session()->get('addresOrder'));
                $domicilio = DomicilioCost::find(1);
                if($address->city == 4242){
                    $valorEnvio = $domicilio->quilla;
                }else{
                    $valorEnvio = $domicilio->other;
                }

                return view('carShop',[
                    'info' => $info,
                    'imagenes' => $imagenes,
                    'categorias' => $categorias,
                    'cliente' => $cliente,
                    'valorEnvio'=>$valorEnvio,
                ]);

            }else{
                return redirect('/seleccionar');
            }
        }else{
            return redirect('/');
        }
    }

    function address(){
        if(session()->has('id')){
            $info = ViewsController::info();
            $imagenes = ViewsController::imagenes();
            $categorias = ViewsController::categorias();

            $cliente = Clientes::find(session()->get('id'));

            $addresses = AddresCliente::join('ciudades','ciudades.CiuCodigo','=','addrescliente.city')
                ->join('distritos','distritos.DisCodigo','=','addrescliente.deparment')
                ->where('cliente_id','=',session()->get('id'))
                ->select('addrescliente.*','ciudades.*','distritos.*','addrescliente.id as adId')
                ->get();

            return view('address',[
                'info' => $info,
                'imagenes' => $imagenes,
                'categorias' => $categorias,
                'cliente' => $cliente,
                'addresses'=>$addresses
            ]);
        }else{
            return redirect('/');
        }
    }

    public function epayco()
    {

        $info = ViewsController::info();
        $imagenes = ViewsController::imagenes();
        $categorias = ViewsController::categorias();

        $pedido = Pedido::find(session()->get('id_pedido_epayco'));
        $cliente = Clientes::find($pedido->cliente_id);

        return view('epayco',[
            'info' => $info,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'pedido' => $pedido,
            'cliente' => $cliente,
        ]);
    }

    function validarPago(){
        return view('validarPago');
    }

    public function SeguirPedido()
    {
        if(session()->get('id')){
            $info = ViewsController::info();
            $imagenes = ViewsController::imagenes();
            $categorias = ViewsController::categorias();

            $cliente = Clientes::find(session()->get('id'));

            $pedidos = Pedido::where('cliente_id',session()->get('id'))
                ->orderBy('id','desc')
                ->get();

            $pedido = Pedido::find($pedidos[0]->id);

            return view('SeguirPedido',[
                'info' => $info,
                'imagenes' => $imagenes,
                'categorias' => $categorias,
                'cliente' => $cliente,
                'pedido' => $pedido,
            ]);
        }else{
            return redirect('/');
        }
    }

    public function listPedidos()
    {
        if(session()->get('id')){
            $info = ViewsController::info();
            $imagenes = ViewsController::imagenes();
            $categorias = ViewsController::categorias();

            $cliente = Clientes::find(session()->get('id'));

            $pedidos = Pedido::where('cliente_id',session()->get('id'))
                ->orderBy('id','desc')
                ->get();

            return view('listPedidos',[
                'info' => $info,
                'imagenes' => $imagenes,
                'categorias' => $categorias,
                'cliente' => $cliente,
                'pedidos' => $pedidos,
            ]);
        }else{
            return redirect('/');
        }
    }

    public function resume($id)
    {
        if(session()->get('id')){
            $pedido = Pedido::find($id);
            if($pedido->id <> null){
                $info = ViewsController::info();
                $imagenes = ViewsController::imagenes();
                $categorias = ViewsController::categorias();

                $cliente = Clientes::find(session()->get('id'));

                $productoPurchase = ProductoPurchase::where('id_pedido','=',$id)
                    ->get();

                $address = AddresCliente::find($pedido->addres_id);
                $deparment = Distritos::find($address->deparment);
                $city = Ciudades::find($address->city);

                return view('resume',[
                    'info' => $info,
                    'imagenes' => $imagenes,
                    'categorias' => $categorias,
                    'cliente' => $cliente,
                    'pedido' => $pedido,
                    'productoPurchase' => $productoPurchase,
                    'address' => $address,
                    'deparment' => $deparment,
                    'city' => $city
                ]);
            }else{
                return redirect('/cuenta');
            }
        }else{
            return redirect('/');
        }
    }

    public function MyPoints()
    {
        if(session()->get('id')){
            $info = ViewsController::info();
            $imagenes = ViewsController::imagenes();
            $categorias = ViewsController::categorias();

            $cliente = Clientes::find(session()->get('id'));
           
           
            
            
            
            return view('myPoints',[
                'info' => $info,
                'imagenes' => $imagenes,
                'categorias' => $categorias,
                'cliente' => $cliente
                
            ]);
        }else{
            return redirect('/');
        }
    }

    public function Membrecia()
    {
        if(session()->get('id')){
            $info = ViewsController::info();
            $imagenes = ViewsController::imagenes();
            $categorias = ViewsController::categorias();

            $cliente = Clientes::find(session()->get('id'));

            return view('membrecias',[
                'info' => $info,
                'imagenes' => $imagenes,
                'categorias' => $categorias,
                'cliente' => $cliente,
            ]);
        }else{
            return redirect('/');
        }
    }

}
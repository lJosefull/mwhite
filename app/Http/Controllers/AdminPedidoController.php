<?php namespace App\Http\Controllers;

	use App\Clientes;
    use App\Pedido;
    use App\Producto;
    use App\ProductoPurchase;
    use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminPedidoController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "pedido";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Cliente Nombres","name"=>"cliente_id","join"=>"clientes,name"];
			$this->col[] = ["label"=>"Cliente Apellidos","name"=>"cliente_id","join"=>"clientes,lastName"];
			$this->col[] = ["label"=>"Referencia","name"=>"referencia"];
			$this->col[] = ["label"=>"Subtotal","name"=>"subtotal"];
			$this->col[] = ["label"=>"Envio","name"=>"envio"];
			$this->col[] = ["label"=>"Total","name"=>"total"];
			$this->col[] = ["label"=>"Fecha","name"=>"fecha"];
			$this->col[] = ["label"=>"Ciudad","name"=>"city","join"=>"ciudades,CiuNombre"];
			$this->col[] = ["label"=>"Estado","name"=>"status","join"=>"pedido_status,name"];
			$this->col[] = ["label"=>"Estado de progreso","name"=>"status_progreso","join"=>"pedido_status_progreso,name"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Cliente','name'=>'cliente_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'clientes,name',"datatable_format"=>"name,' ',lastName,' - CC ', identi"];
			$this->form[] = ['label'=>'Referencia','name'=>'referencia','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10','readonly'=>'true'];
			$this->form[] = ['label'=>'Subtotal','name'=>'subtotal','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10','readonly'=>'true'];
			$this->form[] = ['label'=>'Envio','name'=>'envio','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10','readonly'=>'true'];
			$this->form[] = ['label'=>'Total','name'=>'total','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10','readonly'=>'true'];
			$this->form[] = ['label'=>'Fecha','name'=>'fecha','type'=>'date','validation'=>'required','width'=>'col-sm-10','readonly'=>'true'];
            $this->form[] = ['label'=>'Dirección','name'=>'addres_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'addrescliente,address','readonly'=>'true'];
            $this->form[] = ['label'=>'Ciudad','name'=>'city','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ciudades,CiuNombre','readonly'=>'true'];
            $this->form[] = ['label'=>'Estado','name'=>'status','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'pedido_status,name'];
			$this->form[] = ['label'=>'Estado de Progreso','name'=>'status_progreso','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'pedido_status_progreso,name'];

            $columns[] = ['label'=>'Producto Name','name'=>'id_producto','type'=>'select','datatable'=>'producto,name','required'=>true];
            $columns[] = ['label'=>'Precio','name'=>'price_pro','type'=>'number','required'=>true];
            $columns[] = ['label'=>'Cantidad','name'=>'cant','type'=>'number','required'=>true];
            $columns[] = ['label'=>'Descuento','name'=>'descuento','type'=>'number','required'=>true];
            $columns[] = ['label'=>'Total','name'=>'total','type'=>'number','required'=>true];
            $this->form[] = ['label'=>'Productos','name'=>'id','type'=>'child','columns'=>$columns,'table'=>'productopurchase','foreign_key'=>'productopurchase.id_pedido'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Cliente Id","name"=>"cliente_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cliente,id"];
			//$this->form[] = ["label"=>"Referencia","name"=>"referencia","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Subtotal","name"=>"subtotal","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Envio","name"=>"envio","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Total","name"=>"total","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Estado","name"=>"estado","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Fecha","name"=>"fecha","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Addres Id","name"=>"addres_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"addres,id"];
			//$this->form[] = ["label"=>"City","name"=>"city","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Status Progreso","name"=>"status_progreso","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 
            $pedido = Pedido::find($id);
            if( $pedido->status == 1 && $pedido->validate == 1 ){
                $pedido->validate = 2;
                $pedido->save();
                $cliente = Clientes::find($pedido->cliente_id);
                $productoPurchase = ProductoPurchase::where('id_pedido',$id)->get();

                $puntos = 0;

                foreach ($productoPurchase as $key=> $pp)
                {
                    $producto = Producto::find($pp->id_producto);
                    $producto->cant_ven = $producto->cant_ven + $pp->cant;
                    $puntos = $puntos + $producto->puntos;
                    $producto->save();
                }

                $cliente->puntos = $cliente->puntos + $puntos;
                $cliente->save();
            }
            return 1;
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here
            $deleted = Pedido::find($id);

            if($deleted->delete()){
                return 1;
            }else{
                return 0;
            }
	    }



	    //By the way, you can still create your own method in here... :) 


	}
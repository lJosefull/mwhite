<?php namespace App\Http\Controllers;

	use App\Clientes;
    use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminClientesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {
	    	# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->table 			   = "clientes";	        
			$this->title_field         = "name";
			$this->limit               = 20;
			$this->orderby             = "id,desc";
			$this->show_numbering      = FALSE;
			$this->global_privilege    = FALSE;	        
			$this->button_table_action = TRUE;   
			$this->button_action_style = "button_icon";     
			$this->button_add          = false;
			$this->button_delete       = false;
			$this->button_edit         = false;
			$this->button_detail       = TRUE;
			$this->button_show         = TRUE;
			$this->button_filter       = TRUE;        
			$this->button_export       = FALSE;	        
			$this->button_import       = FALSE;
			$this->button_bulk_action  = TRUE;	
			$this->sidebar_mode		   = "normal"; //normal,mini,collapse,collapse-mini
			# END CONFIGURATION DO NOT REMOVE THIS LINE						      

			# START COLUMNS DO NOT REMOVE THIS LINE
	        $this->col = [];
            $this->col[] = ["label"=>"Nombre","name"=>"name"];
            $this->col[] = ["label"=>"Apellidos","name"=>"lastName"];
            $this->col[] = ["label"=>"Correo","name"=>"email"];
            $this->col[] = ["label"=>"Nacimiento","name"=>"born"];
            $this->col[] = ["label"=>"Identificacion","name"=>"identi"];
            $this->col[] = ["label"=>"Pais","name"=>"country","join"=>"paises,PaisNombre"];
            $this->col[] = ["label"=>"Departamento","name"=>"deparment","join"=>"distritos,DisNombre"];
            $this->col[] = ["label"=>"Ciudad","name"=>"city","join"=>"ciudades,CiuNombre"];
            $this->col[] = ["label"=>"Direccion","name"=>"address"];
            $this->col[] = ["label"=>"Barrio","name"=>"town"];
            $this->col[] = ["label"=>"Celular","name"=>"cellphone"];
            $this->col[] = ["label"=>"Telefono","name"=>"phone"];
            $this->col[] = ["label"=>"Puntos","name"=>"puntos"];

			# END COLUMNS DO NOT REMOVE THIS LINE
			# START FORM DO NOT REMOVE THIS LINE
            $this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:100','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'LastName','name'=>'lastName','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:100|email|unique:clientes','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Password','name'=>'password','type'=>'password','validation'=>'min:3|max:32','width'=>'col-sm-10','help'=>'Mínimo 6 caracteres. Deja este campo vacio si no solicitaste un cambio de contraseña.'];
            $this->form[] = ['label'=>'Born','name'=>'born','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Identi','name'=>'identi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Country','name'=>'country','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Deparment','name'=>'deparment','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'City','name'=>'city','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Address','name'=>'address','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Town','name'=>'town','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Cellphone','name'=>'cellphone','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Phone','name'=>'phone','type'=>'number','validation'=>'required|numeric','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Puntos','name'=>'puntos','type'=>'number','validation'=>'required|numeric','width'=>'col-sm-10',];
			# END FORM DO NOT REMOVE THIS LINE     

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
            $deleted = Clientes::find($id);

            if($deleted->delete()){
                return 1;
            }else{
                return 0;
            }
	    }



	    //By the way, you can still create your own method in here... :) 


	}
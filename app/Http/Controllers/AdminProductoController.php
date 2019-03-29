<?php namespace App\Http\Controllers;

	use App\Producto;
    use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminProductoController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "producto";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Categoria","name"=>"categorias_id","join"=>"categorias,name"];
			$this->col[] = ["label"=>"Subcategoria","name"=>"subcategorias_id","join"=>"subcategorias,name"];
			$this->col[] = ["label"=>"Sub_SubCategoria","name"=>"sub_subcategorias_id","join"=>"sub_subcategorias,name"];
			$this->col[] = ["label"=>"Nombre","name"=>"name"];
			$this->col[] = ["label"=>"Precio","name"=>"precio"];
			$this->col[] = ["label"=>"Descuento","name"=>"descuento"];
            $this->col[] = ["label"=>"Imagen","name"=>"img",'image'=>true];
			$this->col[] = ["label"=>"Puntos","name"=>"puntos"];
			$this->col[] = ["label"=>"Stock","name"=>"stock"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Categoria','name'=>'categorias_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'categorias,name','datatable_where' => 'deleted_at is NULL'];
			$this->form[] = ['label'=>'Subcategoria','name'=>'subcategorias_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'subcategorias,name','parent_select'=>'categorias_id'];
			$this->form[] = ['label'=>'Sub_SubCategoria','name'=>'sub_subcategorias_id','type'=>'select','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'sub_subcategorias,name','parent_select'=>'subcategorias_id'];
            $this->form[] = ['label'=>'Nombre','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:100','width'=>'col-sm-10','placeholder'=>''];
            $this->form[] = ['label'=>'Tipo','name'=>'type_pro','type'=>'select2','validation'=>'required','width'=>'col-sm-10','dataenum'=>'1|VideoJuego;2|Otro'];
            $this->form[] = ['label'=>'Descripcion','name'=>'descripcion','type'=>'textarea','validation'=>'min:10','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Precio','name'=>'precio','type'=>'number','validation'=>'required|min:1|numeric','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Descuento','name'=>'descuento','type'=>'number','validation'=>'','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Imagen (400 x 473)','name'=>'img','type'=>'upload','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Puntos','name'=>'puntos','type'=>'number','validation'=>'min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Video','name'=>'video','type'=>'text','validation'=>'min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Plataforma','name'=>'plataforma','type'=>'text','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Editorial','name'=>'editorial','type'=>'text','validation'=>'min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Desarollador','name'=>'desarollador','type'=>'text','validation'=>'min:1|max:100','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Categoria','name'=>'categoria','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha Lanzamiento','name'=>'fecha_lanzamiento','type'=>'date','validation'=>'','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cantidad Vendida','name'=>'cant_ven','type'=>'text','validation'=>'min:1','width'=>'col-sm-10','readonly'=>true];
			$this->form[] = ['label'=>'Nuevo','name'=>'nuevo','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'SI;NO'];
			$this->form[] = ['label'=>'Stock','name'=>'stock','type'=>'number','validation'=>'min:0','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Cat Id","name"=>"cat_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cat,id"];
			//$this->form[] = ["label"=>"Sub Id","name"=>"sub_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"sub,id"];
			//$this->form[] = ["label"=>"Sub Sub Id","name"=>"sub_sub_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"sub_sub,id"];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"Puedes introducir solo una letra"];
			//$this->form[] = ["label"=>"Precio","name"=>"precio","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Descuento","name"=>"descuento","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Puntos","name"=>"puntos","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img","name"=>"img","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Video","name"=>"video","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Plataforma","name"=>"plataforma","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Editorial","name"=>"editorial","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Desarollador","name"=>"desarollador","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Categoria","name"=>"categoria","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Fecha Lanzamiento","name"=>"fecha_lanzamiento","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cant Ven","name"=>"cant_ven","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Nuevo","name"=>"nuevo","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
            $deleted = Producto::find($id);

            if($deleted->delete()){
                return 1;
            }else{
                return 0;
            }
	    }



	    //By the way, you can still create your own method in here... :) 


	}
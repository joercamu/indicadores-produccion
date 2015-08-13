<?php
class Timeslots extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('grocery_CRUD');		
	}
	function timeslots_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('bloques_tipo');
		$crud->set_theme('datatables');
		$crud->set_subject('Bloques');
		$crud->columns('id_bloque_categoria','nombre');
		$crud->display_as('id_bloque_categoria','Categorias');
		$crud->set_relation('id_bloque_categoria','bloques_categorias','nombre');
		$crud->unset_delete();
		$output = $crud->render();
		$this->_output_crud($output, 'Bloques');


	}
	function timeslots_categories_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('bloques_categorias');
		$crud->set_subject('Categoria');
		$crud->columns('nombre','ab');
		$crud->unset_delete();
		$output = $crud->render();
		$this->_output_crud($output, 'Categorias');


	}
	//methods not access
	function _output_crud($output = null, $title = null)
	{
		$data= array('title' => $title );
		$this->load->view('head', $data);
		$this->load->view('output_crud.php',$output);


	}
} 

?>
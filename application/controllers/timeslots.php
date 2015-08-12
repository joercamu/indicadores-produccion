<?php
class Timeslots extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('grocery_CRUD');		
	}
	function timeslots_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('bloques_tipo');
		$crud->set_subject('Bloques');
		$crud->columns('id_bloque_categoria','nombre');
		$crud->set_relation('id_bloque_categoria','bloques_categorias','nombre');
		$crud->unset_delete();
		$output = $crud->render();
		$this->_output_crud($output, 'Bloques');


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
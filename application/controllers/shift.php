<?php
class Shift extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	function shift_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('turnos_tipos');
		$crud->set_subject('Trunos');
		$crud->columns('nombre','desde','hasta');
		$crud->display_as('desde','Desde 24 Hrs');
		$crud->display_as('hasta','Hasta 24 Hrs');
		$crud->required_fields('nombre','desde','hasta');
		$crud->unset_delete();
		
		$output = $crud->render();
		$this->_output_crud($output,'Turnos');

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
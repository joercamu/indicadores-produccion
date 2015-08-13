<?php
class Stages extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	function stages_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('procesos');
		$crud->set_subject('Proceso');
		$crud->unset_delete();
		$crud->unset_edit();
		$output = $crud->render();
		$this->_output_crud($output,'Procesos');

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
<?php
class Machines extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	//methods not access

	function machines_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('maquinas');
		$crud->set_theme('datatables');
		$crud->columns('nombre','procesos');
		$crud->edit_fields('nombre','procesos');
		$crud->add_fields('nombre','procesos');
		$crud->set_subject('Maquina');
		$crud->set_relation_n_n('procesos','maquinas_procesos','procesos','id_maquina','id_proceso','nombre');
		$crud->unset_delete();
		
		$output = $crud->render();
		$this->_output_crud($output, 'Maquinas');
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
<?php
class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}


	//funciones accesibles
	function users_management(){
		$crud = new grocery_CRUD();
		$crud->set_table('operarios');
		$crud->set_subject('Usuario');
		$crud->set_theme('datatables');
		$crud->columns('id','nombre');
		$crud->edit_fields('nombre','clave','eliminado');
		$crud->add_fields('id','nombre','clave');
		$crud->required_fields('id','nombre','clave');
		$crud->change_field_type('clave','password');
		$crud->callback_before_insert(array($this,'_encrypt_password_callback'));
		$crud->callback_before_update(array($this,'_encrypt_password_callback'));
		$crud->unset_delete();

		$output = $crud->render();
		$this->_output_crud($output, 'Usuarios');
		
	}

	//funciones no accesibles
	function _output_crud($output = null, $title = null)
	{
		$data= array('title' => $title );
		$this->load->view('head', $data);
		$this->load->view('output_crud.php',$output);


	}
	function _encrypt_password_callback($post_array){

		$post_array['clave'] = md5($post_array['clave']);
		return $post_array;
	}

}
?>
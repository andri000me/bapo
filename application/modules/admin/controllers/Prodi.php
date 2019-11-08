<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends Admin_Controller {

	// Grocery CRUD - Prodi
	public function index()
	{
		$crud = $this->generate_crud('prodi');
//		$crud->columns('nama_prodi {{nm_prodi}}', 'parent_id', 'selectable', 'name', 'fields', 'status');
        $crud->set_relation('fakultas_id', 'fakultas', '{name}');

		$this->mPageTitle = 'Prodi';
		$this->render_crud();
	}
}

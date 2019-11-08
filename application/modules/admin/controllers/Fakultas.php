<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends Admin_Controller {

	// Grocery CRUD - Fakultas
	public function index()
	{
		$crud = $this->generate_crud('fakultas');
		$this->mPageTitle = 'Fakultas';
		$this->render_crud();
	}
}

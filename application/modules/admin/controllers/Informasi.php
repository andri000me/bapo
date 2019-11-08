<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('informasi');

		$state = $crud->getState();
		if ($state==='add')
		{
			$crud->field_type('id', 'hidden', $this->mUser->id);
		}

		$this->mPageTitle = 'Data Informasi';
		$this->render_crud();
	}
}

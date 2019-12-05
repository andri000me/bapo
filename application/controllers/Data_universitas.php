<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Signin page
 */
class Data_universitas extends MY_Controller {

	public function index()
	{
	    // $this->set_js('assets/dist/frontend/app/login.js');
		$this->render('signin', 'with_breadcrumb');
	}
}

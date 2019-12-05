<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Signin page
 */
class Signin extends MY_Controller {

	public function index()
	{
		$this->render('signin', 'with_breadcrumb');
	}
}

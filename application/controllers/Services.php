<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Services page
 */
class Services extends MY_Controller {

	public function index()
	{
		$this->render('services', 'with_breadcrumb');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About page
 */
class Contact extends MY_Controller {

	public function index()
	{
	    // var_dump($this);
	    // exit;
		$this->render('contact', 'with_breadcrumb');
	}
}

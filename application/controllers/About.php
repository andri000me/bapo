<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About page
 */
class About extends MY_Controller {

	public function index()
	{
	    // var_dump($this);
	    // exit;
		$this->render('about', 'with_breadcrumb');
	}
}

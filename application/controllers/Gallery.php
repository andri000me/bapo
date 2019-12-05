<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Gallery page
 */
class Gallery extends MY_Controller {

	public function index()
	{
		$this->render('gallery', 'with_breadcrumb');
	}
}

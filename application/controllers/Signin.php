<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Signin page
 */
class Signin extends MY_Controller
{

    public function index()
    {
        $jsFile = [
            'assets/dist/frontend/app/signin.js'
        ];
        $this->add_script($jsFile, TRUE, 'foot');


        $this->render('signin', 'with_breadcrumb');
    }
}

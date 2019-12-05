<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Signin page
 */
class Data_universitas extends MY_Controller
{

    // Grocery CRUD - Data Universitas
    public function index()
    {
        $crud = $this->generate_crud('mst_fakultas', 'Data Universitas');
        // $crud->display_as('kd_fakulas', 'Kode Fakultas');
        // $crud->display_as('nama_fakultas', 'Nama Fakultas');

        $this->mPageTitle = 'Data Universitas';
        $this->render_crud();
    }

    // public function index()
    // {
    //     // $this->set_js('assets/dist/frontend/app/login.js');
    // 	$this->render('signin', 'with_breadcrumb');
    // }
}

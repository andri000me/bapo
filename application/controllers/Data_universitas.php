<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Signin page
 */
class Data_universitas extends MY_Controller
{
    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->checkRole();
    }

    public function index()
    {
        $this->render('data_universitas/index', 'with_breadcrumb');
    }

    // Grocery CRUD - Data Fakultas
    public function fakultas()
    {
        $crud = $this->generate_crud('mst_fakultas', 'Data Fakultas');
        $crud->display_as('kd_fakultas', 'Kode Fakultas');
        $crud->display_as('nama_fakultas', 'Nama Fakultas');
        $crud->unset_export();

        $this->mPageTitle = 'Data Fakultas';
        $this->render_crud();
    }

    public function program_studi()
    {
        $crud = $this->generate_crud('mst_program_studi', 'Data Program Studi');
        $crud->columns('kd_fakultas', 'kd_prodi', 'nama_prodi');
        $crud->fields('kd_fakultas', 'kd_prodi', 'nama_prodi');
        $crud->set_relation('kd_fakultas', 'mst_fakultas', '{nama_fakultas}');

        $crud->display_as('kd_fakultas', 'Nama Fakultas');
        $crud->display_as('nama_fakultas', 'Nama Fakultas');
        $crud->display_as('kd_prodi', 'Kode Program Studi');
        $crud->display_as('nama_prodi', 'Nama Program Studi');
        $crud->unset_export();

        $this->mPageTitle = 'Data Program Studi';
        $this->render_crud();
    }
}

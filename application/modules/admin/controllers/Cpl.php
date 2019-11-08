<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpl extends Admin_Controller {

    public function index()
    {
        $crud = $this->generate_crud('cpl');
        $crud->columns('prodi_id', 'id_kategori_cpl', 'deskripsi');
        $crud->fields('prodi_id', 'id_kategori_cpl', 'deskripsi');
        $crud->add_fields('prodi_id', 'id_kategori_cpl', 'deskripsi');
        $crud->edit_fields('prodi_id', 'id_kategori_cpl', 'deskripsi');
        $crud->set_read_fields('prodi_id', 'id_kategori_cpl', 'deskripsi');
		$crud->set_relation('id_kategori_cpl', 'kategori_cpl', '{nm_kategori_cpl}');
        $crud->set_relation('prodi_id', 'prodi', '{nm_prodi}');
        $crud->display_as('prodi_id', 'Prodi');
        $crud->display_as('nm_kategori_cpl', 'Kategori CPL');
        $crud->required_fields('prodi_id','id_kategori_cpl','deskripsi');
        $this->mPageTitle = 'Data CPL';
        $this->render_crud();
    }

    public function kategori()
    {
        $crud = $this->generate_crud('kategori_cpl');
        $crud->display_as('nm_kategori_cpl', 'Kategori');

        $state = $crud->getState();
        if ($state==='add')
        {
            $crud->field_type('id_kategori_cpl', 'hidden', $this->mUser->id);
        }

        $this->mPageTitle = 'Kategori CPL';
        $this->render_crud();
    }
}

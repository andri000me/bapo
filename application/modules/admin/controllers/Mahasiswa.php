<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends Admin_Controller {

    // Grocery CRUD - Activity Category
    public function index()
    {
        $crud = $this->generate_crud('mahasiswa');
        $crud->columns('npm_mhs', 'nama_mhs', 'tempatlahir_mhs', 'tanggallahir_mhs', 'id_prodi', 'tahun_masuk', 'layak_skpi');
        $crud->set_relation('id_prodi', 'prodi', '{nm_prodi}');

        $state = $crud->getState();
        if ($state==='add')
        {
            $crud->field_type('npm_mhs', 'hidden', $this->mUser->id);
        }

        $this->mPageTitle = 'Data Mahasiswa';
        $this->render_crud();
    }
}

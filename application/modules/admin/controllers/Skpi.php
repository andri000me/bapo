<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi extends Admin_Controller
{

    public function rekap()
    {
        $crud = $this->generate_crud('skpi');
        $crud->set_model('skpi_query_model');
        $crud->basic_model->set_custom_query('
            SELECT skpi.*, m.nama_mhs, p.nm_prodi
            FROM skpi AS skpi
            LEFT JOIN mahasiswa AS m ON skpi.npm_mhs = m.npm_mhs
            JOIN prodi AS p ON m.id_prodi = p.id_prodi
        ');

        $crud->fields('npm_mhs', 'no_skpi', 'tahun_lulus', 'no_ijazah', 'gelar', 'lama_studireg');
        $crud->field_type('tahun_lulus', 'integer');

        $state = $crud->getState();
        if ($state == 'edit') {
            $crud->field_type('npm_mhs', 'readonly');
            $crud->field_type('no_skpi', 'readonly');
        }

        $crud->columns(['nm_prodi', 'npm_mhs', 'nama_mhs', 'no_skpi']);
        $crud->unset_add();
        $crud->display_as('npm_mhs', 'NPM');
        $crud->display_as('nama_mhs', 'Nama');
        $crud->display_as('prodi_id', 'Prodi');
        $crud->display_as('lama_studireg', 'Lama Studi (Semester)');

        $this->mPageTitle = 'Rekap SKPI';
        $this->render_crud();
    }

    public function cetak()
    {
        $crud = $this->generate_crud('kategori_cpl');
        $crud->display_as('nm_kategori_cpl', 'Kategori');

        $state = $crud->getState();
        if ($state === 'add') {
            $crud->field_type('id_kategori_cpl', 'hidden', $this->mUser->id);
        }

        $this->mPageTitle = 'Kategori CPL';
        $this->render_crud();
    }
}

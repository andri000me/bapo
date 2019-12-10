<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data SAP page
 */
class Data_sap extends MY_Controller
{

    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->checkRole();
        $this->load->library('user_agent');
        $this->load->model('Data_sap_model');
    }

    public function index()
    {
        $state_kd_mk = isset($_GET['state_kd_mk']) ? $_GET['state_kd_mk'] : null;

        if ($_POST) {
            if ($_POST['submit'] == 'dosen_data_sap') {
                $this->Data_sap_model->dosenDataSap($_POST);
            } else if ($_POST['submit'] == 'dosen_data_rincian_materi_kuliah') {
                $this->Data_sap_model->rincianMateriKuliah($_POST);
            }
        }

        // Data Mata Kuliah
        $this->db->select('*')->from('mata_kuliah');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $mk = $this->db->get();
        $this->mViewData['data_mk'] = $mk->row();
        $nama_mk = $mk->row()->nama_mata_kuliah;

        // Data SAP
        $this->db->select('*')->from('sap');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $sap = $this->db->get();
        $this->mViewData['data_sap'] = $sap->row();

        // Data Prasyarat Mata Kuliah
        $this->db->select('*')->from('mata_kuliah');;
        $this->db->where('kd_prodi', $_SESSION['kd_prodi']);
        $this->db->where('nama_mata_kuliah', $nama_mk);
        $praMk = $this->db->get();
        $this->mViewData['data_pra_mk'] = $praMk->result();

        // Data Rincian Mata Kuliah
        $this->db->select('*')->from('rincian_materi_kuliah');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $rincian_mk = $this->db->get();
        $this->mViewData['data_rincian_mk'] = $rincian_mk->result_array();

        // Data Dosen
        $this->db->select('*')->from('mst_dosen');;
        $this->db->where('nik', $_SESSION['nik']);
        $dosen = $this->db->get();
        $this->mViewData['data_dosen'] = $dosen->row();

        // Data Dosen Jabatan
        $this->db->select('*')->from('mst_dosen');;
        $this->db->where('jabatan', 'KPS');
        $dosenJabatan = $this->db->get();
        $this->mViewData['data_dosen_jabatan'] = $dosenJabatan->row();

        $this->mPageTitle = 'Data SAP Mata Kuliah';
        $cssFile = [
            'assets/dist/frontend/css/sap.css',
            'assets/dist/frontend/css/style.css'
        ];
        $this->add_stylesheet($cssFile, true);
        $this->render('data_sap/index', 'with_breadcrumb');
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data Laporan page
 */
class Data_laporan extends MY_Controller
{

    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->checkRole();
        $this->load->library('user_agent');
    }

    public function index()
    {
        $state = isset($_GET['state']) ? $_GET['state'] : null;

        if (empty($state)) {
            $title = 'Data Laporan';
            $this->mPageTitle = $title;
            $this->mViewData['title'] = $title;
            $this->render('data_laporan/index', 'with_breadcrumb');
        } else {
            $title = '';
            switch ($state) {
                case 'mahasiswa':
                    $title = 'Laporan Jumlah Mahasiswa/i';
                    break;
                case 'tata_usaha':
                    $title = 'Laporan Jumlah Tata Usaha';
                    break;
                case 'dosen':
                    $title = 'Laporan Jumlah Dosen';
                    break;
                case 'ruang_kelas':
                    $title = 'Laporan Jumlah Ruang Kelas';
                    break;
                case 'laboratorium':
                    $title = 'Laporan Jumlah Laboratorium';
                    break;
                default:
                    $title = 'Laporan Jumlah Mata Kuliah';
            }

            $this->mPageTitle = $title;
            $this->mViewData['title'] = $title;
            $this->render('data_laporan/detail', 'with_breadcrumb_logged');
        }
    }

    public function detail()
    {
        $state_fakultas = isset($_GET['state_fakultas']) ? $_GET['state_fakultas'] : null;
        $state = isset($_GET['state']) ? $_GET['state'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->mViewData['state_fakultas'] = $state_fakultas;

        $this->db->select('b.kd_user, c.nama_prodi, d.nama_fakultas, a.nama_mahasiswa, b.username');
        $this->db->from('mst_mahasiswa as a');
        $this->db->join('user_akses as b', 'a.npm = b.kd_user');
        $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
        $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
        // $this->db->where('c.kd_fakultas', $state_fakultas);
        $query = $this->db->get();
        $this->mViewData['data'] = $query->result();

        $cssFile = [
            'assets/dist/dataTables/datatables.min.css',
        ];
        $this->add_stylesheet($cssFile, true);

        $jsFile = [
            'assets/dist/highcharts/highcharts-.js',
            'assets/dist/highcharts/exporting-.js',
            // 'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
            // 'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
        ];
        $this->add_script($jsFile, TRUE, 'foot');

        $title = 'Laporan Jumlah Mahasiswa';
        $this->mPageTitle = $title;
        $this->mViewData['title'] = $title;
        $this->render('data_laporan/detail', 'with_breadcrumb_logged');
    }

}

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
        $this->load->model('Data_laporan_model');
    }

    public function index()
    {
        $state = isset($_GET['state']) ? $_GET['state'] : null;

        if (empty($state)) {
            $title = 'Data Laporan';
            $this->mPageTitle = $title;
            $this->mViewData['title'] = $title;
            $this->render('data_laporan/index', 'with_breadcrumb');
            return;
        } else {
            switch ($state) {
                case 'mahasiswa':
                    $title = 'Laporan Jumlah Mahasiswa/i';
                    $titleChart = 'Jumlah Mahasiswa Tiap Fakultas di Universitas YARSI';
                    $this->mViewData['data'] = $this->Data_laporan_model->mahasiswa();
                    break;
                case 'tata_usaha':
                    $title = 'Laporan Jumlah Tata Usaha';
                    $titleChart = 'Jumlah Tata Usaha Tiap Fakultas di Universitas YARSI';
                    $this->mViewData['data'] = $this->Data_laporan_model->tata_usaha();
                    break;
                case 'dosen':
                    $title = 'Laporan Jumlah Dosen';
                    $titleChart = 'Jumlah Dosen Tiap Fakultas di Universitas YARSI';
                    $this->mViewData['data'] = $this->Data_laporan_model->dosen();
                    break;
                case 'ruang_kelas':
                    $title = 'Laporan Jumlah Ruang Kelas';
                    $titleChart = 'Jumlah Ruang Kelas Tiap Fakultas di Universitas YARSI';
                    $this->mViewData['data'] = $this->Data_laporan_model->ruang();
                    break;
                case 'laboratorium':
                    $title = 'Laporan Jumlah Laboratorium';
                    $titleChart = 'Jumlah Laboratorium Tiap Fakultas di Universitas YARSI';
                    $this->mViewData['data'] = $this->Data_laporan_model->laboratorium();
                    break;
                default:
                    $title = 'Laporan Jumlah Mata Kuliah';
                    $titleChart = 'Jumlah Mata Kuliah Tiap Fakultas di Universitas YARSI';
                    $this->mViewData['data'] = $this->Data_laporan_model->mata_kuliah();
            }

            $cssFile = [
                'assets/dist/dataTables/datatables.min.css',
            ];
            $this->add_stylesheet($cssFile, true);

            $jsFile = [
                'assets/dist/highcharts/highcharts-.js',
                'assets/dist/highcharts/exporting-.js',
            ];
            $this->add_script($jsFile, TRUE, 'foot');

            $this->mPageTitle = $title;
            $this->mViewData['title'] = $title;
            $this->mViewData['titleChart'] = $titleChart;
            $this->render('data_laporan/detail', 'with_breadcrumb_logged');
        }
    }

    // public function detail()
    // {
    //     $state_fakultas = isset($_GET['state_fakultas']) ? $_GET['state_fakultas'] : null;
    //     $state = isset($_GET['state']) ? $_GET['state'] : null;
    //     $id = isset($_GET['id']) ? $_GET['id'] : null;
    //     $this->mViewData['state_fakultas'] = $state_fakultas;
    //
    //     // $this->db->select('b.kd_user, c.nama_prodi, d.nama_fakultas, a.nama_mahasiswa, b.username');
    //     // $this->db->from('mst_mahasiswa as a');
    //     // $this->db->join('user_akses as b', 'a.npm = b.kd_user');
    //     // $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
    //     // $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
    //     // $this->db->where('c.kd_fakultas', $state_fakultas);
    //     // $query = $this->db->get();
    //     // $this->mViewData['data'] = $query->result();
    //
    //     $cssFile = [
    //         'assets/dist/dataTables/datatables.min.css',
    //     ];
    //     $this->add_stylesheet($cssFile, true);
    //
    //     $jsFile = [
    //         'assets/dist/highcharts/highcharts-.js',
    //         'assets/dist/highcharts/exporting-.js',
    //         // 'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
    //         // 'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
    //     ];
    //     $this->add_script($jsFile, TRUE, 'foot');
    //
    //     switch ($state) {
    //         case 'mahasiswa':
    //             $title = 'Laporan Jumlah Mahasiswa/i';
    //             break;
    //         case 'tata_usaha':
    //             $title = 'Laporan Jumlah Tata Usaha';
    //             break;
    //         case 'dosen':
    //             $title = 'Laporan Jumlah Dosen';
    //             break;
    //         case 'ruang_kelas':
    //             $title = 'Laporan Jumlah Ruang Kelas';
    //             break;
    //         case 'laboratorium':
    //             $title = 'Laporan Jumlah Laboratorium';
    //             break;
    //         default:
    //             $title = 'Laporan Jumlah Mata Kuliah';
    //     }
    //
    //     $this->mPageTitle = $title;
    //     $this->mViewData['title'] = $title;
    //     $this->render('data_laporan/detail', 'with_breadcrumb_logged');
    // }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data Pengguna page
 */
class Data_pengguna extends MY_Controller
{

    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
    }

    public function index()
    {
        $this->mPageTitle = 'Data Pengguna';
        $this->render('data_pengguna/index', 'with_breadcrumb');
    }

    public function tata_usaha()
    {
        $this->mPageTitle = 'Data Pengguna';
        $this->render('data_pengguna/tata_usaha', 'with_breadcrumb');
    }

    // Grocery CRUD - Data Pengguna Tata Usaha Universitas
    public function tata_usaha_universitas()
    {
        // $crud = $this->generate_crud('user_akses', 'Data Tata Usaha Universitas');
        // $crud->unset_export();
        // $crud->set_theme('datatables');
        // $crud->set_model('data_pengguna_tu_univ_model');
        // $crud->set_primary_key('kd_user');
        // $crud->basic_model->set_custom_query("
        //     SELECT ua.kd_user, ua.username, tu.nama_tata_usaha
        //     FROM mst_tata_usaha AS tu
        //     JOIN user_akses AS ua ON tu.nik = ua.kd_user AND tu.kd_prodi = ''
        // ");
        //
        // $crud->field_type('status', 'readonly');
        //
        // // $state = $crud->getState();
        // // if ($state == 'edit') {
        //     // $crud->field_type('npm', 'readonly');
        //     // $crud->field_type('no_skpi', 'readonly');
        // // }
        //
        // $crud->columns(['kd_user', 'username', 'nama_tata_usaha']);
        // $crud->display_as('kd_user', 'NIK');
        //
        // // only webmaster and admin can reset user password
        // // if ($this->ion_auth->in_group(array('webmaster', 'admin')))
        // // {
        // //     $crud->add_action('Cetak', '', 'admin/skpi/print', 'fa fa-repeat');
        // // }
        //
        // $this->mPageTitle = 'Data Tata Usaha Universitas';
        // $this->render_crud();

        $state = isset($_GET['state']) ? $_GET['state'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($state === 'add' || $state === 'edit' || $state === 'delete') {
            $this->load->library('rsa');

            if ($state === 'add') {
                if ($_POST) {
                    $nik = $_POST['nik'];
                    // $kd_prodi = $_POST['kd_prodi'];
                    $nama_tata_usaha = $_POST['nama_tata_usaha'];
                    $username = $_POST['username'];
                    $password = $this->rsa->encrypt($_POST['password']);

                    $this->db->trans_begin();
                    $this->db->insert('mst_tata_usaha', array(
                        'nik' => $nik,
                        'kd_prodi' => '',
                        'nama_tata_usaha' => $nama_tata_usaha
                    ));

                    $this->db->insert('user_akses', array(
                        'kd_user' => $nik,
                        'username' => $username,
                        'password' => $password,
                        'status' => 'Tata Usaha'
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    redirect('data_pengguna/tata_usaha_universitas');
                    return;
                }

                $this->mViewData['title'] = 'Tambah Data Tata Usaha Universitas';
                $this->render('data_pengguna/tu/univ/add', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'edit' && !empty($id)) {
                if ($_POST) {
                    $nik = $_POST['nik'];
                    $nik_old = $_POST['nik_old'];
                    // $kd_prodi = $_POST['kd_prodi'];
                    $nama_tata_usaha = $_POST['nama_tata_usaha'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $this->db->trans_begin();
                    $this->db->where('nik', $nik_old);
                    $this->db->update('mst_tata_usaha', array(
                        'nik' => $nik,
                        'kd_prodi' => '',
                        'nama_tata_usaha' => $nama_tata_usaha
                    ));

                    if (!empty($_POST['password'])) {
                        $dataUserAkses = array(
                            'kd_user' => $nik,
                            'username' => $username,
                            'password' => $this->rsa->encrypt($password),
                            'status' => 'Tata Usaha'
                        );
                    } else {
                        $dataUserAkses = array(
                            'kd_user' => $nik,
                            'username' => $username,
                            'status' => 'Tata Usaha'
                        );
                    }

                    $this->db->where('kd_user', $nik_old);
                    $this->db->update('user_akses', $dataUserAkses);

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    redirect('data_pengguna/tata_usaha_universitas');
                    return;
                }

                $this->db->select('ua.kd_user AS nik, ua.username, tu.nama_tata_usaha');
                $this->db->from('mst_tata_usaha as tu');
                $this->db->join('user_akses as ua', 'tu.nik = ua.kd_user AND tu.kd_prodi = ""');
                $this->db->where('ua.kd_user', $id);
                $query = $this->db->get();
                $this->mViewData['data'] = $query->row();
                $this->mViewData['title'] = 'Edit Data Tata Usaha Universitas';
                $this->render('data_pengguna/tu/univ/edit', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'delete' && !empty($id)) {
                $this->db->trans_begin();
                $this->db->delete('mst_tata_usaha', array('nik' => $id));
                $this->db->delete('user_akses', array('kd_user' => $id));

                if ($this->db->trans_status()) {
                    $this->db->trans_commit();
                    $_SESSION['state_status_delete'] = true;
                } else {
                    $this->db->trans_rollback();
                    $_SESSION['state_status_delete'] = false;
                }
                redirect('data_pengguna/tata_usaha_universitas');
                return;
            }
        }

        $this->db->select('ua.kd_user, ua.username, tu.nama_tata_usaha');
        $this->db->from('mst_tata_usaha as tu');
        $this->db->join('user_akses as ua', 'tu.nik = ua.kd_user AND tu.kd_prodi = ""');
        $query = $this->db->get();
        $this->mViewData['data'] = $query->result();
        $this->mPageTitle = 'Data Tata Usaha Universitas';

        $cssFile = [
            'assets/dist/dataTables/datatables.min.css',
        ];
        $this->add_stylesheet($cssFile, true);

        $jsFile = [
            'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
            'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
        ];
        $this->add_script($jsFile, TRUE, 'foot');

        $this->render('data_pengguna/tu/univ/index', 'with_breadcrumb_logged');
    }

    // Grocery CRUD - Data Pengguna Tata Usaha Program Studi
    public function tata_usaha_program_studi()
    {
        $crud = $this->generate_crud('mst_fakultas', 'Data Tata Usaha Program Studi');

        $this->mPageTitle = 'Data Tata Usaha Program Studi';
        $this->render_crud();
    }

    public function dosen()
    {
        $this->mPageTitle = 'Data Pengguna';
        $this->render('data_pengguna', 'with_breadcrumb');
    }
}

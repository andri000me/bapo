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

        $this->checkRole();
        $this->load->library('user_agent');
    }

    public function index()
    {
        $this->mPageTitle = 'Data Pengguna';
        $this->render('data_pengguna/index', 'with_breadcrumb');
    }

    public function tata_usaha()
    {
        $this->mPageTitle = 'Data Pengguna';
        $this->render('data_pengguna/tu/index', 'with_breadcrumb');
    }

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

    public function tata_usaha_program_studi()
    {
        $state = isset($_GET['state']) ? $_GET['state'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($state === 'add' || $state === 'edit' || $state === 'delete') {
            $this->load->library('rsa');

            if ($state === 'add') {
                if ($_POST) {
                    $nik = $_POST['nik'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $nama_tata_usaha = $_POST['nama_tata_usaha'];
                    $username = $_POST['username'];
                    $password = $this->rsa->encrypt($_POST['password']);

                    $this->db->trans_begin();
                    $this->db->insert('mst_tata_usaha', array(
                        'nik' => $nik,
                        'kd_prodi' => $kd_prodi,
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

                    redirect('data_pengguna/tata_usaha_program_studi');
                    return;
                }

                $this->db->select('*');
                $query = $this->db->get('mst_fakultas');
                $this->mViewData['list_fakultas'] = $query->result();
                $this->mViewData['title'] = 'Tambah Data Tata Usaha Program Studi';
                $this->render('data_pengguna/tu/prodi/add', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'edit' && !empty($id)) {
                if ($_POST) {
                    $nik = $_POST['nik'];
                    $nik_old = $_POST['nik_old'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $nama_tata_usaha = $_POST['nama_tata_usaha'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $this->db->trans_begin();
                    $this->db->where('nik', $nik_old);
                    $this->db->update('mst_tata_usaha', array(
                        'nik' => $nik,
                        'kd_prodi' => $kd_prodi,
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

                    redirect('data_pengguna/tata_usaha_program_studi');
                    return;
                }

                $this->db->select('f.*');
                $query2 = $this->db->get('mst_fakultas as f');
                $this->mViewData['list_fakultas'] = $query2->result();

                $this->db->select('*');
                $query2 = $this->db->get('mst_program_studi');
                $this->mViewData['list_prodi'] = $query2->result();

                $this->db->select('b.kd_user AS nik, c.kd_prodi, d.kd_fakultas, a.nama_tata_usaha, b.username');
                $this->db->from('mst_tata_usaha as a');
                $this->db->join('user_akses as b', 'a.nik = b.kd_user AND a.kd_prodi <> ""');
                $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
                $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
                $this->db->where('b.kd_user', $id);
                $query = $this->db->get();
                $this->mViewData['data'] = $query->row();

                $this->mViewData['title'] = 'Edit Data Tata Usaha Program Studi';
                $this->render('data_pengguna/tu/prodi/edit', 'with_breadcrumb_logged');
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
                redirect('data_pengguna/tata_usaha_program_studi');
                return;
            }
        }

        $this->db->select('b.kd_user, c.nama_prodi, d.nama_fakultas, a.nama_tata_usaha, b.username');
        $this->db->from('mst_tata_usaha as a');
        $this->db->join('user_akses as b', 'a.nik = b.kd_user AND a.kd_prodi <> ""');
        $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
        $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
        $query = $this->db->get();

        $this->mViewData['data'] = $query->result();
        $this->mPageTitle = 'Data Tata Usaha Program Studi';

        $cssFile = [
            'assets/dist/dataTables/datatables.min.css',
        ];
        $this->add_stylesheet($cssFile, true);

        $jsFile = [
            'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
            'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
        ];
        $this->add_script($jsFile, TRUE, 'foot');

        $this->render('data_pengguna/tu/prodi/index', 'with_breadcrumb_logged');
    }

    public function dosen()
    {
        $state_fakultas = isset($_GET['state_fakultas']) ? $_GET['state_fakultas'] : null;
        $state = isset($_GET['state']) ? $_GET['state'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->mViewData['state_fakultas'] = $state_fakultas;

        if ($state === 'add' || $state === 'edit' || $state === 'delete') {
            $this->load->library('rsa');

            // ADD
            if ($state === 'add') {
                if ($_POST) {
                    $nik = $_POST['nik'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $kd_fakultas = $_POST['nama_fakultas'];
                    $nama_dosen = $_POST['nama_dosen'];
                    $jabatan = $_POST['jabatan'];
                    $mata_kuliah = $_POST['mata_kuliah'];
                    $username = $_POST['username'];
                    $password = $this->rsa->encrypt($_POST['password']);

                    $this->db->trans_begin();
                    $this->db->insert('mst_dosen', array(
                        'nik' => $nik,
                        'kd_prodi' => $kd_prodi,
                        'nama_dosen' => $nama_dosen,
                        'jabatan' => $jabatan,
                        'mata_kuliah' => ''
                    ));

                    $this->db->insert('user_akses', array(
                        'kd_user' => $nik,
                        'username' => $username,
                        'password' => $password,
                        'status' => 'Dosen'
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    redirect('data_pengguna/dosen/index?state_fakultas=' . $kd_fakultas);
                    return;
                }

                $this->db->select('*');
                $query = $this->db->get('mst_fakultas');
                $this->mViewData['list_fakultas'] = $query->result();
                $this->mViewData['title'] = 'Tambah Data Dosen';
                $this->render('data_pengguna/dosen/add', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'edit' && !empty($id)) { // EDIT
                if ($_POST) {
                    $nik = $_POST['nik'];
                    $nik_old = $_POST['nik_old'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $kd_fakultas = $_POST['nama_fakultas'];
                    $nama_dosen = $_POST['nama_dosen'];
                    $jabatan = $_POST['jabatan'];
                    $mata_kuliah = $_POST['mata_kuliah'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $this->db->trans_begin();
                    $this->db->where('nik', $nik_old);
                    $this->db->update('mst_dosen', array(
                        'nik' => $nik,
                        'kd_prodi' => $kd_prodi,
                        'nama_dosen' => $nama_dosen,
                        'jabatan' => $jabatan,
                        'mata_kuliah' => ''
                    ));

                    if (!empty($_POST['password'])) {
                        $dataUserAkses = array(
                            'kd_user' => $nik,
                            'username' => $username,
                            'password' => $this->rsa->encrypt($password),
                            'status' => 'Dosen'
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

                    redirect('data_pengguna/dosen/index?state_fakultas=' . $kd_fakultas);
                    return;
                }

                $this->db->select('f.*');
                $query2 = $this->db->get('mst_fakultas as f');
                $this->mViewData['list_fakultas'] = $query2->result();

                $this->db->select('*');
                $query2 = $this->db->get('mst_program_studi');
                $this->mViewData['list_prodi'] = $query2->result();

                $this->db->select('b.kd_user AS nik, c.kd_prodi, d.kd_fakultas, a.nama_dosen, b.username');
                $this->db->from('mst_dosen as a');
                $this->db->join('user_akses as b', 'a.nik = b.kd_user AND a.kd_prodi <> ""');
                $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
                $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
                $this->db->where('b.kd_user', $id);
                $query = $this->db->get();
                $this->mViewData['data'] = $query->row();

                $this->mViewData['title'] = 'Edit Data Tata Usaha Program Studi';
                $this->render('data_pengguna/dosen/edit', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'delete' && !empty($id)) {
                $this->db->trans_begin();
                $this->db->delete('mst_dosen', array('nik' => $id));
                $this->db->delete('user_akses', array('kd_user' => $id));

                if ($this->db->trans_status()) {
                    $this->db->trans_commit();
                    $_SESSION['state_status_delete'] = true;
                } else {
                    $this->db->trans_rollback();
                    $_SESSION['state_status_delete'] = false;
                }
                redirect($this->agent->referrer());
                return;
            }
        } else if (!empty($state_fakultas)) {
            $this->db->select('b.kd_user, c.nama_prodi, d.nama_fakultas, a.nama_dosen, b.username');
            $this->db->from('mst_dosen as a');
            $this->db->join('user_akses as b', 'a.nik = b.kd_user AND a.kd_prodi <> ""');
            $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
            $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
            $this->db->where('c.kd_fakultas', $state_fakultas);
            $query = $this->db->get();
            $this->mViewData['data'] = $query->result();

            $cssFile = [
                'assets/dist/dataTables/datatables.min.css',
            ];
            $this->add_stylesheet($cssFile, true);

            $jsFile = [
                'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
                'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
            ];
            $this->add_script($jsFile, TRUE, 'foot');

            $this->mPageTitle = 'Data Tata Usaha Program Studi';
            $this->render('data_pengguna/dosen/index', 'with_breadcrumb_logged');
            return;
        }

        $this->db->select('*');
        $query = $this->db->get('mst_fakultas');
        $this->mViewData['list_fakultas'] = $query->result();

        // $this->db->select('b.kd_user, c.nama_prodi, d.nama_fakultas, a.nama_tata_usaha, b.username');
        // $this->db->from('mst_tata_usaha as a');
        // $this->db->join('user_akses as b', 'a.nik = b.kd_user AND a.kd_prodi <> ""');
        // $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
        // $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
        // $query = $this->db->get();
        // $this->mViewData['data'] = $query->result();

        $cssFile = [
            'assets/dist/dataTables/datatables.min.css',
        ];
        $this->add_stylesheet($cssFile, true);

        $jsFile = [
            'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
            'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
        ];
        $this->add_script($jsFile, TRUE, 'foot');

        $this->mPageTitle = 'Data Tata Usaha Program Studi';
        $this->render('data_pengguna/dosen/main', 'with_breadcrumb_logged');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data Perkulliahan page
 */
class Data_perkuliahan extends MY_Controller
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
        $this->render('data_perkuliahan/index', 'with_breadcrumb');
    }

    public function mahasiswa()
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
                    $npm = $_POST['npm'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $kd_fakultas = $_POST['nama_fakultas'];
                    $nama_mahasiswa = $_POST['nama_mahasiswa'];
                    $username = $_POST['username'];
                    $password = $this->rsa->encrypt($_POST['password']);

                    $this->db->trans_begin();
                    $this->db->insert('mst_mahasiswa', array(
                        'npm' => $npm,
                        'kd_prodi' => $kd_prodi,
                        'nama_mahasiswa' => $nama_mahasiswa
                    ));

                    $this->db->insert('user_akses', array(
                        'kd_user' => $npm,
                        'username' => $username,
                        'password' => $password,
                        'status' => 'Mahasiswa'
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    redirect('data_perkuliahan/mahasiswa/index');
                    return;
                }

                $this->db->select('*');
                $query = $this->db->get('mst_fakultas');
                $this->mViewData['list_fakultas'] = $query->result();
                $this->mViewData['title'] = 'Tambah Data Mahasiswa';
                $this->render('data_perkuliahan/mahasiswa/add', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'edit' && !empty($id)) { // EDIT
                if ($_POST) {
                    $npm = $_POST['npm'];
                    $npm_old = $_POST['npm_old'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $kd_fakultas = $_POST['nama_fakultas'];
                    $nama_mahasiswa = $_POST['nama_mahasiswa'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $this->db->trans_begin();
                    $this->db->where('npm', $npm_old);
                    $this->db->update('mst_mahasiswa', array(
                        'npm' => $npm,
                        'kd_prodi' => $kd_prodi,
                        'nama_mahasiswa' => $nama_mahasiswa
                    ));

                    if (!empty($_POST['password'])) {
                        $dataUserAkses = array(
                            'kd_user' => $npm,
                            'username' => $username,
                            'password' => $this->rsa->encrypt($password),
                            'status' => 'Mahasiswa'
                        );
                    } else {
                        $dataUserAkses = array(
                            'kd_user' => $npm,
                            'username' => $username,
                            'status' => 'Mahasiswa'
                        );
                    }

                    $this->db->where('kd_user', $npm_old);
                    $this->db->update('user_akses', $dataUserAkses);

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    // redirect('data_perkuliahan/mahasiswa/index?state_fakultas=' . $kd_fakultas);
                    redirect('data_perkuliahan/mahasiswa/index');
                    return;
                }

                $this->db->select('f.*');
                $query2 = $this->db->get('mst_fakultas as f');
                $this->mViewData['list_fakultas'] = $query2->result();

                $this->db->select('*');
                $query2 = $this->db->get('mst_program_studi');
                $this->mViewData['list_prodi'] = $query2->result();

                $this->db->select('b.kd_user AS npm, c.kd_prodi, d.kd_fakultas, a.nama_mahasiswa, b.username');
                $this->db->from('mst_mahasiswa as a');
                $this->db->join('user_akses as b', 'a.npm = b.kd_user');
                $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
                $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
                $this->db->where('b.kd_user', $id);
                $query = $this->db->get();
                $this->mViewData['data'] = $query->row();

                $this->mViewData['title'] = 'Edit Data Mahasiswa';
                $this->render('data_perkuliahan/mahasiswa/edit', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'delete' && !empty($id)) {
                $this->db->trans_begin();
                $this->db->delete('mst_mahasiswa', array('npm' => $id));
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
        }

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
            'assets/dist/data-grid/datatables/media/js/jquery.dataTables.min.js',
            'assets/dist/data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
        ];
        $this->add_script($jsFile, TRUE, 'foot');

        $this->mPageTitle = 'Data Mahasiswa';
        $this->render('data_perkuliahan/mahasiswa/index', 'with_breadcrumb_logged');
    }

    public function ruang()
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
                    $kd_ruang = $_POST['kd_ruang'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $nama_ruang = $_POST['nama_ruang'];
                    $mata_kuliah = !empty($_POST['mata_kuliah']) ? json_encode($_POST['mata_kuliah']) : '';

                    $this->db->trans_begin();
                    $this->db->insert('ruang', array(
                        'kd_ruang' => $kd_ruang,
                        'kd_prodi' => $kd_prodi,
                        'nama_ruang' => $nama_ruang,
                        'mata_kuliah' => $mata_kuliah
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    redirect('data_perkuliahan/ruang/index');
                    return;
                }

                $this->db->select('*');
                $query = $this->db->get('mst_fakultas');
                $this->mViewData['list_fakultas'] = $query->result();
                $this->mViewData['title'] = 'Tambah Data Ruang Kelas';
                $this->render('data_perkuliahan/ruang/add', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'edit' && !empty($id)) { // EDIT
                if ($_POST) {
                    $kd_ruang_old = $_POST['kd_ruang_old'];
                    $kd_ruang = $_POST['kd_ruang'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $nama_ruang = $_POST['nama_ruang'];
                    $mata_kuliah = !empty($_POST['mata_kuliah']) ? json_encode($_POST['mata_kuliah']) : '';

                    $this->db->trans_begin();
                    $this->db->where('kd_ruang', $kd_ruang_old);
                    $this->db->update('ruang', array(
                        'kd_ruang' => $kd_ruang,
                        'kd_prodi' => $kd_prodi,
                        'nama_ruang' => $nama_ruang,
                        'mata_kuliah' => $mata_kuliah
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    // redirect('data_perkuliahan/mahasiswa/index?state_fakultas=' . $kd_fakultas);
                    redirect('data_perkuliahan/ruang/index');
                    return;
                }

                $this->db->select('a.kd_ruang, b.kd_prodi, c.kd_fakultas, a.nama_ruang, a.mata_kuliah');
                $this->db->from('ruang as a');
                $this->db->join('mst_program_studi as b', 'a.kd_prodi = b.kd_prodi', 'left');
                $this->db->join('mst_fakultas as c', 'b.kd_fakultas = c.kd_fakultas', 'left');
                $this->db->where('a.kd_ruang', $id);
                $query = $this->db->get();
                $this->mViewData['data'] = $query->row();

                $this->db->select('f.*');
                $query2 = $this->db->get('mst_fakultas as f');
                $this->mViewData['list_fakultas'] = $query2->result();

                $this->db->select('*');
                $this->db->where('kd_fakultas', $this->mViewData['data']->kd_fakultas);
                $query2 = $this->db->get('mst_program_studi');
                $this->mViewData['list_prodi'] = $query2->result();

                $this->mViewData['title'] = 'Edit Data Ruang Kelas';
                $this->render('data_perkuliahan/ruang/edit', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'delete' && !empty($id)) {
                $this->db->trans_begin();
                $this->db->delete('ruang', array('kd_ruang' => $id));

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
        }

        $this->db->select('a.kd_ruang, c.nama_prodi, d.nama_fakultas, a.nama_ruang, a.mata_kuliah');
        $this->db->from('ruang as a');
        $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
        $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
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

        $this->mPageTitle = 'Data Mahasiswa';
        $this->render('data_perkuliahan/ruang/index', 'with_breadcrumb_logged');
    }

    public function laboratorium()
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
                    $kd_ruang = $_POST['kd_ruang'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $nik_dosen_pj = $_POST['nik_dosen_pj'];
                    $nama_lab = $_POST['nama_lab'];

                    $this->db->trans_begin();
                    $this->db->insert('laboratorium', array(
                        'kd_ruang' => $kd_ruang,
                        'kd_prodi' => $kd_prodi,
                        'nik_dosen_pj' => $nik_dosen_pj,
                        'nama_lab' => $nama_lab
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    redirect('data_perkuliahan/laboratorium/index');
                    return;
                }

                $this->db->select('*');
                $query = $this->db->get('mst_fakultas');
                $this->mViewData['list_fakultas'] = $query->result();
                $this->mViewData['title'] = 'Tambah Data Laboratorium';
                $this->render('data_perkuliahan/laboratorium/add', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'edit' && !empty($id)) { // EDIT
                if ($_POST) {
                    $kd_ruang_old = $_POST['kd_ruang_old'];
                    $kd_ruang = $_POST['kd_ruang'];
                    $kd_prodi = $_POST['kd_prodi'];
                    $nik_dosen_pj = $_POST['nik_dosen_pj'];
                    $nama_lab = $_POST['nama_lab'];

                    $this->db->trans_begin();
                    $this->db->where('kd_ruang', $kd_ruang_old);
                    $this->db->update('laboratorium', array(
                        'kd_ruang' => $kd_ruang,
                        'kd_prodi' => $kd_prodi,
                        'nik_dosen_pj' => $nik_dosen_pj,
                        'nama_lab' => $nama_lab
                    ));

                    if ($this->db->trans_status()) {
                        $this->db->trans_commit();
                        $_SESSION['state_status'] = true;
                    } else {
                        $this->db->trans_rollback();
                        $_SESSION['state_status'] = false;
                    }

                    // redirect('data_perkuliahan/mahasiswa/index?state_fakultas=' . $kd_fakultas);
                    redirect('data_perkuliahan/laboratorium/index');
                    return;
                }

                $this->db->select('a.kd_ruang, c.kd_prodi, d.kd_fakultas, a.nik_dosen_pj, a.nama_lab');
                $this->db->from('laboratorium as a');
                $this->db->join('mst_dosen as b', 'a.nik_dosen_pj = b.nik', 'left');
                $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
                $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
                $this->db->where('kd_ruang', $id);
                $query = $this->db->get();
                $this->mViewData['data'] = $query->row();

                $this->db->select('f.*');
                $query2 = $this->db->get('mst_fakultas as f');
                $this->mViewData['list_fakultas'] = $query2->result();

                $this->db->select('*');
                $this->db->where('kd_fakultas', $this->mViewData['data']->kd_fakultas);
                $query3 = $this->db->get('mst_program_studi');
                $this->mViewData['list_prodi'] = $query3->result();

                $this->db->select('a.nik, a.nama_dosen');
                $this->db->from('mst_dosen as a');
                $this->db->join('mst_program_studi as b', 'a.kd_prodi = b.kd_prodi');
                $this->db->where('b.kd_fakultas', $this->mViewData['data']->kd_fakultas);
                $query4 = $this->db->get();
                $this->mViewData['list_dosen'] = $query4->result();

                // exit(var_dump($query4->result()));

                $this->mViewData['title'] = 'Edit Data Laboratorium';
                $this->render('data_perkuliahan/laboratorium/edit', 'with_breadcrumb_logged');
                return;
            } else if ($state === 'delete' && !empty($id)) {
                $this->db->trans_begin();
                $this->db->delete('laboratorium', array('kd_ruang' => $id));

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
        }

        $this->db->select('a.kd_ruang, c.nama_prodi, d.nama_fakultas, a.nik_dosen_pj, b.nama_dosen, a.nama_lab');
        $this->db->from('laboratorium as a');
        $this->db->join('mst_dosen as b', 'a.nik_dosen_pj = b.nik', 'left');
        $this->db->join('mst_program_studi as c', 'a.kd_prodi = c.kd_prodi', 'left');
        $this->db->join('mst_fakultas as d', 'c.kd_fakultas = d.kd_fakultas', 'left');
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

        $this->mPageTitle = 'Data Laboratorium';
        $this->render('data_perkuliahan/laboratorium/index', 'with_breadcrumb_logged');
    }
}

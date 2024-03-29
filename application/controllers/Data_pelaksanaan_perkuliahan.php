<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data Pelaksanaan Perkulliahan page
 */
class Data_pelaksanaan_perkuliahan extends MY_Controller
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
        $title = 'Data Pelaksanaan Perkuliahan';
        $this->mPageTitle = $title;
        $this->mViewData['title'] = $title;
        $this->render('data_pelaksanaan_perkuliahan/index', 'with_breadcrumb');
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

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Api page
 */
class Api extends MY_Controller
{
    public function login()
    {
        $this->load->library('rsa');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->db->select('kd_user, username, password, status');
        $this->db->where('username', $username);
        $query = $this->db->get('user_akses');

        if ($data = $query->row_array()) {
            if ($password == $this->rsa->decrypt($data['password'])) {
                $npm = null;
                $nik = null;
                $nama = null;
                $jabatan = null;
                $kd_prodi = null;

                if (strtolower($data['status']) == 'tata usaha') {
                    // $tu = "SELECT user_akses.username, user_akses.password, user_akses.status, mst_tata_usaha.nik, mst_tata_usaha.kd_prodi, mst_tata_usaha.nama_tata_usaha FROM mst_tata_usaha INNER JOIN user_akses ON mst_tata_usaha.nik = user_akses.kd_user WHERE user_akses.username='$username'";

                    $tu = $this->db->select('*')->where('nik', $data['kd_user'])->get('mst_tata_usaha')->row();
                    $nik = !empty($tu->nik) ? $tu->nik : null;
                    $nama = !empty($tu->nama_tata_usaha) ? $tu->nama_tata_usaha : null;
                    $kd_prodi = !empty($tu->kd_prodi) ? $tu->kd_prodi : null;
                } else if (strtolower($data['status']) == 'dosen') {
                    // $dosen = "SELECT user_akses.username, user_akses.password, user_akses.status, mst_dosen.nik, mst_dosen.kd_prodi, mst_dosen.nama_dosen, mst_dosen.jabatan FROM mst_dosen INNER JOIN user_akses ON mst_dosen.nik = user_akses.kd_user WHERE user_akses.username='$username'";

                    $dosen = $this->db->select('*')->where('nik', $data['kd_user'])->get('mst_dosen')->row();
                    $nik = !empty($dosen->nik) ? $dosen->nik : null;
                    $nama = !empty($dosen->nama_dosen) ? $dosen->nama_dosen : null;
                    $kd_prodi = !empty($dosen->kd_prodi) ? $dosen->kd_prodi : null;
                    $jabatan = !empty($dosen->jabatan) ? $dosen->jabatan : null;
                } else if (strtolower($data['status']) == 'mahasiswa') {
                    $dosen = $this->db->select('*')->where('npm', $data['kd_user'])->get('mst_mahasiswa')->row();
                    $npm = !empty($dosen->npm) ? $dosen->npm : null;
                    $nama = !empty($dosen->nama_mahasiswa) ? $dosen->nama_mahasiswa : null;
                }

                $_SESSION['is_logged'] = true;
                $_SESSION['username'] = $data['username'];
                $_SESSION['status'] = $data['status'];
                $_SESSION['npm'] = $npm;
                $_SESSION['nik'] = $nik;
                $_SESSION['nama'] = $nama;
                $_SESSION['jabatan'] = $jabatan;
                $_SESSION['kd_prodi'] = $kd_prodi;

                echo json_encode([
                    'status' => 'success',
                    'code' => 201,
                    'message' => 'Berhasil login'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Password salah'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'code' => 404,
                'message' => 'Username tidak ditemukan'
            ]);
        }

        return;
    }

    public function check_availability_nik()
    {
        $this->load->library('rsa');

        $role = $_POST['role'];
        $nik = $_POST['nik'];
        $nik_old = $_POST['nik_old'];

        // if ($role === 'tu_univ') {
        //     $this->db->select('nik');
        //     $this->db->where('nik', $nik);
        //     $this->db->where('kd_prodi', '');
        //     $query = $this->db->get('mst_tata_usaha');
        // } else if ($role === 'tu_prodi') {
        //     $this->db->select('nik');
        //     $this->db->where('nik', $nik);
        //     $this->db->where('kd_prodi', '');
        //     $query = $this->db->get('mst_tata_usaha');
        // } else {
        //     return;
        // }

        $this->db->select('kd_user');
        $this->db->where('kd_user', $nik);
        $query = $this->db->get('user_akses');

        if ($data = $query->row_array()) {
            echo json_encode([
                'status' => 'error',
                'code' => 404,
                'message' => 'NIK Tidak Tersedia'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'message' => 'NIK Tersedia'
            ]);
        }

        return;
    }

    public function get_list_prodi()
    {
        $this->load->library('rsa');

        $kd_fakultas = isset($_GET['kd_fakultas']) ? $_GET['kd_fakultas'] : null;

        if (!empty($kd_fakultas)) {
            $this->db->select('*');
            $this->db->where('kd_fakultas', $kd_fakultas);
            $query = $this->db->get('mst_program_studi');

            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data Tersedia',
                'list' => $query->result()
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'code' => 404,
                'message' => 'Data tidak tersedia'
            ]);
        }

        return;
    }

    // Ruang Kelas
    public function check_availability_kd_ruang()
    {
        $kd_ruang = $_POST['kd_ruang'];

        $this->db->select('kd_ruang');
        $this->db->where('kd_ruang', $kd_ruang);
        $query = $this->db->get('ruang');

        if ($data = $query->row_array()) {
            echo json_encode([
                'status' => 'error',
                'code' => 404,
                'message' => 'Kode Ruang Tidak Tersedia'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'message' => 'Kode Ruang Tersedia'
            ]);
        }

        return;
    }

    public function get_list_mata_kuliah()
    {
        $kd_fakultas = $_GET['kd_fakultas'];
        $this->db->select('a.nama_mata_kuliah as mata_kuliah');
        $this->db->from('mata_kuliah as a');
        $this->db->join('mst_program_studi as b', 'a.kd_prodi = b.kd_prodi');
        $this->db->where('b.kd_fakultas', $kd_fakultas);
        $query = $this->db->get();

        if ($data = $query->result()) {
            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'message' => 'Mata Kuliah Tersedia',
                'list' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'code' => 404,
                'message' => 'Mata Kuliah Tidak Tersedia'
            ]);
        }

        return;
    }

    // Ruang Laboratorium
    public function check_availability_kd_ruang_lab()
    {
        $kd_ruang = $_POST['kd_ruang'];

        $this->db->select('kd_ruang');
        $this->db->where('kd_ruang', $kd_ruang);
        $query = $this->db->get('laboratorium');

        if ($data = $query->row_array()) {
            echo json_encode([
                'status' => 'error',
                'code' => 404,
                'message' => 'Kode Lab Tidak Tersedia'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'message' => 'Kode Lab Tersedia'
            ]);
        }

        return;
    }

    // Get list dosen by kd_prodi
    public function get_list_dosen()
    {
        $kd_fakultas = $_GET['kd_fakultas'];

        $this->db->select('a.nik, a.nama_dosen');
        $this->db->from('mst_dosen as a');
        $this->db->join('mst_program_studi as b', 'a.kd_prodi = b.kd_prodi');
        $this->db->where('b.kd_fakultas', $kd_fakultas);
        $query = $this->db->get();

        if ($data = $query->result()) {
            echo json_encode([
                'status' => 'error',
                'code' => 200,
                'message' => 'Data Tersedia',
                'list' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'code' => 404,
                'message' => 'Data tidak Tersedia'
            ]);
        }

        return;
    }
}

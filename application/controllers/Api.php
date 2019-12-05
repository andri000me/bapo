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

        // if (!$result = $mysqli->query($sql1)) {
        //     $message = "Sorry, the website is experiencing problems.";
        //     echo "<script type='text/javascript'>alert('$message');</script>";
        //     header('location:../signin.php?fail=' . $mysqli->errno);
        // } else {
        //     if ($result->num_rows == 1) {
        //         $data = $result->fetch_assoc();
        //
        //         if ($password == $this->rsa->decrypt($data['password'])) {
        //             $_SESSION['username'] = $data['username'];
        //             $_SESSION['status'] = $data['status'];
        //             $_SESSION['nik'] = $data['nik'];
        //             $_SESSION['nama'] = $data['nama_tata_usaha'];
        //             $_SESSION['kd_prodi'] = $data['kd_prodi'];
        //             header('location:../index.php');
        //         } else {
        //             header('location:../signin.php?fail=1');
        //         }
        //     } else {
        //         if (!$result2 = $mysqli->query($sql2)) {
        //             $message2 = "Sorry, the website is experiencing problems.";
        //             echo "<script type='text/javascript'>alert('$message2');</script>";
        //             header('location:../signin.php?fail=' . $mysqli->errno);
        //         } else {
        //             if ($result2->num_rows == 1) {
        //                 $data2 = $result2->fetch_assoc();
        //
        //                 if ($password == $this->rsa->decrypt($data2['password'])) {
        //                     $_SESSION['username'] = $data2['username'];
        //                     $_SESSION['status'] = $data2['status'];
        //                     $_SESSION['nik'] = $data2['nik'];
        //                     $_SESSION['nama'] = $data2['nama_dosen'];
        //                     $_SESSION['jabatan'] = $data2['jabatan'];
        //                     $_SESSION['kd_prodi'] = $data2['kd_prodi'];
        //                     header('location:../index.php');
        //                 } else {
        //                     header('location:../signin.php?fail=1');
        //                 }
        //             } else {
        //                 header('location:../signin.php?fail=2');
        //             }
        //         }
        //     }
        // }
        //
        // echo json_encode($result);
    }
}

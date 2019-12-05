<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Signout page
 */
class Signout extends MY_Controller
{

    public function index()
    {
        $_SESSION['is_logged'] = false;

        unset($_SESSION['username']);
        unset($_SESSION['status']);
        unset($_SESSION['npm']);
        unset($_SESSION['nik']);
        unset($_SESSION['nama']);
        unset($_SESSION['jabatan']);
        unset($_SESSION['kd_prodi']);

        redirect(base_url());
    }
}

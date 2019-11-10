<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Login extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    /**
     * Login page and submission with other method (using database)
     */
    public function index()
    {
        $this->load->library('form_builder');
        $form = $this->form_builder->create_form();

        if ($form->validate()) {
            // passed validation
            $identity = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = ($this->input->post('remember') == 'on');

            if ($this->ion_auth->login($identity, $password, $remember)) {
                // login succeed
                $messages = $this->ion_auth->messages();
                $this->system_message->set_success($messages);
                redirect($this->mModule);
            } else {
                // login failed
                $errors = $this->ion_auth->errors();
                $this->system_message->set_error($errors);
                refresh();
            }
        }

        // display form when no POST data, or validation failed
        $this->mViewData['form'] = $form;
        $this->mBodyClass = 'login-page';
        $this->render('login', 'empty');
    }

    /**
     * Login page and submission with other method (using database)
     */
    public function forgotPassword()
    {
        $this->load->library('form_builder');
        $form = $this->form_builder->create_form();

        if (!empty($_POST['username'])) {
            // passed validation
             unset($_SESSION['reset_password_error']);
            $identity = $this->input->post('username');

//            if ($this->ion_auth->login($identity, $password, $remember)) {
//                // login succeed
//                $messages = $this->ion_auth->messages();
//                $this->system_message->set_success($messages);
//                redirect($this->mModule);
//            } else {
//                // login failed
//                $errors = $this->ion_auth->errors();
//                $this->system_message->set_error($errors);
//                refresh();
//            }
        } else if (empty($_POST['username'])) {
            $_SESSION['reset_password_error'] = 'Username harus diisi';
        }

        // display form when no POST data, or validation failed
        $this->mViewData['form'] = $form;
        $this->mBodyClass = 'login-page';
        $this->render('forgot-password', 'empty');
    }
}

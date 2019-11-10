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
     * Login with LDAP
     * @param null $errorMsg
     */
    function ldap($errorMsg = NULL)
    {
        $this->load->library('form_builder');
        $form = $this->form_builder->create_form();

        if (!$this->session->userdata('username')) {
            // Set up rules for form validation
            $identity = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = ($this->input->post('remember') == 'on');

            // Do the login...
            if ($_POST) {
                $ldap_dn = "cn=" . $identity . "," . $this->auth_ldap->basedn;
                $ldap_connection = ldap_connect($this->auth_ldap->hosts[0]);

                ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);

                if (@ldap_bind($ldap_connection, $ldap_dn, $password)) {
                    $this->session->set_userdata('identity', $identity);
                    $this->session->set_userdata('username', $identity);
                    $this->session->set_userdata('name', $identity);
                    $this->session->set_userdata('first_name', $identity);
                    $this->session->set_userdata('last_name', $identity);

                    $messages = $this->ion_auth->messages();
                    $this->system_message->set_success($messages);
                    redirect($this->mModule);
                } else {
//                    $errors = $this->ion_auth->errors();
                    $this->system_message->set_error('Invalid username or password');
                    refresh();
                }
                ldap_unbind($ldap_connection);
            } else {
                // Login FAIL
                $this->mViewData['form'] = $form;
                $this->mBodyClass = 'login-page';
                $this->render('login-ldap', 'empty');
            }
        } else {
            // Already logged in...
            redirect('/admin/');
        }
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

    function logout_ldap()
    {
        if ($this->session->userdata('logged_in')) {
            $data['name'] = $this->session->userdata('cn');
            $data['username'] = $this->session->userdata('username');
            $data['logged_in'] = TRUE;
            $this->auth_ldap->logout();
        } else {
            $data['logged_in'] = FALSE;
        }
        $this->load->view('auth/logout_view', $data);
    }

    // TODO:
//    function indexUserInfo($errorMsg = null)
//    {
//        $ldap_columns = NULL;
//        $ldap_connection = NULL;
//        $ldap_password = '123456';
////        $ldap_username = 'cn='. 'admin@' . LDAP_DOMAIN;
//
//        $username = '2010470112';
//
//        $ldap_username = "cn=" . $username . ",dc=example,dc=com";
//
//        //------------------------------------------------------------------------------
//        // Connect to the LDAP server.
//        //------------------------------------------------------------------------------
//        $ldap_connection = ldap_connect(LDAP_HOSTNAME);
//        if (FALSE === $ldap_connection) {
//            die("<p>Failed to connect to the LDAP server: " . LDAP_HOSTNAME . "</p>");
//        }
//
//        ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
//        ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.
//
//        if (TRUE !== ldap_bind($ldap_connection, $ldap_username, $ldap_password)) {
//            die('<p>Failed to bind to LDAP server.</p>');
//        }
//
//        //------------------------------------------------------------------------------
//        // Get a list of all Active Directory users.
//        //------------------------------------------------------------------------------
//        $ldap_base_dn = 'dc=example,dc=com';
//        $search_filter = "(&(objectCategory=person))";
//        $result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter);
//
//        if (FALSE !== $result) {
//            $entries = ldap_get_entries($ldap_connection, $result);
//
//            if ($entries['count'] > 0) {
//                $odd = 0;
//                foreach ($entries[0] AS $key => $value) {
//                    if (0 === $odd % 2) {
//                        $ldap_columns[] = $key;
//                    }
//                    $odd++;
//                }
//                echo '<table class="data">';
//                echo '<tr>';
//                $header_count = 0;
//                foreach ($ldap_columns AS $col_name) {
//                    if (0 === $header_count++) {
//                        echo '<th class="ul">';
//                    } else if (count($ldap_columns) === $header_count) {
//                        echo '<th class="ur">';
//                    } else {
//                        echo '<th class="u">';
//                    }
//                    echo $col_name . '</th>';
//                }
//                echo '</tr>';
//                for ($i = 0; $i < $entries['count']; $i++) {
//                    echo '<tr>';
//                    $td_count = 0;
//                    foreach ($ldap_columns AS $col_name) {
//                        if (0 === $td_count++) {
//                            echo '<td class="l">';
//                        } else {
//                            echo '<td>';
//                        }
//                        if (isset($entries[$i][$col_name])) {
//                            $output = NULL;
//                            if ('lastlogon' === $col_name || 'lastlogontimestamp' === $col_name) {
//                                $output = date('D M d, Y @ H:i:s', ($entries[$i][$col_name][0] / 10000000) - 11676009600); // See note below
//                            } else {
//                                $output = $entries[$i][$col_name][0];
//                            }
//                            echo $output . '</td>';
//                        }
//                    }
//                    echo '</tr>';
//                }
//                echo '</table>';
//            }
//        }
//        ldap_unbind($ldap_connection); // Clean up after ourselves.
//    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_builder');
    }

	// Grocery CRUD - Activity Category
	public function category()
	{
		$crud = $this->generate_crud('activity_category');
		$crud->columns('name', 'parent_category', 'type', 'selectable', 'status');
        $crud->set_relation('parent_category', 'activity_category', '{name}', 'selectable = "Y"');

		$state = $crud->getState();
        if ($state === 'add')
        {
            $crud->field_type('id', 'hidden', $this->mUser->id);
            $this->unset_crud_fields('slug');
        } else if ($state ==='edit') {
            $this->unset_crud_fields('slug');
        }

        $this->mPageTitle = 'Kategori Aktivitas';
		$this->render_crud();
	}

    // Create Activity Category
    public function category_create()
    {
        // (optional) only top-level admin user groups can create Admin User
        //$this->verify_auth(array('webmaster'));

        $form = $this->form_builder->create_form();

        if ($form->validate())
        {
            // passed validation
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $additional_data = array(
                'first_name'	=> $this->input->post('first_name'),
                'last_name'		=> $this->input->post('last_name'),
            );
            $groups = $this->input->post('groups');

            // create user (default group as "members")
            $user = $this->ion_auth->register($username, $password, $email, $additional_data, $groups);
            if ($user)
            {
                // success
                $messages = $this->ion_auth->messages();
                $this->system_message->set_success($messages);
            }
            else
            {
                // failed
                $errors = $this->ion_auth->errors();
                $this->system_message->set_error($errors);
            }
            refresh();
        }

        $groups = $this->ion_auth->groups()->result();
        unset($groups[0]);	// disable creation of "webmaster" account
        $this->mViewData['groups'] = $groups;
        $this->mPageTitle = 'Create Admin User';

        $this->mViewData['form'] = $form;
        $this->render('panel/admin_user_create');
    }


//    public function index() {
//        // Dynamic menu aktivitas kegiatan
//        $this->db->select('*');
//        $this->db->from('activity_category');
//        $this->db->where('id', $_GET['id']);
//        $this->db->where('status', 'Y');
//        $query = $this->db->get();
//        $menu = !empty($query->result()) ? $query->result()[0] : null;
//
//        // (optional) only top-level admin user groups can create Admin User
//		//$this->verify_auth(array('webmaster'));
//
//		$form = $this->form_builder->create_form();
//
//		if ($form->validate())
//        {
//            // passed validation
//            $username = $this->input->post('username');
//            $email = $this->input->post('email');
//            $password = $this->input->post('password');
//            $additional_data = array(
//                'first_name'	=> $this->input->post('first_name'),
//                'last_name'		=> $this->input->post('last_name'),
//            );
//            $groups = $this->input->post('groups');
//
//            // create user (default group as "members")
//            $user = $this->ion_auth->register($username, $password, $email, $additional_data, $groups);
//            if ($user)
//            {
//                // success
//                $messages = $this->ion_auth->messages();
//                $this->system_message->set_success($messages);
//            }
//            else
//            {
//                // failed
//                $errors = $this->ion_auth->errors();
//                $this->system_message->set_error($errors);
//            }
//            refresh();
//        }
//
//		$groups = $this->ion_auth->groups()->result();
//		unset($groups[0]);	// disable creation of "webmaster" account
//		$this->mViewData['groups'] = $groups;
//		$this->mPageTitle = 'Create Admin User';
//
//		$this->mViewData['form'] = $form;
//		$this->render('panel/admin_user_create');
//
////        $crud = $this->generate_crud('activity_category');
////        $crud->columns('name', 'parent_category', 'type', 'selectable', 'status');
////        $crud->set_relation('parent_category', 'activity_category', '{name}', 'selectable = "Y"Z');
////
////        $state = $crud->getState();
////        if ($state === 'add')
////        {
////            $crud->field_type('id', 'hidden', $this->mUser->id);
////            $this->unset_crud_fields('slug');
////        } else if ($state ==='edit') {
////            $this->unset_crud_fields('slug');
////        }
////
////        $this->mPageTitle = $menu->name;
////        $this->render_crud();
//    }
}

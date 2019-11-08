<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_lulusan extends Admin_Controller {

    // Grocery CRUD - Activity Category
    public function index()
    {
        $crud = $this->generate_crud('profil_lulusan');

        $state = $crud->getState();
        if ($state==='add')
        {
            $crud->field_type('id_profil', 'hidden', $this->mUser->id);
        }

        $this->mPageTitle = 'Profil Lulusan';
        $this->render_crud();
    }
}

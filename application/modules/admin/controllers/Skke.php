<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skke extends Admin_Controller {

    // Grocery CRUD - Activity Category
    public function jenis_kegiatan()
    {
        $crud = $this->generate_crud('jenis_kegiatan');
//        $crud->columns('id_jenis_kegiatan', 'nm_jenis_kegiatan', 'jenis_kegiatan');
//		$crud->set_field_upload('image_url', UPLOAD_BLOG_POST);
//		$crud->set_relation('category_id', 'blog_categories', 'title');
//		$crud->set_relation_n_n('tags', 'blog_posts_tags', 'blog_tags', 'post_id', 'tag_id', 'title');

        $state = $crud->getState();
        if ($state==='add')
        {
            $crud->field_type('id_jenis_kegiatan', 'hidden', $this->mUser->id);
//			$this->unset_crud_fields('status');
        }
        else
        {
//			$crud->set_relation('author_id', 'admin_users', '{first_name} {last_name}');
        }

        $this->mPageTitle = 'Jenis Kegiatan';
        $this->render_crud();
    }
}

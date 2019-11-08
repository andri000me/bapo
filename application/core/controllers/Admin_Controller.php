<?php

/**
 * Base Controller for Admin module
 */
class Admin_Controller extends MY_Controller
{

    protected $mUsefulLinks = array();
    protected $mCustomMenu = [];

    // Grocery CRUD or Image CRUD
    protected $mCrud;
    protected $mCrudUnsetFields;

    // Constructor
    public function __construct()
    {
        parent::__construct();

        // only login users can access Admin Panel
        $this->verify_login();

        // store site config values
        $this->mUsefulLinks = $this->mConfig['useful_links'];

        // Dynamic menu aktivitas kegiatan
        /*$this->db->select('*');
        $this->db->from('activity_category');
        $this->db->where('status', 'Y');
        $this->db->order_by('parent_category ASC');
        $query = $this->db->get();

        $activityCategoryMenu = array();
        foreach ($query->result() AS $val) {
            $temp = array();
            $temp['id'] = $val->id;
            $temp['parent_category'] = $val->parent_category;
            $temp['name'] = trim($val->name);
            $temp['url'] = 'activity?id=' . $val->id . '&name=' . preg_replace('/\s+/', '_', trim(mb_strtolower($val->name)));
            $temp['icon'] = trim($val->icon);
            $temp['children'] = array();

            if (!empty($val->parent_category)) {
                foreach ($activityCategoryMenu AS $i => $val2) {
                    if ($val2['id'] == $val->parent_category) {
                        $activityCategoryMenu[$val2['id']]['children'][$val->id] = $temp;
                    } else {
                        if (!empty($val2['children'])) {
                            foreach ($val2['children'] AS $val3) {
                                if ($val3['id'] == $val->parent_category) {
                                    $activityCategoryMenu[$val2['id']]['children'][$val3['id']]['children'][$val->id] = $temp;
                                }
                            }
                        }
                    }
                }
            } else {
                $activityCategoryMenu[$val->id] = $temp;
            }
        }

        foreach ($activityCategoryMenu AS $value) {
            array_push($this->mMenu, $value);
        }*/
    }

    // Render template (override parent)
    protected function render($view_file, $layout = 'default')
    {
        // load skin according to user role
        $config = $this->mConfig['adminlte'];
        $this->mBodyClass = $this->mUserMainGroup ? $config['body_class'][$this->mUserMainGroup] : 'skin-light-green';

        // additional view data
        $this->mViewData['useful_links'] = $this->mUsefulLinks;

        parent::render($view_file);
    }

    // Initialize CRUD table via Grocery CRUD library
    // Reference: http://www.grocerycrud.com/
    protected function generate_crud($table, $subject = '')
    {
        // create CRUD object
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table($table);

        // auto-generate subject
        if (empty($subject)) {
            $crud->set_subject(humanize(singular($table)));
        }

        // load settings from: application/config/grocery_crud.php
        $this->load->config('grocery_crud');
        $this->mCrudUnsetFields = $this->config->item('grocery_crud_unset_fields');

        if ($this->config->item('grocery_crud_unset_jquery'))
            $crud->unset_jquery();

        if ($this->config->item('grocery_crud_unset_jquery_ui'))
            $crud->unset_jquery_ui();

        if ($this->config->item('grocery_crud_unset_print'))
            $crud->unset_print();

        if ($this->config->item('grocery_crud_unset_export'))
            $crud->unset_export();

        if ($this->config->item('grocery_crud_unset_read'))
            $crud->unset_read();

        foreach ($this->config->item('grocery_crud_display_as') as $key => $value)
            $crud->display_as($key, $value);

        // other custom logic to be done outside
        $this->mCrud = $crud;
        return $crud;
    }

    // Set field(s) to color picker
    protected function set_crud_color_picker()
    {
        $args = func_get_args();
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }
        foreach ($args as $field) {
            $this->mCrud->callback_field($field, array($this, 'callback_color_picker'));
        }
    }

    public function callback_color_picker($value = '', $primary_key = NULL, $field = NULL)
    {
        $name = $field->name;
        return "<input type='color' name='$name' value='$value' style='width:80px' />";
    }

    // Append additional fields to unset from CRUD
    protected function unset_crud_fields()
    {
        $args = func_get_args();
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }
        $this->mCrudUnsetFields = array_merge($this->mCrudUnsetFields, $args);
    }

    // Initialize CRUD album via Image CRUD library
    // Reference: http://www.grocerycrud.com/image-crud
    protected function generate_image_crud($table, $url_field, $upload_path, $order_field = 'pos', $title_field = '')
    {
        // create CRUD object
        $this->load->library('Image_crud');
        $crud = new image_CRUD();
        $crud->set_table($table);
        $crud->set_url_field($url_field);
        $crud->set_image_path($upload_path);

        // [Optional] field name of image order (e.g. "pos")
        if (!empty($order_field)) {
            $crud->set_ordering_field($order_field);
        }

        // [Optional] field name of image caption (e.g. "caption")
        if (!empty($title_field)) {
            $crud->set_title_field($title_field);
        }

        // other custom logic to be done outside
        $this->mCrud = $crud;
        return $crud;
    }

    // Render CRUD
    protected function render_crud()
    {
        // logic specific for Grocery CRUD only
        $crud_obj_name = strtolower(get_class($this->mCrud));
        if ($crud_obj_name === 'grocery_crud') {
            $this->mCrud->unset_fields($this->mCrudUnsetFields);
        }

        // render CRUD
        $crud_data = $this->mCrud->render();

        // append scripts
        $this->add_stylesheet($crud_data->css_files, FALSE);
        $this->add_script($crud_data->js_files, TRUE, 'head');

        // display view
        $this->mViewData['crud_output'] = $crud_data->output;
        $this->render('crud');
    }
}
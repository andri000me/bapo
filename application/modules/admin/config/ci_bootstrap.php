<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Admin Panel',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js'
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css',
			'assets/dist/admin/skin-light-green.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> 'home/index',
			'icon'		=> 'fa fa-home',
            'children'  => ''
		),
        'data_mhs'	=> array(
            'name'		=> 'Data Mahasiswa',
            'url'		=> 'mahasiswa/index',
            'icon'		=> 'fa fa-book',
            'children'  => ''
        ),
		// 'user' => array(
		// 	'name'		=> 'Users',
		// 	'url'		=> 'user',
		// 	'icon'		=> 'fa fa-users',
		// 	'children'  => array(
		// 		'List'			=> 'user',
		// 		'Create'		=> 'user/create',
		// 		'User Groups'	=> 'user/group',
		// 	)
		// ),
		// 'blog' => array(
		// 	'name'		=> 'Blog',
		// 	'url'		=> 'blog',
		// 	'icon'		=> 'ion ion-edit',	// can use Ionicons instead of FontAwesome
		// 	'children'  => array(
		// 		'Blog Posts'		=> 'blog/post',
		// 		'Blog Categories'	=> 'blog/category',
		// 		'Blog Tags'			=> 'blog/tag',
		// 	)
		// ),
//		2 => array(
//			'name'		=> 'Cover Photos',
//			'url'		=> 'cover_photo',
//			'icon'		=> 'ion ion-image',	// can use Ionicons instead of FontAwesome
//		),
//		3 => array(
//			'name'		=> 'Admin Panel',
//			'url'		=> '#',
//			'icon'		=> 'fa fa-cog',
//			'children'  => array(
//                0		=> array(
//                    'name'		=> 'List USER',
//                    'url'		=> 'user',
//                    'icon'		=> '',
//                    'children'  => ''
//                ),
//                1		=> array(
//                    'name'		=> 'Admin Users',
//                    'url'		=> 'panel/admin_user',
//                    'icon'		=> '',
//                    'children'  => ''
//                ),
//                2		=> array(
//                    'name'		=> 'Create Admin User',
//                    'url'		=> 'panel/admin_user_create',
//                    'icon'		=> '',
//                    'children'  => ''
//                ),
//                3		=> array(
//                    'name'		=> 'Admin User Groups',
//                    'url'		=> 'panel/admin_user_group',
//                    'icon'		=> '',
//                    'children'  => ''
//                ),
//			)
//		),
//        4 => array(
//            'name'		=> 'Utilities',
//            'url'		=> '#',
//            'icon'		=> 'fa fa-cogs',
//            'children'  => array(
//                0  => array(
//                    'name'		=> 'Database Versions',
//                    'url'		=> 'util/list_db',
//                    'icon'		=> '',
//                    'children'  => ''
//                )
//            )
//        ),
	),

    // Useful links to display at bottom of sidemenu
    'useful_links' => array(
        array(
            'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
            'name'		=> 'Fakultas',
            'url'		=> '/admin/fakultas/',
            'target'	=> '',
            'color'		=> 'text-aqua'
        ),
        array(
            'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
            'name'		=> 'Prodi',
            'url'		=> '/admin/prodi/',
            'target'	=> '',
            'color'		=> 'text-aqua'
        ),
        array(
            'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
            'name'		=> 'Sign out',
            'url'		=> 'admin/panel/logout/',
            'target'	=> '',
            'color'		=> 'text-red'
        ),
    ),

    // Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'skkm'				        => array('webmaster', 'admin', 'manager'),
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-purple',
			'manager'	=> 'skin-black',
			'staff'		=> 'skin-blue',
//            'webmaster'	=> 'skin-light-green',
//            'admin'		=> 'skin-light-green',
//            'manager'	=> 'skin-light-green',
//            'staff'		=> 'skin-light-green'
		)
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';
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
    'site_name' => 'E-SAP Universitas Yarsi',

    // Default page title prefix
    'page_title_prefix' => '',

    // Default page title
    'page_title' => '',

    // Default meta data
    'meta_data' => array(
        'author' => '',
        'description' => '',
        'keywords' => ''
    ),

    // Default scripts to embed at page head or end
    'scripts' => array(
        'head' => array(
            'assets/dist/frontend/js/jquery-1.11.1.min.js',
        ),
        'foot' => array(
            // 'assets/dist/frontend/lib.min.js',
            // 'assets/dist/frontend/app.min.js',
            // 'assets/dist/frontend/js/jquery-2.1.1.min.js',
            'assets/dist/frontend/js/bootstrap.min.js',
            'assets/dist/frontend/js/jquery.prettyPhoto.js',
            'assets/dist/frontend/js/jquery.isotope.min.js',
            'assets/dist/frontend/js/wow.min.js',
            'assets/dist/frontend/js/functions.js',
            'assets/dist/frontend/contactform/contactform.js',
        ),
    ),

    // Default stylesheets to embed at page head
    'stylesheets' => array(
        'screen' => array(
            // 'assets/dist/frontend/lib.min.css',
            // 'assets/dist/frontend/app.min.css',
            'assets/dist/frontend/css/bootstrap.min.css',
            'assets/dist/frontend/css/font-awesome.min.css',
            'assets/dist/frontend/css/animate.css',
            'assets/dist/frontend/css/prettyPhoto.css',
            'assets/dist/frontend/css/style.css',
        )
    ),

    // Default CSS class for <body> tag
    'body_class' => '',

    // Multilingual settings
    // 'languages' => array(
    // 	'default'		=> 'en',
    // 	'autoload'		=> array('general'),
    // 	'available'		=> array(
    // 		'en' => array(
    // 			'label'	=> 'English',
    // 			'value'	=> 'english'
    // 		),
    // 	)
    // ),

    // Google Analytics User ID
    'ga_id' => '',

    // Menu items
    'menu' => array(
        'home' => array(
            'name' => 'Beranda',
            'url' => 'home',
        ),
        'about' => array(
            'name' => 'Tentang Kami',
            'url' => 'about',
        ),
        'services' => array(
            'name' => 'Pelayanan',
            'url' => 'services',
        ),
        'galeri' => array(
            'name' => 'Galeri',
            'url' => 'gallery',
        ),
        'contact' => array(
            'name' => 'Kontak Kami',
            'url' => 'contact',
        ),
        'signin' => array(
            'name' => 'Masuk',
            'url' => 'signin',
        ),
    ),

    // Login page
    'login_url' => '',

    // Restricted pages
    'page_auth' => array(),

    // Email config
    'email' => array(
        'from_email' => '',
        'from_name' => '',
        'subject_prefix' => '',

        // Mailgun HTTP API
        'mailgun_api' => array(
            'domain' => '',
            'private_api_key' => ''
        ),
    ),

    // Debug tools
    'debug' => array(
        'view_data' => FALSE,
        'profiler' => FALSE
    ),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';
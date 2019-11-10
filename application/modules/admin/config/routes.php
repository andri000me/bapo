<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// default controller for this module
$route['admin'] = 'home';
$route['admin/login-ldap'] = 'Login/Ldap';
$route['admin/login/forgot-password'] = 'Login/forgotPassword';
//$route['admin/activity/category'] = 'Activity/category';

// ROUTER SKKE
//$route['admin/skke/jenis-kegiatan'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/add'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/edit/(:any)'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/read/(:any)'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/delete/(:any)'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/insert'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/insert_validation'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/update'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/update_validation/(:any)'] = 'Skke/jenisKegiatan';
//
//$route['admin/skke/jenis-kegiatan/ajax_list'] = 'Skke/jenisKegiatan';
//$route['admin/skke/jenis-kegiatan/ajax_list_info'] = 'Skke/jenisKegiatan';
//
//$route['admin/([a-zA-Z_-]+)/(:any)/(:any)']               = '$1/$2/$3/$4';
//$route['admin/([a-zA-Z_-]+)/add']                 = '$1/add';
//$route['admin/([a-zA-Z_-]+)/edit/(:any)']                 = '$1/edit/$2';
//$route['admin/([a-zA-Z_-]+)/delete/(:any)']               = '$1/delete/$2';
//$route['admin/([a-zA-Z_-]+)/(:any)']                      = '$1/$2';
////$route['admin/([a-zA-Z_-]+)']                             = '$1/admin/index';
////$route['admin']                                           = 'admin';
//
////$route['admin/skke/jenis-kegiatan/edit/$1'] = 'Skke/jenisKegaitan';
////$route['admin/(:any)/(:num)']				= 'api/$1/id/$2';
////$route['admin/(:any)/(:num)/(:any)']		= 'api/$1/$3/$2';
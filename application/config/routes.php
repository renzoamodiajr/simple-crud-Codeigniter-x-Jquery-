<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'users/index';
$route['get_data'] = 'users/get_data';
$route['insert'] = 'users/insert';
$route['update'] = 'users/update';
$route['delete'] = 'users/delete';

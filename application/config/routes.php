<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['register'] = 'home/regirter';
$route['login'] = 'home/login';
$route['faq'] = 'home/faq';
$route['review'] = 'home/review';
$route['contact'] = 'home/contact';
$route['exchange'] = 'home/exchange';
$route['termsofservices'] = 'home/termsofservices';
$route['about'] = 'home/about';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/dashboard';
$route['admin/prefs/interfaces/(:any)'] = 'admin/prefs/interfaces/$1';


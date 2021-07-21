<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['book'] = 'book';
$route['logout'] = 'login/logout';
$route['login'] = 'login';
$route['question/store'] = 'question/store';
$route['question/(:num)/update'] = 'question/update/$1';
$route['question/(:num)/edit'] = 'question/edit/$1';
$route['question/delete/(:num)'] = 'question/delete/$1';
$route['question/mypage'] = 'question/mypage';
$route['question/create'] = 'question/create';
$route['question/(:num)'] = 'question/show/$1';
$route['question'] = 'question';
$route['report/(:num)/delete'] = 'dailyreport/delete/$1';
$route['report/(:num)'] = 'dailyreport/show/$1';
$route['report'] = 'dailyreport';
$route['report/create'] = 'dailyreport/create';
$route['report/(:num)/edit'] = 'dailyreport/edit/$1';
$route['news/edit/(:num)'] = 'news/edit/$1';
$route['news/delete/(:num)'] ['post']= 'news/delete/$1';
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

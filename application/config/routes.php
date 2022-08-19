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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '404';

// front ends pages

$route['cart'] = 'home/cart';
$route['checkout'] = 'home/checkout';
$route['index_2'] = 'home/index_2';
$route['contact'] = 'home/contact';
$route['news'] = 'home/news';
$route['product'] = 'home/product';
$route['shop'] = 'home/shop';
$route['signup'] = 'home/signup';
$route['single_news'] = 'home/single_news';
$route['about'] = 'home/about';
$route['newsltr'] = 'home/newsltr';
$route['404'] = 'home/err404';

// ends front ends pages


// backend pages


$route['admin'] = 'admin/signin';
$route['admin/signup'] = 'admin/admin/signup';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/addcategory'] = 'admin/admin/add_category';
$route['admin/category'] = 'admin/admin/display_category';
$route['admin/addproduct'] = 'admin/admin/add_prodcut';
$route['admin/products'] = 'admin/admin/display_product';
$route['translate_uri_dashes'] = FALSE;

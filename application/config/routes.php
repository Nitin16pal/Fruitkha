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

$route['cart'] = 'product/cart';
$route['checkout'] = 'product/checkout';
$route['index_2'] = 'home/index_2';
$route['contact'] = 'home/contact';
$route['news'] = 'home/news';
$route['product'] = 'home/product';
$route['shop'] = 'home/shop';
$route['user-registration'] = 'home/user_regstration';
$route['single-news'] = 'home/single_news';
$route['about'] = 'home/about';
$route['newsltr'] = 'home/newsltr';
$route['404'] = 'home/err404';

// ends front ends pages


// backend pages


$route['admin'] = 'admin/login';

$route['accounts/dashboard'] = 'private/admin/index';

$route['accounts/logout'] = 'private/admin/logout';

$route['accounts/category'] = 'private/admin/category';
$route['accounts/add_category'] = 'private/admin/add_category';
$route['accounts/edit_category/(:num)'] = 'private/admin/add_category/$1';

$route['accounts/sub_category'] = 'private/admin/sub_category';
$route['accounts/add_subcategory'] = 'private/admin/add_sub_category';
$route['accounts/edit_subcategory/(:num)'] = 'private/admin/add_sub_category/$1';

$route['accounts/products'] = 'private/product/index';
$route['accounts/add_product'] = 'private/product/add_product';
$route['accounts/edit_product/(:num)'] = 'private/product/add_product/$1';
$route['accounts/getsubcat'] = 'private/product/getsubcat';
$route['accounts/add_coupon'] = 'private/product/add_copun';
$route['accounts/coupon'] = 'private/product/copun';
$route['accounts/edit_coupon/(:num)'] = 'private/product/add_copun/$1';

$route['accounts/blogs'] = 'private/Blogs_admin/index';
$route['accounts/add_blogs'] = 'private/Blogs_admin/add_blog';
$route['accounts/edit_blog/(:num)'] = 'private/Blogs_admin/add_blog/$1';

$route['accounts/contact-enquiries'] = 'private/admin/contact_us';



$route['translate_uri_dashes'] = FALSE;

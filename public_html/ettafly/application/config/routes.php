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
| so that a different class/function is called than the one.
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


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['index'] ='home/index';
$route['aboutus'] ='home/aboutus';
$route['one_way'] ='home/one_way';
$route['support'] ='home/support';
$route['contact'] ='home/contact';
$route['terms_and_conditions'] ='home/privacy_policy';
$route['terms_and_conditions'] ='home/terms_and_conditions';
$route['video_gallery'] ='home/video_gallery';
$route['faq'] ='home/faq';
$route['divisions'] ='home/divisions';
$route['register'] ='home/register';
$route['confirm_details/(:any)'] ='home/confirm_details/$1';
$route['payment/(:any)'] ='home/payment/$1';
$route['payment_conform'] ='user/payment_conform';
$route['booking_details/(:any)'] ='user/booking_details/$1';
$route['payment_sucess/(:any)'] ='user/payment_sucess/$1';

$route['register'] ='home/register';


$route['login'] ='user_login/index';
$route['dashboard'] ='user/dashboard';
$route['affiliations'] ='user/affiliations';

//$route['confirm_details/(:any)'] ='user/confirm_details/$1';
$route['dashboard_affliation/(:any)'] ='user/dashboard_affliation/$1';
$route['privacy_policy'] ='home/privacy_policy';
$route['blog'] ='home/blog';
$route['blog_view/(:any)'] ='home/blog_view/$1';
$route['testimonials'] ='home/testimonials';

$route['profile'] ='user/profile';
$route['logout'] ='logout';

//$route['property_view'] ='home/testimonials';project_location
$route['translate_uri_dashes'] = FALSE;

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
$route['approved_payment/(:any)/(:any)/(:any)/(:any)'] = 'pages/approved_payment/$1/$2/$3/$4';
$route['viewpaymentdetails/(:any)/(:any)/(:any)'] = 'pages/viewpaymentdetails/$1/$2/$3';
$route['post_payment'] = 'pages/post_payment';
$route['print_invoice_user/(:any)/(:any)'] = 'pages/print_invoice_user/$1/$2';
$route['update_user_profile'] = 'pages/update_user_profile';
$route['user_delete_student/(:any)'] = 'pages/user_delete_student/$1';
$route['user_add_student/(:any)'] = 'pages/user_add_student/$1';
$route['user_logout'] = 'pages/user_logout';
$route['usermain'] = 'pages/usermain';
$route['user_registration'] = 'pages/user_registration';
$route['user_authenticate'] = 'pages/user_authenticate';
$route['user_register'] = 'pages/user_register';
$route['user'] = 'pages/user';
//========================Admin Route==============================
$route['manage_request/(:any)/(:any)'] = 'pages/manage_request/$1/$2';
$route['registered_student'] = 'pages/registered_student';
$route['registered_user'] = 'pages/registered_user';
$route['approved_request'] = 'pages/approved_request';
$route['pending_request'] = 'pages/pending_request';
$route['admin_logout'] = 'pages/admin_logout';
$route['adminmain'] = 'pages/adminmain';
$route['admin_authenticate'] = 'pages/admin_authenticate';
$route['admin'] = 'pages/admin';
//=========================School Route============================
$route['send_reminder'] = 'pages/send_reminders';
$route['send_invoice'] = 'pages/send_invoice';
$route['manage_notification'] = 'pages/manage_notification';
$route['view_qrCode/(:any)'] = 'pages/view_qrCode/$1';
$route['save_gcash'] = 'pages/save_gcash';
$route['print_invoice/(:any)/(:any)'] = 'pages/print_invoice/$1/$2';
$route['save_billing'] = 'pages/save_billing';
$route['billing_details/(:any)/(:any)'] = 'pages/billing_details/$1/$2';
$route['manage_billing'] = 'pages/manage_billing';
$route['generate_list_hs'] = 'pages/generate_list_hs';
$route['generate_list_college'] = 'pages/generate_list_college';
$route['save_schoolyear'] = 'pages/save_schoolyear';
$route['save_student_account'] = 'pages/save_student_account';
$route['manage_student_account'] = 'pages/manage_student_account';
$route['save_exam_frequency'] = 'pages/save_exam_frequency';
$route['save_student'] = 'pages/save_student';
$route['manage_student'] = 'pages/manage_student';
$route['save_grade'] = 'pages/save_grade';
$route['save_course'] = 'pages/save_course';
$route['course_grade_info'] = 'pages/course_grade_info';
$route['save_staff_account'] = 'pages/save_staff_account';
$route['save_staff'] = 'pages/save_staff';
$route['upload_logo'] = 'pages/upload_logo';
$route['school_info_save'] = 'pages/school_info_save';
$route['school_info'] = 'pages/school_info';
$route['main'] = 'pages/main';
$route['logout'] = 'pages/logout';
$route['registration'] = 'pages/registration';
$route['school_register'] = 'pages/school_register';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

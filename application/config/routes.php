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
//========================Admin Route==============================
$route['change_password'] = 'pages/change_password';
$route['user_list'] = 'pages/user_list';
$route['delete_user_account/(:any)'] = 'pages/delete_user_account/$1';
$route['save_user_account'] = 'pages/save_user_account';
$route['user_account'] = 'pages/user_account';
$route['print_income'] = 'pages/print_income';
$route['income'] = 'pages/income';
$route['fight_result/(:any)/(:any)'] = 'pages/fight_result/$1/$2';
$route['close_betting/(:any)'] = 'pages/close_betting/$1';
$route['active_fight'] = 'pages/active_fight';
$route['create_fight'] = 'pages/create_fight';
$route['fight_list'] = 'pages/fight_list';
$route['cancel_withdrawal/(:any)'] = 'pages/cancel_withdrawal/$1';
$route['approve_withdrawal/(:any)'] = 'pages/approve_withdrawal/$1';
$route['manage_withdrawal'] = 'pages/manage_withdrawal';
$route['cancel_deposit/(:any)'] = 'pages/cancel_deposit/$1';
$route['approve_deposit/(:any)'] = 'pages/approve_deposit/$1';
$route['manage_deposit'] = 'pages/manage_deposit';
$route['admin_logout'] = 'pages/admin_logout';
$route['adminmain'] = 'pages/adminmain';
$route['admin_authenticate'] = 'pages/admin_authenticate';
$route['admin'] = 'pages/admin';
//=========================User Route============================
$route['change_user_password'] = 'pages/change_user_password';
$route['undo_bet/(:any)/(:any)/(:any)'] = 'pages/undo_bet/$1/$2/$3';
$route['search_bet_history'] = 'pages/search_bet_history';
$route['bet_history'] = 'pages/bet_history';
$route['submit_bet'] = 'pages/submit_bet';
$route['withdraw_history'] = 'pages/withdraw_history';
$route['save_withdraw'] = 'pages/save_withdraw';
$route['withdraw'] = 'pages/withdraw';
$route['deposit_history'] = 'pages/deposit_history';
$route['save_deposit'] = 'pages/save_deposit';
$route['deposit'] = 'pages/deposit';
$route['main'] = 'pages/main';
$route['logout'] = 'pages/logout';
$route['registration'] = 'pages/registration';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

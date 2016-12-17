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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//create new company
$route['new_company'] = 'dashboard/create';
$route['createcompany'] = 'dashboard/create';
$route['companydelete/(:any)'] = 'dashboard/company_delete/$1';

$route['create_ppt/(:any)'] = 'Pptcheck/ppt/$1';

//Plan Page
$route['plan/cover_page/(:any)'] = 'plan/cover/$1';
$route['plan/download/(:any)'] = 'plan/pdf/$1';

//Accounts setting Page
$route['settings/(:any)'] = 'Accounts/$1';
$route['upgrade/(:any)'] = 'accounts/upgrade/$1?$2';
$route['get_leads'] = 'subscription/get_leads';

//Login and logout page
$route['check_email'] = 'signup/check_email';
$route['update_password'] = 'login/account_password';
$route['change_password'] = 'login/change_password';
$route['delete_account'] = 'login/delete_account';
$route['comeback'] = 'login/comeback';
$route['logout'] = 'login/logout';

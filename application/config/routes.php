<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['projects/all'] = 'projects/all';
$route['projects/index'] = 'projects/index';
$route['projects/upload'] = 'projects/upload';
$route['projects/update'] = 'projects/update';
$route['projects/pending'] = 'projects/pending';
$route['projects/pendingview/(:any)'] = 'projects/pendingview/$1';
$route['projects/approved'] = 'projects/approved';
$route['projects/approvedview/(:any)'] = 'projects/approvedview/$1';
$route['projects/rejected'] = 'projects/rejected';
$route['projects/rejecting/(:any)'] = 'projects/rejecting/$1';
$route['projects/rejectedview/(:any)'] = 'projects/rejectedview/$1';
$route['projects/discussionview/(:any)'] = 'projects/discussionview/$1';
$route['projects/discussion'] = 'projects/discussion';
$route['projects/videograph/(:any)'] = 'projects/videograph/$1';
$route['projects/webgraph/(:any)'] = 'projects/webgraph/$1';
$route['projects/(:any)'] = 'projects/view/$1';
$route['projects'] = 'projects/index';

$route['email'] = 'email/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/projects/(:any)'] = 'categories/projects/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

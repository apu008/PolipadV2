<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/
// if you are using standard MVC
if($handle = opendir(APPPATH.'/controllers'))
{
while(false !== ($controller = readdir($handle)))
{
if($controller != '.' && $controller != '..' && strstr($controller, '.') == '.php')
{
$route[strstr($controller, '.', true)] = strstr($controller, '.', true);
$route[strstr($controller, '.', true).'/(:any)'] = strstr($controller, '.', true).'/$1';
}
}
closedir($handle);
}

// these are the /username routes
$route['([a-zA-Z0-9_-]+)'] = 'userpage/index/$1';
$route['([a-zA-Z0-9_-]+)/subpage'] = 'userpage/subpage/$1';

$route['default_controller'] = "polipads";
$route['scaffolding_trigger'] = "";
/*$route['([a-z]+)'] = "campaign/userhome";
$route[':any/([a-z]+)/([a-z]+)'] = "$1/$2";
$route[':any/idea/idearfiview/(:num)'] = "idea/idearfiview/$3";
$route[':any/idea/ideapage/(:num)'] = "idea/ideapage/$3";
$route[':any/idea/ideaview/(:num)'] = "idea/ideaview/$3";
$route[':any/idea/ideasupport/(:num)'] = "idea/ideasupport/$3";
$route[':any/media/deletemedia/(:num)'] = "media/deletemedia/$3";
$route[':any/media/editmedia/(:num)'] = "media/editmedia/$3";
$route[':any/event/eventjoin/(:num)'] = "event/eventjoin/$3";
$route[':any/campaign/deletevideo/(:num)'] = "campaign/deletevideo/$3";
$route[':any/campaign/deletetext/(:num)'] = "campaign/deletetext/$3";*/
/* End of file routes.php */
/* Location: ./system/application/config/routes.php */
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
$route['default_controller'] = 'Pages';
$route['pictures'] = "pages/pictures";
$route['arthouselogin'] = "pages/arthouselogin";
$route['arthouseadmin'] = "pages/arthouseadmin";
$route['arthouseadmin/arthousesettings'] = "pages/arthousesettings";
$route['arthouseadmin/arthousepages'] = "pages/arthousepages";
$route['arthouseadmin/addoriginalpage'] = "pages/addoriginalpage";
$route['arthouseadmin/addlinkpage'] = "pages/addlinkpage";
$route['arthouseadmin/adddropdown'] = "pages/adddropdown";
$route['arthouseadmin/addCheck'] = "pages/addCheck";
$route['arthouseadmin/addlinkCheck'] = "pages/addlinkCheck";
$route['arthouseadmin/adddropCheck'] = "pages/adddropCheck";
$route['arthouseadmin/delete/(:any)/(:any)'] = "pages/delete/$1/$2";
$route['arthouseadmin/edit/(:any)'] = "pages/edit/$1";
$route['arthouseadmin/edit/(:any)/(:any)'] = "pages/edit/$1/$2";
$route['page/(:any)'] = "pages/page/$1";
$route['arthouseadmin/addcert'] = "pages/addcert";
$route['arthouseadmin/addcertCheck'] = "pages/addcertCheck";
$route['arthouseadmin/certificates'] = "pages/certificatesad";
$route['arthouseadmin/ar_generalsettings'] = "pages/ar_generalsettings";
$route['arthouseadmin/generalsettings'] = "pages/generalsettings";
$route['arthouseadmin/editCheck/(:any)'] = "pages/editCheck/$1";
$route['arthouseadmin/ar_settCheck'] = "pages/ar_settCheck";
$route['arthouseadmin/settCheck'] = "pages/settCheck";
$route['arthouseadmin/editcertCheck/(:any)'] = "pages/editcertCheck/$1";
/*Component*/
$route['arthouseadmin/editclientCheck/(:any)'] = "pages/editclientCheck/$1";
$route['arthouseadmin/addclient'] = "pages/addclient";
$route['arthouseadmin/addclientCheck'] = "pages/addclientCheck";
$route['arthouseadmin/client'] = "pages/clientad";
/*End Component*/

/*Component*/
$route['arthouseadmin/editnewsCheck/(:any)'] = "pages/editnewsCheck/$1";
$route['arthouseadmin/addnews'] = "pages/addnews";
$route['arthouseadmin/addnewsCheck'] = "pages/addnewsCheck";
$route['arthouseadmin/news'] = "pages/newsad";
/*End Component*/

/*Component*/
$route['arthouseadmin/editcareerCheck/(:any)'] = "pages/editcareerCheck/$1";
$route['arthouseadmin/addcareer'] = "pages/addcareer";
$route['arthouseadmin/addcareerCheck'] = "pages/addcareerCheck";
$route['arthouseadmin/career'] = "pages/careerad";
/*End Component*/

/*Component*/
$route['arthouseadmin/editsuppliesCheck/(:any)'] = "pages/editsuppliesCheck/$1";
$route['arthouseadmin/addsupplies'] = "pages/addsupplies";
$route['arthouseadmin/addsuppliesCheck'] = "pages/addsuppliesCheck";
$route['arthouseadmin/supplies'] = "pages/suppliesad";
/*End Component*/

/*Component*/
$route['arthouseadmin/editprojectsCheck/(:any)'] = "pages/editprojectsCheck/$1";
$route['arthouseadmin/addprojects'] = "pages/addprojects";
$route['arthouseadmin/addprojectsCheck'] = "pages/addprojectsCheck";
$route['arthouseadmin/projects'] = "pages/projectsad";
/*End Component*/

/*Component*/
$route['arthouseadmin/editsliderCheck/(:any)'] = "pages/editsliderCheck/$1";
$route['arthouseadmin/addslider'] = "pages/addslider";
$route['arthouseadmin/addsliderCheck'] = "pages/addsliderCheck";
$route['arthouseadmin/slider'] = "pages/slider";
/*End Component*/

/*Component*/
$route['arthouseadmin/editcategoryCheck/(:any)'] = "pages/editcategoryCheck/$1";
$route['arthouseadmin/addcategory'] = "pages/addcategory";
$route['arthouseadmin/addcategoryCheck'] = "pages/addcategoryCheck";
$route['arthouseadmin/category'] = "pages/category";
/*End Component*/

$route['apply/(:any)'] = "pages/apply/$1";
$route['applyCheck/(:any)'] = "pages/applyCheck/$1";

/*Component*/
$route['arthouseadmin/editchartCheck/(:any)'] = "pages/editchartCheck/$1";
$route['arthouseadmin/addchart'] = "pages/addchart";
$route['arthouseadmin/addchartCheck'] = "pages/addchartCheck";
$route['arthouseadmin/chart'] = "pages/chart";
/*End Component*/

$route['arthouseadmin/applications/(:any)'] = "pages/applications/$1";
$route['arthouseadmin/arthouseenq'] = "pages/arthouseenq";

/*Component*/
$route['arthouseadmin/editflinkCheck/(:any)'] = "pages/editflinkCheck/$1";
$route['arthouseadmin/addflink'] = "pages/addflink";
$route['arthouseadmin/addflinkCheck'] = "pages/addflinkCheck";
$route['arthouseadmin/flink'] = "pages/flink";
/*End Component*/

/*Component*/
$route['arthouseadmin/editpicCheck/(:any)'] = "pages/editpicCheck/$1";
$route['arthouseadmin/addpic'] = "pages/addpic";
$route['arthouseadmin/addpicCheck'] = "pages/addpicCheck";
$route['arthouseadmin/pic'] = "pages/pic";
/*End Component*/

/*Component*/
$route['arthouseadmin/editadminCheck/(:any)'] = "pages/editadminCheck/$1";
$route['arthouseadmin/addadmin'] = "pages/addadmin";
$route['arthouseadmin/addadminCheck'] = "pages/addadminCheck";
$route['arthouseadmin/admins'] = "pages/admins";
/*End Component*/

$route['logout'] = "pages/logout";
$route['sitemap\.xml'] = "pages/sitemap";
$route['arthouseadmin/upload\.php'] = "pages/upload";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

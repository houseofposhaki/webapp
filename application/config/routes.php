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
//$route['default_controller'] = 'Authentication/login';


 // frontend route start //
$route['default_controller'] = 'Home';
$route['post/(:any)'] = 'Pages/blogdetails/$1';
$route['news-topic/(:any)'] = 'Pages/tag/$1';
$route['more/(:any)'] = 'Pages/morenews/$1';
$route['all-topics'] = 'Pages/alltopics';
$route['more'] = 'Pages/more';
$route['cartlist'] = 'Cart/cartlist';
$route['thankyou/(:any)'] = 'Cart/thankyou/$1';
$route['paynow/(:any)/(:any)'] = 'Cart/paynow/$1/$1';
$route['p/details/(:any)/(:any)'] = 'Cart/details/$1/$2';



$route['ajaxpro'] = 'Home/ajaxPro';
$route['signup']='Home/signup';

$route['myaccount']='Home/myaccount';
$route['order-history']='Home/orderhistory';
$route['ordetails/(:any)']='Home/ordetails/$1';



$route['verifyotp']='Home/verifyotp';

$route['selleregister']='Home/selleregister';
//$route['sellerlogin']='Home/sellerlogin';

$route['securelogin']='Home/securelogin';
$route['securelogout']='Front/securelogout';


$route['categories/(:any)'] = 'Pages/categories/$1';
$route['services'] = 'Services/index';
$route['how-to-book'] = 'Pages/howtobook';
$route['support'] = 'Pages/support';
$route['contact-us'] = 'Pages/contact';
$route['subscribe'] = 'Pages/subscribe';
$route['site-map'] = 'Pages/sitemap';
$route['brands'] = 'Pages/brands';
$route['pages/(:any)'] = 'Pages/cmspg/$1';
$route['service/(:any)'] = 'Pages/servpg/$1';
//$route['news/(:any)'] = 'Pages/news/$1';
$route['news/(:any)/(:any)'] = 'Pages/singlenews/$1/$2';

$route['news/(:any)'] = 'Pages/catnews/$1';

$route['subscribenewsletter'] ='Pages/subscribenewsletter';



 //front end route end //

 // admin route start //
$route['admin'] = 'admin/Authentication/login';
$route['sellerlogin'] = 'admin/Authentication/login';

$route['admin/dashboard'] = 'admin/Authentication/dashboard';
//$route['admin/orderdetails/(:any)/(:any)'] = 'admin/Managepage/orderdetails/$1/$2';
$route['admin/orderdetails/(:any)'] = 'admin/Managepage/orderdetails/$1';

$route['admin/loginauth'] = 'admin/Authentication/loginchk';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'admin/Authentication/dashboard';
$route['logout'] = 'admin/Authentication/logout';

// admin multi service page//


$route['admin/createpage'] = 'admin/Managepage/createpage';
$route['admin/pagelist'] = 'admin/Managepage/pagelist';
$route['admin/productqrylist'] = 'admin/Managepage/productqrylist';
$route['admin/reguserlist'] = 'admin/Managepage/reguserlist';



$route['admin/brandlist'] = 'admin/Adminnewcontroller/brandlist';
$route['admin/brandadd'] = 'admin/Adminnewcontroller/brandadd';

$route['admin/atributelist'] = 'admin/Adminnewcontroller/atributelist';
$route['admin/atributeadd'] = 'admin/Adminnewcontroller/atributeadd';


$route['admin/pgbanner'] = 'admin/Managepage/pgbannerlist';
$route['admin/pgbanneradd'] = 'admin/Managepage/pgbanneradd';



$route['admin/blogs'] = 'admin/Managepage/bloglist';
$route['admin/blogadd'] = 'admin/Managepage/blogadd';



$route['admin/categories'] = 'admin/Managepage/categorieslist';
$route['admin/categoriesadd'] = 'admin/Managepage/categoriesadd';

$route['admin/assignorder/(:any)'] = 'admin/Managepage/assignorder/$1';





$route['admin/childcatlist'] = 'admin/Managepage/childcatlist';
$route['admin/childcatadd'] = 'admin/Managepage/childcatadd';







$route['admin/parentcatlist'] = 'admin/Managepage/parentcatlist';
$route['admin/parentcatadd'] = 'admin/Managepage/parentcatadd';



$route['admin/whywebest'] = 'admin/Managepage/whywebestlist';
$route['admin/whywebestlistadd'] = 'admin/Managepage/whywebestlistadd';



$route['admin/multiservices'] = 'admin/Managepage/multiserviceslist';
$route['admin/multiserviceadd'] = 'admin/Managepage/multiserviceadd';

$route['admin/couponlist'] = 'admin/Managepage/couponlist';
$route['admin/couponadd'] = 'admin/Managepage/couponadd';



$route['admin/reviewlist'] = 'admin/Managepage/reviewlist';
$route['admin/reviewadd'] = 'admin/Managepage/reviewadd';


$route['admin/partner'] = 'admin/Managepage/partnerlist';
$route['admin/partneradd'] = 'admin/Managepage/partneradd';
$route['admin/ourmissionadd'] = 'admin/Managepage/ourmissionadd';
$route['admin/ourmission'] = 'admin/Managepage/ourmissionlist';
$route['admin/bookprocess'] = 'admin/Managepage/bookprocesslist';
$route['admin/homecms'] = 'admin/Managepage/homecms';
$route['admin/googleads'] = 'admin/Managepage/googleads';


$route['admin/bkapointment'] = 'admin/Sectioncontent/bkapointment';
$route['admin/threeicons'] = 'admin/Sectioncontent/threeicons';
$route['admin/section2'] = 'admin/Sectioncontent/section2';




// admin cms  pages manage //

$route['admin/service'] = 'admin/Managepage/serviceadd';
$route['admin/howtobook'] = 'admin/Managepage/howtobookadd';
$route['admin/support'] = 'admin/Managepage/supportadd';
$route['admin/contact'] = 'admin/Managepage/contactadd';

// comments//

$route['admin/comments'] = 'admin/Managepage/comments';

// join newsletter //
$route['admin/doctors'] = 'admin/Newsletter/doctors';
$route['admin/subscriber'] = 'admin/Newsletter/subscriber';












// User role
$route['admin/employeelist'] = 'admin/User/employeelist';

$route['admin/useradd'] = 'admin/User/add';
$route['admin/userlist'] = 'admin/User/list';
$route['admin/customerlist'] = 'admin/User/customerlist';
$route['admin/submituser'] = 'admin/User/save';

// Userpermission
$route['admin/permissionadd'] = 'admin/User/permissionadd';
$route['admin/permissionlist'] = 'admin/User/permissionlist';
$route['admin/submitpermission'] = 'admin/User/submitpermission';

// role crud //
$route['admin/role'] = 'admin/Role/list';
$route['admin/roleadd'] = 'admin/Role/save';

$route['admin/resetpassword'] = 'admin/Authentication/resetpass';
//admin route end //


$route['about-us'] = 'Pages/aboutus';
$route['terms-conditions'] = 'Pages/terms';
$route['disclaimers'] = 'Pages/disclaimers';
$route['help'] = 'Pages/help';
$route['privacy-policy'] = 'Pages/privacy';

$route['admin/orderlist'] = 'admin/Order/orderlist';
$route['admin/refundreqlist'] = 'admin/Order/refundreqlist';
$route['admin/uploadorderlist'] = 'admin/Order/uploadorderlist';
$route['admin/assignprderlist'] = 'admin/Order/assignprderlist';

$route['admin/ordersearch'] = 'admin/Order/ordersearch';
$route['admin/datewisesearch'] = 'admin/Order/datewisesearch';
$route['admin/frnchiseewisesearch'] = 'admin/Order/frnchiseewisesearch';


$route['admin/pincodelist'] = 'admin/Managepage/pincodelist';
$route['admin/pincodeadd'] = 'admin/Managepage/pincodeadd';


// Products functions //
$route['products/(:any)/(:any)'] = 'Product/productlist/$1/$2';
$route['c/(:any)/(:any)'] = 'Home/catproductlist/$1/$2';
$route['sc/(:any)/(:any)'] = 'Home/subcatproductlist/$1/$2';
$route['sc/(:any)'] = 'Home/subcatproductlist/$1';
$route['cc/(:any)/(:any)'] = 'Home/childcatproductlist/$1/$2';






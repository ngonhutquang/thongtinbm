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
$route['default_controller'] = 'Client';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




$route['(admin)/(student-manager)']='admin/Student_Manager';
$route['(admin)/(teacher-manager)']='admin/Teacher_Manager';
$route['(admin)/(dissertation-manager)']='admin/Dissertation_Manager';
$route['(admin)/(news)']='admin/News';


$route['(about)']='Client/about';
$route['(submit-resume)']='Client/submit_resume';
$route['(job-search)']='Client/job_search';
$route['(submit-vacancy)']='Client/submit_vacancy';
$route['(refer-a-friend)']='Client/refer_a_friend';
$route['(news)']='Client/news';
$route['(connect)']='Client/connect';
$route['(candidates)']='Client/candidates';
$route['(do-add-job)']='Client/do_add_job';
$route['(do-add-cv)']='Client/do_add_cv';
$route['(add-job-alert)']='Client/add_job_alert';
$route['(why-us)']='Client/why_us';
$route['(services)']='Client/services';
$route['(our-clients-think)']='Client/our_clients_think';
$route['(site-map)']='Client/site_map';
$route['(contact-us)']='Client/connect';
$route['(privacy-policy)']='Client/privacy_policy';
$route['(terms-of-use)']='Client/terms_of_use';
$route['(do-add-cv)']='Client/do_add_cv';
$route['(do-add-job)']='Client/do_add_job';
$route['(thank-you)']='Client/success_page';
$route['(view-all-job)']='Client/view_all_jobs';
$route['(create-job-alert)']='Client/create_job_alert';

$route['(gioithieu)']='Client/introduce';
$route['(gioi-thieu)']='Client/introduce';
$route['(introduce)']='Client/introduce';
$route['(trangchu)']='Client/index';
$route['(trang-chu)']='Client/index';

$route['(lv)']='Client/dissertation_lv';
$route['(tl)']='Client/dissertation_tl';
$route['(lv)/(:any)']='Client/dissertation_lv/$1';
$route['(tl)/(:any)']='Client/dissertation_tl/$1';
$route['(chi-tiet-de-tai)/(:any)/(:any)']='Client/dissertation_detail/$3';

$route['(home)']='Client/index';


$route['(news)/(:any)']='Client/news/$1';
$route['(news)/(:any)/(:any)']='Client/get_news_detail/$3';


$route['(jobs)/(:any)/(:any)']='Client/get_job_detail/$3';

$route['(advanced-search)']='Client/AdvancedSearch';

$route['(advanced-search)/(:any)']='Client/AdvancedSearch/$1'; 

$route['(view-all-job)/(:any)']='Client/view_all_jobs/$1';

$route['(admin)']='admin/job';




// http://118.69.62.13/nlsearch/admin

// $route['(:any)']='';

// $route['admin/(:any)']='admin/';






// $route['admin/(:any)/(:any)']='$1/$2';

// $route['admin/(:any)/(:any)/(:any)']='$1/$2/$3';


// $route['admin/(:any)/(:any)/(:any)']='$1/$3';


// $route['admin/(:any)']='$1';

//$route['admin/(:any)']='admin/$1';
/*
$route['admin/(:any)/(:any)']='$1/$2';
$route['admin/(:any)/(:any)']='$1/$2';



//$route['admin/(:any)']='admin/manager';
/*
$route['admin/([a-zA-Z]+)']= function ()
{
        return 'admin/manager';
};*/

/*
$route['admin/(:any)']= function ()
{
        return 'admin/manager';
};*/

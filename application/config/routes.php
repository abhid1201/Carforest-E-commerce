<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//System Routes
$route['default_controller'] = 'Pages/index';
$route['404_override'] = 'Pages/pagenotfound';
$route['translate_uri_dashes'] = FALSE;

//User Side Routes
$route['home'] = 'Pages/index';
$route['about-us'] = 'Pages/about';
$route['contact-us'] = 'Pages/contact';
$route['feedback'] = 'Pages/feedback';
$route['privacy-policy'] = 'Pages/privacy_policy';
$route['terms-and-conditions'] = 'Pages/terms_conditions';
$route['frequently-asked-questions'] = 'Pages/faqs';
$route['view-package'] = 'Pages/pricing';
$route['forget-password'] = 'Pages/forget_password';
$route['login'] = 'Pages/login';
$route['register'] = 'Pages/register';
$route['car-list/?(:any)?/?(:any)?'] = 'pages/carlist/$1/$2';
$route['car-detail/?(:any)?'] = 'pages/cardetail/$1';

// Member Side Routes
$route['member-home'] = 'Member/member';
$route['member-profile'] = 'Member/profile';
$route['edit-member-profile/(:any)'] = 'Edit/memberprofile/$1';
$route['member-my-favourite-car'] = 'Member/myfavouritecar';
$route['member-my-car-review'] = 'Member/mycarreview';
$route['member-test-drive'] = 'Member/testdrive';
$route['member-setting'] = 'Member/setting';
$route['member-logout'] = 'Member/logout';

// Carmela-Panel Side Routes
$route['carmela-login'] = 'Carmela/login';
$route['carmela-forget-password'] = 'Carmela/forgetpassword';
$route['carmela-change-password'] = 'Carmela/change_password';
$route['carmela-registration-1'] = 'Carmela/registration_1';
$route['carmela-registration-2'] = 'Carmela/registration_2';
$route['carmela-registration-3'] = 'Carmela/registration_3';
$route['payment-success'] = 'Carmela/payment_success';
$route['payment-fail'] = 'Carmela/payment_fail';
$route['carmela-home'] = 'Carmela/dashboard';
$route['carmela-profile'] = 'Carmela/profile';
$route['edit-carmela-profile/(:any)'] = 'Edit/carmelaprofile/$1';
$route['carmela-logout'] = 'Carmela/logout';
$route['add-car'] = 'Carmela/addnewcar';
$route['carmela-view-all-cars'] = 'Carmela/viewallcars';
$route['car-reviews'] = 'Carmela/carreviews';
$route['carmela-visiting-card'] = 'Carmela/visitingcard';
$route['carmela-image'] = 'Carmela/carmelaimage';
$route['test-drive'] = 'Carmela/testdrive';
$route['my-subscription'] = 'Carmela/mysubscription';
$route['carmela-view-invoice/?(:any)?'] = 'Carmela/invoice/$1';

//Admin Side Routes
$route['admin-login/?(:any)?'] = 'Authorize/index/$1';
$route['admin-forgot-password'] = 'Authorize/forgot_password';
$route['admin-logout'] = 'Authorize/logout';
$route['delete/(:any)/(:any)'] = 'Authorize/delete/$1/$2';
$route['admin-home'] = 'Authorize/dashboard';
$route['manage-setting'] = 'Authorize/setting';
$route['manage-contact-us'] = 'Authorize/contactus';
$route['manage-feedback'] = 'Authorize/feedback';
$route['manage-subscriber'] = 'Authorize/subscriber';
$route['manage-banner'] = 'Authorize/banner';
$route['manage-member'] = 'Authorize/member';
$route['manage-state'] = 'Authorize/state';
$route['edit-state/(:any)'] = 'Edit/state/$1';
$route['manage-city'] = 'Authorize/city';
$route['edit-city/(:any)'] = 'Edit/city/$1';
$route['manage-area'] = 'Authorize/area';
$route['edit-area/(:any)'] = 'Edit/area/$1';
$route['manage-type'] = 'Authorize/type';
$route['edit-type/(:any)'] = 'Edit/type/$1';
$route['manage-company'] = 'Authorize/company';
$route['edit-company/(:any)'] = 'Edit/company/$1';
$route['manage-model'] = 'Authorize/model';
$route['edit-model/(:any)'] = 'Edit/model/$1';
$route['manage-sub-model'] = 'Authorize/submodel';
$route['edit-sub-model/(:any)'] = 'Edit/submodel/$1';
$route['manage-package'] = 'Authorize/package';
$route['edit-package/(:any)'] = 'Edit/package/$1';
$route['manage-carmela'] = 'Authorize/allcarmela';
$route['manage-cars'] = 'Authorize/allcars';
$route['manage-car-review'] = 'Authorize/carreview';
$route['pending-test-drive'] = 'Authorize/pendingtestdrive';
$route['accepted-test-drive'] = 'Authorize/acceptedtestdrive';
$route['rejected-test-drive'] = 'Authorize/rejectedtestdrive';
$route['completed-test-drive'] = 'Authorize/completedtestdrive';


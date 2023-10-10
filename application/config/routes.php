<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING @Gadrawingz
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
*/

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin']			 	 = 'Main/adminHome';
$route['admin/manage']		 = 'Main/adminRegister';


$route['login']		 		 = 'Main/dologin';
$route['main/login']		 = 'Main/dologin';
$route['main/account']		 = 'Main/adminAccount';
$route['main/logout']		 = 'Main/logout';

// $route['main/account']		 = 'Main/logout';

$route['client']			 = 'ClientController/clientHome';
$route['client/login']		 = 'ClientController/dologin';
$route['client/logout']		 = 'ClientController/logout';
$route['client/history']	 = 'ClientController/bookingHistory';
$route['client/account']	 = 'ClientController/clientAccount';
$route['client/parking/(:num)/book']	 = 'Parking/bookParkingClient';

$route['clients']			 				= 'ClientController/displayClients';
$route['clients/inactive']			 		= 'ClientController/displayClientsDisx';
$route['client/assign/(:num)']				= 'ClientController/clientFullData/$1';
$route['client/disable/(:num)']				= 'ClientController/disableClient/$1';
$route['client/enable/(:num)']				= 'ClientController/enableClient/$1';

$route['parkings']			 	 				= 'Parking/getAllParkings';
$route['slot/edit/(:num)']			 	 	= 'SlotController/updateSlot/$1';
$route['slot/delete/(:num)']			 	= 'SlotController/deleteSlot/$1';

$route['parking/arrange/(:num)']			= 'Parking/bookParking/$1';
$route['parking/check/(:num)']				= 'Parking/checkParking/$1';
$route['parking/requests']					= 'Parking/parkingRequests';
$route['parking/finish/']				= 'Parking/finishParkingDeed/$1';
// SOME APIs
$route['api_balance/update']	 			= 'Main/updateBalance';
$route['api_parking/finish/(:num)']	 		= 'Parking/finishParkingDeed/$1';
$route['payements']                   ='Parking/getAllPayements';
$route['admin/parkings/(:num)']                    ='Parking/getOneParkingDetails';
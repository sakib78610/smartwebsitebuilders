<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('about-us', 'Home::aboutUs');
$routes->get('our-team', 'Home::ourTeam');
$routes->match(['post', 'get'], 'services', 'Home::services');
$routes->match(['post', 'get'], 'mobile-application-development', 'Home::mobileApplicationDevelopment');
$routes->match(['post', 'get'], 'website-development', 'Home::websiteDevelopment');
$routes->match(['post', 'get'], 'website-designing', 'Home::websiteDesigning');
$routes->match(['post', 'get'], 'e-commerce', 'Home::eCommerce');
$routes->match(['post', 'get'], 'graphic-designing', 'Home::graphicDesigning');
$routes->match(['post', 'get'], 'uiux-design', 'Home::uiuxDesign');
$routes->match(['post', 'get'], 'video-editing', 'Home::videoEditing');
$routes->match(['post', 'get'], 'bulk-sms-service', 'Home::bulkSmsService');

$routes->match(['post', 'get'], 'bulk-sms-service-provider-in-mumbai', 'Home::bulkSmsServiceProviderInMumbai');
$routes->match(['post', 'get'], 'bulk-sms-service-provider-in-kolkata', 'Home::bulkSmsServiceProviderInKolkata');
$routes->match(['post', 'get'], 'bulk-sms-service-provider-in-bangalore', 'Home::bulkSmsServiceProviderInBangalore');
$routes->match(['post', 'get'], 'bulk-sms-service-provider-in-chennai', 'Home::bulkSmsServiceProviderInChennai');
$routes->match(['post', 'get'], 'bulk-sms-service-provider-in-delhi', 'Home::bulkSmsServiceProviderInDelhi');
$routes->match(['post', 'get'], 'digital-marketing', 'Home::digitalMarketing');
$routes->match(['post', 'get'], 'seo-services', 'Home::seoServices');
$routes->match(['post', 'get'], 'ppc-services', 'Home::ppcServices');
$routes->match(['post', 'get'], 'smo-services', 'Home::smoServices');
$routes->match(['post', 'get'], 'google-adwords', 'Home::googleAdwords');
$routes->match(['post', 'get'], 'facebook-advertisements', 'Home::facebookAdvertisements');
$routes->match(['post', 'get'], 'bulk-email-marketing', 'Home::bulkEmailMarketing');
$routes->match(['post', 'get'], 'lead-generation-services', 'Home::leadGenerationServices');
$routes->match(['post', 'get'], 'voice-call', 'Home::voiceCall');

$routes->match(['post', 'get'], 'contact-us', 'Home::contactUs');
$routes->get('paynow', 'Home::paynow');
$routes->get('privacy-policy', 'Home::privacyPolicy');
$routes->post('serveice-request', 'Home::serveiceRequest');
$routes->post('contact-query', 'Home::contactQuery');

$routes->post('process-init', 'Payment::index');
$routes->match(['post', 'get'], 'success', 'Payment::success');
$routes->match(['post', 'get'], 'cancel', 'Payment::cancel');
$routes->match(['post', 'get'], 'ipn', 'Payment::ipn');

$routes->match(['post', 'get'], 'ccavRequestHandler', 'Payment::ccavRequestHandler');
$routes->match(['post', 'get'], 'ccavResponseHandler', 'Payment::ccavResponseHandler');



$routes->match(['post', 'get'], 'promotion', 'Home::promotion');
$routes->get('thank-you', 'Home::thankYou');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
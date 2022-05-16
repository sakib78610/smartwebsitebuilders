<?php

namespace App\Controllers;

use App\Libraries\Emailhandler;

class Home extends AppBase{
    
    public function index(){
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in India - Gnecmedia',
            'meta_description' => 'Are you Looking for best bulk SMS service provider in India? GNECMedia is an industry-leading agency which offers reliable Bulk SMS Service, and other services for your exceptional business growth.'
        );
        $this->data['metaData'] = $metaData;

        $this->data['pageCss'] = null;
        $this->data['breadcrumb'] = null;
        $this->data['page'] = 'pages/home';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function aboutUs(){
        $metaData = array(
            'meta_title' => 'GNEC Media - Leading Bulk SMS and Web/App Development Company',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;

        $this->data['pageCss'] = null;
        $this->data['breadcrumb'] = null;
        $this->data['page'] = 'pages/about-us';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function ourTeam(){
        $metaData = array(
            'meta_title' => 'Our Team | Gnec Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['breadcrumb'] = null;
        $this->data['page'] = 'pages/our-team';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function services(){
        $metaData = array(
            'meta_title' => 'Our Services | Gnec Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['page'] = 'pages/services';
        $this->data['pageScript'] = 'scripts/services';
        return $this->layout();
    }

    public function mobileApplicationDevelopment(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Mobile Apps Development | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/mobile-application-development';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function websiteDevelopment(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Website Development | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/website-development';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function websiteDesigning(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Website Designing  | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/website-designing';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function eCommerce(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'E-Commerce Development | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/e-commerce';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function graphicDesigning(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Graphic Designing | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/e-commerce';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function uiuxDesign(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'UI/UX Designing | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/uiux-design';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function videoEditing(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Video Editing | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/video-editing';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function bulkSmsService(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in Noida - Gnecmedia',
            'meta_keywords' => '',
            'meta_description' => 'Best Bulk SMS Service Provider in Noida for all business types. We offer Bulk SMS Service in Noida at a reasonable price. Click to know more'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-sms-service';
        $this->data['location'] = 'includes/bulk-sms-location';
        $this->data['pageScript'] = 'scripts/bulk-sms-service';
        return $this->layout();
    }

    public function bulkSmsServiceProviderInMumbai(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in Mumbai - Gnecmedia',
            'meta_description' => 'Grab Best Bulk SMS Service in Mumbai for your any type of work. GNEc Media is a Best Bulk SMS Service Provider in Mumbai your any type of project and work. Know more'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-sms-service-provider-in-mumbai';
        $this->data['location'] = 'includes/bulk-sms-location';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function bulkSmsServiceProviderInKolkata(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in Kolkata - Gnecmedia',
            'meta_description' => 'Work with Best Bulk SMS Service Provider in Kolkata for your business growth online. Gnec media offer Bulk SMS Service in Kolkata at a cheap price.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-sms-service-provider-in-kolkata';
        $this->data['location'] = 'includes/bulk-sms-location';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function bulkSmsServiceProviderInBangalore(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in Bangalore - Gnecmedia',
            'meta_description' => 'Search Best Bulk SMS Service Provider in Bangalore for your work. We offer Bulk SMS Service in Bangalore at a best price. Click to know more.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-sms-service-provider-in-bangalore';
        $this->data['location'] = 'includes/bulk-sms-location';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function bulkSmsServiceProviderInChennai(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in Chennai - Gnecmedia',
            'meta_description' => 'Get Top Rated Bulk SMS Service in Chennai at a best price. GNEc Media is a Best Bulk SMS Service Provider in Chennai for your dream project'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-sms-service-provider-in-chennai';
        $this->data['location'] = 'includes/bulk-sms-location';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function bulkSmsServiceProviderInDelhi(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Best Bulk SMS Service Provider in Delhi - Gnecmedia',
            'meta_description' => 'Browse Best Bulk SMS Service Provider in Delhi for your business because GNEc Media offers Best Bulk SMS Service in Delhi at low cost. Limited period offers.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-sms-service-provider-in-delhi';
        $this->data['location'] = 'includes/bulk-sms-location';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function digitalMarketing(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Digital Marketing | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/digital-marketing';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function seoServices(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'SEO Services | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/seo-services';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function ppcServices(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'PPC Services | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/ppc-services';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function smoServices(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'SMO Services | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/smo-services';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function googleAdwords(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Google Adwords | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/google-adwords';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function facebookAdvertisements(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Facebook Advertisements | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/facebook-advertisements';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function bulkEmailMarketing(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Bulk Email Marketing | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/bulk-email-marketing';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function leadGenerationServices(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Lead Generation Bulk | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/lead-generation-services';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function voiceCall(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));

            Emailhandler::letsTaklEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Voice Call OBD/IVR | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['partner'] = 'includes/partner';
        $this->data['letstalk'] = 'includes/lets-talk';
        $this->data['page'] = 'pages/voice-call';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function contactUs(){
        if($this->request->getMethod() === 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
                'subject'    => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'message'    => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('verror', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            $ip = $_SERVER['REMOTE_ADDR'];
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with('danger', 'Please verify you are not a robot');
            }

            $data['name'] = trim($this->request->getPost('name'));
            $data['phone'] = trim($this->request->getPost('phone'));
            $data['email'] = strtolower(trim($this->request->getPost('email')));
            $data['subject'] = trim($this->request->getPost('subject'));
            $data['message'] = trim($this->request->getPost('message'));

            Emailhandler::contactEmail($data);

            return redirect()->back()->with('success', 'Thank you! We have received your query. We will get back to you soon.');
        }
        $metaData = array(
            'meta_title' => 'Contact Us | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        
        $this->data['pageCss'] = null;
        $this->data['page'] = 'pages/contact-us';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function paynow(){
        $metaData = array(
            'meta_title' => 'Pay Online using Credit Card / Paypal.',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        $this->data['pageCss'] = 'css/paynow';
        $this->data['page'] = 'pages/paynow';
        $this->data['pageScript'] = 'scripts/paynow';
        return $this->layout();
    }

    public function privacyPolicy(){
        $metaData = array(
            'meta_title' => 'Privacy Policy | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is the best digital marketing agency that offers Web Development services, Bulk SMS services, Web designing and SEO Services at a low cost.'
        );
        $this->data['metaData'] = $metaData;
        $this->data['pageCss'] = null;
        $this->data['page'] = 'pages/privacy-policy';
        $this->data['pageScript'] = null;
        return $this->layout();
    }

    public function serveiceRequest(){
        $rules = [
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'This is required'
                ]
            ],
            'phone' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'This is required'
                ]
            ],
            'email'    => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'This is required',
                    'valid_email' => 'Please enter a valid email address'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            echo 'empty';
            exit();
        }

        $captcha = $this->request->getPost('g-recaptcha-response');
        if(!$captcha){
            echo 'captcha';
            exit();
        }
        $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if(!$responseKeys["success"]) {
            echo 'captcha';
            exit();
        }

        $data['name'] = trim($this->request->getPost('name'));
        $data['phone'] = trim($this->request->getPost('phone'));
        $data['email'] = strtolower(trim($this->request->getPost('email')));
        $data['service'] = trim($this->request->getPost('service'));

        Emailhandler::serviceEmail($data);

        echo 'success';
    }

    public function contactQuery(){
        $rules = [
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'This is required'
                ]
            ],
            'phone' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'This is required'
                ]
            ],
            'email'    => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'This is required',
                    'valid_email' => 'Please enter a valid email address'
                ]
            ],
            'subject'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'This is required'
                ]
            ],
            'message'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'This is required'
                ]
            ],
            
        ];

        if (!$this->validate($rules)) {
            echo 'empty';
            exit();
        }

        $captcha = $this->request->getPost('g-recaptcha-response');
        if(!$captcha){
            echo 'captcha';
            exit();
        }
        $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if(!$responseKeys["success"]) {
            echo 'captcha';
            exit();
        }

        $data['name'] = trim($this->request->getPost('name'));
        $data['phone'] = trim($this->request->getPost('phone'));
        $data['email'] = strtolower(trim($this->request->getPost('email')));
        $data['subject'] = trim($this->request->getPost('subject'));
        $data['message'] = trim($this->request->getPost('message'));

        Emailhandler::contactEmail($data);
        echo 'success';
    }
    
    public function promotion(){
        if($this->request->getMethod() === 'post'){
            $pos = trim($this->request->getPost('pos'));
            $redirectUrl = site_url('/promotion');
            $validationPos = 'v';
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'phone' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'This is required'
                    ]
                ],
                'email'    => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'This is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ],
            ];
            if($pos == 'bottom'){
                $redirectUrl = site_url('/promotion#lets-discuss');
                $validationPos = 'b';
                $rules = [
                    'name1' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'This is required'
                        ]
                    ],
                    'phone1' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'This is required'
                        ]
                    ],
                    'email1'    => [
                        'rules'  => 'required|valid_email',
                        'errors' => [
                            'required' => 'This is required',
                            'valid_email' => 'Please enter a valid email address'
                        ]
                    ],
                ];
            }

            

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with($validationPos+'error', $this->validator);
            }

            $captcha = $this->request->getPost('g-recaptcha-response');
            if(!$captcha){
                return redirect()->back()->withInput()->with($validationPos+'danger', 'Please verify you are not a robot');
            }
            $secretKey = "6LcW3oEbAAAAACPVIE-z6Nx-6mZep3ZxQNJXPUSp";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            if(!$responseKeys["success"]) {
                return redirect()->back()->withInput()->with($validationPos+'danger', 'Please verify you are not a robot');
            }

            if($pos == 'bottom'){
                $data['name'] = trim($this->request->getPost('name1'));
                $data['phone'] = trim($this->request->getPost('phone1'));
                $data['email'] = strtolower(trim($this->request->getPost('email1')));
                Emailhandler::promotionEmail($data);
            }else{
                $data['name'] = trim($this->request->getPost('name'));
                $data['phone'] = trim($this->request->getPost('phone'));
                $data['email'] = strtolower(trim($this->request->getPost('email')));
                Emailhandler::promotionEmail($data);
            }
            return redirect()->to(site_url('/thank-you'));
        }
        $metaData = array(
            'meta_title' => 'Bulk SMS Service | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Bulk SMS Service Provider, Bulk SMS Services, Bulk SMS Provider, Bulk SMS India, Bulk SMS, Gnec Media',
            'meta_description' => 'Advanced bulk SMS solutions for all kinds of business needs - sales, promotion, etc. Transactional, promotional SMS, SMS API and more - at reasonable costs.'
        );
        $data['metaData'] = $metaData;
        return view('pages/promotion', $data);
    }

    public function thankYou(){
        $metaData = array(
            'meta_title' => 'Bulk SMS Service | Gnec Media',
            'meta_keywords' => 'Bulk SMS Service, Bulk SMS Service Provider, Bulk SMS Services, Bulk SMS Provider, Bulk SMS India, Bulk SMS, Gnec Media',
            'meta_description' => 'Advanced bulk SMS solutions for all kinds of business needs - sales, promotion, etc. Transactional, promotional SMS, SMS API and more - at reasonable costs.'
        );
        $data['metaData'] = $metaData;
        return view('pages/thank-you', $data);
    }
}
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;


class oAuth
{
    public mixed $clientObject = false;
    private string $clientID;
    private string $clientSecret;
    private string $redirectUri;
    private mixed $clientData = false;

    public function __construct()
    {
        $this->clientID     = '306948799158-9b3lu81umdqrnvegh2rtllfhb5oo8peb.apps.googleusercontent.com';
        $this->clientSecret = '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';
        $this->redirectUri  = 'https://senneadams.nl/home.php';

        if (empty(session_id())) {
            session_start();
        }

        if (!$this->clientObject){
            $this->googleClient();
        }
        if (!$this->clientData){
            $this->clientData = $this->authenticateCode();
        }
    }

// create Client Request to access Google API
    private function googleClient()
    {
            $this->clientObject = new Google_Client();
            $this->clientObject->setClientId($this->clientID);
            $this->clientObject->setClientSecret($this->clientSecret);
            $this->clientObject->setRedirectUri($this->redirectUri);
            $this->clientObject->addScope("email");
            $this->clientObject->addScope("profile");

            $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
            $this->clientObject->setHttpClient($guzzleClient);

            return true;
    }


// authenticate code from Google OAuth Flow
    private function authenticateCode()
    {
        if (isset($_GET['code'])) {
            $token = $this->clientObject->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->clientObject->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth        = new Google_Service_Oauth2($this->clientObject);
            $google_account_info = $google_oauth->userinfo->get();
            $email               = $google_account_info->email;
            $name                = $google_account_info->name;
            // now you can use this profile info to create account in your website and make user logged in.
            $_SESSION['access_token'] = $token['access_token'];
            return $google_account_info;
        } else {
            header('location:' . $this->clientObject->createAuthUrl());
        }
    }

    public function checkSessionCode(){
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->clientObject->setAccessToken($_SESSION['access_token']);
            return true;
        } else {
            header('Location: ' . filter_var('header:index.php', FILTER_SANITIZE_URL));
        }
    }
}
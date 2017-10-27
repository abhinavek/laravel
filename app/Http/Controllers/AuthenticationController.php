<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Analytics;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $KEY_FILE_LOCATION = 'service-account-credentials.json';
    }

    public function auth()
    {
        session_start();
        $client = new Google_Client();
        $client->setAuthConfig(public_path() . '/service-account-credentials.json');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/auth');
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

// Handle authorization flow from the server.
        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }
}
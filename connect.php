<?php
session_start();
require 'vendor/autoload.php';
require 'config.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$client = new Client(['timeout' => 2.0]);

$res = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
$discoveryJSON = json_decode((string) $res->getBody());
$tokenEndpoint = $discoveryJSON->token_endpoint;
$userInfoEndpoint = $discoveryJSON->userinfo_endpoint;

try {
    $accessTokenResponse = $client->request('POST', $tokenEndpoint, [
        'form_params' => [
            'code' => $_GET['code'],
            'client_id' => GOOGLE_ID,
            'client_secret' => GOOGLE_SECRET,
            'redirect_uri' => 'http://localhost:8000/connect.php',
            'grant_type' => 'authorization_code'
        ]
    ]);

    $accessToken = json_decode($accessTokenResponse->getBody())->access_token;
    $authorizationBearer = 'Bearer ' . $accessToken;

    $userResponse = $client->request('GET', $userInfoEndpoint, [
        'headers' => [
            'Authorization' => $authorizationBearer
        ]
    ]);

    $userInfos = json_decode($userResponse->getBody());

    if ($userInfos->email_verified === true) {
        $_SESSION['email'] = $userInfos->email;
        header('Location: /secret.php');
        exit();
    }
} catch (ClientException $exception) {
    dd($exception->getMessage());
}
?>

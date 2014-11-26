<?php
require 'vendor/autoload.php';

$redbooth = new \Redbooth\Service(
    'CLIENT_ID',      // update with your client id
    'CLIENT_SECRET',  // update with your client secret
    'ACCESS_TOKEN',   // update with your user's access token
    'REFRESH_TOKEN',  // update with your user's refresh token
    'REDIRECT_URL'    // update with your redirect URL
);

try {
    $res = $redbooth->getMe();
    echo 'My name is ' . $res->first_name . ' ' . $res->last_name . "\n";
} catch (\Redbooth\Exception\InvalidTokenException $e) {
    $res = $redbooth->refreshToken();
    echo 'New access token  : ' . $res->access_token . "\n";
    echo 'New refresh token : ' . $res->refresh_token . "\n";
}

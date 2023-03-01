<?php

$config = [
    'secret_key' => "19e5c2cc-76c5-4ec3-8c47-594ddc3c74fd",
    'app_key' => "93e9f1ea-e4eb-47fe-8022-f8b65ccdcb41",
    'mode' => 'sandbox', // live or sandbox
    'data' => [
        'Username' => 'us',
        'Password' => 'pw',
    ],


    'esc' => false, // if local server set to false.
    'parameter_url' => 'id', // parameter url. ex : domain.com?id=123
];



// if success
$res['success'] = function ($data) {
    var_dump($data);
    // header('Location: https://www.facebook.com/');
};

// if failed
$res['failed'] = function ($data) {
    header('Location: https://www.facebook.com/');
};

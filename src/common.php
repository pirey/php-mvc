<?php

// load system files
function autoloadSrc($class)
{
    $file = CORE . $class . ".php";
    if (is_file($file)) {
        require_once $file;
    }
}

// load model files
function autoloadModel($class)
{
    $file = APP . Config::$model_path . $class . ".php";
    if (is_file($file)) {
        require_once $file;
    }
}

// load controller files
function autoloadController($class)
{
    $file = APP . Config::$controller_path . $class . ".php";
    if (is_file($file)) {
        require_once $file;
    }
}

function assetLink($path)
{
    $path = Config::$base_url . Config::$asset_path . $path;
    return $path;
}


function redirect($url)
{
    header("Location:" . $url);
    exit();
}

// it's actually returns a new instance of a class that being loaded
function loadClass($className, $path)
{
    $file = $path . $className . ".php";
    if (file_exists($file)) {
        require_once $file;
        return new $className;
    } else {
        throw new ClassNotFoundException("fn loadClass() fail to load: Class $className not found.");
    }
}

function loadSystemClass($className)
{
    return loadClass($className, CORE);
}

function loadController($className)
{
    return loadClass($className, APP . Config::$controller_path);
}

function debug_print($something)
{
    $output = "<pre>";
    $output .= print_r($something);
    $output .= "</pre>";
    echo $output;
}

function form_error($msg)
{
    if (empty($msg)) {
        return "";
    }
    $msg = "<div class=\"alert alert-danger\">$msg</div>";
    return $msg;
}

function form_value($field)
{
    if (!empty($_POST[$field])) {
        return $_POST[$field];
    }
    return "";
}

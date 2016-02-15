<?php
defined("BASE") or exit("No direct script access allowed!");

// now this is our common functions, just in case.
require_once CORE . "common.php";

// our autoloader buddy
spl_autoload_register("autoloadSrc");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadModel");

// this is..well, exception files.
foreach (glob(CORE . "exceptions/*Exception.php") as $exceptionFile) {
    require_once $exceptionFile;
}

// this is our uri instance, to capture url path
$URI = loadSystemClass("Uri");

try {
    // load controller
    $Controller = loadController($URI->controller());

    // calling controller method, at last we got our view displayed
    if (method_exists($Controller, $URI->action())) {
        call_user_func_array(array($Controller, $URI->action()), $URI->params());
    } else {
        exit("Action not found.");
    }
} catch (ClassNotFoundException $e) {
    exit($e->getMessage());
} catch (Exception $e) {
    exit($e->getMEssage());
}

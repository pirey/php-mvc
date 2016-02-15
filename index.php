<?php
// define root directory
define("BASE", dirname(__FILE__) . "/");

// src directory
define("CORE", BASE . "src/");

// app directory
define("APP", BASE . "app/");

// app's environment, set it to either "dev" or "production"
define("ENV", "dev");

// setting for error_reporting based on ENVIRONMENT constant
if (defined("ENV")) {
	switch (strtolower(ENV)) {
		case "dev":
			error_reporting(E_ALL);
			ini_set("display_errors", 1);
			break;
		case "production":
			error_reporting(0);
			ini_set("display_errors", 0);
			break;
		default:
			exit("Application environment is not set properly.");
	}
}

// kick in!
require_once  CORE . "bootstrap.php";

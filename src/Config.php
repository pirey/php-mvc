<?php

class Config
{
	// database stuff here
	public static $db_host = "";
	public static $db_name = "";
	public static $db_user = "";
	public static $db_pass = "";

	// site's base url
	public static $base_url = "";

	// path to controllers, models, views, and layout directory, relative to APP
	public static $controller_path = "controllers/";
	public static $model_path = "models/";
	public static $view_path = "views/";

	/**
	 * declare default config here
	 * 
	 * @param  $configName
	 * @return $configValue
	 */
	public static function getDefault($configName)
	{
		$default["controller"] = "hi";
		$default["layout"] = "layout.php";
		return $default[$configName] ? $default[$configName] : null;
	}

	public function __construct() {}
	public function __clone() {}
}

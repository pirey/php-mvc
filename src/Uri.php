<?php

class Uri
{
	// holds the sliced url ( /controller/method/param1/param2/.. )
	private $_slices = array();

	// url's part that represents the controller
	private $_controller;

	// url's part that represents the controller's method to be called
	private $_action = "index";

	// holds the url's part that represents the method params
	private $_params = array();

	public function __construct()
	{
		$this->_setUri();
	}

	private function _setUri()
	{
		if (!empty($_GET["action"])) {
			$_GET["action"] = rtrim($_GET["action"], "/");	
			$this->_slices = explode("/", $_GET["action"]);
			$this->_controller = $this->_slices[0];
			if (count($this->_slices) > 1 && $this->_slices[1] != "") {
				$this->_action = $this->_slices[1];
			}
			if (count($this->_slices) > 2) {
				$this->_params = array_slice($this->_slices, 2);
			}
		} else {
			$this->_controller = Config::getDefault("controller");
		}
	}

	public function controller()
	{
		return $this->_controller;
	}

	public function action()
	{
		return $this->_action;
	}

	public function params()
	{
		return $this->_params;
	}
}
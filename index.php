<?php

class Controller {
	private $service;
	private $parameters;
	
	function __construct() {
		if (!isset($_SERVER['PATH_INFO'])  or   $_SERVER['PATH_INFO']=='/') {
			echo 'Missing parameters';
			exit;
		}
		$pathSegments = explode('/', $_SERVER['PATH_INFO']);
		array_shift($pathSegments);
		$resourceName = array_shift($pathSegments);
		
		$serviceName = ucfirst($resourceName).'Service';
		$serviceFilename = $serviceName.'.php';
		if (file_exists($serviceFilename)) {
			require_once ($serviceFilename);
			$this->service = new $serviceName;  // dynamic binding 
			$this->parameters = $pathSegments;
		} else {
			echo 'resource not found';
			exit;
		}		
	}
	
	function run() {
		$method = $_SERVER['REQUEST_METHOD'];
		$method = ucfirst(strtolower($method));
		$method = 'rest'.$method;
		$this->service->$method($this->parameters);		
	}	
}

$con = new Controller();
$con->run();


<?php

/**
 * Router
 *
 * It loads components according to parameters
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class Router {

    //data from controllers
    private $data;

    /**
     * Constructor
     * @access public
     */
    public function __construct() { 
		if (isset($_GET["page"])){
			switch ($_GET["page"]) {
				case "searching":
					$this->loadController("Searching");
					break;
				case "querylist":
                    $this->loadController("QueryList");
					break;
				case "admin":
                    $this->loadController("Admin");
					break;
				default:
                    header("HTTP/1.0 404 Not Found");
					$this->loadController("Searching");
			}
		} else {
		    //default page
			$this->loadController("Searching");
		}		  	  
    }

    /**
     * Loads controller by type and get data from controller
     * @access private
     * @param string $type Type/name of controller
     */
    private function loadController($type){
            require_once "src/controllers/".$type.".php";
            $controller = new $type(); 
            $controller->work();
            $this->data = $controller->data();   
    }

    /**
     * Returns data from controllers
     * @access public
     * @return array Data from controllers
     */
    public function getData(){
        return $this->data;   
    }
}

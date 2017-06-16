<?php
        
require_once 'src/logic/Settings.php';

/**
 * Controller
 *
 * Abstract class which loads settings from config file
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
abstract class Controller {
    
    protected $view;
    protected $message = null;

    //list of repositories
    protected $repos = null;

    //list of queries
    protected $queryList = null;

    //pagination
    protected $pagePrev = null;
    protected $pageNext = null;

    /**
     * Constructor
     *
     * Load settings from config file
     *
     * @access public
     */
    public function __construct() {
        Settings::loadConfiguration();         
    }
    
    public abstract function work();

    /**
     * It returns all data in array from controllers
     * @return array Data
     */
    public function data(){
        return ["message" => $this->message, 
				"view" => $this->view,
                "repos" => $this->repos,
                "queryList" => $this->queryList,
                "pagePrev" => $this->pagePrev,
                "pageNext" => $this->pageNext];
    }
}



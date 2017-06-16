<?php

require_once 'src/controllers/Controller.php';
require_once 'src/logic/SearchQuery.php';


/**
 * Admin
 *
 * Class that prepares admin view and solves removing records
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class Admin extends Controller {

    //SearchQuery class
    private $searchQuery;

    /**
     * Constructor
     * @access public
     */
    public function __construct() {
        parent::__construct();
        $this->searchQuery = new SearchQuery();
        $this->view = "admin.html";
    }

    /**
     * It removes records
     * @access public
     */
    public function work(){
        if(isset($_POST['hr']) && isset($_POST['pin'])){
            //hr must be positive integer
            if(is_numeric($_POST['hr']) && !empty($_POST['hr'])
                && $_POST['hr'] > 0 && $_POST['hr'] == round($_POST['hr'])){

                //if the pin is correct, delete records
                if($_POST['pin'] === Settings::$settings["PIN"]){
                    $this->searchQuery->deleteByHours($_POST['hr']);
                    $this->message = "Success: Older records are deleted if they exist";
                } else {
                    $this->message = "Error: Bad pin code";
                }

            } else {
                $this->message = "Error: Hours have to be positive integer";
            }
        }
    }
}

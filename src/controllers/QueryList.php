<?php

require_once 'src/controllers/Controller.php';
require_once 'src/logic/SearchQuery.php';



/**
 * QueryList
 *
 * Class that shows search queries
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class QueryList extends Controller {

    //SearchQuery class
    private $searchQuery;

    /**
     * Constructor
     * @access public
     */
    public function __construct() {
        parent::__construct();
        $this->searchQuery = new SearchQuery();
        $this->view = "querylist.html";
    }

    /**
     * It show records according to number of page
     * @access public
     */
    public function work(){

        if (isset($_GET['p']) && !empty($_GET['p'])){
            //page param must be positive integer
            if($_GET['p'] < 1 || !is_numeric($_GET['p']) || $_GET['p'] != round($_GET['p'])){
                header('Location: ?page=querylist&p=1');
                exit();
            } else {
                //get records according to page and prepare pagination
                $this->queryList = $this->searchQuery->getQueries($_GET['p']);
                $this->pagePrev = ($_GET['p'] > 1) ? $_GET['p']-1 : null;
                $this->pageNext = ($this->searchQuery->existNextQueries($_GET['p'])) ? $_GET['p']+1 : null;
            }
        } else {
            //if page param is not set, show first page
            $this->queryList =$this->searchQuery->getQueries(1);
            $this->pageNext = ($this->searchQuery->existNextQueries(1)) ? 2 : null;
        }
    }
}

<?php

require_once 'src/logic/DatabaseConnection.php';

/**
 * SearchQuery
 *
 * Class to work with query db records
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class SearchQuery {

    //pagination limit
    private $limit = 5;

    /**
     * Make connection to database via PDO driver
     * @access public
     */
    public function __construct() {
        DatabaseConnection::connectDibi();
    }

    /**
     * Insert query
     * @param $data Array of data
     * @access public
     * @return int $id ID of inserted record
     */
    public function insert($data){
        dibi::insert('query', $data)->execute();
        return $id = dibi::getInsertId();
    }

    /**
     * Is there another record?
     * @param $page Page
     * @return boolean True if another record exists
     * @access public
     */
    public function existNextQueries($page){
        $countOfQueries = dibi::query('SELECT COUNT(*) FROM query')->fetchSingle();
        if($countOfQueries > ($page-1)*$this->limit+$this->limit){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get queries by page
     * @param $page Page
     * @return array Array of data
     * @access public
     */
    public function getQueries($page){
        $offset = ($page-1)*$this->limit;
        $query = dibi::select("*")->from("query")->offset($offset)->limit($this->limit)->orderBy("created_at DESC");
        return $query->fetchAll();
    }

    /**
     * Delete queries older than x hours
     * @param $hours Hours
     * @access public
     */
    public function deleteByHours($hours){
        dibi::delete('query')->where('created_at < DATE_SUB(NOW(),INTERVAL %i HOUR)', $hours)->execute();
    }

}

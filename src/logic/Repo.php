<?php

require_once 'src/logic/DatabaseConnection.php';

/**
 * Repo
 *
 * Class to work with repo db records
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class Repo {

    /**
     * Make connection to database via PDO driver
     * @access public
     */
    public function __construct() {           
        DatabaseConnection::connectDibi();
    }

    /**
     * Get repositories by FK query ID
     * @param int $queryId FK query ID
     * @return array Array of records
     * @access public
     */
    public function getByQueryId($queryId){
        $query = dibi::select("*")->from("repo")->where("query_id = %i", $queryId)->orderBy("created_at DESC");
        return $query->fetchAll();
    }

    /**
     * Insert repository
     * @param $data Array of data
     * @access public
     */
    public function insert($data){
        dibi::insert('repo', $data)->execute();
    }
    
}

<?php

require_once 'lib/dibi/src/loader.php';
require_once 'src/logic/Settings.php';

/**
 * Database Connection
 *
 * Class that connects to database via dibi library
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class DatabaseConnection {

    /**
     * Make connection to database via PDO driver
     * @access public
     */
    public static function connectDibi(){
        Settings::loadConfiguration();
        dibi::connect([
            'driver' => 'pdo',
            'pdo' => new PDO("mysql:".
                "host=".Settings::$settings["DATABASE_HOST"].";".
                "dbname=".Settings::$settings["DATABASE_DATABASE"],
                Settings::$settings["DATABASE_USER"],
                Settings::$settings["DATABASE_PASSWORD"])
        ]);
    }
}


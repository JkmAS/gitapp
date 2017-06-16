<?php

/**
 * Settings
 *
 * Load settings from config file
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class Settings {
        
    private static $pathFile = "settings/settings.ini";
    public static $settings = [];

    /**
     * Load settings and parse it
     * @access public
     */
    public static function loadConfiguration() {           
        $iniFile = self::$pathFile;
        if(!file_exists($iniFile)){
            die("Error: Settings file does not exist");
        } else {
            self::$settings = parse_ini_file($iniFile);
            if(empty(self::$settings["DATABASE_HOST"]) || empty(self::$settings["DATABASE_DATABASE"])
              || empty(self::$settings["DATABASE_USER"]) || empty(self::$settings["DATABASE_PASSWORD"])){
                die("Error: Configuration file is damaged or incomplete");
            }
        }    
    }
}


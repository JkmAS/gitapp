<?php

/**
 * IP Service
 *
 * Class that gets user ip address
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class IPService {

    /**
     * Get IP address
     * @access public
     * @return string IP address or UNKNOWN
     *
     * Solution according to
     * @see https://stackoverflow.com/a/15699240
     */
    public function getIP(){
        $ip = "";
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = 'UNKNOWN';
        return $ip;
    }
}


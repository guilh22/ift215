<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cookie
 *
 * @author timat
 */
class Cookie {
    public static $instance = NULL;
    private $myCookie;
    public function __construct() {
        if(!isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this;
        if(isset($_COOKIE["ift215"])){
            $this->myCookie = $_COOKIE["ift215"];
        }else{
            $this->myCookie = array("isAdmin" => false, "isConnected" => false);
        }
        return $this;
    }
    
    public function setCookieAttr($key = "", $val = "", $arr = array()){
        if(count($arr) > 0){
            setcookie("ift215", $arr, time()+3600*24*30);
        }else if($key != "" && $val != "" && isset($this->myCookie[$key])){
            $this->myCookie[$key] = $val;
        }
    }
    public function setCookie($theCookie){
        setcookie("ift215", $theCookie, time()+3600*24*30);
    }
    
    public function getCookieVal($key = ""){
        if($key == ""){
            return $this->myCookie;
        }else if(isset($this->myCookie[$key])){
            return $this->myCookie[$key];
        }else{
            return false;
        }
    }
}

?>

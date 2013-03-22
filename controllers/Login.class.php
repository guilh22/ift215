<?php

/**
 * Gestion des cookies
 *
 * @author timat
 */
class Login {
    public static $instance = NULL;
    private $isAdmin = false;
    private $isConnected = false;
    private $cookie;
    public function __construct() {
        if(!isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this;        
        $this->isAdmin = $COOKIES->getCookieVal("isAdmin");
        $this->isConnected = $COOKIES->getCookieVal("isConnected");
        return $this;
    }
    public function connexion($user = "", $pass = ""){
         if($user == "admin" && $pass == "admin"){             
             $this->isAdmin = true;
             $this->isConnected = true;
             $COOKIES->setCookieVal("isAdmin",true);
             $COOKIES->setCookieVal("isConnected",true);
             return true;
         }else if($user == "joueur" && $pass == "joueur"){
             $this->isConnected = true;
             $COOKIES->setCookieVal("isAdmin",false);
             $COOKIES->setCookieVal("isConnected",true);
             return true;
         }else{
             return false;
         }
    }
    public function deconnexion(){
        $this->isAdmin = false;
        $this->isConnected = false;
        $COOKIES->setCookieVal("isAdmin",false);
        $COOKIES->setCookieVal("isConnected",false);
    }
    
    public function isAdmin(){
        return $this->isAdmin;
    }
    public function isConnected(){
        return $this->isConnected;
    }
}

?>

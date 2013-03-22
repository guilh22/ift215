<?php

/**
 * Gestion des cookies
 *
 * @author timat
 */
class User {
    public static $instance = NULL;
    private $user = "";
    private $isAdmin = false;
    private $isConnected = false;
    private $cookie;
    public function __construct() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this;        
        $this->cookie = new Cookie();
        $this->isAdmin = $this->cookie->getCookieVal("isAdmin");
        $this->isConnected = $this->cookie->getCookieVal("isConnected");
        if($this->isConnected){
            $this->user = $this->cookie->getCookieVal("user");
        }
        return $this;
    }
    public function getInstance() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this; 
        return self::$instance;
    }
    public function connexion($user = "", $pass = ""){
         if($user == "admin" && $pass == "admin"){             
             $this->user = "administrateur";
             $this->isAdmin = true;
             $this->isConnected = true;
             $this->cookie->setCookieAttr("isAdmin",true);
             $this->cookie->setCookieAttr("isConnected",true);
             return true;
         }else if($user == "joueur" && $pass == "joueur"){
             $this->user = "HollyFacePowned";
             $this->isConnected = true;
             $this->cookie->setCookieAttr("isAdmin",false);
             $this->cookie->setCookieAttr("isConnected",true);
             return true;
         }else{
             return false;
         }
    }
    public function deconnexion(){
        $this->isAdmin = false;
        $this->isConnected = false;
        $this->cookie->setCookieAttr("isAdmin",false);
        $this->cookie->setCookieAttr("isConnected",false);
    }
    
    public function isAdmin(){
        return $this->isAdmin;
    }
    public function isConnected(){
        return $this->isConnected;
    }
    public function getUsername(){
        return $this->user;
    }
    
    
}

?>

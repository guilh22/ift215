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
            $this->name = $this->cookie->getCookieVal("name");
            $this->nickname = $this->cookie->getCookieVal("lastName");
            $this->email = $this->cookie->getCookieVal("email");
            $this->clan = $this->cookie->getCookieVal("clan");
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
             $this->cookie->setCookieAttr("user","admin");
             $this->isAdmin = true;
             $this->isConnected = true;
             $this->cookie->setCookieAttr("isAdmin",true);
             $this->cookie->setCookieAttr("isConnected",true);
             $this->cookie->setCookieAttr("lastName","Labrie");
             $this->cookie->setCookieAttr("name","Kevin");
             $this->cookie->setCookieAttr("email","kevin.k.labrie@usherbrooke.ca");
             $this->cookie->setCookieAttr("clan","No use for a name");
             return true;
         }else if($user == "joueur" && $pass == "joueur"){
             $this->cookie->setCookieAttr("user","joueur");
             $this->isConnected = true;
             $this->cookie->setCookieAttr("isAdmin",false);
             $this->cookie->setCookieAttr("isConnected",true);
             $this->cookie->setCookieAttr("lastName","Abdulrazak");
             $this->cookie->setCookieAttr("name","Bessam");
             $this->cookie->setCookieAttr("email","Bessam.Abdulrazak@usherbrooke.ca");
             $this->cookie->setCookieAttr("clan","A horse jumping an edge");
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
    public function getName(){
        return $this->name;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getClan(){
        return $this->clan;
    }
    
    
}

?>

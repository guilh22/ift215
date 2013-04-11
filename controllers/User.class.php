<?php

/**
 * Gestion des cookies
 *
 * @author timat
 */
class User {
    public static $instance = NULL;
    private $name = "";
    private $lastname = "";
    private $username = "";
    private $photo = "";
    private $email = "";
    private $clan = "";
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
            $this->name = $this->cookie->getCookieVal("name");
            $this->lastname = $this->cookie->getCookieVal("lastname");
            $this->username = $this->cookie->getCookieVal("username");
            $this->photo = $this->cookie->getCookieVal("photo");
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
             $this->isAdmin = true;
             $this->isConnected = true;
             $this->cookie->setCookieAttr("isAdmin",true);
             $this->cookie->setCookieAttr("isConnected",true);
             $this->cookie->setCookieAttr("name","Kevin");
             $this->cookie->setCookieAttr("lastname","Labrie");
             $this->cookie->setCookieAttr("username","admin");
             $this->cookie->setCookieAttr("email","kevin.k.labrie@usherbrooke.ca");
             $this->cookie->setCookieAttr("photo","http://www.ift215.orbitwebsite.com/images/users/avatar.jpg");
             $this->cookie->setCookieAttr("clan","No use for a name");
             return true;
         }else if($user == "joueur" && $pass == "joueur"){
             $this->isConnected = true;
             $this->cookie->setCookieAttr("isAdmin",false);
             $this->isAdmin = false;
             $this->cookie->setCookieAttr("isConnected",true);
             $this->isConnected = true;
             $this->cookie->setCookieAttr("name","Bessam");
             $this->name = "Bessam";
             $this->cookie->setCookieAttr("lastname","Abdulrazak");
             $this->lastname = "Abdulrazak";
             $this->cookie->setCookieAttr("username","joueur");
             $this->username = "joueur";
             $this->cookie->setCookieAttr("photo","http://www.ift215.orbitwebsite.com/images/users/avatar2.jpg");
             $this->photo = "http://www.ift215.orbitwebsite.com/images/users/avatar2.jpg";
             $this->cookie->setCookieAttr("email","Bessam.Abdulrazak@usherbrooke.ca");
             $this->email = "Bessam.Abdulrazak@usherbrooke.ca";
             $this->cookie->setCookieAttr("clan","A horse jumping an edge");
             $this->clan = "A horse jumping an edge";
             $arr = array(
                    "battlefield3" => "Battlefield 3",
                    "starcraft2" => "Starcraft 2",
                    "guildwars2" => "Guildwars 2",
                    "diablo3" => "Diablo 3"
              );
             $this->cookie->setCookieAttr("userListeJeux",$arr);
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
        return $this->username;
    }
    public function getName(){
        return $this->name;
    }
    public function getLastName(){
        return $this->lastname;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getClan(){
        return $this->clan;
    }
    
    
}

?>

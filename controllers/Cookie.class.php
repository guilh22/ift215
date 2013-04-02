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
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this;
        if(isset($_COOKIE["ift215"])){ 
            self::$instance->myCookie = unserialize( str_replace("\\","",$_COOKIE["ift215"]));  
        }else{
            self::$instance->myCookie = array(
                "isAdmin" => false, 
                "isConnected" => false, 
                "forum" => array(
                    "Les LAN" => array(
                        "Le trop mega cool lan party" => array(
                            "Administrateur" => array(
                                "userPostID" => 1,
                                "comment" => "Voila le trop mega cool lan party est prévue pour le 25 Mai 2013, les inscriptions sont ouvertes!",
                                "nbReply" => 1,
                                "reply" => array(
                                    "AnonymeUser1" => array(
                                        "userPostID" => 2,
                                        "comment" => "J'ai fais un test d'inscription et sa ne semble pas fonctionner y a-t-il un problème avec le site?",
                                        "date" => "13-02-2013",
                                        "nbReply" => 1,
                                        "reply" => array("Administrateur" => "c'est vraiment étrange tous sa :( <br/>je te revien la dessus dès que possible.")
                                    )
                                )
                            ),
                            "nbPost" => 2,
                            "consultation" => 22,
                            "date" => "13-02-2013"
                        )
                    ),
                    "Jeux PC" => array(
                        "Counter strike" => array(
                            "AnonymeUser1" => array(
                                "userPostID" => 1,
                                "comment" => "Wow le nouveau counter strike est sortie sur Steam j ai trop hate d'y jouer",
                                "nbReply" => 0,
                                "reply" => array()
                            ),
                            "nbPost" => 1,
                            "consultation" => 1045,
                            "date" => "13-02-2013"
                        )
                    )
                )
            );
            $tmp = serialize(self::$instance->myCookie);
            setcookie("ift215", $tmp, time()+3600*24*30);
            
        }
                
        return self::$instance;
    }
    public function getInstance() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this; 
        return self::$instance;
    }
    public function setCookieAttr($key = "", $val = "", $arr = array()){
        if(count($arr) > 0){
            $tmp = serialize($arr);
            setcookie("ift215", $tmp, time()+3600*24*30);
        }else if($key != ""){
            $this->myCookie[$key] = $val;
            $this->setCookie($this->myCookie);
        }
    }
    public function setCookie($theCookie){
        $tmp = serialize($theCookie);
        setcookie("ift215", $tmp, time()+3600*24*30);
    }
    
    public function getCookieVal($key = ""){
        if($key == ""){
            return self::$instance->myCookie;
        }else if(isset(self::$instance->myCookie[$key])){
            return self::$instance->myCookie[$key];
        }else{
            return false;
        }
    }
}

?>

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
        $key = array();
        if(isset($_COOKIE["ift215"])){ 
            $key = unserialize( str_replace(array("\\"),array(""),$_COOKIE["ift215"]));  
            if(count($key) > 1){
                foreach($key as $k){
                    self::$instance->myCookie[$k] = unserialize( str_replace(array("\\"),array(""),$_COOKIE[$k]));
                }
            }
        }
        if(count($key) == 0){
            self::$instance->myCookie = array(
                "isAdmin" => false, 
                "isConnected" => false, 
                "forum" => array(
                    "Les LANs" => array(
                        "Le trop mega cool lan party" => array(
                            "auteur" => "Administrateur",
                            "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                            "content" => array(
                                "userPostID" => 1,
                                "comment" => "Voila le trop mega cool lan party est prévue pour le 25 Mai 2013, les inscriptions sont ouvertes!",
                                "nbReply" => 2,
                                "reply" => array(
                                    array(
                                        "auteur" => "DeadKiller",
                                        "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                                        "content" => array(
                                            "userPostID" => 2,
                                            "comment" => "Je n'arrive pas a m'inscrire au lan, est-ce normal?",
                                            "nbReply" => 0,
                                            "reply" => array(
                                                
                                            )//fin reply
                                        ), //fin content
                                        "consultation" => 22,
                                        "date" => "13-02-2013",
                                        "close" => "false"
                                    ),
                                    array(
                                        "auteur" => "Administrateur",
                                        "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                                        "content" => array(
                                            "userPostID" => 3,
                                            "comment" => "Je vais voir si je peux t'aider avec ton probleme.",
                                            "nbReply" => 0,
                                            "reply" => array(
                                                
                                            )//fin reply
                                        ), //fin content
                                        "consultation" => 22,
                                        "date" => "13-02-2013",
                                        "close" => "false"
                                    )
                                )//fin des reply
                            ), //fin content
                            "consultation" => 22,
                            "date" => "13-02-2013",
                            "close" => "false"
                        )//fin du lan
                    ),
                    "Jeux PC" => array(
                        "Counter strike" => array(
                            "auteur" => "HollyPownedInYourFace",
                            "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                            "content" => array(
                                "userPostID" => 1,
                                "comment" => "Wow le nouveau counter strike est sortie sur Steam j ai trop hate d'y jouer",
                                "nbReply" => 0,
                                "reply" => array(
                                    array(

                                    )//fin array in reply
                                )//fin reply
                            ), //fin content
                            "consultation" => 22,
                            "date" => "13-02-2013",
                            "close" => "false"
                        )
                    )
                ),
                "gestionLan" => array(
                    "Next-Gen" => array(
                      "date" => "22-11-2013",
                      "etat" => "Inactif",
                    ),
                    "OP Gamer'Z Style" => array(
                      "date" => "22-03-2013",
                      "etat" => "Actif",
                    ),
                    "8-Bit Madness" => array(
                      "date" => "09-11-2012",
                      "etat" => "Terminé",
                    ),
                    "Critical Strike" => array(
                      "date" => "01-04-2012",
                      "etat" => "Terminé",
                    ),
                    "Big Bang" => array(
                      "date" => "10-11-2011",
                      "etat" => "Annulé",
                    )
                ),
                "listeJeux" => array(
                    "League of legends",
                    "Battlefield 3",
                    "Dota 2",
                    "Starcraft 2",
                    "Guildwars 2",
                    "Age of Empire III",
                    "Diablo 3"
                )
            );
            self::$instance->setCookie(self::$instance->myCookie);
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
            self::$instance->myCookie[$key] = $val;
            self::$instance->setCookie(self::$instance->myCookie);
        }
    }
    public function setCookie($theCookie){
        $key = array();
        foreach($theCookie as $k => $c){
            $tmp = serialize($c);
            setcookie($k, $tmp, time()+3600*24*30);
            $key[] = $k;
        }
        $tmp = serialize($key);
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

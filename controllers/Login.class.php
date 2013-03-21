<?php

/**
 * Gestion des cookies
 *
 * @author timat
 */
class Login {
    $isAdmin = false;
    function login(){
        
    }
    function connexion($user,$pass){
         if($user == "admin" && $pass == "admin"){
             $isAdmin = true;
             $_COOKIE["login"] = true;
             return true;
         }else if($user == "joueur" && $pass == "joueur"){
             return true;
         }else{
             return false;
         }
    }
    function deconnexion(){
        
    }
    
    function isAdmin(){
        
    }
}

?>

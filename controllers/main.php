<?php
    include "ctnInclude.php";
    
    $COOKIES = new Cookie();
    $USER = new User($COOKIES);
    
    $page = $_REQUEST["page"];
    $action = $_REQUEST["action"];
    
    
    switch($action){
        case "login" :
            $USER->connexion($_REQUEST["user"],$_REQUEST["pass"]);
        break;
        case "logout" :
            $USER->deconnexion();
            $url = "";
            foreach($_GET as $key => $val){ if($key != "action"){$url .= $key."=".$val; }}
            header("location:".$url);
        break;
        
        case "post":
            $post = $COOKIES->getCookieVal("post");
            $post[] = array("user" => $USER->getUsername(), "comment" => $_REQUEST["comment"]);
            $COOKIES->setCookieAttr("post");
        break;    
        default:
        break;
    }
    
    if($USER->isConnected() && $USER->isAdmin()){
        include 'view/headerConAd.php';
    }else if($USER->isConnected()){
        include 'view/headerCon.php';
    }else{
        include "view/header.php";
    }
    
    $MENU = array();
    switch($page){
        case "forumGen" :
            $MENU["accueil"] = true;
            include 'view/accueil.php';
        break;
        case "forumGenSujet" :
            $MENU["accueil"] = true;
            include 'view/accueil.php';
        break;
        case "forumGenSujetPost" :
            $MENU["accueil"] = true;
            include 'view/accueil.php';
        break;
        default:
            $MENU["accueil"] = true;
            include 'view/accueil.php';
        break;
    }
    
    include 'view/footer.php';
    

?>

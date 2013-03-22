<?php
    include "ctnInclude.php";
    
    $COOKIES = new Cookie();
    $USER = new User();
    $FORUM = new Forum();
    
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
            //$FORUM->addComment($_REQUEST["forum"], $_REQUEST["subject"], $_REQUEST["userPostID"])
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
    $MENU["currentPage"] = $page;
    switch($page){
        case "forum" :
            $MENU["forum"] = true;
            if($_REQUEST["subject"] != null){
                include 'view/accueil.php';
            }else{
                include 'view/accueil.php';
            }            
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

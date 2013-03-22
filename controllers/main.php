<?php
    include "ctnInclude.php";
    
    $page = $_REQUEST["page"];
    $action = $_REQUEST["action"];
    
    switch($action){
        case "login" :
            $CON->connexion($_REQUEST["user"],$_REQUEST["pass"]);
        break;
        case "logout" :
            $CON->deconnexion();
            $url = "";
            foreach($_GET as $key => $val){ if($key != "action"){$url .= $key."=".$val; }}
            header("location:".$url);
        break;
        
        case "":
        break;    
        default:
        break;
    }
    
    if($CON->isConnected() && $CON->isAdmin()){
        include 'view/headerConAd.php';
    }else if($CON->isConnected()){
        include 'view/headerCon.php';
    }else{
        include "view/header.php";
    }
    
    
    include 'view/accueil.php';
    
    include 'view/footer.php';
    

?>

<?php
    include "ctnInclude.php";
    
    $COOKIES = new Cookie();
    $USER = new User();
        
    //$COOKIES->setCookie($d);
    
    $page = $_REQUEST["page"];
    $action = $_REQUEST["action"];
    
    
    switch($action){
        case "login" :
            $USER->connexion($_REQUEST["utilisateur"],$_REQUEST["motDePasse"]);
        break;
        case "confirmation" :
            if($_REQUEST["page"] == "inscription"){
                //envoie du forulaire
            }
        break;
        case "logout" :
            $USER->deconnexion();
            $url = "?";
            $counter = 1;
            foreach($_GET as $key => $val){ if($key != "action"){$url .= ($counter == 1? $key."=".$val : "&".$key."=".$val); }}
            header("location:".$url);
        break;
        
        case "post":
            //$FORUM->addComment($_REQUEST["forum"], $_REQUEST["subject"], $_REQUEST["userPostID"])
        break;    
        default:
        break;
    }
    
    $MENU = array();
    $MENU["currentPage"] = $page;
    if($USER->isConnected() && $page == "inscription"){
        header("location:?page=forum");
    }else if($USER->isConnected() == false && $page == "votreEspace"){
        header("location:?page=forum");
    }else if($USER->isConnected() && $USER->isAdmin()){
        include 'view/headerConAd.php';
    }else if($USER->isConnected()){
        include 'view/headerCon.php';
    }else{
        include "view/header.php";
    }
    
    
    switch($page){
        case "votreEspace" :
            $data = array(
                        "user" => $COOKIES->getCookieVal('user'),
                        "name" => $COOKIES->getCookieVal('name'),
                        "lastName" => $COOKIES->getCookieVal('lastName'),
                        "email" => $COOKIES->getCookieVal('email'),
                        "clan" => $COOKIES->getCookieVal('clan')
                    );
            include 'view/votreEspace.php';
        break;
        case "evenement" :
            $MENU["evenement"] = true;
            include 'view/evenement.php';
        break;
        case "faq" :
            $MENU["faq"] = true;
            include 'view/faq.php';
        break;
        case "coordonnee" :
            $MENU["coordonnee"] = true;
            include 'view/coordonnee.php';
        break;
        case "calendrier" :
            $MENU["calendrier"] = true;
            include 'view/calendrier.php';
        break;
        case "equipe" :
            $MENU["equipe"] = true;
            include 'view/equipe.php';
        break;
        case "equipement" :
            $MENU["equipement"] = true;
            include 'view/equipement.php';
        break;
        case "inscription" :
            $MENU["inscription"] = true;
            if($_REQUEST["action"] == "confirmation"){
                include 'view/confirmation.php';
            }else{
                include 'view/inscription.php';
            }
        break;
        case "inscriptionLan1" :
            $MENU["inscription"] = true;
            include 'view/inscriptionLan1.php';
        break;
        case "inscriptionLan2" :
            $MENU["inscription"] = true;
            include 'view/inscriptionLan2.php';
        break;
        case "inscriptionLan3" :
            $MENU["inscription"] = true;
            include 'view/inscriptionLan3.php';
        break;
        case "confirmationEvent" :
            $MENU["inscription"] = true;
            include 'view/confirmationEvenement.php';
        break;
        case "reglements" :
            $MENU["reglements"] = true;
            include 'view/reglements.php';
        break;
        case "historique" :
            $MENU["historique"] = true;
            include 'view/historique.php';
        break;
        case "forum" :
        default:
            $MENU["forum"] = true;
            $data = $COOKIES->getCookieVal("forum");
            if(isset($_REQUEST["sujet"]) && $_REQUEST["sujet"] != null){
                $sujet = str_replace("_"," ",$_REQUEST["sujet"]);                
                if(isset($_REQUEST["discussion"]) && $_REQUEST["discussion"] != null){
                    $discussion = str_replace("_"," ",$_REQUEST["discussion"]);
                    include 'view/forum_lvl2.php';
                }else{
                    include 'view/forum_lvl1.php';
                }
            }else{
                include 'view/accueil.php';
            }            
        break;
    }
    
    include 'view/footer.php';
    

?>

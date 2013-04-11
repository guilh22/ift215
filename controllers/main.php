<?php
    include "ctnInclude.php";
    $to_print = array();
    function debug($arr,$b=false,$s=false){
        global $to_print;
        if($b){$to_print["v"][] = $arr; }
        elseif($s){ $to_print["s"][] = $arr; }
        else{ $to_print["p"][] = $arr; }
    }
    
    $COOKIES = new Cookie();
    $USER = new User();
        
    //$COOKIES->setCookie($d);
    
    $page = $_REQUEST["page"];
    $action = $_REQUEST["action"];
    
    
    switch($action){
        case "login" :
            $USER->connexion($_REQUEST["utilisateur"],$_REQUEST["motDePasse"]);
            $url = "?";
            $counter = 1;
            foreach($_GET as $key => $val){ if($key != "action"){$url .= ($counter == 1? $key."=".$val : "&".$key."=".$val); ++$counter; }}
            header("location:".$url);
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
            foreach($_GET as $key => $val){ if($key != "action"){$url .= ($counter == 1? $key."=".$val : "&".$key."=".$val); ++$counter; }}
            header("location:".$url);
        break;
        
        case "post":
            if(isset($_REQUEST["reply"]) && $_REQUEST["reply"] != ""){
                $f = $COOKIES->getCookieVal("forum");
                $s = str_replace("_"," ",$_REQUEST["sujet"]);
                $d = str_replace("_"," ",$_REQUEST["discussion"]);
                $reply = array(
                    "auteur" => $USER->getUsername(),
                    "photo" => $USER->getPhoto(),
                    "content" => array(
                        "userPostID" => count( $f[$s][$d]["content"]["reply"] ) + 1,
                        "comment" => $_REQUEST["reply"],
                        "nbReply" => 0,
                        "reply" => array(

                        )//fin reply
                    ), //fin content
                    "consultation" => 0,
                    "date" => date("Y-m-d h:i"),
                    "close" => "false"
                );
                $f[$s][$d]["date"] = date("Y-m-d h:i");
                $f[$s][$d]["content"]["reply"][] = $reply;
                $f[$s][$d]["content"]["nbReply"]++;
                $f[$s][$d]["nbPost"]++;
                //debug($f);
                $COOKIES->setCookieAttr("forum",$f);
                $url = "?";
                $counter = 1;
                foreach($_GET as $key => $val){ if($key != "action"){$url .= ($counter == 1? $key."=".$val : "&".$key."=".$val); ++$counter;}}
                header("location:".$url);
            }
        break;    
        case "addDiscussion":
            if(isset($_REQUEST["addDiscussion"]) && $_REQUEST["addDiscussion"] != ""){
                $f = $COOKIES->getCookieVal("forum");
                $s = str_replace("_"," ",$_REQUEST["sujet"]);
                $d = str_replace("_"," ",$_REQUEST["addDiscussion"]);
                $f[$s][$d] = array(
                    "auteur" => $USER->getUsername(),
                    "photo" => $USER->getPhoto(),
                    "content" => array(
                        "userPostID" => 1,
                        "comment" => $_REQUEST["reply"],
                        "nbReply" => 0,
                        "reply" => array(
                            array(

                            )//fin array in reply
                        )//fin reply
                    ), //fin content
                    "consultation" => 0,
                    "nbPost" => 1,
                    "date" => date("Y-m-d h:i"),
                    "close" => "false"
                );
                //debug($f);
                $COOKIES->setCookieAttr("forum",$f);
                $url = "?";
                $counter = 1;
                foreach($_GET as $key => $val){ if($key != "action"){$url .= ($counter == 1? $key."=".$val : "&".$key."=".$val); ++$counter;}}
                header("location:".$url);
            }
        break;    
        default:
            if( isset($_REQUEST["page"]) && $_REQUEST["page"] == "forum" && isset($_REQUEST["sujet"]) && isset($_REQUEST["discussion"]) && $USER->isConnected()){
                $f = $COOKIES->getCookieVal("forum");
                $s = str_replace("_"," ",$_REQUEST["sujet"]);
                $d = str_replace("_"," ",$_REQUEST["discussion"]);
                $f[$s][$d]["consultation"]++;
                $f[$s][$d]["consultation"]++;
                $forumUpToDate = $COOKIES->getCookieVal("forumUpToDate");
                if(!is_array($forumUpToDate)){
                    $forumUpToDate = array();
                }
                $forumUpToDate[$s][$d] = date("Y-m-d h:i");
                $COOKIES->setCookieAttr("forum",$f);
                $COOKIES->setCookieAttr("forumUpToDate",$forumUpToDate);
            }
        break;
    }
    
    
    $MENU = array();
    $MENU["currentPage"] = $page;
    
    switch($page){
        case "votreEspace" :
            $MENU["votreEspace"] = true;
        break;
        case "evenement" :
            $MENU["evenement"] = true;
        break;
        case "faq" :
            $MENU["faq"] = true;
        break;
        case "coordonnee" :
            $MENU["informations"] = true;
            $MENU["coordonnee"] = true;
        break;
        case "calendrier" :
            $MENU["calendrier"] = true;
        break;
        case "equipe" :
            $MENU["informations"] = true;
            $MENU["equipe"] = true;
        break;
        case "equipement" :
            $MENU["informations"] = true;
            $MENU["equipement"] = true;
        break;
        case "inscription" :
        case "inscriptionLan1" :
        case "inscriptionLan2" :
        case "inscriptionLan3" :
        case "confirmationEvent" :
        case "paypalConfirm" :
            $MENU["inscription"] = true;
        break;
        case "reglements" :
            $MENU["informations"] = true;
            $MENU["reglements"] = true;
        break;
        case "historique" :
            $MENU["informations"] = true;
            $MENU["historique"] = true;
        break;
        case "forum" :
        default:
            $MENU["forum"] = true;           
        break;
    }
    
    if($USER->isConnected() && $page == "inscription"){
        header("location:?page=forum");
    }else if($USER->isConnected() == false && $page == "votreEspace"){
        header("location:?page=forum");
    }else if($USER->isConnected() && $USER->isAdmin()){        
        $data["username"] = $USER->getUsername();
        $data["name"] = $USER->getName();
        $data["lastname"] = $USER->getLastName();
        include 'view/headerConAd.php';
    }else if($USER->isConnected()){
        $data["username"] = $USER->getUsername();
        $data["name"] = $USER->getName();
        $data["lastname"] = $USER->getLastName();
        include 'view/headerCon.php';
    }else{
        include "view/header.php";
    }
    if(count($to_print) > 0){
        print "<pre>";
        if(count($to_print["v"])>0) foreach($to_print["v"] as $v)var_dump($v);
        if(count($to_print["p"])>0) foreach($to_print["p"] as $p)print_r($p);
        if(count($to_print["s"])>0) foreach($to_print["s"] as $s) print($s);
        print "</pre>";
    }
    
    
    switch($page){
        case "votreEspace" :
            $data = array(
                "user" => $COOKIES->getCookieVal('user'),
                "name" => $COOKIES->getCookieVal('name'),
                "lastName" => $COOKIES->getCookieVal('lastname'),
                "email" => $COOKIES->getCookieVal('email'),
                "clan" => $COOKIES->getCookieVal('clan'),
                "listeJeux" => $COOKIES->getCookieVal('listeJeux'),
                "userListeJeux" => $COOKIES->getCookieVal('userListeJeux'),
            );
            include 'view/votreEspace.php';
        break;
        case "evenement" :
            include 'view/evenement.php';
        break;
        case "faq" :
            include 'view/faq.php';
        break;
        case "coordonnee" :
            include 'view/coordonnee.php';
        break;
        case "calendrier" :
            include 'view/calendrier.php';
        break;
        case "equipe" :
            include 'view/equipe.php';
        break;
        case "equipement" :
            include 'view/equipement.php';
        break;
        case "inscription" :
            if($_REQUEST["action"] == "confirmation"){
                include 'view/confirmation.php';
            }else{
                $data = array(
                    "listeJeux" => $COOKIES->getCookieVal('listeJeux'),
                );
                include 'view/inscription.php';
            }
        break;
        case "inscriptionLan1" :
            include 'view/inscriptionLan1.php';
        break;
        case "inscriptionLan2" :
            include 'view/inscriptionLan2.php';
        break;
        case "inscriptionLan3" :
            include 'view/inscriptionLan3.php';
        break;
        case "confirmationEvent" :
            include 'view/confirmationEvenement.php';
        break;
        case "paypalConfirm" :
            include 'view/confirmationEvenementPaypal.php';
        break;
        case "reglements" :
            include 'view/reglements.php';
        break;
        case "historique" :
            include 'view/historique.php';
        break;
        case "forum" :
        default:
            $data = $COOKIES->getCookieVal("forum");
            if(isset($_REQUEST["sujet"]) && $_REQUEST["sujet"] != null){
                $sujet = str_replace("_"," ",$_REQUEST["sujet"]);  
                $data["forumUpToDate"] = $COOKIES->getCookieVal("forumUpToDate");
                if(isset($_REQUEST["discussion"]) && $_REQUEST["discussion"] != null){
                    $discussion = str_replace("_"," ",$_REQUEST["discussion"]);
                    include 'view/forum_lvl2.php';
                    if($USER->isConnected()){
                        include 'view/postingInForum.php';
                    }
                }else{
                    include 'view/forum_lvl1.php';
                    if($USER->isConnected()){
                        include 'view/makeSubject.php';
                    }
                }
            }else{
                include 'view/accueil.php';
            }            
        break;
    }
    
    include 'view/footer.php';
    

?>

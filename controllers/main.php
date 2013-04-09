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
                    "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
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
                $f[$s][$d]["content"]["reply"][] = $reply;
                //debug($forum);
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
                    "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
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
                    "date" => date("Y-m-d h:i"),
                    "close" => "false"
                );
                //debug($forum);
                $COOKIES->setCookieAttr("forum",$f);
                $url = "?";
                $counter = 1;
                foreach($_GET as $key => $val){ if($key != "action"){$url .= ($counter == 1? $key."=".$val : "&".$key."=".$val); ++$counter;}}
                header("location:".$url);
            }
        break;    
        default:
        break;
    }
    //$forum = $COOKIES->getCookieVal("forum");
    //debug($forum);
    
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
                "lastName" => $COOKIES->getCookieVal('lastName'),
                "email" => $COOKIES->getCookieVal('email'),
                "clan" => $COOKIES->getCookieVal('clan'),
                "listeJeux" => $COOKIES->getCookieVal('listeJeux'),
                "userListeJeux" => $COOKIES->getCookieVal('userListeJeux'),
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
                $data = array(
                    "listeJeux" => $COOKIES->getCookieVal('listeJeux'),
                );
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
        case "paypalConfirm" :
            $MENU["inscription"] = true;
            include 'view/confirmationEvenementPaypal.php';
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

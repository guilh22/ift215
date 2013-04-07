<?
$data = array(
    "Les LANs" => array(
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
                "auteur" => "AnonymeUser1",
                "content" => array(
                    "userPostID" => 1,
                    "comment" => "Wow le nouveau counter strike est sortie sur Steam j ai trop hate d'y jouer",
                    "nbReply" => 0,
                    "reply" => array()
                ),
                "nbPost" => 1,
                "consultation" => 1045,
                "date" => "13-02-2013",
                "close" => false
            )
        )
);
?>
<h1><a class="return" href="?page=forum"></a> Forum : Jeux PC</h1>
<div class="search accordeon">
    <form>
        <div><input type="text" value=""/><input type="submit" value="Rechercher"/>
            <a class="advanced">recherche avancer</a>            
        </div>
        <div class="contenue">
            <label for="searchdiscussion"><input id="searchdiscussion" name="searchdiscussion" type="checkbox" value="discussion"/>Discussion</label>
            <label for="searchcomment"><input id="searchcomment" name="searchcomment" type="checkbox" value="comment"/>Commentaire</label>
            <label for="searchconsultation"><input id="searchconsultation" name="searchconsultation" type="checkbox" value="consult"/>Consultation</label>
            <br/>
            <label for="searchauteur"><input id="searchauteur" name="searchauteur" type="checkbox" value="auteur"/>Auteur</label>
            <label for="searchreponse"><input id="searchreponse" name="searchreponse" type="checkbox" value="reponse"/>Reponse</label>
        </div>
    </form>
</div>
<table class="forum2" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <th colspan="2">Discussion</th>
        <th nowrap>Auteur</th>
        <th nowrap>Nombre de post</th>
        <th nowrap>Consultation</th>
        <th nowrap>Mise à jour</th>
    </tr>
    <?php 
        $c = 0;
        foreach($data[$sujet] as $k => $v){
    ?>
    <tr class="<?php echo ($c == 1)? "turn":""; $c = ($c == 1)? 0:1; ?>">
        <td class="status"><div class="<?php 
        if($v["close"]){ // si le sujet est clos
            echo "closed";        
        }elseif($data["user"][$sujet][$k] >= $v["date"]){ //si l'usager a lu tout les post du sujet
            echo "uptodate";
        }elseif($data["user"][$sujet][$k] < $v["date"]){ //si l'usager n'a pas lu tout les post du sujet
            echo "needRead";
        } ?>"></div>
        </td>
        <td class="subject"><a href="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>&discussion=<?php echo str_replace(" ","_",$k); ?>"><?php echo $k;?></a></td>
        <td><?php echo $v["auteur"];?></td>
        <td><?php echo $v["nbPost"];?></td>
        <td><?php echo $v["consultation"];?></td>
        <td><?php echo $v["date"];?></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="6" class="legend">
            <div class="uptodate">Aucune modification depuis dernière visite</div>
            <div class="needRead">Modification depuis dernière visite</div>
            <div class="closed">Aucune modification possible</div>
        </td>
    </tr>
</table>

<form id="loginForm" method="post" action="?page=<?php echo $MENU["currentPage"]; ?>&action=login">
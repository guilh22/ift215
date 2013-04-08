<h1><a class="return" href="?page=forum"></a> <a href="?page=forum">Forum</a> : <?php echo $sujet; ?></h1>
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
        if($v["close"] == "true"){ // si le sujet est clos
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
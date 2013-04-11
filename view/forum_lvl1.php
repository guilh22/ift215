<h1><a class="return" href="?page=forum"></a> <a href="?page=forum">Forum</a> : <?php echo $sujet; ?></h1>
<div class="search accordeon" style="padding:10px 5px;background:#232323;">
    <form id="search">
        <div>
            <input type="submit" value="Rechercher"/>
            <input style="width:700px;margin-right:10px;" type="text" value=""/>
            <a class="advanced" style="cursor:pointer;font-size:12px;text-decoration:underline;" onclick="if(jQuery('.advanced').text() == 'Recherche avancer'){jQuery('#search .contenue').show();jQuery('.advanced').text('Recherche simple');}else{jQuery('#search .contenue').hide();jQuery('.advanced').text('Recherche avancer');}">Recherche avancer</a>            
        </div>
        <div class="contenue" style="margin-top:10px;">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td><label for="searchdiscussion"><input id="searchdiscussion" name="searchdiscussion" type="checkbox" value="discussion" />Sujet de Discussion</label></td>
                    <td><label for="searchcomment"><input id="searchcomment" name="searchcomment" type="checkbox" value="comment" />Dans les Commentaires</label></td>
                    <td><label for="postPrincial"><input id="postPrincial" name="searchconsultation" type="checkbox" value="consult" />Post principal</label></td>
                    <td><label for="searchconsultation"><input id="searchconsultation" name="searchconsultation" type="checkbox" value="consult" />Nombre de Consultation</label></td>
                </tr>
                <tr>
                    <td><label for="searchauteur"><input id="searchauteur" name="searchauteur" type="checkbox" value="auteur" />Nom d'Auteur</label></td>
                    <td><label for="searcactualite"><input id="searcactualite" name="searcactualite" type="checkbox" value="auteur" />État d'actualité</label></td>
                    <td><label for="searchreponse"><input id="searchreponse" name="searchreponse" type="checkbox" value="reponse" />Date de mise á jour</label></td>
                    <td><div style="width:60px;background:#ccc;padding:2px 5px 2px 0;"><input id="searchAll" name="searchAll" type="checkbox" value="searchAll" onclick="if(jQuery('#searchAll').is(':checked')){jQuery('#search input[type=checkbox]').each(function(){jQuery(this).attr('checked',true);});}else{jQuery('#search input[type=checkbox]').each(function(){jQuery(this).removeAttr('checked');});}"/><label style="color:black;font-weight:bold;" for="searchAll">Tous</label></div></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<table class="forum2" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <th colspan="2">Discussion</th>
        <th nowrap>Auteur</th>
        <th nowrap>Nombre de post</th>
        <th nowrap>Consultation</th>
        <th nowrap style="width:150px;">Mise à jour</th>
    </tr>
    <?php 
        $c = 0;
        foreach($data[$sujet] as $k => $v){            
    ?>
    <tr class="<?php echo ($c == 1)? "turn":""; $c = ($c == 1)? 0:1; ?>">
        <td class="status"><div class="<?php 
        if($v["close"] == "true"){ // si le sujet est clos
            echo "closed";        
        }elseif($data["forumUpToDate"][$sujet][$k] >= $v["date"]){ //si l'usager a lu tout les post du sujet
            echo "uptodate";
        }elseif($data["forumUpToDate"][$sujet][$k] < $v["date"]){ //si l'usager n'a pas lu tout les post du sujet
            echo "needRead";
        } ?>"></div>
        </td>
        <td class="subject"><a href="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>&discussion=<?php echo str_replace(" ","_",$k); ?>"><?php echo $k;?></a></td>
        <td><?php echo $v["auteur"]; if(is_array($v["auteur"])){print_r($v["auteur"]);}?></td>
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

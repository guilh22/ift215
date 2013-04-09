<h1>Votre espace</h1>
<div class="formulaire">
    <form id="loginForm" method="post" action="?page=inscription&action=confirmation">
        <div class="nom">
        Information personnelle
        </div>
        <label id="nom">Nom * : </label>
        <input type="text" id="champNom" name="nom" size="30" value="<?php echo $data['lastName'];?>" disabled/>
        <label id="prenom">Prenom * : </label>
        <input type="text" id="champPrenom" name="prenom" size="30" value="<?php echo $data['name'];?>" disabled/></br>
        <label id="email">Email * : </label>
        <input type="email" id="champEmail" class="courriel" onkeyup="checkButton" name="email" size="30" value="<?php echo $data['email'];?>" required/></br>
        <div class="nom">
            Information public
        </div>
        <label id="surnom">Surnom : </label>
        <input type="text" id="champSurnom" name="surnom" value="<?php echo $data['user'];?>" size="30" disabled/></br>
        <label id="avatar">Avatar : </label>
        <input type="file" id="choisirAvatar" name="avatar"/></br>
        <div class="nom">
            Clan
        </div>
        <div id="inClan" style="display:<?php echo ($data['clan'] != '')?'block':'none'; ?>">
            <label class="choixNomClan" for="clan">Clan : </label>
            <input type="text" class="nomClan" value="<?php echo $data['clan'];?>" disabled/>
            <input type="button" class="quitterClan" value="Quitter le clan" onclick="if(confirm('Êtes vous certain de vouloir quittez votre clan?')){jQuery('.nomClan').val('');jQuery('.quitterClan').attr('disabled','disabled');jQuery('.nomClan').removeAttr('disabled');jQuery('#inClan').hide();jQuery('#createClan').show();checkBouton();}"/>
        </div>
        <div id="createClan" style="display:<?php echo ($data['clan'] == '')?'block':'none'; ?>;">
            <div class="comment" style="margin-bottom:10px;">*Vous auriez officiellement quitter votre clan une fois que vous aurez cliquer sur le bouton : "Soumettre les modifications".</div>
            <input type="radio" id="existant" value="Existant" name="existe" checked onclick="jQuery('.selectClan').removeAttr('disabled');jQuery('.nomClan').attr('disabled','disabled');jQuery('.nomClan').val('');"/>
            <label id="lblExistant">Existant</label>
            <input type="radio" id="creation" value="Creation" name="existe" onclick="jQuery('.nomClan').removeAttr('disabled');jQuery('.selectClan').attr('disabled','disabled');"/>
            <label id="lblCreation">Création</label></br>
            <label class="choixNomClan" for="clan">Clan</label>
            <select name="clan" class="selectClan">
                <option value="No use for a name"></option>
                <option value="No use for a name">No use for a name</option>
                <option value="A horse jumping an edge">A horse jumping an edge</option>
                <option value="Scatophile">Scatophile</option>
            </select>
        </div>
        
        <div class="nom">
            Liste de jeux
        </div>
        <div class="listeJeux" style="margin-bottom:10px;">
            <?php $c = 1;if(!empty($data["userListeJeux"])){foreach($data["userListeJeux"] as $jeux){ ?>
                <span class="<?php echo str_replace(' ','',$jeux); ?>"><?php echo ($c != 1)?', ':''; ++$c;?><span onclick="deleteThisGame('<?php echo str_replace(' ','',$jeux); ?>');">-</span><?php echo $jeux; ?></span>
            <?php }} ?>            
        </div>
        <div class="listofgameproposed">
            <label id="jeu" for="jeux">Jeux : </label>
            <select name="jeux" class="games">
                <?php if(!empty($data["listeJeux"])){ foreach($data["listeJeux"] as $key => $jeux){ if(!in_array($jeux,$data["userListeJeux"])){?>
                    <option value="<?php echo $key; ?>"><?php echo $jeux; ?></option>
                <?php }}} ?>
            </select>

            <span style="cursor:pointer;padding:0px 6px 1px;background:#4e4e4e;border:1px solid white;" onclick="addGame();jQuery('.games option:selected').remove();if(jQuery('.games option').length == 0){jQuery('.listofgameproposed').hide();}">+</span>
        </div>
        <input class="soumettreModification" id="soumettreInscription" type="submit" value="Soumettre les modifications" disabled>
    </form>
</div>

<script type="text/javascript">
    function checkBouton(){
        var enable = false;
        if('<?php echo $data['email'];?>' != jQuery('.courriel').val()){
            enable = true;
        }
        if(jQuery('#inClan').css('display') == 'none'){
            enable = true;
        }
        if(enable){
            jQuery('.soumettreModification').removeAttr('disabled');
        }else{
            jQuery('.soumettreModification').attr('disabled','disabled');
        }
    }
    checkBouton();
    function deleteThisGame(string){
        jQuery('.listofgameproposed').show();
        var arr = [<?php if(!empty($data["listeJeux"])){ foreach($data["listeJeux"] as $key => $jeux){ ?>
            '<?php echo str_replace(' ','',$jeux); ?>',
        <?php }} ?>];
        var arr2 = [<?php if(!empty($data["listeJeux"])){ foreach($data["listeJeux"] as $key => $jeux){ ?>
            '<option value="<?php echo str_replace(' ','',$key); ?>"><?php echo $jeux; ?></option>',
        <?php }} ?>];
            
        for(var i = 0; i < arr.length; ++i){
            if(arr[i] == string){
                jQuery('.games').append(arr2[i]);
            }
        }
        jQuery('.'+string).remove();
    }
    function addGame(){
        jQuery('.listeJeux').append('<span class="'+jQuery('.games option:selected').text().replace(' ','').replace(' ','').replace(' ','')+'">, <span onclick="deleteThisGame(\'' + jQuery('.games option:selected').text().replace(' ','').replace(' ','') + '\');">-</span>'+jQuery('.games option:selected').text()+'</span>');
    }
</script>
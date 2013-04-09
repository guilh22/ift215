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
        <input type="email" id="champEmail" class="courriel" onkeyup="if('<?php echo $data['email'];?>' != jQuery('.courriel').val()){jQuery('.soumettreModification').removeAttr('disabled');}else{jQuery('.soumettreModification').attr('disabled','disabled');}" name="email" size="30" value="<?php echo $data['email'];?>" required/></br>
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
        <label class="choixNomClan" for="clan">Clan : </label>
        <input type="text" class="nomClan" value="<?php echo $data['clan'];?>" disabled/>
        <input type="button" class="quitterClan" value="Quitter le clan" onclick="jQuery('.nomClan').val('');jQuery('.quitterClan').attr('disabled','disabled');jQuery('.nomClan').removeAttr('disabled');"/>
        <div class="nom">
            Liste de jeux
        </div>
        <label id="jeu" for="jeux">Jeux : </label>
        <select name="jeux">
            <option value="lol">League of legends</option>
            <option value="battlefield">Battlefield</option>
            <option value="dota2">Dota 2</option>
            <option value="diablo3">Diablo 3</option>
        </select>
        </br>
        <input class="soumettreModification" id="soumettreInscription" type="submit" value="Soumettre les modifications" disabled>
    </form>
</div>
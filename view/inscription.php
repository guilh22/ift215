<h1>Inscription</h1>
<div class="formulaire">
    <form id="loginForm" method="post" action="?page=inscription&action=confirmation">
        <div class="nom">
        Information personnelle
        </div>
        <label id="nom">Nom * : </label>
        <input type="text" id="champNom" name="nom" size="30" required/>
        <label id="prenom">Prenom * : </label>
        <input type="text" id="champPrenom" name="prenom" size="30" required/></br>
        <label id="email">Email * : </label>
        <input type="email" id="champEmail" name="prenom" size="30" placeholder="toto@toto.ca" required/></br>
        <div class="nom">
            Information public
        </div>
        <label id="surnom">Surnom * : </label>
        <input type="text" id="champSurnom" name="surnom" size="30" required/></br>
        <label id="avatar">Avatar : </label>
        <input type="file" id="choisirAvatar" name="avatar"/></br>
        <div class="nom">
            Clan
        </div>
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
        <label id="nomClan">Nom : </label>
        <input type="text" id="champNomClan" class="nomClan" name="nomClan" disabled/></br>
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
        <input id="soumettreInscription" type="submit" value="Soumettre l'inscription">
    </form>
</div>
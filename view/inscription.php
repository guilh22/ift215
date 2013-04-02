<h1>Inscription</h1>
<div>
    <form id="loginForm" method="post" action="?page=inscription&action=confirmation">
        <div class="nom">
        Information personnelle
        </div>
        <label>Nom *: </label>
        <input type="text" id="champNom" name="nom" size="30" required/>
        <label>Prenom *: </label>
        <input type="text" id="champPrenom" name="prenom" size="30" required/></br>
        <label>Email *: </label>
        <input type="text" id="champPrenom" name="prenom" size="30" placeholder="toto@toto.ca" required/></br>
        <div class="nom">
            Information public
        </div>
        <label>Surnom *: </label>
        <input type="text" id="champSurnom" name="surnom" size="30" required/></br>
        <label>Avatar: </label>
        <input type="file" id="avatar" name="avatar"/></br>
        <div class="nom">
            Clan
        </div>
        <input type="radio" id="existant" value="Existant" name="existe" checked/>
        <label>Existant</label>
        <input type="radio" id="existant" value="Creation" name="existe"/>
        <label>Création</label></br>
        <label for="clan">Clan</label>
        <select name="clan">
            <option value="No use for a name">No use for a name</option>
            <option value="A horse jumping an edge">A horse jumping an edge</option>
            <option value="Scatophile">Scatophile</option>
        </select>
        <label>Nom: </label>
        <input type="text" id="nomClan" name="nomClan" disabled/></br>
        <div class="nom">
            Liste de jeux
        </div>
        <label for="jeux">Clan</label>
        <select name="jeux">
            <option value="lol">League of legends</option>
            <option value="battlefield">Battlefield</option>
            <option value="dota2">Dota 2</option>
            <option value="diablo3">Diablo 3</option>
        </select>
        </br>
        <input type="button" value="Soumettre l'inscription">
    </form>
</div>
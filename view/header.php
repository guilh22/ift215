<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>IFT215</title>
        <link href="view/css/style.css" rel="stylesheet" type="text/css" />
        <link href="view/css/style2.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="wrapper"> <?php // end in footer.php ?>
            <header>
                <img id="logo" src="view/images/header/logo.jpg" alt="No Man’Z Lan Logo"/>
                <div id = "connexion" >
                    <form method="post" action="?page=<?php echo $MENU["currenPage"]; ?>&action=login" >
                        <label>Utilisateur: </label>: 
                        <input type="text" id="utilisateur" name="utilisateur" size="40"/></br>
                        <label>Mot de passe: </label>: 
                        <input type="text" id="motDePasse" name="motDePasse" size="40"/></br>
                        <img id="inscrire" src="images/header/inscrire.jpg"/>
                        <img id="Déconnexion" src="images/header/deconnexion.jpg"/>
                    </form>
                </div>
                <nav>
                    <ul>
                        <li class="<?php echo ($MENU["forum"] == true)? "selected":""; ?>"><a href="?page=forum"></a></li>
                        <li class="<?php echo ($MENU["evenement"] == true)? "selected":""; ?>"><a href="?page=evenement">Évènement</a></li>
                        <li class="<?php echo ($MENU["informations"] == true)? "selected":""; ?>"><a href="?page=informations">Informations</a>
                            <ul>
                                <li class="<?php echo ($MENU["coordonnee"] == true)? "selected":""; ?>"><a href="?page=coordonnee">Coordonnée</a></li>
                                <li class="<?php echo ($MENU["equipe"] == true)? "selected":""; ?>"><a href="?page=equipe">Équipe</a></li>
                                <li class="<?php echo ($MENU["equipement"] == true)? "selected":""; ?>"><a href="?page=equipement">Équipement</a></li>
                                <li class="<?php echo ($MENU["historique"] == true)? "selected":""; ?>"><a href="?page=historique">Historique</a></li>
                                <li class="<?php echo ($MENU["reglements"] == true)? "selected":""; ?>"><a href="?page=reglements">Règlements</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo ($MENU["calendrier"] == true)? "selected":""; ?>"><a href="?page=calendrier">Calendrier</a></li>
                        <li class="<?php echo ($MENU["faq"] == true)? "selected":""; ?>"><a href="?page=faq">FAQ</a></li>   
                        <li class="<?php echo ($MENU["votreEspace"] == true)? "selected":""; ?>"><a href="?page=votreEspace">Votre espace</a></li>
                    </ul>
                </nav>
           </header>
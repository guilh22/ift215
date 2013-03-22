<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>IFT215</title>
    </head>
    <body>
        <div class="wrapper"> <?php // end in footer.php ?>
            <header>
                <img id="logo" src="../images/header/logo.jpg" alt="No Man’Z Lan Logo"/>
                <div id = "connexion">
                    <label>Utilisateur: </label>: 
                    <input type="text" id="utilisateur" name="utilisateur" size="40"/></br>
                    <label>Mot de passe: </label>: 
                    <input type="text" id="motDePasse" name="motDePasse" size="40"/></br>
                    <img id="inscrire" src="../images/header/inscrire.jpg"/>
                    <img id="Déconnexion" src="../images/header/deconnexion.jpg"/>
                </div>
                <nav>
                    <ul>
                        <li class="<?php echo ($MENU["forum"] == true)? "selected":""; ?>"><a href="./view/forum.php">Forum</a></li>
                        <li class="<?php echo ($MENU["evenement"] == true)? "selected":""; ?>"><a href="./view/evenement.php">Évènement</a></li>
                        <li class="<?php echo ($MENU["informations"] == true)? "selected":""; ?>"><a href="./view/informations.php">Informations</a>
                            <ul>
                                <li class="<?php echo ($MENU["coordonnee"] == true)? "selected":""; ?>"><a href="./view/coordonnee.php">Coordonnée</a></li>
                                <li class="<?php echo ($MENU["equipe"] == true)? "selected":""; ?>"><a href="./view/equipe.php">Équipe</a></li>
                                <li class="<?php echo ($MENU["equipement"] == true)? "selected":""; ?>"><a href="./view/equipement.php">Équipement</a></li>
                                <li class="<?php echo ($MENU["historique"] == true)? "selected":""; ?>"><a href="./view/historique.php">Coordonnée</a></li>
                                <li class="<?php echo ($MENU["reglements"] == true)? "selected":""; ?>"><a href="./view/reglements.php">Règlements</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo ($MENU["calendrier"] == true)? "selected":""; ?>"><a href="./view/calendrier.php">Calendrier</a></li>
                        <li class="<?php echo ($MENU["faq"] == true)? "selected":""; ?>"><a href="./view/faq.php">FAQ</a></li>   
                        <li class="<?php echo ($MENU["votreEspace"] == true)? "selected":""; ?>"><a href="./view/votreEspace.php">Votre espace</a></li>
                    </ul>
                </nav>
           </header>
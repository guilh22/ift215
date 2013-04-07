<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>IFT215</title>
        <link href="view/css/style.css" rel="stylesheet" type="text/css" />
        <link href="view/css/style2.css" rel="stylesheet" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper"> <?php // end in footer.php ?>
            <header>
                <a href="?page=forum"><img id="logo" src="view/images/header/logo.png" alt="No Man’Z Lan Logo"/></a>
                <div id = "connexion" >
                    <form id="loginForm" method="post" action="?page=<?php echo $MENU['currentPage']; ?>&action=login">
                        <label>Utilisateur </label>: 
                        <input type="text" id="utilisateur" name="utilisateur" size="30" required/></br>
                        <label>Mot de passe </label>: 
                        <input type="password" id="motDePasse" name="motDePasse" size="30" required/></br>
                        <input type="button" value="S'inscrire" onclick="jQuery('#loginForm').attr('action','?page=inscription');jQuery('#loginForm').submit();">
                        <input type="submit" value="Connexion">
                    </form>
                </div>
                <nav>
                    <ul>
                        <li class="<?php echo ($MENU["forum"] == true)? "selected":""; ?>"><a href="?page=forum">Forum</a></li>
                        <li class="<?php echo ($MENU["evenement"] == true)? "selected":""; ?>"><a href="?page=evenement">Évènement</a></li>
                        <li class="<?php echo ($MENU["informations"] == true)? "selected":""; ?>"><a href="#" style="cursor:default;">Informations</a>
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
                    </ul>
                </nav>
                <div class="clear"></div>
           </header>
           <div class="content">
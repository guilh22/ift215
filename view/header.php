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
                    <form id="loginForm" method="post" action="?page=<?php echo $MENU['currentPage']; ?>&action=login<?php foreach($_GET as $key => $val){ if($key != "action" && $key != "page"){echo "&".$key."=".$val; }} ?>">
                        <label for="utilisateur">Surnom :</label> 
                        <input type="text" id="utilisateur" name="utilisateur" size="30" required/></br>
                        <label for="motDePasse">Mot de passe :</label>
                        <input type="password" id="motDePasse" name="motDePasse" size="30" required/></br>
                        <input style="margin-top:15px;margin-right:62px;" type="button" id="inscrire" value="S'inscrire" onclick="jQuery('#loginForm').attr('action','?page=inscription');jQuery('#loginForm').submit();">
                        <input style="margin-top:15px;" type="submit" value="Connexion">
                        <a style="cursor:pointer;text-decoration: underline;position:absolute;top:67px;right:20px;font-size:10px;" onclick="jQuery('.overlay').show();">Réinitialisation de mot de passe</a>
                    </form>
                </div>
                <div class="overlay" style="display:none;cursor:pointer;">
                    <div class="boxing" style="cursor:default;">
                        <h2>Réinitialisation de mot de passe</h2>
                        <form method="post" action="?page=resetPassword">
                            <div><label for="addrCourriel">Votre courriel : </label><input type="email" style="width:250px;" id="addrCourriel" name="addrCourriel" value="" required/></div>
                            <a style="cursor:pointer;position:absolute;top:-13px;right:-12px; border:1px solid white;background:#353535;padding:2px 5px;" onclick="jQuery('.overlay').hide();">X</a>
                            <input style="float:left;" type="button" onclick="jQuery('.overlay').hide();" value="Annuler">
                            <input style="float:right;margin-right:10px;" type="submit" value="Envoyer un nouveau mot de passe" />
                        </form>
                    </div>
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
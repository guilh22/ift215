<?
$data = array(
    "Les LANs" => array(
            "Le trop mega cool lan party" => array(
                "auteur" => "Administrateur",
                "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                "content" => array(
                    "userPostID" => 1,
                    "comment" => "Voila le trop mega cool lan party est prévue pour le 25 Mai 2013, les inscriptions sont ouvertes!",
                    "nbReply" => 1,
                    "reply" => array(
                        array(
                            "auteur" => "Joueur",
                            "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                            "content" => array(
                                "userPostID" => 2,
                                "comment" => "Je n'arrive pas a m'inscrire au lan, est-ce normal?",
                                "nbReply" => 1,
                                "reply" => array(
                                    array(
                                        "auteur" => "Administrateur",
                                        "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                                        "content" => array(
                                            "userPostID" => 3,
                                            "comment" => "Je vais voir si je peux t'aider avec ton probleme.",
                                            "nbReply" => 0,
                                            "reply" => array(
                                                array(

                                                )//fin array in reply
                                            )//fin reply
                                        ), //fin content
                                        "consultation" => 22,
                                        "date" => "13-02-2013",
                                        "close" => "false"
                                    )//fin array in reply
                                )//fin reply
                            ), //fin content
                            "consultation" => 22,
                            "date" => "13-02-2013",
                            "close" => "false"
                        )//fin array in reply
                    )//fin reply
                ), //fin content
                "consultation" => 22,
                "date" => "13-02-2013",
                "close" => "false"
            )//fin du lan
        ),
        "Jeux PC" => array(
            "Counter strike" => array(
                "auteur" => "AnonymeUser1",
                "photo" => "http://www.ift215.orbitwebsite.com/images/users/avatar.jpg",
                "content" => array(
                    "userPostID" => 1,
                    "comment" => "Wow le nouveau counter strike est sortie sur Steam j ai trop hate d'y jouer",
                    "nbReply" => 0,
                    "reply" => array(
                        array(
                            
                        )//fin array in reply
                    )//fin reply
                ), //fin content
                "consultation" => 22,
                "date" => "13-02-2013",
                "close" => "false"
            )
        )
);
?>
<h1><a class="return" href="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>"></a> <a href="?page=forum">Forum</a> : <a href="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>"><?php echo $sujet; ?></a> - <?php echo $discussion; ?></h1>

<table class="forum3" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <th>
            <div class="auteur"><?php echo $data[$sujet][$discussion]["auteur"]; ?></div>
            <img src="<?php echo $data[$sujet][$discussion]["photo"]; ?>" />
            <div class="date"><?php echo $data[$sujet][$discussion]["date"]; ?></div>
        </th>
        <th style="text-align:justify;">
            <div><?php echo $data[$sujet][$discussion]["content"]["comment"]; ?></div>
        </th>
    </tr>
    <?php 
        if($data[$sujet][$discussion]["content"]["nbReply"] > 0){
            makePost($data[$sujet][$discussion]["content"]["reply"]);
        } ?>
</table>
<?php 
    function makePost($post){
        /*print "<pre>";
        print_r($post);
        print "</pre>";*/
        foreach($post as $p){
            if($p["close"] == "false"){
                $toShow = "<tr>";
                $toShow .= '<td><div class="auteur">'.$p["auteur"].'</div><img src="'.$p["photo"].'"/><div class="date">'.$p["date"].'</div></td>';
                $toShow .= '<td style="text-align:justify;">';
                $toShow .= "<div>".$p['content']['comment']."</div>";
                $toShow .= "</td>";
                $toShow .= "</tr>";
                echo $toShow;
                if($p["content"]["nbReply"] > 0){
                    makePost($p["content"]["reply"]);
                }
            }
        }
    }
?>
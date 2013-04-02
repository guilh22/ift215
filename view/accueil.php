<?php 
$data = array(
    "Les LAN" => array(
        "Le trop mega cool lan party" => array(
            "Administrateur" => array(
                "userPostID" => 1,
                "comment" => "Voila le trop mega cool lan party est prévue pour le 25 Mai 2013, les inscriptions sont ouvertes!",
                "nbReply" => 1,
                "reply" => array(
                    "AnonymeUser1" => array(
                        "userPostID" => 2,
                        "comment" => "J'ai fais un test d'inscription et sa ne semble pas fonctionner y a-t-il un problème avec le site?",
                        "date" => "13-02-2013",
                        "nbReply" => 1,
                        "reply" => array("Administrateur" => "c'est vraiment étrange tous sa :( <br/>je te revien la dessus dès que possible.")
                    )
                )
            ),
            "nbPost" => 2,
            "consultation" => 22,
            "date" => "13-02-2013"
        )
    ),
    "Jeux PC" => array(
        "Counter strike" => array(
            "AnonymeUser1" => array(
                "userPostID" => 1,
                "comment" => "Wow le nouveau counter strike est sortie sur Steam j ai trop hate d'y jouer",
                "nbReply" => 0,
                "reply" => array()
            ),
            "nbPost" => 1,
            "consultation" => 1045,
            "date" => "13-02-2013"
        ),
        "Minecraft" => array(
            "AnonymeUser1" => array(
                "userPostID" => 1,
                "comment" => "Wow le nouveau counter strike est sortie sur Steam j ai trop hate d'y jouer",
                "nbReply" => 0,
                "reply" => array()
            ),
            "nbPost" => 1,
            "consultation" => 1045,
            "date" => "13-02-2013"
        )
    )
    );
?>

<h1>Forum</h1>
<table class="forum" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <th>Sujet</th>
        <th>Nombre de discussion</th>
    </tr>
    <?
        foreach($data as $k => $v){
        ?>
    <tr>
        <td><a href="?page=forum&sujet=<?php echo str_replace(" ","_",$k); ?>"><?php echo $k;?></a></td>
        <td><?php echo count($v);?></td>
    </tr>
    <?php } ?>
</table>

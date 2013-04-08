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
        } 
    ?>
</table>
<div id="posting">
    
</div>

<?php 
    function makePost($post){
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
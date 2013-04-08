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
    <input type="hidden" name="sujet" value=""/>
    <input type="hidden" name="discussion" value=""/>
    <div>
        <label for="idPost">Répondre a : </label>
        <select id="idPost" name="idPost">
            <?php getAllPostAuteur($data[$sujet][$discussion]); ?>
        </select>
    </div>
    <div>
        <textarea id="reply" name="reply" onkeyup="calc();"></textarea>
    </div>
    <div>
        <span class="legend">Il vous reste <span>300</span> caractère(s)</span>
    </div>
</div>
<script type="text/javascript">
    function calc(){
        var nb = 300 - jQuery("#reply").val().length;
        if(nb < 0){
            alert("Vous avez dépasser le nombre de caractères permis.");
        }
        jQuery(".legend span").text(nb);
    }
</script>

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
    
    function getAllPostAuteur($p,$lvl=1){
        if($p["close"] == "false"){
            echo '<option value="'.$p["content"]["userPostID"].'">'.($lvl == 1? "Auteur" : $p["auteur"]).'</option>';
            ++$lvl;
            foreach($p["content"]["reply"] as $po){
               getAllPostAuteur($po,$lvl);
            }
        }
    }
?>
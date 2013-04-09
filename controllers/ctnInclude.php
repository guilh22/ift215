<?php
    include "Cookie.class.php";
    include "User.class.php";
    include "Forum.class.php";
    
    
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

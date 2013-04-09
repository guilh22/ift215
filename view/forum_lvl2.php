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


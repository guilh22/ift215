<div id="posting">
    <form name="formulaire" method="post" action="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>&action=addSubject">
        <input type="hidden" name="sujet" value="<?php echo $sujet; ?>"/>
        <div class="relative" style="height:24px;">
            <?php
            /*<label for="idPost">Répondre à : </label>
            <select id="idPost" name="idPost">
                <?php getAllPostAuteur($data[$sujet][$discussion]); ?>
            </select>
             */
            ?>
        </div>
        <div>
            <input id="addSubject" name="addSubject" onkeyup="calc();"></textarea>
        </div>
        <div>
            <span class="legend">Il vous reste <span>35</span> caractère(s)</span>
        </div>
        <div class="clear"></div>        
    </form>
</div>
<script type="text/javascript">
    function calc(){
        var nb = 35 - jQuery("#reply").val().length;
        if(nb < 0){
            alert("Vous avez dépasser le nombre de caractères permis.");
            jQuery("#reply").val(jQuery("#reply").val().substring(35,''));
            nb = 35 - jQuery("#reply").val().length;
        }else if(nb == 35){
            if(jQuery(".submit").hasClass('marge')) jQuery(".submit").removeClass("marge");
        }else{
            if(!jQuery(".submit").hasClass('marge')) jQuery(".submit").addClass("marge");
        }
        if(nb <= 34 && nb >= 0){
            jQuery('.submit').removeAttr('disabled');
        }else{
            jQuery('.submit').attr('disabled','disabled');
        }
        jQuery(".legend span").text(nb);
    }
</script>

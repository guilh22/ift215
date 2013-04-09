<div id="posting">
    <form name="formulaire" method="post" action="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>&discussion=<?php echo str_replace(" ","_",$discussion);; ?>&action=post">
        <input type="hidden" name="sujet" value="<?php echo $sujet; ?>"/>
        <input type="hidden" name="discussion" value="<?php echo $discussion; ?>"/>
        <div class="relative" style="height:24px;">
            <span class="opening" onclick="jQuery('.showBal').toggleClass('open').toggleClass('close');jQuery('.opening').toggleClass('fermer');">?</span>
            <?php
            /*<label for="idPost">Répondre à : </label>
            <select id="idPost" name="idPost">
                <?php getAllPostAuteur($data[$sujet][$discussion]); ?>
            </select>
             */
            ?>
        </div>
        <div>
            <textarea id="reply" name="reply" onkeyup="calc();"></textarea>
        </div>
        <div>
            <span class="legend">Il vous reste <span>300</span> caractère(s)</span>
        </div>
        <div class="clear"></div>
        <div class="margTop">
            <input class="submit" type="submit" value="Soumettre" disabled onclick="if(jQuery('#reply').val().length < 1){alert('Vous devez écrire un message d\'au moins 1 caractère.');return false;}"/>
            <div id="preview" style="display:none;"></div>
        </div>
        <div class="clear"></div>
        <div class="showBal close">
            <div>
                <span class="closing" onclick="jQuery('.showBal').toggleClass('open').toggleClass('close');jQuery('.opening').toggleClass('fermer');">X</span>
                Voici les balises reconnuent par le système : 
                <ul style="list-style: none;">
                    <li>Le lien : &lt;a href="http://www.monlien.com"&gt;<a href="http:://www.monlien.com">mon text</a>&lt;/a&gt;</li>
                    <li>Les caractères gras : &lt;b&gt;<b>bold</b>&lt;/b&gt; ou &lt;strong&gt;<strong>bold 2e manière</strong>&lt/strong&gt;</li>
                    <li>L'italique : &lt;i&gt;<i>italique</i>&lt;/i&gt;</li>
                    <li>Paragraphe : <p>&lt;p&gt;par&lt;/p&gt;</p> (donne un espace vertical entre le text avant et après)</li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>        
    </form>
</div>
<script type="text/javascript">
    function calc(){
        var nb = 300 - jQuery("#reply").val().length;
        if(nb < 0){
            alert("Vous avez dépasser le nombre de caractères permis.");
            jQuery("#reply").val(jQuery("#reply").val().substring(300,''));
            nb = 300 - jQuery("#reply").val().length;
        }else if(nb == 300){
            jQuery("#preview").hide();
            if(jQuery(".submit").hasClass('marge')) jQuery(".submit").removeClass("marge");
        }else{
            jQuery("#preview").show();
            if(!jQuery(".submit").hasClass('marge')) jQuery(".submit").addClass("marge");
        }
        if(nb <= 299 && nb >= 0){
            jQuery('.submit').removeAttr('disabled');
        }else{
            jQuery('.submit').attr('disabled','disabled');
        }
        jQuery("#preview").html(jQuery("#reply").val());
        jQuery(".legend span").text(nb);
    }
</script>

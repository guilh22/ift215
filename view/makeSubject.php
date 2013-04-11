<div id="posting">
    <form name="formulaire2" method="post" action="?page=forum&sujet=<?php echo str_replace(" ","_",$sujet); ?>&action=addDiscussion">
        <input type="hidden" name="sujet" value="<?php echo $sujet; ?>"/>
        <div class="relative">
            <span class="opening" style="top:37px;" onclick="jQuery('.showBal').toggleClass('open').toggleClass('close');jQuery('.opening').toggleClass('fermer');">?</span>
            <label for="addDiscussion">Créer une nouvelle discussion : </label><input style="width:390px;" id="addDiscussion" name="addDiscussion" onkeyup="calc();"/>
        </div>
        <div>
            <span class="legend legend1" style="float:left;margin-left:495px;">Il vous reste <span>35</span> caractère(s)</span>
        </div>
        
        <div class="clear"></div> 
        <div>Texte de votre Post</div>
        <div>
            <textarea id="reply" name="reply" onkeyup="calc2();"></textarea>
        </div>
        <div>
            <span class="legend legend2">Il vous reste <span>300</span> caractère(s)</span>
        </div>
        <div class="clear"></div>
        <div class="margTop">
            <input class="submit" type="submit" value="Soumettre" disabled onclick="if(jQuery('#reply').val().length < 1){alert('Vous devez écrire un message d\'au moins 1 caractère.');return false;}"/>
            <div id="preview" style="display:none;"></div>
        </div>
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
        var nb = 35 - jQuery("#addDiscussion").val().length;
        if(nb < 0){
            alert("Vous avez dépasser le nombre de caractères permis.");
            jQuery("#addDiscussion").val(jQuery("#addDiscussion").val().substring(35,''));
            nb = 35 - jQuery("#addDiscussion").val().length;
        }
        rdyPost();
        jQuery(".legend1 span").text(nb);
    }
    function rdyPost(){
        var nb = 35 - jQuery("#addDiscussion").val().length;
        var nb2 = 300 - jQuery("#reply").val().length;
        var rdy = true;
        if(nb <= 34 && nb >= 0){
            jQuery('.submit').removeAttr('disabled');
        }else{
            rdy = false;
        }
        if(nb2 <= 299 && nb2 >= 0){
            jQuery('.submit').removeAttr('disabled');
        }else{
            rdy = false;
        }
        if(!rdy){
            jQuery('.submit').attr('disabled','disabled');
        }else{
            jQuery('.submit').removeAttr('disabled');
        }
    }
    function calc2(){
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
        rdyPost();
        jQuery("#preview").html(jQuery("#reply").val());
        jQuery(".legend2 span").text(nb);
    }
</script>


<h1>Évènement</h1>
<img id="affiche_evenement" src="view/images/evenement/affiche.jpg" alt="Affiche de l'évènement"/>
<p id="titre_evenement">
    No Man'Z Lan : <br />
    OP Gamer'Z <br />
    Style <br />
</p>
<div class="clear"></div>
<div class="accordeon1 accordeon" onclick="accordeon('accordeon1');">
    <div class="nom">
        Information
    </div>
    <div class="contenue">
        <p>
            <strong>De : </strong> 22-03-2013 <br />
            <strong>À :</strong> 24-03-2013 <br />
            <strong>Emplacement : </strong> Cafétéria du Cégep de Granby Haute-Yamaska <br />
            <strong>Coût : </strong> 25$ <br />
            <strong>Description : </strong> <br />
            <br />
            Bonjour, l'organisation du lan vous propose un évènement mémorable. L'évènement se tiendra le 22-23-24 mars 2013 à la cafétéria du Cégep de Granby Haute-Yamaska. 
            <br />
            Nouveauté de cette année, il y a une heure maximal pour s'inscrire au tournois. Voir l'heure entre parenthèse sur l'horaire.

        </p>

    </div>
</div>
<div class="accordeon2 accordeon" onclick="accordeon('accordeon2');">
    <div class="nom">
        Tournois
    </div>
    <div class="contenue"></div>
</div>
<div class="accordeon3 accordeon" onclick="accordeon('accordeon3');"> 
    <div class="nom">
        Horaire
    </div>
    <div class="contenue"></div>
</div>

<script type="text/javascript">
    var firstime = true;
    function accordeon(className){
        if(firstime){
            jQuery(".accordeon").each(function(){
                jQuery(".contenue",this).hide();                
            });
            firstime = false;
            jQuery("."+className + " .contenue").show();
            jQuery("."+className).toggleClass("expanded");
        }else{
            current = jQuery("."+className);
            jQuery(".accordeon").each(function(){
                if(current != jQuery(this)) {
                    if(jQuery(this).find(".contenue").is(":visible")) {
                        jQuery(this).find(".contenue").slideToggle("slow");
                        jQuery(this).toggleClass("expanded");
                    }
                }
            });
            current.find(".contenue").slideToggle();
            current.toggleClass("expanded");
        }
    }
    accordeon("accordeon1");
</script>
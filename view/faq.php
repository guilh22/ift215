<h1>FAQ</h1>
<div class="accordeon1 accordeon">
    <div class="nom">
        Information
        <img src="view/images/evenement/flecheExp.jpg" alt="flèche pointe vers le bas" onclick="accordeon('accordeon1');"/>
    </div>
    <div class="contenue">
        <p>
            <strong>De: </strong> 22-03-2013 <br />
            <strong>À:</strong> 24-03-2013 <br />
            <strong>Emplacement: </strong> Cafétéria du Cégep de Granby Haute-Yamaska <br />
            <strong>Coût: </strong> 25$ <br />
            <strong>Description: </strong> <br />
            <br />
            Bonjour, l'organisation du lan vous propose un évènement mémorable.L'évènement se tiendra le 22-23-24 mars 2013 à la cafétéria du Cégep de Granby Haute-Yamaska. 
            <br />
            Nouveauté de cette année, il y a une heure maximal pour s'inscrire au tournois. Voir l'heure entre parenthèse sur l'horaire.

        </p>
    </div>
</div>
<div class="accordeon2 accordeon">
    <div class="nom">
        Tournois
        <img src="view/images/evenement/fleche.jpg" alt="flèche pointe vers la gauche" onclick="accordeon('accordeon2');"/>
    </div>
    <div class="contenue">
        <p>
            <strong>De: </strong> 22-03-2013 <br />
            <strong>À:</strong> 24-03-2013 <br />
            <strong>Emplacement: </strong> Cafétéria du Cégep de Granby Haute-Yamaska <br />
            <strong>Coût: </strong> 25$ <br />
            <strong>Description: </strong> <br />
            <br />
            Bonjour, l'organisation du lan vous propose un évènement mémorable.L'évènement se tiendra le 22-23-24 mars 2013 à la cafétéria du Cégep de Granby Haute-Yamaska. 
            <br />
            Nouveauté de cette année, il y a une heure maximal pour s'inscrire au tournois. Voir l'heure entre parenthèse sur l'horaire.

        </p>
    </div>
</div>
<div class="accordeon3 accordeon">
    <div class="nom">
        Horaire
        <img src="view/images/evenement/fleche.jpg" alt="flèche pointe vers la gauche" onclick="accordeon('accordeon3');"/>
    </div>
    <div class="contenue">
        <p>
            <strong>De: </strong> 22-03-2013 <br />
            <strong>À:</strong> 24-03-2013 <br />
            <strong>Emplacement: </strong> Cafétéria du Cégep de Granby Haute-Yamaska <br />
            <strong>Coût: </strong> 25$ <br />
            <strong>Description: </strong> <br />
            <br />
            Bonjour, l'organisation du lan vous propose un évènement mémorable.L'évènement se tiendra le 22-23-24 mars 2013 à la cafétéria du Cégep de Granby Haute-Yamaska. 
            <br />
            Nouveauté de cette année, il y a une heure maximal pour s'inscrire au tournois. Voir l'heure entre parenthèse sur l'horaire.

        </p>
    </div>
</div>

<script type="text/javascript">
    var firstime = true;
    function accordeon(className){
        if(firstime){
            jQuery(".accordeon").each(function(){
                jQuery(".contenue",this).hide("fast");                
            });
            firstime = false;
            jQuery("."+className + " .contenue").slideToggle();
        }else{
            current = jQuery("."+className);
            jQuery(".accordeon").each(function(){
                if(current != jQuery(this)) {
                    if(jQuery(this).find(".contenue").is(":visible")) {
                        jQuery(this).find(".contenue").slideToggle("fast");
                    }
                }
            });
            current.find(".contenue").slideToggle();
        }
    }
    accordeon("accordeon1");
</script>
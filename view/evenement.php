
<h1>Évènement</h1>
<img id="affiche_evenement" src="view/images/evenement/affiche.png" alt="Affiche de l'évènement"/>
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
    <div class="contenue">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id neque magna, vel pharetra dui. Duis risus justo, semper et sodales non, malesuada eget magna. Nullam euismod lorem quis mi pulvinar vestibulum. Nunc placerat orci quam. Duis malesuada tristique purus, nec malesuada sem tincidunt vitae. Morbi varius diam ac sapien ornare ullamcorper. Nam suscipit sapien in purus ornare id lobortis eros vulputate. Pellentesque feugiat auctor feugiat. Morbi cursus velit lacus. In tristique quam ac ligula adipiscing hendrerit. Donec suscipit placerat sem, ac mollis tortor mollis vel. Nam sodales risus eu ante iaculis sit amet dapibus turpis dignissim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</div>
</div>
<div class="accordeon3 accordeon" onclick="accordeon('accordeon3');"> 
    <div class="nom">
        Horaire
    </div>
    <div class="contenue">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu lorem vel nisl vulputate lobortis. Sed in nisl lacus. Duis interdum rutrum diam, eu facilisis dui imperdiet vitae. Nullam vulputate mi eu nibh fringilla at elementum lectus cursus. Aenean ornare lacus tincidunt lorem tempus rhoncus. Quisque ac ligula nunc. Vestibulum ultricies, magna nec egestas ultricies, eros nibh tincidunt ante, ut vulputate leo nulla sit amet lacus. Donec ipsum tellus, sagittis vel mollis vel, cursus vel justo. Aliquam erat volutpat. Nam lobortis mollis dui, eget laoreet sem consequat ac.</div>
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
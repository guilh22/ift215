<h1>FAQ</h1>
<div class="accordeon1 accordeon" onclick="accordeon('accordeon1');">
    <div class="nom">
        Comment s'inscrire a un Tournoi?
    </div>
    <div class="contenue">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat, mauris vel hendrerit dignissim, tortor lacus porta risus, eget semper odio risus vel sapien. Ut est ante, tincidunt a ultrices in, semper et quam. In non fermentum velit. Donec quis sem sed enim sagittis sagittis. Maecenas vehicula leo volutpat felis sodales dignissim. Aliquam bibendum lorem id urna varius tincidunt. Quisque vitae lorem nisl. Phasellus facilisis risus adipiscing sapien luctus commodo. Nam non ultricies nulla. Aliquam ut augue magna, ac aliquam ipsum. In hac habitasse platea dictumst.
        </p>
    </div>
</div>
<div class="accordeon2 accordeon" onclick="accordeon('accordeon2');">
    <div class="nom">
        Quoi apporter lors d'un LAN?
    </div>
    <div class="contenue">
        <p>
            Curabitur sit amet leo lacus. Nullam vel justo nibh, tristique tempor nisl. Praesent pellentesque dignissim vulputate. Vestibulum vehicula sem non dolor posuere luctus. Duis a vehicula sapien. Fusce lorem lacus, accumsan ut fermentum nec, volutpat vestibulum tellus. Maecenas at nisi in quam adipiscing condimentum in sed eros. Quisque ornare placerat mauris, vel adipiscing velit hendrerit eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Sed magna diam, accumsan vitae interdum vel, vehicula non massa. Mauris varius, nisi eget dapibus condimentum, velit quam eleifend nunc, non mollis nulla tellus at nisi. Phasellus semper molestie ipsum id ultrices. Sed vitae lobortis lacus. Ut at urna dui. Vestibulum pharetra, sem a vestibulum mollis, justo quam bibendum risus, sit amet porta felis ligula ut diam.
        </p>
    </div>
</div>
<div class="accordeon3 accordeon" onclick="accordeon('accordeon3');">
    <div class="nom">
        Je n'arrive pas a me connecter que dois-je faire?
    </div>
    <div class="contenue">
        <p>
            Nulla in velit et libero posuere molestie at a nisl. Aliquam vel sapien non metus imperdiet commodo sit amet in eros. Suspendisse potenti. Mauris ut dui metus, vel tincidunt urna. Proin consectetur mi sit amet arcu molestie posuere. Integer ultricies auctor interdum. Cras id enim vel felis ullamcorper tincidunt. Duis pellentesque enim quis urna facilisis vel porttitor dui interdum. Suspendisse commodo lacus et odio convallis fermentum. Nam adipiscing porttitor fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
        </p>
    </div>
</div>
<div class="accordeon4 accordeon" onclick="accordeon('accordeon4');">
    <div class="nom">
        Où trouver la liste des jeux
    </div>
    <div class="contenue">
        <p>
            Curabitur ac venenatis dui. In vitae metus enim. Aliquam et lorem risus. In et risus odio. Morbi dignissim felis nec metus varius ac ultrices lorem tempor. Ut mattis felis at nisl semper at suscipit leo pulvinar. Nam et imperdiet nisl.
        </p>
    </div>
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
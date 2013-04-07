<h1>Inscription au Lan</h1>
<div class="nom step3">Étape 3</div>
<img src="view/images/inscriptionLan/planSalle.jpg"/></br>
<img src="view/images/inscriptionLan/planSalle.jpg"/>Libre
<img src="view/images/inscriptionLan/planSalle.jpg"/>Réserver
<img src="view/images/inscriptionLan/planSalle.jpg"/>Organisateur</br>
<form>
    Réserver la place #: <input type="text" class="place" size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="if(jQuery('.place').val() != ''){jQuery('.finish').removeAttr('disabled');if(jQuery('.place').val() > '20' || jQuery('.place').val() < '0'){jQuery('.finish').attr('disabled','disabled');alert('La valeur doit être plus grande que 0 ou plus petite que 20');}}else{jQuery('.finish').attr('disabled','disabled');}"/></br>
    <input type="submit" class="finish" value="Terminer" disabled/>
</form>

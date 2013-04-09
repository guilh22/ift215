<h1>Inscription au Lan</h1>
<div class="nom step3">Étape 3</div>
<div id="imageReservation">
    <form method="post" action="?page=paypalConfirm">
        <img id="place" src="view/images/inscriptionLan/place.png"/></br>
        <img id="libre" src="view/images/inscriptionLan/libre.png"/><label id="lblLibre">Libre</label>
        <img id="reserver" src="view/images/inscriptionLan/reserver.png"/><label id="lblReserver">Réserver</label>
        <img id="organisateur" src="view/images/inscriptionLan/organisateur.png"/><label id="lblOrganisateur">Organisateur</label></br>

        <label for="champReserver" id="lblChampReserver">Réserver la place # : </label><input type="text" id="champReserver" class="place" size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="if(jQuery('.place').val() != ''){jQuery('.finish').removeAttr('disabled');if(jQuery('.place').val() > 60 || jQuery('.place').val() < 0){jQuery('.finish').attr('disabled','disabled');alert('La valeur doit être plus grande que 0 ou plus petite ou égal à 60');}}else{jQuery('.finish').attr('disabled','disabled');}"/></br>
        <input type="submit" class="finish" value="Terminer" disabled/>
    </form>
</div>
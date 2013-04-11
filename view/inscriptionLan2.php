<h1>Inscription au Lan</h1>
<div class="nom step2" id="inscriptionLan2">
    Étape 2
</div>
<div id="prix">
    <strong>Prix: </strong> 25$</br>
    <form method="post" action="?page=inscriptionLan3&action=login" class="choix">
        <table style="width:100%;" border="1" cellpadding="5" cellspacing="0">
           <tr>
               <td><input type="radio" value="none" name="paiement" class="paiementComptant" id="paiementComptant" checked onclick="jQuery('.suivant').attr('value','Terminer')"/><label for="paiementComptant">Paiement sur place</label></td>
               <td><input type="radio" value="paypal" name="paiement" class="paypal" id="paypal" onclick="jQuery('.suivant').attr('value','Continuer')"/><label for="paypal">Paiement PayPal</label></td>
           </tr>
           <tr>
               <td>
                   <ul>
                       <li>Paiement Paypal possible plus tard</li>
                   </ul>
               </td>
               <td>
                   <ul>
                       <li>5$ de rabais</li>
                       <li>Possibilité de réservation de place</li>
                   </ul>
               </td>
           </tr>
       </table>
        <input style="margin-top:15px;" type="submit" value="Terminer" class="suivant" onclick="if(jQuery('.paiementComptant').is(':checked')){jQuery('.choix').attr('action','?page=confirmationEvent')}else{jQuery('.choix').attr('action','?page=inscriptionLan3')}"/>
    </form>
</div>
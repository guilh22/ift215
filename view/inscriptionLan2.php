<h1>Inscription au Lan</h1>
<div class="nom step2" id="inscriptionLan2">
    Étape 2
</div>
<div id="prix">
    <strong>Prix: </strong> 25$</br>
    <form method="post" action="?page=inscriptionLan3&action=login" class="choix">
        <table border="1" cellpadding="0" cellspacing="0">
           <tr>
               <td><input type="radio" value="none" name="paiement" class="paiementComptant" checked onclick="jQuery('.suivant').attr('value','Terminer')"/><label>Paiement sur place</label></td>
               <td><input type="radio" value="paypal" name="paiement" class="paypal" onclick="jQuery('.suivant').attr('value','Continuer')"/><label>Paiement PayPal</label></td>
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
        <input type="submit" value="Terminer" class="suivant" onclick="if(jQuery('.paiementComptant').is(':checked')){jQuery('.choix').attr('action','?page=confirmationEvent')}else{jQuery('.choix').attr('action','?page=inscriptionLan3')}"/>
    </form>
</div>
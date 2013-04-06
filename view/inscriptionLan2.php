<h1>Inscription au Lan</h1>
<div class="nom" id="inscriptionLan2">
    Étape 2
</div>
<div id="prix">
    <strong>Prix: </strong> 25$</br>
    <form method="post" action="?page=inscriptionLan3&action=login">
        <table border="1" cellpadding="0" cellspacing="0">
           <tr>
               <td><input type="radio" value="none" name="paiement" class="none" checked /><label>Paiement sur place</label></td>
               <td><input type="radio" value="paypal" name="paiement" class="paypal"/><label>Paiement PayPal</label></td>
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
        <input type="button" class="suivant" onclick="if(jQuery('.none').attr('checked') == 'enable'){jQuery('.suivant').addAttr('action=?page=confirmation')}else{jQuery('.suivant').addAttr('action=?page=paiementPaypal')}"/>
    </form>
</div>
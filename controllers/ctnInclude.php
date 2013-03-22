<?php
    include "Cookie.class.php";
    include "Login.class.php";
    
    
    $COOKIES = new Cookie();
    $CON = new Login($COOKIES);
    
?>

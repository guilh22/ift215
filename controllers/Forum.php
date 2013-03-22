<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of forum
 *
 * @author timat
 */
class Forum {
    public static $instance = NULL;
    public function __construct() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this;
        return self::$instance;
    }
    public function getInstance() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this; 
        return self::$instance;
    }
}

?>

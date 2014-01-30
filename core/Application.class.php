<?php
/**
 * Description of Application
 *
 * @author pascal
 */

abstract class Application {
    static private $_contenu = array();
    
    static public function getContenu($variable){
        return self::$_contenu[$variable];
    }
    
    static public function setContenu($variable, $valeur){
        if ($variable && $valeur) {
            self::$_contenu[$variable] = $valeur;
        }
    }
}

?>
 
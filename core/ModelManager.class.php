<?php
/**
 * Classe ModelManager : manager générique
 * propriété : _db : contient un objet PDO
 * Méthodes : 
 * Le constructeur met l'objet PDO dans _db
 *
 * @author pascal
 */
class ModelManager {
    protected $_db;
    protected $_table;
    
    // Le contructeur -----------------------
    public function __construct(PDO $data) {
        if ($data){
            $this->setDb($data);
        }
    }
    
    // SETTERS ------------------------------
    public function setDb(PDO $data){
        if ($data){
            $this->_db = $data;
        }
    }
    public function setTable($data){
        if ($data){
            $this->_table = $data;
        }
    }
}

?>

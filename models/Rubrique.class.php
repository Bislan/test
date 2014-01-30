<?php
/**
 * Class Rubrique : modélise la table rubriques
 * propriétés : id, nom, texte, prix
 * méthodes : GETTERS et SETTERS
 * @author pascal
 */

class Rubrique extends Model {
    private $_id;
    private $_titre;
    private $_texte;
    //private $_prix;
    

    
    
    // GETTERS ---------------------------
    public function getId(){
        return $this->_id;
    }
    public function getTitre(){
        return $this->_titre;
    }
    public function getTexte(){
        return $this->_texte;
    }
    
    // SETTERS ----------------------------
    public function setId($data){
        if ($data){
            $id = (int)$data;
            $this->_id = $id;
        }
    }
    public function setTitre($data){
        if ($data){
            $this->_titre = $data;
        }
    }
    public function setTexte($data){
        if ($data){
            $this->_texte = $data;
        }
    }
}

?>

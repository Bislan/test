<?php
/*
 * Classe Model
 * Modèle générique pour tous les autres modèles
 * Méthodes : 
 * Le constructeur qui reçoit un tableau de données
 * et qui lance l'hydrateur
 * L'hydrateur qui prend le tableau et hydrate les propriétés
 * 
 * 
 */

abstract class Model {
     
     
    private $_id;
    private $_titre;
    private $_texte;
    // Constructeur ----------------
        public function __construct(array $data) {
            if ($data){
                $this->hydrater($data);
            }
        }
    // Hydrateur --------------------
        public function hydrater(array $data){
            foreach ($data as $prop => $valeur ) {
                $nomMethode = 'set' . ucfirst($prop);
                if (method_exists($this,$nomMethode)) {
                    $this->$nomMethode($valeur);
                }
            }
        }



  function getId(){
        return $this->_id;
    }
     function getTitre(){
        return $this->_titre;
    }
    function getTexte(){
        return $this->_texte;
    }
   
 function setId($data){
        $id = (int)$data;
        $this->_id  = $id;
    }
   function setTitre($data){
        $this->_titre  = $data;
    }
    function setTexte($data){
        $this->_texte  = $data;
    }
   
 }
?>
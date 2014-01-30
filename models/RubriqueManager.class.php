<?php
/**
 * Classe RubriqueManager : Manager pour la table 'rubriques'
 * 
 *0
 * @author pascal
 */
class RubriqueManager extends ModelManager {
    // Propriétés : 
    protected $_table = 'rubriques';
    
    //Autres méthodes : CRUD ------------
        
        // Prendre la liste des rubriques 
        // Et renvoi un tableau avec des Rubriques
            public function prendreListe(){
                $lesRubriques = array();
                $sql = "SELECT id, titre 
                        FROM $this->_table 
                        ORDER BY titre ASC;";
                $rs = $this->_db->query($sql);
                
                // On rempli le tableau avec des Nouvelles
                while ($r = $rs->fetch(PDO::FETCH_ASSOC)) {
                    // $r est un tableau associatif
                    // Avec les données de la Nouvelle
                    $lesRubriques[] = new Rubrique($r);
                }
                $rs->closeCursor();
                $rs = null;
                return $lesRubriques;
            }
            
        // Prendre une Rubrique
        // Et renvoi une Rubrique
        // @param data int id
            public function prendreUn($data){
                $id = (int)$data;
                $sql = "SELECT * 
                        FROM $this->_table 
                        WHERE id = $id;";
                $rs = $this->_db->query($sql);
                $r = $rs->fetch(PDO::FETCH_ASSOC);
                $rs->closeCursor();
                $rs = null;
                return new Rubrique($r); 
            }
            
        // Ajouter une Nouvelle
        // @param data objet une Nouvelle
            public function ajouter(Rubrique $data){
                $sql = "INSERT INTO $this->_table
                        SET titre = :titre,
                            texte = :texte;";
                $rs = $this->_db->prepare($sql);
                $rs->bindValue(':titre', $data->getTitre(), PDO::PARAM_STR);
                $rs->bindValue(':texte', $data->getTexte(), PDO::PARAM_STR);
                $rs->execute();
            }
            
        // Supprimer une Rubrique
        // @param data int id de la nouvelle à suprimer
           public function supprimer($data){
                $id = (int)$data;
                $sql = "DELETE FROM $this->_table
                        WHERE id = :id;";
                $rs = $this->_db->prepare($sql);
                $rs->bindValue(':id', $id, PDO::PARAM_INT);
                $rs->execute();
            }
            
        // Modifier une Nouvelle
        // @param data objet une Nouvelle
            public function modifier(Rubrique $data){
                $sql = "UPDATE $this->_table
                        SET titre   = :titre,
                            texte = :texte
                        WHERE id  = :id;";
                $rs = $this->_db->prepare($sql);
                $rs->bindValue(':titre', $data->getTitre(), PDO::PARAM_STR);
                $rs->bindValue(':texte', $data->getTexte(), PDO::PARAM_STR);
                $rs->bindValue(':id', $data->getId(), PDO::PARAM_INT);
                $rs->execute();
            }
    
}

?>

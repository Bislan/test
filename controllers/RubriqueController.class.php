<?php

/**
 * Description of RubriqueController
 *
 * @author pascal
 */
class RubriqueController extends Controller {

    private $_manager;

    // Le constructeur 
    // Crée éventuellement un Manager si on a besoin de données de la db
    public function __construct(PDO $data) {
        parent::__construct();
        $this->_manager = new RubriqueManager($data);
    }

    // Les méthodes ACTION -------------------
    // Le but : Prérarer les données pour la vue
    // Et charger le bon fichier de vue
    // L'action index affiche le contenu de la Rubique active
    // @param $id INT : id de la rubrique à afficher
    public function index($id) {
        $id = (int) $id;
        // Je mets des infos dans les données à envoyer à la vue

        $laRubrique = $this->_manager->prendreUn($id);
        $this->setDonneesAEnvoyerALaVue($laRubrique);

        // Je charge la vue index.php du controlleur TEST
        $this->chargeVue('index');
    }

    // L'action menu va chercher tous les titres et id 
    // de toutes les rubriuques
    // ET les balance à la vue 'menu'
    public function menu() {
        $lesRubriques = $this->_manager->prendreListe();
        $this->setDonneesAEnvoyerALaVue($lesRubriques);
        $this->chargeVue('menu', 'menu');
    }

    public function edit($data) {
        if ($data) {
            $id = (int) $data;
            $laRubrique = $this->_manager->prendreUn($id);
            $this->setDonneesAEnvoyerALaVue($laRubrique);
            $this->chargeVue('edit');
        }
    }

    public function httModifier() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'id' => $_POST['id'],
                'titre' => $_POST['titre'],
                'texte' => $_POST['texte']
            );

            $new_data = new Rubrique($data);
            $new_data->hydrater($data);
            $laRubrique = $this->_manager->modifier($new_data);
            $this->setDonneesAEnvoyerALaVue($laRubrique);
            $this->chargeVue('update');
        }
    }

    
        public function add($data) {
        if($data){
            $id = (int)$data;
            $laRubrique = $this->_manager->prendreUn($id);
            $this->setDonneesAEnvoyerALaVue($laRubrique);
            $this->chargeVue('add');
        }
    }
    
    
    
    public function httAjoute (){
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
         $data = array( 
             
             'titre'=>$_POST['titre'],
             'texte'=>$_POST['texte']
             
         );

         $new_data = new Rubrique($data);
         $new_data->hydrater($data);
         $laRubrique = $this->_manager->ajouter($new_data);
         $this->setDonneesAEnvoyerALaVue($laRubrique);
         $this->chargeVue('update'); 
            
        }
  
    }
    
    public function dell($data){
        if($data){
            $id = (int) $data;
            
            $laRubrique = $this->_manager->supprimer($id);
            $this->setDonneesAEnvoyerALaVue($laRubrique);
            $this->chargeVue('efface');
            
        }
    }
    
}

?>

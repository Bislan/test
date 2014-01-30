<?php
/**
 * Controller générique
 *
 * @author pascal
 */
class Controller {
    // Propriétés ----------------------------
    // donneesAEnvoyerALaVue : Les données à envoyer à la vue
    protected $_donneesAEnvoyerALaVue;
    protected $_nomDossierVues;
    protected $_template = 'default';
    
    public function __construct() {
        // Le nom du dossier de vues
        // est le nom du controller dont on a replacé 'Controller' par 's'
        // en munuscule
        $nomDossier = strtolower(str_replace('Controller','s',get_class($this)));
        $this->setNomDossierVues($nomDossier);
    }
    
    
    // SETTER --------------------------------
    public function setDonneesAEnvoyerALaVue($data){
        if ($data) {
            $this->_donneesAEnvoyerALaVue = $data;
        }
    }
    
    public function setNomDossierVues($data){
        if ($data) {
            $this->_nomDossierVues = $data;
        }
    }
    
    public function setTemplate($data){
        if ($data) {
            $this->_template = $data;
        }
    }
    
    // Méthodes de vue -----------------------------------
    // Rend les données disponibles pour la vue
    // Et charge le fichier de vue dans le dispatcher
    // @param data STRING : nom de la vue à charger
    public function chargeVue($nomFichierVue, $nomVariable='content' ){
        // Je mets les données à envoyer dans une bête variable
        $donneesEnvoyees = $this->_donneesAEnvoyerALaVue;

        // Charge la vue
        // Je lui demande de se retenir (pour ne pas afficher)
        // En gros, je démarre la mémoire tampon
        // Puis je charge le fichier de vue (qui ne s'affiche pas )
        // Mais qui met en page le contenu de $donneesEnvoyees
        // Et j'aspire le contenu du tampon dans $nomVariable
        ob_start();
            require VIEWS_DIR . $this->_nomDossierVues . '/' . $nomFichierVue . '.php';

        Application::setContenu($nomVariable, ob_get_clean());

    }
}

?>

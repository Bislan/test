<?php
// Mes constantes ---------------------------------------------
    define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME'])); 
    define('CORE_DIR', 'core/'); 
    define('CONTROLLERS_DIR', 'controllers/'); 
    define('MODELS_DIR', 'models/');
    define('VIEWS_DIR', 'views/');

// Chargement automatique des classes -------------------------
// Les classes se trouvent dans des dossiers différents
// On passe donc par des namespaces
    function chargementAutomatiqueDesClasses($classe){ 
        $nomFichier = $classe . '.class.php';

        if (file_exists(MODELS_DIR.$nomFichier)) {
            require MODELS_DIR.$nomFichier;
        }
        if (file_exists(CORE_DIR.$nomFichier)) {
            require CORE_DIR.$nomFichier;
        }
        if (file_exists(CONTROLLERS_DIR.$nomFichier)) {
            require CONTROLLERS_DIR.$nomFichier;
        }
     }
     spl_autoload_register('chargementAutomatiqueDesClasses');

//Paramètres de connexion ------------------------
$hote = 'localhost';
$user = 'root';
$pwd  = '';
$db   = 'DEV2013_CMS_MVC';

// Chaîne de connexion 
$dsn = "mysql:host=$hote;dbname=$db";
$param = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

// J'essaie de me connecter 
// et je prépare un message d'erreur
try { 
     $conn = new PDO($dsn,$user,$pwd,$param);
} 
catch (PDOException $e) {
     $message = 'Erreur PDO dans le fichier' . 
                 $e->getFile() . ', à la ligne ' . 
                 $e->getLine() . ' : ' . 
                 $e->getMessage();
}


?>
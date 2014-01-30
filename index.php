<?php
require_once 'init.php';

 if ($_GET['params']){
    $parametres = explode('/', $_GET['params']);

    $controller = ($parametres[0])?$parametres[0]:'rubrique';
    $action     = ($parametres[1])?$parametres[1]:'index ';
    
    $params = (array_slice($parametres, 2))?array_slice($parametres, 2):array();
    $id = ($params[0])?$params[0]:1;
} 
else {
    $controller = 'rubrique';
    $action = 'index';
    $id = 1;
}
$nomDuController = ucfirst($controller).'Controller';
$monController = new $nomDuController($conn);
$monController->$action($id);

$controllerMenu = new RubriqueController($conn);
$controllerMenu->menu();

//$controller->index($id);

require_once VIEWS_DIR.'templates/default.php';

$conn = null;
 
?>
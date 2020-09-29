<?php
	# Prise du temps actuel au début du script
	$time_start = microtime(true);

	# Variables globales du site
	define('CHEMIN_VUES','views/');
    define('EMAIL','jeanluc.collinet@ipl.be');
	$date = date("j/m/Y");
	
	# Require des classes automatisé
	function chargerClasse($classe) {
		require 'models/' . $classe . '.class.php';
	}
	spl_autoload_register('chargerClasse'); 

	# Ecrire ici le header de toutes pages HTML
	require_once(CHEMIN_VUES . 'header.php');
	
	# Ecrire ici le menu du site de toutes pages HTML
	require_once(CHEMIN_VUES . 'menu.php');

	# Tester si une variable GET 'action' est précisée dans l'URL index.php?action=...
	$action = (isset($_GET['action'])) ? htmlentities($_GET['action']) : 'default';
	# Quelle action est demandée ?

function controlGenesisController(): GeneseController
{
    require_once('controllers/GeneseController.php');
    $controller = new GeneseController();
    return $controller;
}
function controlContactController(): ContactController
{
    require_once('controllers/ContactController.php');
    $controller = new ContactController();
    return $controller;
}

function controlLivreController(): LivreController
{
    require_once('controllers/LivreController.php');
    $controller = new LivreController();
    return $controller;
}

function controlAccueilController(): AccueilController
{
    require_once('controllers/AccueilController.php');
    $controller = new AccueilController();
    return $controller;
}

switch ($_GET['action']) {
    case 'genese': # action=genese
        $controller = controlGenesisController();
        break;
    case 'contact': # action=contact
        $controller = controlContactController();
        break;
    case 'livre':
        $controller = controlLivreController();
        break;
    default: # dans tous les autres cas l'action=accueil
        $controller = controlAccueilController();
        break;
}
	# Exécution du contrôleur correspondant à l'action demandée
	$controller->run();
	
	# Ecrire ici le footer du site de toutes pages HTML
	require_once(CHEMIN_VUES . 'footer.php');

?>

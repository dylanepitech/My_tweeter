<?php 
namespace Routes;
require_once __DIR__ . '/../vendor/autoload.php';
$router = new Router();
$router->Route('/','HomeController@view');
$router->Route('/accueil','AccueilController@view','GET','User_middleware');
$router->Route('/inscription','InscriptionController@view');
$router->Route('/inscription','InscriptionController@inscription_controller', 'POST');
$router->Route('/connexion','ConnexionController@view');
$router->Route('/connexion','ConnexionController@connexion_controller', 'POST');
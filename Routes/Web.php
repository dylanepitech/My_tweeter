<?php 
namespace Routes;
require_once __DIR__ . '/../vendor/autoload.php';
$router = new Router();
$router->Route('/','HomeController@view');
$router->Route('/profil','ProfilController@view');
$router->Route('/profil','ProfilController@modification','POST','User_middleware');
$router->Route('/profil_suppression','ProfilController@suppression','GET','User_middleware');
$router->Route('/accueil','AccueilController@view','GET','User_middleware');
$router->Route('/accueil','AccueilController@post','POST','User_middleware');
$router->Route('/accueil_like','AccueilController@like','POST','User_middleware');
$router->Route('/inscription','InscriptionController@view');
$router->Route('/inscription','InscriptionController@inscription_controller', 'POST');
$router->Route('/connexion','ConnexionController@view');
$router->Route('/connexion','ConnexionController@connexion_controller', 'POST');
$router->Route('/connexion_reactivate','ConnexionController@reactivation', 'POST');
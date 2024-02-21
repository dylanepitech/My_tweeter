<?php 
namespace Routes;
require_once "vendor/autoload.php";
use Middleware\User_middleware;
class Router{
    protected $routes = array();

    public function Route($path, $controller,$method = 'GET', $middleware = null){

        $array = str_replace('@',' ', $controller);
        $array = explode(' ', $array);
        $function = $array[1];
        $controller = $array[0];

       $this->routes[] = array(
        'path'=> $path,
        'controller'=> $controller,
        'controller_function'=> $function,
        'method'=> $method,
        'middleware_name'=>$middleware,
       );
        $this->dispatch();
        
    }

    public function dispatch() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace("/W-WEB-090-MAR-1-1-academie-dylan.bouraoui", "", $url);
    
        foreach ($this->routes as $value) {
            if ($url == $value['path'] && $_SERVER['REQUEST_METHOD'] == $value['method']) {
                $controllerName = "Controller\\" . $value['controller'];
                $action = $value['controller_function'];
                $controllerFile = 'Controller/' . $value['controller'] . ".php";

                if ($value['middleware_name'] != null){
                    $MiddlewareName = "Middleware\\".$value['middleware_name'];
                    $MiddlewareFile = "Middleware/". $value['middleware_name']. ".php";
                    if (file_exists($MiddlewareFile)) {
                        require_once $MiddlewareFile;
                        if (class_exists($MiddlewareName)){
                            $middleware = new User_middleware();   
                            $middleware->user($_COOKIE['user_id']);
                        }
                    }
                }
    
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();
                        if (method_exists($controller, $action)) {
                            $controller->$action();
                            exit(); 
                        } else {
                            echo 'Erreur: Méthode non trouvée dans le contrôleur';
                            return;
                        }
                    } else {
                        echo 'Erreur: Contrôleur non trouvé';
                        return;
                    }
                } else {
                    echo 'Erreur: Fichier de contrôleur non trouvé';
                 return;
                }
            }
        }
    }
    
}
<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use App\routes\Router;
$router = new Router();


$router->setRoutes([
    'GET' => [
        '' => ['Home', 'index'],
        'home' => ['Home', 'index'],
        'tags' => ['Home', 'Tags'],
        'signup'=> ['Home','signup'],
        'login'=> ['Home','login'],
        'admin'=> ['AdminController','admin'],
        'allusers' => ['AdminController', 'getAllUsers'],
        'categories'=> ['CategoryController', 'getAllCategories'],
        'delete'=> ['AdminController', 'deleteUser'],
        'deleteCategorie'=> ['CategoryController','deleteCategory'],
        'editcategorie'=> ['CategoryController','editCategory'],
        'deleteTag'=> ['TagController','deleteTag'],
        'tag'=> ['TagController', 'getAllTags'],
         'logout'=> ['UserController','logout'],

    ],
    'POST' => [
        'submituser' => ['UserController', 'saveUser'],
        'login'=> ['UserController','loguser'],
        'addCategories'=> ['CategoryController', 'saveCategory'],
        'addtag'=> ['TagController', 'saveTag'],
    ]

    
    ]);

if (isset($_GET['url'])) {
    $uri = trim($_GET['url'], '/');
    $method = $_SERVER['REQUEST_METHOD'];

    try {
        $route = $router->getRoute($method, $uri);

        if ($route) {
            list($controllerName, $methodName) = $route;
            $controllerClass = 'App\\controller\\' . ucfirst($controllerName);
            $controller = new $controllerClass();

            if ($methodName && method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                $controller->index();
            }
        } else {
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
?>
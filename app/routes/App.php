<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use App\routes\Router;
$router = new Router();


$router->setRoutes([
    'GET' => [
        '' => ['WikiController', 'getAllWiki'],
        'home' => ['WikiController', 'getAllWiki'],
        'tags' => ['Home', 'Tags'],
         'learn' => ['Home','learnMore'],
        'signup'=> ['Home','signup'],
        'login'=> ['Home','login'],
        'admin'=> ['AdminController','admin'],
        'allusers' => ['AdminController', 'getAllUsers'],
        'categories'=> ['CategoryController', 'getAllCategories'],
        'delete'=> ['AdminController', 'deleteUser'],
        'deleteCategorie'=> ['CategoryController','deleteCategory'],
        'editcategory'=> ['CategoryController','editCategory'],
        'deleteTag'=> ['TagController','deleteTag'],
        'tag'=> ['TagController', 'getAllTags'],
         'logout'=> ['UserController','logout'],
         'addwiki'=> ['WikiController','wiki'],
         'search'=> ['WikiController','searchWiki'],
         'allWikis'=> ['AdminController','getAllWikis'],
         'deletewiki'=> ['WikiController','deleteWiki']

    ],
    'POST' => [
        'submituser' => ['UserController', 'saveUser'],
        'login'=> ['UserController','loguser'],
        'addCategories'=> ['CategoryController', 'saveCategory'],
        'addtag'=> ['TagController', 'saveTag'],
        'editcat' => ['CategoryController', 'updateCategory'],
        'addNewWiki'=> ['WikiController', 'addWiki'],

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
<?php
require_once 'index.php';
require_once './app/controllers/series.controller.php';
require_once './app/controllers/temporadas.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/middlewares/guard.middleware.php';
require_once './app/middlewares/session.middleware.php';
session_start();
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

if (!empty($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$params = explode('/', $action);

/*  TABLA DE RUTEO
- listar (series - temporadas)
- navegar
- ver info x serie
- login
---funciones de admin---
-listar
-CRUD
*/
$request = new StdClass();
$request = (new SessionMiddleware())->run($request);


switch ($params[0]) {
    case 'index':
        showIndex();
        break;
    case 'list_series':
        $controller = new SeriesController();
        if (isset($params[1])){
            $idSerie = $params[1];
            $controller->showSerieByID($idSerie);
        }
        else{
            $controller->showSeries();
        }
        break;
    case 'list_by_genre':
        $controller = new SeriesController();
        $genre = $params[1];
        $controller->showSerieByGenre($genre);
        break;
    case 'temporadas':
        $controller = new TemporadasController();
        if (isset($params[1])){
            $id = $params[1];
            $controller->showTemporadaByID($id);
        }
        else{
            $controller->showTemporadas();
        }             
        break;
        case 'nueva':
        $request = (new GuardMiddleware())->run($request);
        $controller = new TaskController();
        $controller->addTask($request);
        break;
    case 'eliminar':
        $request = (new GuardMiddleware())->run($request);
        $controller = new TaskController();
        $request->id = $params[1];
        $controller->removeTask($request);
        break;
    case 'finalizar':
        $request = (new GuardMiddleware())->run($request);
        $controller = new TaskController();
        $request->id = $params[1];
        $controller->finalizeTask($request);
        break;

    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout($request);
        break;
    default:
        echo 'error 404 page not found';
        break;
}

?>
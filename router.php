<?php
require_once './app/controllers/home.controller.php';
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
    $action = 'home';
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
/* manejo de pagina principal */
    case 'home':
        $controller = new HomeController();
        $controller->showHome($request);
        break;
    case 'about':
    $controller = new HomeController();
    $controller->about($request);
        break;
/* listado de series y temporadas */
    case 'list_series':
        $controller = new SeriesController();
        if (isset($params[1])){
            $idSerie = $params[1];
            $controller->showSerieByID($idSerie,$request);
        }
        else{
            $controller->showSeries($request);
        }
        break;
    case 'list_by_genre':
        $controller = new SeriesController();
        $genre = $params[1];
        $controller->showSerieByGenre($genre,$request);
        break;
    case 'temporadas':
        $controller = new TemporadasController();
        if (isset($params[1])){
            $id = $params[1];
            $controller->showTemporadaByID($id,$request);
        }
        else{
            $controller->showTemporadas($request);
        }
        break;
/* tasks? */
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
/* ABM series */
    case 'panel_admin':
        $controller = new HomeController();
        $controller->ABM($request);
        break;
    case 'addSerie':
        $request = (new GuardMiddleware())->run($request);
        $controller = new SeriesController();
        $controller->addSerie();
        break;
    case 'editSerie':
        $request = (new GuardMiddleware())->run($request);
        $controller = new SeriesController();
        $controller->editSerie();
        break;
    case 'deleteSerie':
        $request = (new GuardMiddleware())->run($request);
        $controller = new SeriesController();
        $controller->deleteSerie();
        break;
/* Manejo de sesion */
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = new AuthController();
        $controller->logout($request);
        break;
    default:
        echo 'error 404 page not found';
        break;
}

?>
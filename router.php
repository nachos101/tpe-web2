<?php
require_once 'index.php';
require_once 'app/controllers/series.controller.php';
/* require_once 'app/controllers/temporadas.controller.php';
 */
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

switch ($params[0]) {
    case 'index':
        showIndex();
        break;
    case 'list_series':
        $controller = new SeriesController();
        $controller->showSeries();
        break;
    case 'list_by_genre':
        $controller = new SeriesController();
        $genre = $params[1];
        $controller->showSerieByGenre($genre);
        break;
    case 'temporadas':
        $controller = new TemporadasController();
        $serie = $params[1];
        $controller->showAllTemporadas($serie);
        break;
    default:
        echo 'error 404 page not found';
        break;
}

?>
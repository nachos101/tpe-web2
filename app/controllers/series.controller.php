<?php
require_once './app/models/series.model.php';
require_once './app/views/series.view.phtml';
require_once './app/models/temporadas.model.php';

class SeriesController{
    private $model;
    private $view;
    private $temporadasModel;

    public function __construct(){
        $this->model = new SeriesModel();
        $this->view = new SeriesView();
        $this->temporadasModel = new ModelTemporadas();
    }

    public function showSeries($request){
        //pido las series al modelo
        $series = $this->model->getAllSeries();

        //envio las series pedidas a la vista
        $this->view->showSeries($series,"", $request->user);

    }

    public function showSerieByID($idSerie,$request){
        $serie = $this->model->getSerie($idSerie);
        $temporada = $this->temporadasModel->getTemporadas($idSerie);
        $this->view->showSerieByID($serie,$temporada,"", $request->user);
    }

    public function showSerieByGenre($genre,$request){
        $serie = $this->model->getSerieByGenre($genre);
        $this->view->showSeriebyGenre($serie,"", $request->user);
    }

    function addSerie($request){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //uso empty en lugar de isset porque este ultimo acepta espacios en blanco
            if (!empty($_POST['title']) &&
            !empty($_POST['genre']) &&
            !empty($_POST['synopsis']) &&
            !empty($_POST['age_rating'])&&
            !empty($_POST['img'])){
                //todos los campos tienen datos
                $title = $_POST['title'];
                $genre = $_POST['genre'];
                $seasons = $_POST['seasons'];
                $synopsis = $_POST['synopsis'];
                $ageR = $_POST['age_rating'];
                $img = $_POST['img'];
                
                $this->model->insertSerie($title, $genre, $seasons, $synopsis, $ageR, $img);
                $this->view->showMsg('Serie agregada con exito', $request->user);

            }else{
                $this->view->showError('Error: faltan campos obligatorios', $request->user);
            }
        }
        $this->view->showFormSeries("", $request->user);
    }

    function editSerie($serieId, $request){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            if (!empty($_POST['title']) &&
            !empty($_POST['genre']) &&
            !empty($_POST['synopsis']) &&
            !empty($_POST['age_rating'])&&
            !empty($_POST['img'])){
                //todos los campos tienen datos
                $title = $_POST['title'];
                $genre = $_POST['genre'];
                $seasons = $_POST['seasons'];
                $synopsis = $_POST['synopsis'];
                $ageR = $_POST['age_rating'];
                $img = $_POST['img'];
                
                $this->model->updateSerie($serieId, $title, $genre, $seasons, $synopsis, $ageR, $img);
                $this->view->showMsg('Serie actualizada con exito', $request->user);

            }else{
                $this->view->showError('Error: faltan campos obligatorios', $request->user);
            }
        }
        $serie = $this->model->getSerie($serieId);
        $this->view->showFormEdit($serie, $request->user);
    }

    function deleteSerie($serieId, $request){
        $this->model->deleteSerie($serieId);
        $this->view->showMsg('Serie eliminada con exito', $request->user);
    }

}

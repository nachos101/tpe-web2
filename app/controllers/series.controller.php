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

    public function showSeries(){
        //pido las series al modelo
        $series = $this->model->getAllSeries();

        //envio las series pedidas a la vista
        $this->view->showSeries($series);

    }

    public function showSerieByID($idSerie){
        $serie = $this->model->getSerie($idSerie);
        $temporada = $this->temporadasModel->getTemporadas($idSerie);
        $this->view->showSerieByID($serie,$temporada);
    }


    public function showSerieByGenre($genre){
        $serie = $this->model->getSerieByGenre($genre);
        $this->view->showSeriebyGenre($serie);
    }

    function addSerie($request){
        if (isset($_POST['title'], $_POST['genre'],
        $_POST['synopsis'], $_POST['age_rating'])){
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $synopsis = $_POST['synopsis'];
            $ageR = $_POST['age_rating'];

            $this->model->insertSerie($title, $genre, $synopsis, $ageR);

        }else{
            $this->view->showError('Error: faltan campos obligatorios');
        }
        header('Location: ' . BASE_URL);
        exit();
    }

    function editSerie($request){

    }

    function deleteSerie($serie){
        
    }

}

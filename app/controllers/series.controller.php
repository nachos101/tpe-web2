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

}

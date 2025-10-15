<?php
require_once './app/models/series.model.php';
require_once './app/views/series.view.phtml';

class SeriesController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new SeriesModel();
        $this->view = new SeriesView();
    }

    public function showSeries(){
        //pido las series al modelo
        $series = $this->model->getAll();

        //envio las series pedidas a la vista
        $this->view->showSeries($series);

    }

}

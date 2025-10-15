<?php
    require_once './app/models/temporadas.model.php';
    require_once './app/views/temporadas.view.php';
    class TemporadasController {
     
        public function __construct(){
            //inicio Modelo y Vista
            $this->Model = new ModelTemporadas();
            $this->View = new TemporadasView();
        }
        
        public function showAllTemporadas($idSerie){
            //traigo las temporadas de la serie y con la View llamo al metodo que las muestra
            $array = $this->Model->getTemporadas($idSerie);
            $this->View->showTemporadas($array);
        }

        public function showAnyTemporada($idSerie,$id){
            //hago lo mismo que en showAllTemporadas pero aca solo traigo una y muestro una
            $temporada = $this->Model->getTemporada($idSerie,$id);
            $this->View->showUnaTemporada($temporada);
        }

    }
?>
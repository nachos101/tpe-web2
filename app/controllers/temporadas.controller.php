<?php
    require_once './app/models/temporadas.model.php';
    require_once './app/views/temporadas.view.phtml';
    require_once './app/models/series.model.php';
    
    class TemporadasController {
     
        public function __construct(){
            //inicio Modelo y Vista
            $this->Model = new ModelTemporadas();
            $this->View = new TemporadasView();
            $this->modelSerie = new SeriesModel();
        }
        
        public function showTemporadas($request){
            //traigo las temporadas de la serie y con la View llamo al metodo que las muestra
            $temporadas = $this->Model->getAllTemporadas();

            $this->View->showAllTemporadas($temporadas,"", $request->user);
        }

        public function showTemporadaByID($id,$request){
            //hago lo mismo que en showAllTemporadas pero aca solo traigo una y muestro una
            $temporada = $this->Model->getTemporada($id);
            if (empty($temporada)){
                return showError();
            }
            $idSerie = $temporada->id_serie;
            $serie = $this->modelSerie->getSerie($idSerie);
            $temporada->serie=$serie;
            $this->View->showTemporadaByID($temporada,"", $request->user);
        }

    }
?>
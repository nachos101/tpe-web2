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

        public function showMenuABM($request){
            $temporadas = $this->Model->getAllTemporadas();
            $this->View->showTemporadasABM($temporadas,"", $request->user);
        }

        public function addTemporada($request){
            if (!isset($_POST['name']) || empty($_POST['name'])){
                return $this->View->showError('falta completar el nombre de la serie',$request->user);
            }
                        if (!isset($_POST['num_temporada']) || empty($_POST['num_temporada'])){
                return $this->View->showError('falta completar el numero de temporada de la serie',$request->user);
            }
                        if (!isset($_POST['cant_capitulos']) || empty($_POST['cant_capitulos'])){
                return $this->View->showError('falta completar la cantidad de capitulos de la serie',$request->user);
            }
            $name = $_POST['name'];
            $season = $_POST['num_temporada'];
            $chapters = $_POST['cant_capitulos'];
            $serie = $this->modelSerie->getSerieByName($name);
            $idSerie = $serie->id_serie;
            
            
            $add = $this->Model->insertTemporada($idSerie,$season,$chapters);
            
            /*if(!$add){
                return $this->View->showError('Error la insertar tarea', $request->user);
            }*/

            header('Location: ' . BASE_URL);
        }   
           public function deleteTemporada($request){
            $id = $request->id;
            $season = $this->Model->getTemporada($id);
            if (!$season){
                return $this->View->showError('Error no existe esa temporada', $request->user);
            }

            $this->Model->deleteTemporada($id);
            header('Location: ' . BASE_URL);
           }
    }

?>
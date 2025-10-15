<?php
    class ModelTemporadas {
        function __construct(){
            //constructor basico con la db
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2s;charset=utf8', 'root', '');
        }
    

    public function getTemporadas($idSerie){
        //hago la query y la ejecuto
        $query = $this->db->prepare('SELECT * FROM temporadas WHERE id_serie = ?');
        $query->execute([$idSerie]);
        //cargo todas las temporadas en una variable
        $temporadas = $query->fetchAll(PDO::FETCH_OBJ);
        return $temporadas;
    }

    public function getTemporada($idSerie,$id){
        $query = $this->db->prepare('SELECT * FROM temporadas WHERE  id_serie = ? AND id_temporada = ?');
        $query->execute([$idSerie,$id]);
        //cargo todas las temporadas en una variable
        $temporada = $query->fetch(PDO::FETCH_OBJ);
        return $temporada;
    }  

    }
?>
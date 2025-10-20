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

       function getAllTemporadas (){
        //preparo y ejecuto la consulta.
        $query = $this->db->prepare('SELECT * FROM temporadas');
        $query->execute();
        $temporadas = $query->fetchAll(PDO::FETCH_OBJ);

        return $temporadas;
    }

    public function getTemporada($id){
        $query = $this->db->prepare('SELECT * FROM temporadas WHERE id_temporada = ?');
        $query->execute([$id]);
        //cargo todas las temporadas en una variable
        $temporada = $query->fetch(PDO::FETCH_OBJ);
        return $temporada;
    }
    
    public function insertTemporada($idSerie,$season,$chapters){
        $query = $this->db->prepare('SELECT * FROM temporadas WHERE id_serie = ? AND num_temporada = ?');
        $query->execute([$idSerie,$season]);
        $control = $query->fetch(PDO::FETCH_OBJ);
        if (empty($control)){
        $query = $this->db->prepare('INSERT INTO temporadas(id_serie, num_temporada, cant_capitulos) VALUES(?,?,?)');
        $query->execute([$idSerie,$season,$chapters]);

        return $this->db->lastInsertId();
        }
    }

    public function deleteTemporada($id){
        $query = $this->db->prepare('DELETE FROM temporadas WHERE id_temporada = ?');
        $query->execute([$id]);
    }

    public function updateTemporada($id_temporada,$id_serie,$season,$chapters){
        $query = $this->db->prepare('UPDATE temporadas SET num_temporada = ?,cant_capitulos = ?,id_serie = ? WHERE id_temporada = ?');
        $query->execute([$season,$chapters,$id_serie,$id_temporada]);
    }

    }
?>
<?php

class SeriesModel{
    private $db;

    function __construct() {
        //abro conexion con la db
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web2s;charset=utf8', 'root', '');
    }

    function getSerie ($id){

    }

    function getAllSeries (){
        //preparo y ejecuto la consulta.
        $query = $this->db->prepare('SELECT * FROM series');
        $query->execute();
        $series = $query->fetchAll(PDO::FETCH_OBJECT);

        return $series;
    }

    function getSerieById ($id){
        $query = $this->db->prepare('SELECT * FROM series WHERE id=?');
        $query->execute([$id]);
        $serie = $query->fetch(PDO::FETCH_OBJ);
        
        return $serie;
    }

}
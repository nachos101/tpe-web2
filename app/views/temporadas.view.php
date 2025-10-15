<?php
    class TemporadasView {
        function showTemporadas($temporadas){
            require_once '././templates/layout/lista_temporadas.php';
        }
            
        function showUnaTemporada($temporada){
            require_once '././templates/layout/temporada.php';   
        }
    }
?>  
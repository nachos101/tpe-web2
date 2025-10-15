<?php
    class TemporadasView {
        function showTemporadas($temporadas){
            require_once '././templates/lista_temporadas.phtml';
        }
            
        function showUnaTemporada($temporada){
            require_once '././templates/temporada.phtml';
        }
    }
?>  
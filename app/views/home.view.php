<?php
class HomeView{
    function showHome($error, $user){
        require_once 'templates/layout/body_home.phtml';
    }

    function about($error, $user){
        require_once 'templates/about.php';
    }

    function ABM($error, $user){
        require_once 'templates/panel_crud.phtml';
    }
}



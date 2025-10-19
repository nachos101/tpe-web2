<?php
require_once './app/views/home.view.php';

class HomeController {
    private $view;

    public function __construct() {
        $this->view = new HomeView();
    }

    public function showHome($request){
        $this->view->showHome("", $request->user);
    }

    public function about($request){
        $this->view->about("", $request->user);
    }

    public function ABM($request){
        $this->view->ABM("", $request->user);
    }
}

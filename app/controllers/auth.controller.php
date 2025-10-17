<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.phtml';

class AuthController{
    private $userModel;
    private $view;

    function __construct(){
        $this->userModel = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        require_once '././templates/form_login.phtml';
    }

    //login


    public function logout ($request){
        session_destroy();
        header('Location: '.BASE_URL);
        exit();
    }



}
?>
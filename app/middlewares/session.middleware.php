<?php
    class SessionMiddleware {
        /* Este SessionMiddleware lee la sesion actual y si el usuario esta
        logueado pone su informacion dentro del request*/
        public function run($request){
            if(isset($_SESSION['user_id'])){
                $request->user = new StdClass();
                $request->user->id = $_SESSION['user_id'];
                $request->user->username = $_SESSION['username'];
            } else {
                $request->user = null;
            }
            return $request;
        }

    }

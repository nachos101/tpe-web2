<?php
    class GuardMiddleware {
        /* Este GuardMiddleware protege rutas que requieren autenticación.
        Solo deja pasar si el usuario está logueado, si no lo está, lo manda al login.
        $request viene con info del user. Si en ella viene un user que inicio sesion, 
        la devuelve tal cual y continua el flujo normal. Si no, redirige al login deteniendo el script*/
        public function run($request) {
            if($request->user) {
                return $request;
            } else {
                header("Location: ".BASE_URL."login");
                exit();
            }
        }
    }

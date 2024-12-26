<?php

class Router {
    private $routes = [];

    public function add($url, $controller, $action) {

        $this->routes[] = [
            'url' => $url, 
            'controller' => $controller, 
            'action' => $action
        ];
    }

    public function dispatch($url) {
        foreach ($this->routes as $route) {

            $pattern = preg_replace('/\//', '\/', $route['url']); 
            $pattern = '/^' . $pattern . '$/'; 

            if (preg_match($pattern, $url, $matches)) {

                array_shift($matches);

                $controller = $route['controller'];
                $action = $route['action'];

                require_once '../app/controllers/' . $controller . '.php';
                $controller = new $controller();

                if (method_exists($controller, $action)) {
                    call_user_func_array([$controller, $action], $matches); 
                } else {
                    echo "Ação não encontrada.";
                }
                return;
            }
        }
        echo "Rota não encontrada.";
    }
}

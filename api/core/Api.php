<?php
    class Api {
        private $routes = array();
        public  function Route($method, $path, $callback) {
            $this->routes[] = array(
                'method' => $method,
                'path' => $path,
                'callback' => $callback
            );
        }
        public  function Render() {
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            if (isset($_GET['url'])) {
                $requestPath = $_GET['url'];
            }else {
                $requestPath = '/';
            }
            foreach ($this->routes as $route) {
                if ($requestMethod === $route['method'] && $requestPath === $route['path']) {
                    call_user_func($route['callback']);
                    return;
                }
            }
            Api::noRoute();
        }
        public function noRoute(){
            foreach ($this->routes as $route) {
                if ('*' === $route['method'] && '' === $route['path']) {
                    call_user_func($route['callback']);
                    return;
                }
            }
        }
    }
?>

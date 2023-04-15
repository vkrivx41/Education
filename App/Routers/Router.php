<?php

    namespace App\Routers;

    use App\Exceptions\PageNotFoundException;


    class Router
    {
        private array $routers = [];
        public function register(string $requestMethod, string $requestUri, array|callable $action): self
        {
            $this->routers[$requestMethod][strtolower($requestUri)] = $action;
            return $this;
        }
        public function get(string $requestUri, $action)
        {
            return $this->register('get', $requestUri, $action); 
        }
        public function post(string $requestUri, $action)
        {
            return $this->register('post', $requestUri, $action); 
        }

        public function routers():array
        {
            return $this->routers;
        }
        public function resolve(string $requestUri, string $requestMethod)
        {
            $request = explode("?", $requestUri)[0];


            if ($request[-1] == "/" && $request != "/") {
                $request = substr($request, 0, ( strlen($request) - 1));
            }

            $action = $this->routers[$requestMethod][strtolower($request)] ?? null;

            if(! $action){
                return PageNotFoundException::index($requestUri);
            }

            if(is_callable($action)){
                return call_user_func($action);
            }

            if(is_array($action)){
                [$class, $method] = $action;

                if(class_exists($class)){
                    
                    $class = new $class();

                    if(method_exists($class, $method)){
                        return call_user_func_array([$class, $method], []);
                    }
                }
            }
            return PageNotFoundException::index($requestUri);
        }
    }
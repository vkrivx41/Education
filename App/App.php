<?php


    namespace App;


    use App\Routers\Router;

    class App{


        public function __construct(
            protected Router $router,
            protected array $requests,
            protected array $config
            ){
        }
        public function run():void
        {
            try {
                echo $this->router->resolve($this->requests['uri'], $this->requests['method']);
            } catch (RouterNotFoundException) {
                http_response_code(404);
            }
        }
    }
<?php

    namespace App\View;

    use App\Exceptions\ViewNotFoundException;
    class View
    {
        public function __construct(
            protected string $view,
            protected array $params = [],
        ){

        }
        public function render()
        {


            ob_start();

            $viewPath = VIEW_PATH."/".$this->view.".php";
            
            if(! file_exists($viewPath)){
                throw new ViewNotFoundException();
            }

            include $viewPath;

            return (string) ob_get_clean();
        }
        public static function make(string $name, array $params = [])
        {
            return new static($name, $params);
        }
        public function __toString()
        {
            return $this->render();
        }
        public function __get(string $name)
       {
            return $this->params[$name] ?? null;
       }
    }
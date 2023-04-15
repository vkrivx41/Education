<?php

    namespace App\Controllers;

    use App\View\View;
    class HomeController
    {
        public function index(): View
        {
            return View::make("index", ["class" => "Home"]);
        }
    }
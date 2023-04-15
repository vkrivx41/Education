<?php


    namespace App\Controllers;

    use App\View\View;
    class NewsController
    {
        public function index(): View
        {
            return View::make("News/index", ["class" => "News"]);
        }

    }
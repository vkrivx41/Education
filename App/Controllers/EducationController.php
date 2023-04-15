<?php

    namespace App\Controllers;

    use App\View\View;
    class EducationController
    {
        public function index(): View
        {
            return View::make("Education/index", ["class" => "Education"]);
        }
    }
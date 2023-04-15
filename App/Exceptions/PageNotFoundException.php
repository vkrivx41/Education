<?php

    namespace App\Exceptions;

    use App\View\View;
    class PageNotFoundException extends \Exception
    {
        public static function index(string $request): View
        {

            $fullRequest = explode("/", $request);
            $primaryRequest = explode("/", $request)[1];

            if (count($fullRequest) <= 2) $primaryRequest = "Ahabanza";
            

            return View::make("exceptions/pagenotfound", ["request" => $request, "class" => $primaryRequest]);
        }
    }
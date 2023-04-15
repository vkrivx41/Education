<?php

    declare(strict_types=1);


    require_once "./../vendor/autoload.php";

    use App\Controllers\HomeController;
    use App\Controllers\NewsController;
    use App\Controllers\EducationController;
    
    use App\Routers\Router;
    
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    const VIEW_PATH = __DIR__ . './../Views';
    const STORAGE_PATH = __DIR__ . './../storage';

    $router = new Router();

    $router->get("/", [HomeController::class, 'index'])
              ->get("/News", [NewsController::class, 'index'])
              ->get("/Education", [EducationController::class, 'index']);
    

    (new App\App($router,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => strtolower($_SERVER['REQUEST_METHOD'])
    ],
    [
        'host' => $_ENV['DB_HOST'],
        'user' => $_ENV['DB_USER'],
        'database' => $_ENV['DB_NAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'driver' => $_ENV['DB_ENGINE'] ?? null
    ]))->run();

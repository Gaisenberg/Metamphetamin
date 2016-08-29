<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная страница</title>
    </head>
    <body>
    </body>
</html>

<?php
    ini_set('displey_errors', 1);
    error_reporting(E_ALL);
    
    
    define('ROOT', dirname(__FILE__));
    require_once (ROOT.'/components/Router.php');
    
    
    $router = new Router();
    $router->run();
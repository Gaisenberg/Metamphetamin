<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author Ден(R2-D2)
 */
class Router {
    private $routes;
    
    public function __construct() {
        $routesPath= ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
    }
    }

        public function run() {
           $uri = $this->getURI();
          
           
           foreach ($this->routes as $uriPattern =>$path){
               if(preg_match("`$uriPattern`",$uri)){
                   
                   $internalRoute = preg_replace("`$uriPattern`", $path, $uri);
                   
                   $seqment = explode('/', $internalRoute);
                   $controllerName = array_shift($seqment).'Controller';
                   $controllerName = ucfirst($controllerName);
                   
                   //получаем строку запроса в массиве
                   $actionName = 'action'.ucfirst(array_shift($seqment));
                   $parametres = $seqment;
                   
                   //var_dump($seqment);
                   
                   $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                   if (file_exists($controllerFile)){
                       include_once $controllerFile;
                   }
                   
                   $controllerObject = new $controllerName;
                   $result = call_user_func_array(array($controllerObject,$actionName), $parametres);
                   if ($result != null){
                       break;
                   }
                   
               }
           }
        }
      
    }


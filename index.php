<?php

define("WWW", __DIR__);
define("CORE", __DIR__  . '/vendor/core');
define("APP", __DIR__ . '/app');

 
$query = rtrim($_SERVER['QUERY_STRING'], '/');
require '/home/ubuntu/workspace/vendor/core/Router.php';
require '/home/ubuntu/workspace/vendor/libs/functions.php';
//require '/home/ubuntu/workspace/app/controllers/Home.php';
//require '/home/ubuntu/workspace/app/controllers/TestOne.php';

spl_autoload_register(function($class){
    $file = APP . "/controllers/$class.php";
    if (is_file($file)){
        require_once $file;
    }
});


Router::add('^$', ['controller' => 'Home', 'action' => 'index']);
Router::add('(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?');


Router::dispetch($query);


?>
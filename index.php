<?php

error_reporting(-1);
// Глобальные переменные
define("WWW", __DIR__);
define("CORE", __DIR__  . '/vendor/core');
define("APP", __DIR__ . '/app');

// Получение запроса 
$query = rtrim($_SERVER['QUERY_STRING'], '/');
// Подключение нужных файлов
require '/home/ubuntu/workspace/vendor/core/Router.php';
require '/home/ubuntu/workspace/vendor/libs/functions.php';
require CORE.'/base/baseController.php';
require CORE.'/base/View.php';

// Автоподключение файлов контроллеров
spl_autoload_register(function($class){
    $file = APP . "/controllers/$class.php";
    if (is_file($file)){
        require_once $file;
    }
});

// Правила роутера (прописываются допустимые пути и присваиваются переменные получаемые из query_string)
Router::add('^$', ['controller' => 'Home', 'action' => 'index']);
Router::add('^home$', ['controller' => 'Home', 'action' => 'index']);
Router::add('^(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)$');
Router::add('^get/(?P<action>[a-z0-9-]+)/?(?P<alias>[a-z0-9-]+)$', ['controller'=>'Get']);

// Запуск сонтроллера согласно запросу
Router::dispetch($query);

?>
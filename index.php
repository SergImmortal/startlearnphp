<?php


 
$query = rtrim($_SERVER['QUERY_STRING'], '/');
require '/home/ubuntu/workspace/vendor/core/Router.php';
require '/home/ubuntu/workspace/vendor/libs/functions.php';

Router::add('post/add', ['controller' => 'Post', 'action' => 'add']);
Router::add('post', ['controller' => 'Post', 'action' => 'index']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);
//printArray(Router::getRoutes());


if(Router::matchRoute($query)){
    printArray(Router::getRoute());
}else{
    echo '404';
};

?>
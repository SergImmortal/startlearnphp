<?php

class Router {
    
    
    protected static $routes = [];
    protected static $route = [];
    
    // Добавить правило валидации чпи url
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }
    
    public static function getRoutes() {
        return self::$routes;
    }
    public static function getRoute() {
        return self::$route;
    }
    
    // Валидация url и преобразование в асоциативный масив
    public static function matchRoute($url) {
        foreach(self::$routes as $pattern => $route) {
            if(preg_match("#$pattern#i", $url, $matches)) {
                foreach($matches as $key => $value){
                    if(is_string($key)){;
                        $route[$key] = $value;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::lowerCamelCase($route['action']) . 'Action';
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    
    // Запуск контроллеров и методов согласно запроса
    public static function dispetch($url){
        if(self::matchRoute($url)){
            $controller = self::$route['controller'];
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::$route['action'];
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }else{
                    echo "<br>У контроллера <b> $controller </b> отсутствует метод <b> $action </b>";
                }
            }else{
                echo "Контроллер <b> $controller </b> не найден";
            }
        }else{
           http_response_code(404);
           include '/home/ubuntu/workspace/public/404.html';
        };
    }
    
    // методы форматирования переменных
    protected static function upperCamelCase($name){
        return $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }
};

?>
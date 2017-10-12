<?php

abstract class Controller{
        
    public $route = [];
    public $view;
    public $vars = [];
    
    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];

    }
    
    public function getView(){
        $viewObj = new Views($this->route, $this->view);
        $viewObj->render($this->vars);
    }
    
    public function set($vars){
        $this->vars = $vars;
    }
};

?>
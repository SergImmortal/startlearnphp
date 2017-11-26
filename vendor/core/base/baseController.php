<?php

abstract class Controller{
        
    public $route = [];
    public $view;
    public $vars = [];
    public $loadStandartTemplate = true;
    
    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];

    }
    
    public function getView($param = null){
        if($param != null){
            $way_to_view = $param;
        }else{
            $way_to_view = $this->view;
        }
        $viewObj = new Views($this->route, $way_to_view,  $this->loadStandartTemplate);
        $viewObj->render($this->vars);
    }
    
    public function set($vars){
        $this->vars = $vars;
    }
    
    public function ajaxResponse($vars = []){
        echo json_encode($vars);
        
    }
};

?>
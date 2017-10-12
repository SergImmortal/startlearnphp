<?php
class Views{
    
    public $route = [];
    public $view;
    public $layout = [];
    
    
    public function __construct($route, $view = ''){
        $this->route = $route;
        $this->view = $view;
        
    }
    
    public function render($vars){
         if(is_array($vars)){
             extract($vars);
         }
         $file_way = APP . "/views/{$this->view}.php";
         if(is_file($file_way)){
             require $file_way;
         }else{
             echo 'Шаблон не найден';
         }
    }
};


?>
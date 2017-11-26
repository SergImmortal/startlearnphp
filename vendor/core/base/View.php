<?php
class Views{
    
    public $route = [];
    public $view;
    public $layout = [];
    public $loadTempl;
    
    
    public function __construct($route, $view = '', $loadTempl){
        $this->route = $route;
        $this->view = $view;
        $this->loadTempl = $loadTempl;
        
    }
    
    public function render($vars){
        $vars['way'] = $this->view;
         if(is_array($vars)){
             extract($vars);
         }
         if ($this->loadTempl == true){;
            $indexFile = WWW."/public/index.html";
            if(is_file($indexFile)){
                require $indexFile;
            }else{
                echo 'Шаблон не найден';
         } 
         }

    }
};


?>
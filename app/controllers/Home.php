<?php

class Home extends  Controller{
    

    public function indexAction(){
        // What we want do...

        $db = new SimpleDB('galleries');
        $data = $db->select('*');
        $this->set(['context'=> $data, 'pageName' => "Natasha Pozhdema"]);
        $this->getView();
        



        
    }
};

?>
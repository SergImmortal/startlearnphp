<?php

class Home extends  Controller{
    

    public function indexAction(){
        // What we want do...
        $db = new SimpleDB;
        $data = $db->select('*', 'galleries');
        $this->set(['context'=> $data]);
        



        
    }
};

?>
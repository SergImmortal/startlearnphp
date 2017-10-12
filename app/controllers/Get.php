<?php

class Get extends  Controller{
    

    public function galleryAction(){
        // What we want do...
        $alias = $this->route['alias'];
        $db = new SimpleDB;
        $data = $db->select('*', 'images', "WHERE targetGalleryTitle = '{$alias}'");
        $this->set(['context'=> $data]);

        



        
    }
};

?>
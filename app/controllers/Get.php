<?php

class Get extends  Controller{
    

    public function galleryAction(){
        // What we want do...
        $alias = $this->route['alias'];
        $valDb = new SimpleDB('galleries');
        $createdGallery = $valDb->select('galleryTitle');
        $metaTag = $valDb->select('galleryMetaTag', "WHERE galleryTitle = '{$alias}'" );
        $metaTag = $metaTag[0]['galleryMetaTag'];
        $arr = array();
        foreach($createdGallery as $value){
            $arr[$value['galleryTitle']] = 1;
        }
        if(isset($arr[$alias])){
            $db = new SimpleDB('images');
            $data = $db->select('*', "WHERE targetGalleryTitle = '{$alias}'");
            $this->set(['context'=> $data, 'pageName' => $alias, 'pageMeta' => $metaTag]);
            $this->getView();
        }else{
            http_response_code(404);
            include ER404;
        };
        



        
    }
};

?>
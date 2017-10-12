<?php

class Get extends  Controller{
    

    public function galleryAction(){
        // What we want do...
        $alias = $this->route['alias'];
        include CORE.'/sqlconnect.php';
        $query = "SELECT * FROM images WHERE targetGalleryTitle = '$alias'";
        $result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        };
        $this->set(['context'=> $data]);

        



        
    }
};

?>
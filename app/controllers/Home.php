<?php

class Home extends  Controller{
    

    public function indexAction(){
        // What we want do...
        include CORE.'/sqlconnect.php';
        $query = "SELECT * FROM galleries";
        $result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
             $data[] = $row;
             
        };
        $this->set(['context'=> $data]);
        



        
    }
};

?>
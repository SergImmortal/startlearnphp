<?php

class Admin extends  Controller{
    public function authorisationAction(){
        session_start();
    }
    public function resultAction(){
        session_start();
        include CORE.'/sqlconnect.php';
        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
                $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        };
        $data = $data[0];
        
        
        
        if ( !empty($_POST['password']) and !empty($_POST['login']) and md5($_POST['password']) == $data['password'] and md5($_POST['login']) == $data['username'] ){

            $_SESSION['authorized'] = true;
            $_SESSION['admin'] = $data['name'];
            echo $_SESSION['admin']. ' autorised!';
        }else{ 
            echo "<br> NO";
        };        
    }
};

?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<div>    

<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("/home/ubuntu/workspace/sqlconection.php");
$id = $_POST['selector'];

$query = "SELECT * FROM images WHERE title_g = '$id'";
         $result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
         $data = array();
         while($row = mysqli_fetch_assoc($result)){
             $data[] = $row;
         };
        
            foreach ($data as $value){
                echo '<img style = "height: 200px;" src ='.$value["way_to_image"].'>';
            };
?>
</div>
</body>
</html>

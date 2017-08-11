    <div id = "main">
        <div id = "galery">
            
        <?php 
        include_once "blocks/addgalery.php";
        include_once "blocks/addimage.php";
        include_once "sqlconection.php";
        ?>    
            
         <div id="results"></div><div>
         
         <?php
         $query = "SELECT * FROM images WHERE title_g = '23'";
         $result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));

         $data = array();
         while($row = mysqli_fetch_assoc($result)){
             $data[] = $row;
         };
        
            foreach ($data as $value){
                echo '<img style = "widht = 200px;" src ='.$value["way_to_image"].'>';

            };         
         ?>
         
         </div>
        <div id = "selectgaleryroom"></div>
    </div>
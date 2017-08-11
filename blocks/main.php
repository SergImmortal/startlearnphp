    <div id = "main">
        <div id = "galery">
            
        <?php 
        include_once "blocks/addgalery.php";
        include_once "blocks/addimage.php";
        include_once "sqlconection.php";
        ?>    
            
         <div id="results"></div><div>

        <form method = "POST" action = "vive.php">
        <p> Відобразити </p>
        <select name = 'selector'>
        <?php
            $query = "SELECT title_g FROM galeries";
            $result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
            $data = array();
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
                };
                foreach ($data as $value){
                echo "<option>". $value['title_g'] ."</option>";
                }
        ?>
        </select>
        <br>
        <button>ENTER</button>    
        </form>
         </div>
        <div id = "selectgaleryroom"></div>
    </div>
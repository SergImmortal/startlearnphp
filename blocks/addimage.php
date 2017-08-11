<br>
<br>
<form method = "POST" action = "addimm.php">
    <input type="text" name="imm_title" placeholder = "imm_title"/>
    <input type="text" name="way_imm" placeholder = "way_imm"/>
    <input type="text" name="galery" placeholder = "galery"/>
    <select>
        <?php

            include("/home/ubuntu/workspace/sqlconection.php");
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
    <input type="hidden" name="date" value="<?php echo date("m.d.Y"); ?>"/>
    <input type="text" name="authorimm" placeholder = "authorimm"/>
    <input type="text" name="descripimm" placeholder = "descripimm"/>
    <input type="text" name="metaimm" placeholder = "metaimm"/>
    <button>ENTER</button>
</form>
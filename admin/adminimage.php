<div class = 'photo_administration'>
<span> Додати фотографію </span>
<form method = "POST" action = "addimm.php" enctype = "multipart/form-data">
    <table>
    <tr><td><span>Назва фото:</span></td><td><input type="text" name="imm_title" placeholder = "imm_title"/></td></tr>
    <tr><td><span>фото:</span></td><td> <input type="file" name="way_imm" placeholder = "way_imm" /></tr>
    <tr><td><span>Галерея:</span></td><td> <select name = 'galery'>
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
    </select></td></tr>
    <input type="hidden" name="date" value="<?php echo date("m.d.Y"); ?>"/>
    <tr><td><span>Автор:</span></td><td> <input type="text" name="authorimm" placeholder = "authorimm"/></tr>
    <tr><td><span>Опис:</span></td><td> <input type="text" name="descripimm" placeholder = "descripimm"/></tr>
    <tr><td><span>Метатеги:</span></td><td> <input type="text" name="metaimm" placeholder = "metaimm"/></tr>
    </table>
    <button>ДОДАТИ</button>
</form>
</div>
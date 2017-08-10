<form method = "POST" action = "add.php">
    <input type="text" name="galery_title" placeholder = "galery_title"/>
    <input type="text" name="way_logo" placeholder = "way_logo"/>
    <input type="hidden" name="date" value="<?php echo date("m.d.Y"); ?>"/>
    <input type="text" name="author" placeholder = "author"/>
    <input type="text" name="descrip" placeholder = "descrip"/>
    <input type="text" name="meta" placeholder = "meta"/>
    <button>CLEAR</button>
    <button>ENTER</button>
</form>
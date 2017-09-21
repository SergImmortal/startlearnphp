<div class = 'galery_administration'>
<span> Додати галерею </span>
<form method = "POST" action = "add.php" enctype = "multipart/form-data">
    <table>
    <tr><td><span class = 'name'>Назва: </span></td><td><input type="text" name="galery_title" placeholder = "galery_title"/></td></tr>
    <tr><td><span class = 'name'>Логотип:</span></td><td><input type="file" name="way_logo" placeholder = "way_logo"/></td></tr>
    <tr><td><input type="hidden" name="date" value="<?php echo date("m.d.Y"); ?>"/></tr>
    <tr><td><span class = 'name'>Автор:</span></td><td><input type="text" name="author" placeholder = "author"/></td></tr>
    <tr><td><span class = 'name'>Опис: </span></td><td><input type="text" name="descrip" placeholder = "descrip"/></td></tr>
    <tr><td><span class = 'name'>Метатеги:</span></td><td><input type="text" name="meta" placeholder = "meta"/></td></tr>
    </table>
    <button>ДОДАТИ</button>
</form>
<div class = 'all_galery'>
    <?php ?>
</div>
</div>
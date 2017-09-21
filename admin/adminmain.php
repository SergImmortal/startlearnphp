<!DOCTYPE HTML>
<html>
    <head>
        <?php 
        $title = "Portfolio";
        require_once "/home/ubuntu/workspace/blocks/head.php";
        ?>
    </head>
    <body>
    
    <?php
    include_once "/home/ubuntu/workspace/admin/admin.php";
    if($_SESSION['authorized'] == true){
    include("/home/ubuntu/workspace/sqlconection.php");
    include_once "/home/ubuntu/workspace/admin/admnmenu.php";
    include_once "/home/ubuntu/workspace/admin/adminmassageblok.php";
    include_once "/home/ubuntu/workspace/admin/admingalery.php";
    include_once "/home/ubuntu/workspace/admin/adminimage.php";

    }else{
        echo 'error 404';
    };
    ?>
    </body>
</html>
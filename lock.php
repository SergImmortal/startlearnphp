<!DOCTYPE HTML>
<html>

<head>
    <?php 
    $title = "Portfolio";
    require_once "blocks/head.php";
    ?>
</head>

<body id = headlogin>
    
    
    <?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$u_name = "15f36dd473d9ff7ea78f23bf537a7f15";
$password = "9c8b1474d8057695ff2311a3591e8b38";


if ( !empty($_POST['password']) and !empty($_POST['login']) and md5($_POST['password']) == $password and md5($_POST['login']) == $u_name ){
    session_start();
    $_SESSION['authorized'] = true;
    echo $_SESSION['authorized'];
    sleep(5);
    header("Location: " . $_SERVER["HTTP_REFERER"] );
}else{ 
    echo "<br> NO";
};

?>

</body>


</html>


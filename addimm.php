<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("/home/ubuntu/workspace/sqlconection.php");

$image_title = strip_tags(trim($_POST['imm_title']));
$way_logo = strip_tags(trim($_POST['way_imm']));
$galery = strip_tags(trim($_POST['galery']));
$author = strip_tags(trim($_POST['authorimm']));
$descrip = strip_tags(trim($_POST['descripimm']));
$meta = strip_tags(trim($_POST['metaimm']));
$data = $_POST['date'];
$data = strval($data);

$query = "INSERT INTO images (image_title, way_to_image, title_g, date, author, description, meta) VALUES('$image_title', '$way_logo', '$galery', '$data', '$author', '$descrip', '$meta')";

$result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));


if($result){
    echo 'All good';
    sleep(5);
    header("Location: " . $_SERVER["HTTP_REFERER"] );
}else{
    echo 'UPS..';
};

mysqli_close($db);
?>    


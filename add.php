<?php 
include("/home/ubuntu/workspace/sqlconection.php");

$galery_title = strip_tags(trim($_POST['galery_title']));
$way_logo = strip_tags(trim($_POST['way_logo']));
$author = strip_tags(trim($_POST['author']));
$descrip = strip_tags(trim($_POST['descrip']));
$meta = strip_tags(trim($_POST['meta']));
$data = $_POST['date'];
$data = strval($data);
if (!empty($galery_title)){
$query = "INSERT INTO galeries(title_g, logo_image, author_g, description_g, meta_g, date_g) VALUES('$galery_title', '$way_logo', '$author', '$descrip', '$meta', '$data')";

$result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
};

if($result){
echo 'All good';
sleep(5);
header("Location: " . $_SERVER["HTTP_REFERER"] );
}else{
echo 'UPS..';
}

mysqli_close($db);
?>    


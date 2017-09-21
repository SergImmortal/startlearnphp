<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("/home/ubuntu/workspace/sqlconection.php");

$image_title = strip_tags(trim($_POST['imm_title']));
//$way_logo = strip_tags(trim($_POST['way_imm']));
$galery = strip_tags(trim($_POST['galery']));
$author = strip_tags(trim($_POST['authorimm']));
$descrip = strip_tags(trim($_POST['descripimm']));
$meta = strip_tags(trim($_POST['metaimm']));
$data = $_POST['date'];
$data = strval($data);
//-------------------------------------------------------------
// upload image
$file_path = $_FILES['way_imm']['tmp_name'];
$errorCode= $_FILES['way_imm']['error'];
if ($errorCode != UPLOAD_ERR_OK || !is_uploaded_file($file_path)) {
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE => 'Размер файла превышает допустимое значение',
        UPLOAD_ERR_FORM_SIZE => 'Размер файла превышает допустимое значение',
        UPLOAD_ERR_PARTIAL => 'Файл не полностью загрузился',
        UPLOAD_ERR_NO_FILE => 'Файл не был загружен',
        UPLOAD_ERR_NO_TMP_DIR => 'отсутствует временная папка',
        UPLOAD_ERR_CANT_WRITE => 'Не удалось сохранить файл',
        UPLOAD_ERR_EXTENSION => 'ПХП остановил загрузку файла',
        ];
    
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка';
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
    
    die($outputMessage);
};
// chek file to viruses
$fi = finfo_open(FILEINFO_MIME_TYPE);
$mime = (string) finfo_file($fi, $file_path);
if (strpos($mime, 'image') === false) die('You can upload only image');
$image = getimagesize($file_path);
$name = md5_file($file_path);
$extension = image_type_to_extension($image[2]);
$format = str_replace('jpeg', 'jpg', $extension);
$way_logo = '/home/ubuntu/workspace/img/photo/'.$galery.'/'.$name.$format;
// create dir to sawe image
$path_to_dir = '/home/ubuntu/workspace/img/photo/'.$galery;
if (is_dir($path_to_dir)) {
   echo "Это папка существует"; // если есть такая папка
} else {
       if (!mkdir($path_to_dir, 0755, true)) {
           die('folder doesnt created');
       };             // если нет такой папки
};

if(!move_uploaded_file($file_path, $way_logo)){
  die('Errore in writing file procces');  
};

// save info about galery in fdata base

//-------------------------------------------------------------
$query = "INSERT INTO images (image_title, way_to_image, title_g, date, author, description, meta) VALUES('$image_title', '$way_logo', '$galery', '$data', '$author', '$descrip', '$meta')";

$result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));


if($result){
    echo 'All good';
    sleep(2);
    header("Location: " . $_SERVER["HTTP_REFERER"] );
}else{
    echo 'UPS..';
};

mysqli_close($db);
?>    


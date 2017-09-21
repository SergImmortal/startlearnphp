
<?php 
include("/home/ubuntu/workspace/sqlconection.php");

$galery_title = strip_tags(trim($_POST['galery_title']));
//$way_logo = strip_tags(trim($_POST['way_logo']));
$author = strip_tags(trim($_POST['author']));
$descrip = strip_tags(trim($_POST['descrip']));
$meta = strip_tags(trim($_POST['meta']));
$data = $_POST['date'];
$data = strval($data);
// upload image
$file_path = $_FILES['way_logo']['tmp_name'];
$errorCode= $_FILES['way_logo']['error'];
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
$way_logo = '/home/ubuntu/workspace/img/galeries/'.$name.$format;
/*// create dir to sawe image

if (!mkdir('/img/galeries/', 0755, true)) {
    die('folder doesnt created');
};*/
if(!move_uploaded_file($file_path, $way_logo)){
  die('Errore in writing file procces');  
};

// save info about galery in fdata base
if (!empty($galery_title)){
$query = "INSERT INTO galeries(title_g, logo_image, author_g, description_g, meta_g, date_g) VALUES('$galery_title', '$way_logo', '$author', '$descrip', '$meta', '$data')";

$result = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
};

if($result){
echo 'All good';
sleep(2);
header("Location: " . $_SERVER["HTTP_REFERER"] );
}else{
echo 'UPS..';
}

mysqli_close($db);
?>    


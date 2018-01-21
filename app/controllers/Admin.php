<?php

class Admin extends  Controller{
    public function authorisationAction(){
        $this->set(['pageName' => 'Authorisation']);
        $this->getView();
    }
//надо посмотреть нужно ли оно    
    public function interfaceAction(){
            $db = new SimpleDB('galleries');
            $data = $db->select('*');
            $this->set(['pageName' => 'Admin Interface', 'context' => $data]);
            $this->getView('adminInterface');
    }
    
    public function resultAction(){
        $db = new SimpleDB('users');
        $data = $db->select('*');
        $data = $data[0];
        
        
        
        if ( !empty($_POST['password']) and !empty($_POST['login']) and md5($_POST['password']) == $data['password'] and md5($_POST['login']) == $data['username'] ){

            $_SESSION['authorized'] = true;
            $_SESSION['admin'] = $data['name'];
            $this->set(['pageName' => 'Admin Interface']);
//            $this->getView('adminInterface');
            header("Location: ".MYURL."/admin/interface");

        }else{
            session_destroy();
            echo "<br> incorrect login or password";
            $this->set(['pageName' => 'Authorisation']);
            $this->getView();
        }

    }
    
    public function changeSectionAction(){
        $data = ['gallery' => 'Galleries', 'massage' => 'Massage', 'tools' => 'List-tools'];
        $this->ajaxResponse($data);
    }
    
    public function toolsAction(){
        $data = ['Add galery' => 'add-gallery', 'Add image' => 'add-image'];
        $this->ajaxResponse($data);
    }    
    
    public function galleryAction(){
        $db = new SimpleDB('galleries');
        $data = $db->select('galleryTitle');
        $this->ajaxResponse($data);
    }
    public function getGalleryAction(){
        $galleries = new SimpleDB('galleries');
        $images = new SimpleDB('images');
        if(isset($_POST['value'])){
            $data = $_POST['value'];
        }
        $galleryData = $galleries->select('*', "WHERE galleryTitle = '{$data}'");
        $imagesData = $images->select('*', "WHERE targetGalleryTitle = '{$data}'");
        $response = ['aboutimage' => $imagesData, 'aboutgallery' => $galleryData];
        $this->ajaxResponse($response);
    }
    public function addImageAction(){
        // Получаем данные формы
        $image_title = strip_tags(trim($_POST['imageTitle']));
        $author = strip_tags(trim($_POST['imageAuthor']));
        $galery = strip_tags(trim($_POST['targetGalleryTitle']));
        $descrip = strip_tags(trim($_POST['imageDescription']));
        $meta = strip_tags(trim($_POST['imageMetaTag']));
        $date = date("Y-m-d H:i:s");
        //обрабатываем полученный файл
        $g_folder = str_replace(' ', '_', $galary);
        $file_path = $_FILES['file']['tmp_name'];
        
        $fi = finfo_open(FILEINFO_MIME_TYPE);
        $mime = (string) finfo_file($fi, $file_path);
        if (strpos($mime, 'image') === false){
            $response = ['response' => 'Upload file error 1'];
            $this->ajaxResponse($response);            
        }else{
        $image = getimagesize($file_path);
        $name = md5_file($file_path);
        $extension = image_type_to_extension($image[2]);
        $format = str_replace('jpeg', 'jpg', $extension);
        
        $way_logo = '/home/ubuntu/workspace/img/photo/'.$g_folder.'/'.$name.$format;
        // create dir to sawe image
        $path_to_dir = '/home/ubuntu/workspace/img/photo/'.$g_folder;
        if (is_dir($path_to_dir)) {
            if(!move_uploaded_file($file_path, $way_logo)){
                $response = ['response' => 'Upload file error 2'];
                $this->ajaxResponse($response);  
            };
        } else {
                if (!mkdir($path_to_dir, 0755, true)) {
                    $response = ['response' => 'Upload file error 3'];
                    $this->ajaxResponse($response);
               }else{
                    if(!move_uploaded_file($file_path, $way_logo)){
                        $response = ['response' => ' Upload file error 4'];
                        $this->ajaxResponse($response);  
                    };                   
               }
        };
        $db = new SimpleDB('images');
        $array = [
            'imageTitle' => $image_title,
            'wayToImage' => $way_logo,
            'targetGalleryTitle' => $galery,
            'imageDescription' => $descrip,
            'imageAuthor' => $author,
            'imageMetaTag' => $meta,
            'imageCreatedDate' => $date
            ];
        $status = $db->insert($array);
        $response = ['response' => $g_folder.' Зображення додано!!!'];
        $this->ajaxResponse($response);
        }
        
    }
    
    public function updateImageAction(){
        
    }    
    public function delImageAction(){
        
    }   
        // Создание новой галереи
    public function addGalleryAction(){
        // Получаем данные формы
        $galery_title = strip_tags(trim($_POST['galery_title']));
        $author = strip_tags(trim($_POST['author']));
        $descrip = strip_tags(trim($_POST['descrip']));
        $meta = strip_tags(trim($_POST['meta']));
        $date = date("Y-m-d H:i:s");
        //обрабатываем полученный файл
        $file_path = $_FILES['file']['tmp_name'];

        $fi = finfo_open(FILEINFO_MIME_TYPE);
        $mime = (string) finfo_file($fi, $file_path);
        if (strpos($mime, 'image') === false){
            $response = ['response' => 'Ошибка'];
            $this->ajaxResponse($response);            
        }else{
        $image = getimagesize($file_path);
        $name = md5_file($file_path);
        $extension = image_type_to_extension($image[2]);
        $format = str_replace('jpeg', 'jpg', $extension);
        $way_logo = '/home/ubuntu/workspace/img/g_logo/'.$name.$format;
        if(!move_uploaded_file($file_path, $way_logo)){
            $response = ['response' => 'Ошибка во время записи файла'];
            $this->ajaxResponse($response);  
        };
        $db = new SimpleDB('galleries');
        $array = [
            'galleryTitle' => $galery_title,
            'galleryLogoImage' => $way_logo,
            'galleryDescription' => $descrip,
            'galleryAuthor' => $author,
            'galleryMetaTag' => $meta,
            'galleryCreatedTime' => $date
            ];
        $status = $db->insert($array);
        $response = ['response' => $status.' Галерею створено!!!'];
        $this->ajaxResponse($response);
        };
    }
    public function updateGalleryAction(){
        
    }    
    public function delGalleryAction(){
        
    }

    }
?>
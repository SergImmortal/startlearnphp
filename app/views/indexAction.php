
<?php
    
 //   printArray($context);
    
    foreach ($context as $value) {
        $alias = 'https://startlearnphp-maksis.c9users.io/get/gallery/'.$value['galleryTitle'];
        echo ("<a href = {$alias}><div style = 'text-align: center; >
            <p style = 'text-align: center;' ><b>{$value['galleryTitle']}</b></p>
            <img style = 'width: 200px;' src = {$value['galleryLogoImage']}>
            </div></a>"
        );
    }

            
?>
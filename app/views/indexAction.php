
<?php
    
 //   printArray($context);
    
    foreach ($context as $value) {
        $test = str_replace(' ', '-', $value['galleryTitle']);
        $alias = 'https://startlearnphp-maksis.c9users.io/get/gallery/'. $test;
        $src = substr($value['galleryLogoImage'], 22);
        echo ("<a href = {$alias}><div style = 'text-align: center; float: left;' >
            <p style = 'text-align: center;' ><b>{$value['galleryTitle']}</b></p>
            <img style = 'width: 200px;' src = {$src}>
            </div></a>"
        );
    }

$s = 'ff sss dd ff';
$d_f = str_replace(' ', '-', $s);
echo($d_f);

?>
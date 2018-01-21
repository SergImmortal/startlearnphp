
<?php
    
    foreach ($context as $value) {
        $src = substr($value['wayToImage'], 22);
        echo ("<div style = 'text-align: center;>
            <p style = 'text-align: center;' ><b>{$value['imageTitle']}</b></p>
            <img style = 'width: 200px;' src = {$src}>
            </div>"
        );
    }
?>

<?php
    
    foreach ($context as $value) {

        echo ("<div style = 'text-align: center;>
            <p style = 'text-align: center;' ><b>{$value['imageTitle']}</b></p>
            <img style = 'width: 200px;' src = {$value['wayToImage']}>
            </div>"
        );
    }
?>
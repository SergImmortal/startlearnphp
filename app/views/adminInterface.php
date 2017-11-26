<?php
if (!isset($_SESSION['admin']) and $_SESSION['authorized'] != true){
    header("Location: ".MYURL);
}else{
    echo $_SESSION['admin'];
    
};
?>

<script type="text/javascript" src="/public/js/adminpanel.js"></script>
<?php
    $int = 86400 * 7; //7 days
    setcookie('name','',time()-$int,'/'); 
    echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
?>
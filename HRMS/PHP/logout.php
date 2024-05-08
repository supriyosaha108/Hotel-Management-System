<?php
if(isset($_COOKIE['HRMS101'])) { 
    setcookie('HRMS101', "" ,time() - 3600, "/"); 
    echo "Logging out...";
    header( "refresh:0.5;url='../index.php'" );
}
else {
    echo "<h3>Invalid Request.<h3>";
}
?>
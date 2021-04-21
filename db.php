<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = 'quiz';
    $con=mysqli_connect($servername,$username,$password,$dbname);

    $servername2='localhost';
    $username2='root';
    $password2='';
    $dbname2 = 'simp1';
    $con2=mysqli_connect($servername2,$username2,$password2,$dbname2);

 if(!$con){die('Could not Connect MySql Server :' .mysql_error());}
 if(!$con2){die('Could not Connect MySql Server simp1:' .mysql_error());}
?>
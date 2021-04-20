<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = 'quiz';
    $conn=mysqli_connect($servername,$username,$password,$dbname);

    $servername2='localhost';
    $username2='root';
    $password2='';
    $dbname2 = 'simp1';
    $con2=mysqli_connect($servername2,$username2,$password2,$dbname2);

 if(!$conn){die('Could not Connect MySql Server quiz:' .mysql_error());}
 if(!$con2){die('Could not Connect MySql Server simp1:' .mysql_error());}
?>
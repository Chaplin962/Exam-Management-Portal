<?php
    //Offline Development
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

    //remote server deployment
    /*$servername='remotemysql.com';
    $username='Jo8QJ7efP6';
    $password='6OXTq1ZOQ2';
    $dbname = 'Jo8QJ7efP6';
    $con=mysqli_connect($servername,$username,$password,$dbname);

    $servername2='remotemysql.com';
    $username2='Jo8QJ7efP6';
    $password2='6OXTq1ZOQ2';
    $dbname2 = 'Jo8QJ7efP6';
    $con2=mysqli_connect($servername2,$username2,$password2,$dbname2);*/

 if(!$con){die('Could not Connect MySql Server :' .mysql_error());}
 if(!$con2){die('Could not Connect MySql Server simp1:' .mysql_error());}
?>

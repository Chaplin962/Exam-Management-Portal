<?php
include_once 'db.php';  

    session_start();    

    if(isset($_POST['home'])) {
        header("Location: index.php");
    }
    if(isset($_POST['your_profile'])) {
        header("Location: profile.php");
    }
    if(isset($_POST['signout'])) {
        $email = $_SESSION['email'];
        mysqli_query($con2,"UPDATE user_sign set signstatus=0 WHERE email='" . $email . "'");
        session_destroy();
        session_start();
    }

    if(!isset($_SESSION['sign'])) {
        header("Location: SignIn.php");
    }

    if(isset($_POST['addadmin'])) {
        $email = $_POST['email'];
        if($email!="") {
            $query = "Select * FROM admin_list WHERE email='$email'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)==0) {
                $query = "INSERT INTO admin_list (email) VALUES ('$email')";
                mysqli_query($con2, $query);            
            }
        }
    }
    if(isset($_POST['removeadmin'])) {        
        $email = $_POST['email'];
        if($email!="") {
            $query = "Select * FROM admin_list WHERE email='$email'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)!=0) {
                $query = "DELETE FROM admin_list WHERE email = '$email'";    
                $query2 = "DELETE FROM user_sign WHERE email = '$email'";         
                mysqli_query($con2, $query);
                mysqli_query($con2, $query2);            
            }
        }      
    }
    if(isset($_POST['addstudent'])) {
        $email = $_POST['email'];
        if($email!="") {
            $student_id = $_POST['student_id'];
            $query = "Select * FROM student_list WHERE email='$email'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)==0) {
                $query = "INSERT INTO student_list (email, student_id) VALUES ('$email', '$student_id')";
                mysqli_query($con2, $query);            
            }
        }      
    }
    if(isset($_POST['removestudent'])) {        
        $email = $_POST['email'];        
        $student_id = $_POST['student_id'];
        if($email!="") {
            $query = "Select * FROM student_list WHERE email='$email'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)!=0) {
                $query = "DELETE FROM student_list WHERE email = '$email'";
                $query2 = "DELETE FROM user_sign WHERE email = '$email'";       
                mysqli_query($con2, $query);
                mysqli_query($con2, $query2);            
            }
        }
        else if($student_id!="") {
            $query = "Select * FROM student_list WHERE student_id='$student_id'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)!=0) {
                $query = "DELETE FROM student_list WHERE student_id = '$student_id'";        
                mysqli_query($con2, $query);            
            }
        }
              
    }
    if(isset($_POST['addteacher'])) {
        $email = $_POST['email'];
        if($email!="") {
            $query = "Select * FROM teacher_list WHERE email='$email'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)==0) {
                $query = "INSERT INTO teacher_list (email) VALUES ('$email')";
                mysqli_query($con2, $query);            
            }
        }      
    }
    if(isset($_POST['removeteacher'])) {        
        $email = $_POST['email'];
        if($email!="") {
            $query = "Select * FROM teacher_list WHERE email='$email'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)!=0) {
                $query = "DELETE FROM teacher_list WHERE email = '$email'";  
                $query2 = "DELETE FROM user_sign WHERE email = '$email'";           
                mysqli_query($con2, $query);           
                mysqli_query($con2, $query2);       
            }
        }   
    }
?>

<?php
include "navbar.php";
?>

<!-- Title bar -->
<title>Home | EMP</title>

<?php if($_SESSION['role']=='Student') {
    $courses_array = array();
    $email = $_SESSION['email'];
    $query = "Select * FROM student_list WHERE email='$email'";
    $result = mysqli_query($con2, $query);
    if(mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_array($result);
        $courses_no = $row['courses_no'];
        for($i=1;$i<=9;$i++) {                   
            array_push($courses_array, $row["course_".$i]);
        }      
    }    
}
?>

<?php 
    if($_SESSION['role']=='Admin') include "admin.php";
    if($_SESSION['role']=='Teacher'){header('Location:teacher.php?q=8');}
    if($_SESSION['role']=='Student'){header('Location:tests-s.php');}
?>
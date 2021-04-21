<?php 
include_once 'db.php';

    session_start();    

    if(isset($_POST['signout'])) {
        session_destroy();
        session_start();
    }

    if(!isset($_SESSION['sign'])) {
        header("Location: SignIn.php");
    }

    if(isset($_POST['addadmin'])) {
        $email = $_POST['email'];
        $query = "Select * FROM admin_list WHERE email='$email'";
        $result = mysqli_query($con2, $query);
        if(mysqli_num_rows($result)==0) {
            $query = "INSERT INTO admin_list (email) VALUES ('$email')";
            mysqli_query($con2, $query);            
        }       
    }
    if(isset($_POST['removeadmin'])) {        
        $email = $_POST['email'];
        $query = "Select * FROM admin_list WHERE email='$email'";
        $result = mysqli_query($con2, $query);
        if(mysqli_num_rows($result)!=0) {
            $query = "DELETE FROM admin_list WHERE email = '$email'";            
            mysqli_query($con2, $query);            
        }       
    }
    if(isset($_POST['addstudent'])) {
        $email = $_POST['email'];
        $query = "Select * FROM student_list WHERE email='$email'";
        $result = mysqli_query($con2, $query);
        if(mysqli_num_rows($result)==0) {
            $query = "INSERT INTO student_list (email) VALUES ('$email')";
            mysqli_query($con2, $query);            
        }       
    }
    if(isset($_POST['removestudent'])) {        
        $email = $_POST['email'];
        $query = "Select * FROM student_list WHERE email='$email'";
        $result = mysqli_query($con2, $query);
        if(mysqli_num_rows($result)!=0) {
            $query = "DELETE FROM student_list WHERE email = '$email'";            
            mysqli_query($con2, $query);            
        }       
    }
    if(isset($_POST['addteacher'])) {
        $email = $_POST['email'];
        $query = "Select * FROM teacher_list WHERE email='$email'";
        $result = mysqli_query($con2, $query);
        if(mysqli_num_rows($result)==0) {
            $query = "INSERT INTO teacher_list (email) VALUES ('$email')";
            mysqli_query($con2, $query);            
        }       
    }
    if(isset($_POST['removeteacher'])) {        
        $email = $_POST['email'];
        $query = "Select * FROM teacher_list WHERE email='$email'";
        $result = mysqli_query($con2, $query);
        if(mysqli_num_rows($result)!=0) {
            $query = "DELETE FROM teacher_list WHERE email = '$email'";            
            mysqli_query($con2, $query);            
        }       
    }
?>

<?php
include_once 'db.php';
include "navbar.php";
?>
<!-- Title bar -->
<title>Home | Simp</title>
<link rel = "icon" type = "image/png" href = "stock/logo.png">

<p>Signed In as - <?php echo $_SESSION['email']; ?> </p>
<p>Role - <?php echo $_SESSION['role']; ?> </p>

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
    $_SESSION['courses_no'] = $courses_no;
    $_SESSION['courses_array'] = $courses_array;
    header('Location:tests-s.php');
}
?>
<?php if($_SESSION['role']=='Teacher'){header('Location:teacher.php?q=8');}?>
<?php if($_SESSION['role']=='Admin') : ?>
    <hr>
    <h3>Admin List</h3>    
    <?php
        $query = "Select * FROM admin_list WHERE 1=1";
        $result = mysqli_query($con2, $query);
        while($row = mysqli_fetch_array($result)) echo($row['email']."<br>");
    ?>
    <br><hr>
    <h3>Student List</h3>    
    <?php
        $query = "Select * FROM student_list WHERE 1=1";
        $result = mysqli_query($con2, $query);
        while($row = mysqli_fetch_array($result)) echo($row['email']."<br>");
    ?>
    <br><hr>
    <h3>Teacher List</h3>    
    <?php
        $query = "Select * FROM teacher_list WHERE 1=1";
        $result = mysqli_query($con2, $query);
        while($row = mysqli_fetch_array($result)) echo($row['email']."<br>");
    ?>
    <br><hr>
    <form method="post" action="index.php">
        <br> 
        <div>
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <br> 
        <div>
            <button type="submit" name="addadmin">Add Admin</button>
            <button type="submit" name="removeadmin">Remove Admin</button>
        </div>
        <br>    
        <div>
            <button type="submit" name="addstudent">Add Student</button>
            <button type="submit" name="removestudent">Remove Student</button>
        </div>
        <br> 
        <div>
            <button type="submit" name="addteacher">Add Teacher</button>
            <button type="submit" name="removeteacher">Remove Teacher</button>
        </div>  
    </form>
<?php endif; ?>
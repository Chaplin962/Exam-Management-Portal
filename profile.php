<?php
include_once 'db.php';
session_start();

$errors = array();

$flag = 0;

$email = $_SESSION['email'];
$query = "SELECT * FROM user_sign WHERE email='$email'";
$result = mysqli_query($con2, $query);
$row = mysqli_fetch_assoc($result);
$password = $row['password'];
$_SESSION['password'] = $password;
if($_SESSION['role']=='Admin') $query = "SELECT * FROM admin_list WHERE email='$email'";
if($_SESSION['role']=='Teacher') $query = "SELECT * FROM teacher_list WHERE email='$email'";
if($_SESSION['role']=='Student') $query = "SELECT * FROM student_list WHERE email='$email'";
$role=$_SESSION['role'];
$result = mysqli_query($con2, $query);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$_SESSION['name'] = $name;
if($_SESSION['role']=='Student') {
  $student_id = $row['student_id'];
  $_SESSION['student_id'] = $student_id;  
  $courses_no = $row['courses_no'];
}


if(isset($_POST['change_name'])) {
  $flag = 1;
  if($_SESSION['role']=='Admin') mysqli_query($con2,"UPDATE admin_list set name='" . $_POST['name'] . "' WHERE email='" . $email . "'");
  if($_SESSION['role']=='Teacher') mysqli_query($con2,"UPDATE teacher_list set name='" . $_POST['name'] . "' WHERE email='" . $email . "'");
  if($_SESSION['role']=='Student') mysqli_query($con2,"UPDATE student_list set name='" . $_POST['name'] . "' WHERE email='" . $email . "'");  
  unset($_POST['change_name']);
}

//if(isset($_FILES['image'])) {
if(isset($_POST["upload"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename( $_FILES['image']['name'] );
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES['image']["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if(isset($_POST['change_password'])) {
  if($_POST['new_password'] == $_POST['confirm_password']) {
    $flag = 1;
    mysqli_query($con2,"UPDATE user_sign set password='" . md5($_POST['new_password']) . "' WHERE email='" . $email . "'");   
    unset($_POST['change_password']);
  }
  else {
    array_push($errors, "Passwords don't match.");
  }
}
if(isset($_POST['add_course'])) {
  $flag = 1;
  $courses_no = $courses_no +1;
  mysqli_query($con2,"UPDATE student_list set courses_no='" . $courses_no . "' WHERE student_id='" . $student_id . "'");
  mysqli_query($con2,"UPDATE student_list set course_".$courses_no." = '" . $_POST['course_name'] . "' WHERE student_id='" . $student_id . "'");
  unset($_POST['add_course']);
}
if($_SESSION['role']=='Student') {
  for($i=1;$i<=$courses_no;$i++) {
    if(isset($_POST['remove_course_'.$i])) {
      $flag = 1;
      $courses_no = $courses_no - 1;
      mysqli_query($con2,"UPDATE student_list set courses_no='" . $courses_no . "' WHERE student_id='" . $student_id . "'");
      mysqli_query($con2,"UPDATE student_list set course_".$i." = '' WHERE student_id='" . $student_id . "'");
      unset($_POST['remove_course_'.$i]);
      for($j=$i;$j<=8;$j++) {
        mysqli_query($con2,"UPDATE student_list set course_".$j." = '".$row['course_'.($j+1)]."' WHERE student_id='" . $student_id . "'");      
      }
      mysqli_query($con2,"UPDATE student_list set course_".$j." = '' WHERE student_id='" . $student_id . "'");
    }
  }
}

if($flag == 1) {
  $email = $_SESSION['email'];  
  $query = "SELECT * FROM user_sign WHERE email='$email'";
  $result = mysqli_query($con2, $query);
  $row = mysqli_fetch_assoc($result);
  $password = $row['password'];
  $_SESSION['password'] = $password;  
  if($_SESSION['role']=='Admin') $query = "SELECT * FROM admin_list WHERE email='$email'";
  if($_SESSION['role']=='Teacher') $query = "SELECT * FROM teacher_list WHERE email='$email'";
  if($_SESSION['role']=='Student') $query = "SELECT * FROM student_list WHERE email='$email'";
  $role=$_SESSION['role'];
  $result = mysqli_query($con2, $query);
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $_SESSION['name'] = $name;  
  if($_SESSION['role']=='Student') {
    $student_id = $row['student_id'];
    $_SESSION['student_id'] = $student_id;    
    $courses_no = $row['courses_no'];
  }  
}

?>


<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="author" content="Codeconvey" />
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<link rel='stylesheet' href='css/bootstrap.min.css'>

<!--Only for demo purpose - no need to add.-->
<link rel="stylesheet" href="css//demo.css" />

<link rel="stylesheet" href="css//style.css">

<?php
include "navbar.php";
?>
<!-- Title bar -->
<title>Profile | Simp</title>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1 id="head">Profile</h1>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">

<!-- Student Profile -->

<div class="student-profile py-4">
  <div class="container">
    <div class="row">
    <div class="col-lg-4">
        <div class="card shadow-sm">
        <div class="card-header bg-transparent text-center">
            <?php if($_SESSION['role']=='Student') : ?>
            <img class="profile_img" src="stock/student.jpg" alt="student dp">
            <?php endif; ?>  
            <?php if($_SESSION['role']=='Teacher') : ?>
            <img class="profile_img" src="stock/teacher.jpg" alt="student dp">
            <?php endif; ?>  
            <?php if($_SESSION['role']=='Admin') : ?>
            <img class="profile_img" src="stock/admin.jpg" alt="student dp">
            <?php endif; ?> 
            <h3><?php echo $name; ?></h3>
          </div>
          
          <div class="card-body">
            <?php if($_SESSION['role']=='Student') : ?>
            <p class="mb-0"><strong class="pr-1">Student ID &nbsp;:</strong><?php echo " ".$student_id; ?></p>
            <?php endif; ?>            
          </div>
        </div>        
      </div>
      <form class="col-lg-8" method="post" action="profile.php">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <?php if($_SESSION['role']=='Student') : ?>
              <tr>
                <th width="30%">Student ID</th>
                <td width="2%">:</td>
                <td><div class="input_boxes"> <?php echo $student_id; ?></div></td>               
              </tr>
              <?php endif; ?>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><div class="input_boxes"> <?php echo $email; ?></div></td>                              
              </tr>
              <tr>
                <th width="30%">Role</th>
                <td width="2%">:</td>
                <td><div class="input_boxes"> <?php echo $role; ?></div></td>                              
              </tr>  
              <tr>
                <th width="30%">Name	</th>
                <td width="2%">:</td>
                <td><input name="name" class="input_boxes" value = "<?php echo $name;?>" ></td>
                <td><button type="submit" name="change_name" class="change_buttons">Change</button></td>
              </tr>              

              <tr>
                <th width="30%">New Password	</th>
                <td width="2%">:</td>
                <td><input name="new_password" type="password" class="input_boxes" ></td>                
              </tr>

              <tr>
                <th width="30%">Confirm Password	</th>
                <td width="2%">:</td>
                <td><input name="confirm_password" type="password" class="input_boxes" ></td>
                <td><button type="submit" name="change_password" class="change_buttons">Change</button></td>
              </tr>             

              <div id="signin_errors_container">
                <?php foreach($errors as $error) : ?>
                    <div class="signin_errors"><?php echo $error; ?></div>                    
                <?php endforeach; ?>
              </div>
                         

            </table>
          </div>
        </div>
        <?php if($_SESSION['role']=='Student') : ?>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Courses</h3>
          </div>
          <div class="card-body pt-0">
          <table class="table table-bordered">                                  
              <tr>
                <th width="30%">No of Courses</th>
                <td width="2%">:</td>
                <td><?php echo $courses_no ?></td>
              </tr>
              <tr>
                <th width="30%">Course Name	</th>
                <td width="2%">:</td>
                <td><input type="text" name="course_name" placeholder="Enter Course name" class="input_boxes"></td>
                <td><button type="submit" name="add_course" class="change_buttons">Add Course</button></td>
              </tr>
              <?php for($i=1;$i<=$courses_no;$i++) : ?>
                <tr>
                <th width="30%">Course <?php echo "$i"; ?></th>
                <td width="2%">:</td>
                <td><?php echo $row['course_'.$i] ?></td>
                <td><button type="submit" name="<?php echo "remove_course_".$i; ?>" class="change_buttons">Remove Course</button></td>
                </tr>
              <?php endfor; ?>
            </table>
          </div>
        </div>
        <?php endif ?>
      </form>
    </div>
  </div>
</div>
<!-- partial -->

    		</div>
		</div>
    </div>
</section>



    <!-- Analytics -->
<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'simp1');

$email = $_SESSION['email'];
$query = "SELECT * FROM student_list WHERE email='$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$student_id = $row['student_id'];
$_SESSION['STUDENT_ID'] = $student_id;
$name = $row['name'];
$_SESSION['name'] = $name;
$courses_no = $row['courses_no'];


if(isset($_POST['change_name'])) {
  mysqli_query($db,"UPDATE student_list set name='" . $_POST['name'] . "' WHERE student_id='" . $student_id . "'");
  unset($_POST['change_name']);
}
if(isset($_POST['add_course'])) {  
  $courses_no = $courses_no +1;
  mysqli_query($db,"UPDATE student_list set courses_no='" . $courses_no . "' WHERE student_id='" . $student_id . "'");
  mysqli_query($db,"UPDATE student_list set course_".$courses_no." = '" . $_POST['course_name'] . "' WHERE student_id='" . $student_id . "'");
  unset($_POST['add_course']);
}
for($i=1;$i<=$courses_no;$i++) {
  if(isset($_POST['remove_course_'.$i])) {  
    $courses_no = $courses_no - 1;
    mysqli_query($db,"UPDATE student_list set courses_no='" . $courses_no . "' WHERE student_id='" . $student_id . "'");
    mysqli_query($db,"UPDATE student_list set course_".$i." = '-' WHERE student_id='" . $student_id . "'");
    unset($_POST['remove_course_'.$i]);
    for($j=$i;$j<=8;$j++) {
      mysqli_query($db,"UPDATE student_list set course_".$j." = '".$row['course_'.($j+1)]."' WHERE student_id='" . $student_id . "'");      
    }
    mysqli_query($db,"UPDATE student_list set course_".$j." = '-' WHERE student_id='" . $student_id . "'");
  }
}

$email = $_SESSION['email'];
$query = "SELECT * FROM student_list WHERE email='$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$student_id = $row['student_id'];
$_SESSION['STUDENT_ID'] = $student_id;
$name = $row['name'];
$_SESSION['name'] = $name;
$courses_no = $row['courses_no'];
?>


<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="author" content="Codeconvey" />
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<link rel='stylesheet' href='css/bootstrap.min.css'>

<!--Only for demo purpose - no need to add.-->
<link rel="stylesheet" href="css/demo.css" />

<link rel="stylesheet" href="css//style.css">

<!-- Adobe fonts -->
<link rel="stylesheet" href="https://use.typekit.net/oyy6bsf.css">

<!-- jQuery files include -->
<script src="effectFiles\jQuery\jQuery compressed.js"></script>
<script src="effectFiles\jQuery\jquery-ui.js"></script>
<script src="effectFiles\jQuery\jQuery ease1.js"></script>
<script src="effectFiles\jQuery\jQuery ease2.js"></script>

<!-- Javascript file -->
<script type="text/javascript" src="effectFiles//effect.js"></script>

<!-- Title bar -->
<title>Profile | SIMP</title>
<link rel = "icon" type = "image/png" href = "stock/logo.png">

<div id="navbar">
    <img src="stock/logo.png" id="navbar-logo">
    <p id="navbar-simp">SIMP</p>
    <div id="navbar-profile">
		<p id="navbar-arrow"><i id="navbar-arrow-control"></i></p>
		<img src="stock/dp.jpeg" id="navbar-dp">
	</div>
</div>
<div id="side-bar">		
	<a href="profile.php" class="side-bar-texts">Your profile</a>
	<a href="tests-s.php" class="side-bar-texts">Tests</a>
    <form method="post" action="index.php">    
    <div>
        <button type="submit" class="side-bar-texts" name="signout">Sign Out</button>
    </div> 
</form>	
</div>





<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1 id="head">Student Profile</h1>
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
            <img class="profile_img" src="stock/dp.jpeg" alt="student dp">
            <h3><?php echo $name; ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID &nbsp;:</strong><?php echo " ".$student_id; ?></p>
            
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
              <tr>
                <th width="30%">Student ID</th>
                <td width="2%">:</td>
                <td><div class="input_boxes"> <?php echo $student_id; ?></div></td>                 
              </tr>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><div class="input_boxes"> <?php echo $email; ?></div></td>                              
              </tr>         
              <tr>
                <th width="30%">Name	</th>
                <td width="2%">:</td>
                <td><input name="name" class="input_boxes" value = " <?php echo $name;?>" ></td>
                <td><button type="submit" name="change_name" class="change_buttons">Change</button></td>
              </tr>                      
            </table>
          </div>
        </div>
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
                <th width="30%">No of Courses</th>
                <td width="2%">:</td>
                <td><?php echo $row['course_'.$i] ?></td>
                <td><button type="submit" name="<?php echo "remove_course_".$i; ?>" class="change_buttons">Remove Course</button></td>
              </tr>
              <?php endfor; ?>
            </table>
          </div>
        </div>
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
<!DOCTYPE html>
<html>
<head>
<?php
include_once 'db.php';
session_start();

$email = $_SESSION['email'];
$query = "SELECT * FROM student_list WHERE email='$email'";
$result = mysqli_query($con2, $query);
$row = mysqli_fetch_assoc($result);
$student_id = $row['student_id'];
$name = $row['name'];
$courses_no = $row['courses_no'];?>

	<!-- Compating different devices and applicatons -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<!-- Title bar -->
	<title>Tests &nbsp;|&nbsp; EMP</title>
	<link rel = "icon" type = "image/png" href = "stock/logo.png">

	<!-- Style sheet -->
	<link rel="stylesheet" type="text/css" href="z-style.css" />

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins|Grenze Gotisch|Raleway|PT Sans Narrow|Dosis|Staatliches|Lobster|Abel|Overpass|Abril Fatface|Acme|Fira Sans Condensed|Oswald|Open Sans|Rowdies|Anton|Righteous|Alfa Slab One|Francois One|Archivo Black|Passion One|Oleo Script|Monoton|Candal|Carter One|Black Ops One|Racing Sans One|Palanquin Dark|Rakkas|Skranji|Timmana|Styles|Plaster|Roboto+Condensed:wght@700&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Syncopate&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">

	<!-- Adobe fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/wur3dcn.css">

	<!-- jQuery files include -->
	<script src="jQuery\jQuery compressed.js"></script>
	<script src="jQuery\jquery-ui.js"></script>
	<script src="jQuery\jQuery ease1.js"></script>
	<script src="jQuery\jQuery ease2.js"></script>

	<!-- Javascript file -->
	<script type="text/javascript" src="z-effect.js"></script>

</head>

<body class="current-page" id="tests">
	<div id="navbar">
		<p id="navbar-simp">Examination Management Portal</p>

		<div id="navbar-profile">
			<p id="navbar-arrow"><i id="navbar-arrow-control"></i></p>
			<img src="stock/student.jpg" id="navbar-dp"> 
		</div>

		<a href="tests-s.php" class="navbar-menus" id="navbar-tests"><p class="navbar-menus-text" id="navbar-tests-text">Tests</p><div class="navbar-menus-border" id="navbar-tests-border"></div></a>		

		<div id="navbar-menubut">
  			<div class="bar1"></div>
  			<div class="bar2"></div>
  			<div class="bar3"></div>
		</div>
		<div id="navbar-menubut-2">
  			<div class="bar1"></div>
  			<div class="bar2"></div>
  			<div class="bar3"></div>
		</div>
	</div>

	<div id="side-bar">		
		<div id="side-profile-bar">
			<a href="profile.php" class="side-profile-bar-texts">Your profile</a>
          <form method="post" action="index.php">    
			<button type="submit" class="side-bar-texts" name="signout">Sign Out</button></form>
		</div>
		<div id="side-menu-bar">
			<a href="tests-s.php" class="side-menu-bar-texts">Tests</a>
		</div>

	</div>

	<?php 
date_default_timezone_set('Asia/Kolkata');
$date1 = date('Y-m-d H:i:s');
echo'<div id="tests-main-container">';

$query = "SELECT * FROM student_list WHERE email='$email'";
$result = mysqli_query($con2, $query);
$row = mysqli_fetch_assoc($result);

$a = array();
for($i=1;$i<=$row['courses_no'];$i++) {
	array_push($a, $row["course_".$i]);
}

for($i=0; $i<sizeof($a); $i++){
echo'
     <div class="tests-containers tests-heads"><p class="tests-heads-text1">'.$a[$i].'</p></div>
     <div id="test-div2"></div>';	
$result = mysqli_query($con,"SELECT * FROM quiz where created_for = '$a[$i]' and start_time < '$date1' and end_time > '$date1' order by start_time asc") or die('blank');
echo '
		<div class="tests-containers tests-heads"><p class="tests-heads-text">Present Tests</p></div>		
		<div class="tests-containers">';
	$d=1;
	$b=1;
    while($row = mysqli_fetch_array($result)){
    	$name = $row['name'];
    	$qid = $row['quiz_id'];
    	echo' <a href="testg.php?quiz_id='.$qid.'" class="tests-cards" id="tests-card'.$d.'"><p class="tests-cards-text" id="tests-card'.$d++.'-text">'.$name.'</p></a>';
    	}		
		echo' </div>

		<div class="tests-containers tests-heads"><p class="tests-heads-text">Upcoming Tests</p></div>		
		<div class="tests-containers">';
			$result1 = mysqli_query($con,"SELECT * FROM quiz where created_for = '$a[$i]' and start_time > '$date1' order by start_time asc") or die('Error');
		while($row = mysqli_fetch_array($result1)){
			$name = $row['name'];
			echo' <a class="tests-cards" id="tests-card'.$d.'"><p class="tests-cards-text" id="tests-card'.$d++.'-text"><button class="button" id="button'.$b++.'" onclick="myFunction()">'.$name.'</button></p></a>';
			}
			echo '</div>

		<div class="tests-containers tests-heads"><p class="tests-heads-text">Past Tests</p></div>		
		<div class="tests-containers">';
		$result2 = mysqli_query($con,"SELECT * FROM quiz where created_for = '$a[$i]' and start_time < '$date1' and end_time < '$date1' order by start_time asc") or die('Error');
		while($row = mysqli_fetch_array($result2))
		{
      $name = $row['name'];
      $qid = $row['quiz_id'];

    echo' <a href="testg.php?quiz_id='.$qid.'" class="tests-cards" id="tests-card'.$d.'"><p class="tests-cards-text" id="tests-card'.$d++.'-text">'.$name.'</p></a>';
}

		    echo' </div><div id="test-div"></div>
			<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-left:15%;margin-right:15%;box-shadow: 1px 1px;">
		    <div id="test-div"></div>';}
        ?>
    </div>
	<div id="test-div1"></div>
    
<script>
function myFunction() {
  alert("The test is not accessible.");
}

</script>

<!-- Javascript file 2 -->
<script type="text/javascript" src="z-effect2.js"></script>

</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php
  include_once 'db.php';
session_start();

$email = $_SESSION['email'];
$query = "SELECT * FROM teacher_list WHERE email='$email'";
$result = mysqli_query($con2, $query);
$row = mysqli_fetch_assoc($result);
$teacher_id = $row['id'];//session variable here
$tname = $row['name'];
?>
  <!-- Compating different devices and applicatons -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- Title bar -->
  <title>Teacher Part &nbsp;|&nbsp; EMP</title>
  <link rel = "icon" type = "image/png" href = "stock/logo.png">


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

<title>Add Test</title>
  <!-- Style sheet -->

<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
<link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet'>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

  <!-- Style sheet -->
  <link rel="stylesheet" type="text/css" href="z-style.css" />
</head>

  <body class="current-page" id="home">
  <div id="navbar">
    <p id="navbar-simp">Examination Management System</p>

    <div id="navbar-profile">
      <p id="navbar-arrow"><i id="navbar-arrow-control"></i></p>
      <img src="stock/teacher.jpg" id="navbar-dp">   
    </div>

    <div class="navbar-menus dropdown" id="navbar-tests"><button class="navbar-menus-text dropbtn" id="navbar-tests-text">Tests</button>
    <div class="dropdown-content">
        <a href="teacher.php?q=1">Add Test</a>
        <a href="teacher.php?q=4">Edit Test</a>
        <a href="teacher.php?q=3">Remove Test</a>
        </div>
        </div>
    <a href="teacher.php?q=8" class="navbar-menus" id="navbar-home"><p class="navbar-menus-text" id="navbar-home-text">Home</p><div class="navbar-menus-border" id="navbar-home-border"></div></a>    

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
          <form method="post" action="index.php">    
    <div><a href="profile.php" class="side-bar-texts">Your profile</a>
        <button type="submit" class="side-bar-texts" name="signout">Sign Out</button>
    </div> 
</form> 
    </div>
    <div id="side-menu-bar">
      <a href="teacher.php?q=8" class="side-menu-bar-texts">Home</a>
      <a class="side-menu-bar-texts"><a class="side-menu-bar-texts"href="teacher.php?q=8">Tests</a>
        <a class="side-menu-bar-texts"href="teacher.php?q=1">Add Test</a>
        <a class="side-menu-bar-texts"href="teacher.php?q=4">Edit Test</a>
        <a class="side-menu-bar-texts"href="teacher.php?q=3">Remove Test</a>
    </div>

  </div>
<!--lost in case-->
<?php
if(!@$_GET['q']) {echo'please click on any of the tabs';}?>

<!--add quiz start-->
<?php
if(@$_GET['q']==1 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Test Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Test title" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="course"></label>  
  <div class="col-md-12">
  <input id="course" name="course" placeholder="Enter Course Code" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- num input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- num input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="noc"></label>  
  <div class="col-md-12">
  <input id="noc" name="noc" placeholder="Enter max number of options a question can have" class="form-control input-md"  min="2" type="number">
    
  </div>
</div>

<!-- datetime input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="start_time">Enter time for when the exam starts:</label>  
  <div class="col-md-12">
  <input type="datetime-local" id="start_time" name="start_time">  
  </div>
</div> 

<!-- datetime input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="end_time">Enter time for when the exam ends:</label>  
  <div class="col-md-12">
  <input type="datetime-local" id="end_time" name="end_time">  
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" name="submit"style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==1 && (@$_GET['step'])==2 ) {
echo '<script>alert("Do not add options for descriptive questions!")</script>';

echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&noc='.@$_GET['noc'].'"  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '
<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' or leave blank"></textarea>  
  </div>
</div>

<!-- binary input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="typ'.$i.'"></label>  
  <div class="col-md-12">
  <input type="hidden" name="typ'.$i.'" value="0">
  <input type="checkbox" name="typ'.$i.'" value="1" id="typ"> <b>Tick if question is descriptive</b>

  </div>
</div>

<!-- num input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right'.$i.'"></label>  
  <div class="col-md-12">
  <input id="right" name="right'.$i.'" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- num input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong'.$i.'"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong'.$i.'" placeholder="Enter marks on wrong answer" class="form-control input-md"  min="0" type="number">
    
  </div>
</div>

';
 for($j=0;$j<@$_GET['noc'];$j++)
 {echo'<table><tr><td>
<div class="form-group">
  <label class="col-md-12 control-label" for="a'.$i.'[]"></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="a'.$i.'[]" class="form-control" placeholder="Write option here or leave blank"></textarea>  
  </div>
</div></td>
<td>
<!-- binary input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="isc'.$i.'[]"></label>  
  <div class="col-md-12">
  <input type="hidden" name="isc'.$i.'['.$j.']" value="n">
  <input type="checkbox" name="isc'.$i.'['.$j.']" value="y"> <b>Tick if option is correct</b>
  </div>
</div></td></tr>
</table>
'; 
}
}
echo '
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" name="submit"style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
?><!--add quiz step 2 end-->

<!--edit quiz start-->
<?php
if(@$_GET['q']==2 && !(@$_GET['step']) ) {
echo '
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Add Questions for '.@$_GET['name'].'</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=edquiz&name='.@$_GET['name'].'&eid='.@$_GET['eid'].'"  method="POST">
<fieldset>

<!-- num input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md"min="1" type="number">
    
  </div>
</div>

<!-- num input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="noc"></label>  
  <div class="col-md-12">
  <input id="noc" name="noc" placeholder="Enter max number of options a question can have" class="form-control input-md" min="2" type="number">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" name="submit"style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
?>
<!--edit quiz end-->

<!--remove quiz page-->
<?php
if(@$_GET['q']==3){
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$result = mysqli_query($con,"SELECT * FROM quiz where created_by = '$teacher_id' and start_time > '$date' order by start_time asc") or die('Error');
echo  '<div id="test-div"></div>
<table class="center">
<tr>
    <th>S.No.</th>
    <th>Name</th>
    <th>Start Time</th>
    <th>Duration</th>
    <th> </th>
  </tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $start = $row['start_time'];
  $end = $row['end_time'];
  $quiz_id = $row['quiz_id'];
  $seconds = strtotime($end) - strtotime($start);
    $min = $seconds / 60; 
  echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$start.'</td><td>'.$min.'&nbsp;min</td>
  <td><a href="update.php?q=remupd&quiz_id='.$quiz_id.'" class="button-d">Remove</a></td></tr>';
}
$c=0;
echo '</table></div></div>';
}
?>
<!--edit test page-->
<?php
if(@$_GET['q']==4) {
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$result = mysqli_query($con,"SELECT * FROM quiz where created_by = '$teacher_id' and start_time > '$date' order by start_time asc") or die('Error');
echo  '<div id="test-div"></div>
<table class="center">
<tr>
    <th>S.No.</th>
    <th>Test Title</th>
    <th>Course</th>
    <th>Start Time</th>
    <th>Duration</th>
    <th> </th>
    <th> </th>
  </tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $course = $row['created_for'];
  $start = $row['start_time'];
  $end = $row['end_time'];
  $quiz_id = $row['quiz_id'];
  $seconds = strtotime($end) - strtotime($start);
    $min = $seconds / 60; 
  echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$course.'</td><td>'.$start.'</td><td>'.$min.'&nbsp;min</td>
  <td><a href="teacher.php?q=5&name='.$name.'&quiz_id='.$quiz_id.'" class="button-d">Remove Question</a></td>
  <td><a href="teacher.php?q=2&name='.$name.'&eid='.$quiz_id.'" class="button-d">Add Question</a></td></tr>';
}
$c=0;
echo '</table></div></div>';
}
  ?>

<!--remove question-->
<?php
if(@$_GET['q']==5) {
  $quiz_id=@$_GET['quiz_id'];
  $name=@$_GET['name'];
echo'<span class="title1" style="margin-left:40%;font-size:30px;"><b>Remove Questions from '.@$_GET['name'].'</b></span><br/><br/>';
$result = mysqli_query($con,"SELECT * FROM question where quiz_id='$quiz_id'") or die('Error');

echo  '<table class="center">
<tr>
    <th>S.No.</th>
    <th>Question</th>

    <th> </th>
  </tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $text = $row['text'];
  $ques_id = $row['question_id'];
  $type = $row['type'];
  echo '<tr><th>'.$c++.'</th><th>'.$text.'</th>
  <td><a href="update.php?q=quesdel&name='.$name.'&quiz_id='.$quiz_id.'&qid='.$ques_id.'" class="button-d">Remove</a></td></tr>';
}
$c=0;
echo '</table></div></div>';
}
  ?>
<!--stud_list-->
<?php
if(@$_GET['q']==6)
{   $quiz_id = @$_GET['quiz_id'];
    $sql = "SELECT * FROM student_marks WHERE quiz_id='$quiz_id'";
    $result = mysqli_query($con,$sql);

echo'<div id="test-div"></div><table style="text-align:center;margin:0 auto;width:50%;padding:10px;">
    <tr>
      <th>Roll No.</th>
      <th>Student Name</th>
    </tr>';

      while($students = mysqli_fetch_assoc($result))
      {$stid=$students['student_id'];
    $sub_timeq=mysqli_query($con,"SELECT sub_time FROM student_marks WHERE quiz_id='$quiz_id'and student_id='$stid'");
    $sub_time=mysqli_fetch_assoc($sub_timeq);
    $end_timeq=mysqli_query($con,"SELECT end_time FROM quiz WHERE quiz_id='$quiz_id'");
    $end_time=mysqli_fetch_assoc($end_timeq);
    if($sub_time['sub_time']<$end_time['end_time']){
       $stuff=mysqli_query($con2, "SELECT * FROM student_list where student_id='$stid'");
       $student_name=mysqli_fetch_assoc($stuff);
   echo'<tr>
          <td style="text-decoration: none;color:green;"><a href="teacher.php?q=9&stu_id='.$students['student_id'].'&quiz_id='.$quiz_id.'">'.$students['student_id'].'</a>
          </td>';
          echo"
           <td style='color:green;'>{$student_name['name']}</td></tr>";}
   else if($sub_time['sub_time']>=$end_time['end_time']){
       $stuff=mysqli_query($con2, "SELECT * FROM student_list where student_id='$stid'");
       $student_name=mysqli_fetch_assoc($stuff);
   echo'<tr>
          <td style="text-decoration: none;color:red;"><a href="teacher.php?q=9&stu_id='.$students['student_id'].'&quiz_id='.$quiz_id.'">'.$students['student_id'].'</a>
          </td>';
          echo"
           <td style='color:red;'>{$student_name['name']}</td></tr>";}
}  echo'</table>';
}
?>
<!--rank_list page-->
<?php
if(@$_GET['q']==7) {
                //this variable is for getting quiz id
                $qid=$_GET['qid'];
                /* Mysqli query to fetch rows in descending order of marks */
                $result = mysqli_query($con, "SELECT * ,(marks_sub + marks_obj) AS marks_tot FROM student_marks where quiz_id='$qid' ORDER BY marks_tot DESC");

                /* First rank will be 1 and second be 2 and so on */
                $ranking = 1;

                /* Fetch Rows from the SQL query */
                if ($row=mysqli_num_rows($result)) {
                  echo'<div id="test-div"></div><form class="form-horizontal title1" name="form" action="update.php?q=edmrks&qid='.$qid.'"  method="POST">
                  <fieldset>';
                  echo "<table  style='font-size:4mm;margin-left: auto;margin-right: auto;border: 5px solid black;'>
        <!--this is first row for naming table top column -->
            <tr style='font-size: 5mm;'>
                <td>Rank</td>
                <td>Student name</td>
                <td>Subjective Marks</td>
                <td>Objective Marks</td>
                <td>Total Marks</td>
                <td>Add/Remove Subjective Marks</td>
                <td>Add/Remove Objective Marks</td>
            </tr>
       <tr>";
  while ($row = mysqli_fetch_array($result)) {
       $std_id=$row['student_id'];
       $stuff=mysqli_query($con2, "SELECT * FROM student_list where student_id='$std_id'");
       $student_name=mysqli_fetch_assoc($stuff);
       $sub_timeq=mysqli_query($con,"SELECT sub_time FROM student_marks WHERE quiz_id='$qid'and student_id='$std_id'");
       $sub_time=mysqli_fetch_assoc($sub_timeq);
       $end_timeq=mysqli_query($con,"SELECT end_time FROM quiz WHERE quiz_id='$qid'");
       $end_time=mysqli_fetch_assoc($end_timeq);
       if($sub_time['sub_time']<$end_time['end_time']){
                        echo "<tr style='text-decoration: none;color:green;'><td>{$ranking}</td>
                        <td>{$student_name['name']}</td>
                        <td>{$row['marks_sub']}</td>
                        <td>{$row['marks_obj']}</td>
                        <td>{$row['marks_tot']}</td>";
                        echo'
                        <td>+<input id="marks_sub" name="marks_sub[]" value="0" type="number"><br/>
                        - <input id="marks_subr" name="marks_subr[]" value="0" type="number"></td>
                        <td>+<input id="marks_obj" name="marks_obj[]" value="0" type="number"><br/>
                        - <input id="marks_objr" name="marks_objr[]" value="0" type="number"></td></tr>';
                        $ranking++;}
                        else if($sub_time['sub_time']>=$end_time['end_time']){
                          echo "<tr style='text-decoration: none;color:red;'><td>{$ranking}</td>
                        <td>{$student_name['name']}</td>
                        <td>{$row['marks_sub']}</td>
                        <td>{$row['marks_obj']}</td>
                        <td>{$row['marks_tot']}</td>";
                        echo'
                        <td>+<input id="marks_sub" name="marks_sub[]" value="0" type="number"><br/>
                        - <input id="marks_subr" name="marks_subr[]" value="0" type="number"></td>
                        <td>+<input id="marks_obj" name="marks_obj[]" value="0" type="number"><br/>
                        - <input id="marks_objr" name="marks_objr[]" value="0" type="number"></td></tr>';
                        $ranking++;
                        }}
            echo '</tr></table>
            <div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" name="submit"style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';}
            
          }
            ?>
<!--test-t page-->
<?php if(@$_GET['q']==8) {
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$result = mysqli_query($con,"SELECT * FROM quiz where created_by = '$teacher_id' and start_time < '$date' and end_time > '$date' order by start_time asc") or die('Error');
echo '
  <div id="tests-main-container">
    <div class="tests-containers tests-heads"><p class="tests-heads-text">Present Tests</p></div>   
    <div class="tests-containers">';
  $c=1;
    while($row = mysqli_fetch_array($result)){
      $name = $row['name'];
      $quiz_id = $row['quiz_id'];
      echo' <a href="testv.php?quiz_id='.$quiz_id.'" class="tests-cards" id="tests-card'.$c.'"><p class="tests-cards-text" id="tests-card'.$c++.'-text">'.$name.'</p></a>';
      }   
    echo' </div>

    <div class="tests-containers tests-heads"><p class="tests-heads-text">Upcoming Tests</p></div>    
    <div class="tests-containers">';
    $result1 = mysqli_query($con,"SELECT * FROM quiz where created_by = '$teacher_id' and start_time > '$date' order by start_time asc") or die('Error');
    while($row = mysqli_fetch_array($result1)){
      $name = $row['name'];
      $quiz_id = $row['quiz_id'];
      echo' <a href="testv.php?quiz_id='.$quiz_id.'" class="tests-cards" id="tests-card'.$c.'"><p class="tests-cards-text" id="tests-card'.$c++.'-text">'.$name.'</p></a>';
      }
      echo'</div>

    <div class="tests-containers tests-heads"><p class="tests-heads-text">Past Tests</p></div>    
    <div class="tests-containers">';
    $result2 = mysqli_query($con,"SELECT * FROM quiz where created_by = '$teacher_id' and start_time < '$date' and end_time < '$date' order by start_time asc") or die('Error');
    while($row = mysqli_fetch_array($result2)){
      $name = $row['name'];
      $qid = $row['quiz_id'];
          echo' <a class="tests-cards" id="tests-card'.$c.'"href="testv.php?quiz_id='.$qid.'"><p class="tests-cards-text" id="tests-card'.$c++.'-text">'.$name.'</p></a>';
        }
      }
        ?>  
<!--dis-->
<?php
if(@$_GET['q']==9) {

      $std_id=$_GET['stu_id'];
      $quiz=$_GET['quiz_id'];
      $quizname=mysqli_query($con,"SELECT * FROM quiz WHERE quiz_id='$quiz'");
      $quizname2=mysqli_fetch_array($quizname);
     echo'<h1 style="margin-left:12%;">REG NO: '.$std_id.'</h1>';
     echo'<h1 style="margin-left:12%; margin-bottom:5%;">Answer Sheet for '.$quizname2['name'].'</h1>';

echo'<!--this is the starting of page(after navbar) -->

<form method="post" action="update.php?q=des&">
  <table id="ans_table" style="width:80%;font-size:8mm;margin-left: auto;margin-right: auto;">

    <tr style="font-size: 9mm;">
            <td width="15%">Question</td>
            <td  width="70%">Answer</td>
            <td  width="15%">PMarks</td>
            <td  width="15%">NMarks</td>
            <td  width="15%">Marks</td>
    </tr>';   
         
         // this varible will be used to get quiz id and student id

        echo'<input  type="hidden" name="quiz_id" value='.$quiz.'>';
       $marks = mysqli_query($con, "SELECT pmarks,nmarks FROM question WHERE quiz_id='$quiz'");
       $result = mysqli_query($con, "SELECT question.text,student_response_des.answer FROM question inner join student_response_des  on question.question_id=student_response_des.question_id  where student_id='$std_id' and  student_response_des.quiz_id='$quiz' ");
          echo'<input type="hidden" name="std_id" value='.$std_id.' >';
         // Fetch Rows from the SQL query 
         if (mysqli_num_rows($result)) {
        $cnt=0;
           while ($row = mysqli_fetch_array($result)) {
             $row2 = mysqli_fetch_array($marks);
             echo "<tr>";
             echo'<td>'.$row['text'].'</td>';
             echo '<td>'.$row['answer'].'</td>';
             echo '<td>'.$row2['pmarks'].'</td>';
             echo '<td>'.$row2['nmarks'].'</td>';
             echo' <td><input  type="number" name="arr['.$cnt.']" value=0></td>';
             $cnt++;
             echo "</tr>\n";  
           }
         }
    $stid=$_GET['stu_id'];
    $sub_time=mysqli_query($con,"SELECT sub_time FROM student_marks WHERE quiz_id='$quiz'and student_id='$stid'");
    $end_time=mysqli_query($con,"SELECT end_time FROM quiz WHERE quiz_id='$quiz'");
    
if($sub_time>=$end_time){$cnt++;
}echo' 
  </table>';
  
      echo'
    <input type="submit" name="submit" value="SUBMIT" 
    style=" border:outset;color:white;background-color: #4CAF50;padding: 20px 40px;font-size: 25px;margin-left: 40%;margin-top:3%"> 
</form>';

}
?>

</body>

<!-- Javascript file 2 -->
<script type="text/javascript" src="z-effect2.js"></script>
</html>
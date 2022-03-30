<!DOCTYPE html>
<html>
<head>
	<!-- Compating different devices and applicatons -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<!-- Title bar -->
	<title>View Answers &nbsp;|&nbsp; EMP</title>
	<link rel = "icon" type = "image/png" href = "#">

	<!-- Style sheet -->
	<link rel="stylesheet" type="text/css" href="z-style1.css" />

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
	<script src="protection.js"></script>
  <!-- Style sheet -->
  <link rel="stylesheet" type="text/css" href="z-style.css" />
	<!-- Javascript file -->
	<script type="text/javascript" src="z-effect.js"></script>
</head>
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

  <body class="current-page" id="tests">
  <div id="navbar">
    <p id="navbar-simp">Examination Management Portal</p>

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
      <a href="#" class="side-profile-bar-texts">Your profile</a>
          <form method="post" action="index.php">    
    <div>
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

		<?php
		$store_id = $_GET['quiz_id'];
		date_default_timezone_set('Asia/Kolkata');
		$today = date("Y-m-d H:i:s");
		$time_q = "SELECT start_time , end_time FROM quiz WHERE quiz_id='".$store_id."'";
		$time_res = mysqli_query($con , $time_q);
		$time_fin = mysqli_fetch_assoc($time_res);
		$end_date = $time_fin['end_time'];
		$start_date = $time_fin['start_time'];
		if($today > $end_date ){$time = 0;}
		if($today < $end_date && $today >= $start_date ){$time = 1;}
		if($today < $start_date ){$time = 2;}

		$qres=mysqli_query($con, ("SELECT text,pmarks,nmarks, question_id,type FROM question WHERE quiz_id='".$store_id."'" ));
		$i1=1;
		while($q=mysqli_fetch_assoc($qres)):
		$cares=mysqli_query($con, ("SELECT text FROM question_option WHERE question_id='".$q['question_id']."' AND is_correct='1'"));
		?>
		<form method="post">
		<div id="test-div"></div>
			<div class="trailtest1-heads">
					<p class="trailtest1-nos">
						Question - <?php echo $i1?>
					</p>
					<div class="tooltip"><img style="margin-top: 15px;margin-left: 10px; height: 17px; width:17px;" src="stock/info.jpg">
	  				<span class="tooltiptext"><?php echo'Correct : + '.$q['pmarks'].' Wrong : '.-$q['nmarks'].'';?></span>
				</div>
				<br><br><br>
				<div class="trailtest1-bodys"><p class="trailtest1-bodys-texts">
						<?php echo $q['text'] ?>
				</p></div>

					<?php
							$opres=mysqli_query($con,("SELECT option_id, text FROM question_option WHERE question_id='".$q['question_id']."'"));
							if($q['type']==0):
							while($op=mysqli_fetch_assoc($opres)) :

					?>
							<div class="trailtest1-anss-ops">
								<input type="checkbox" disabled="disabled">
		  						<p class="trailtest1-anss-ops-texts"><?php echo $op['text']?></p>
								</input>
		  				</div>
					<?php
							endwhile;
							endif;
							if($q['type']==1):
					?>
						<div class="trailtest1-anss-ops" >
							<textarea id="descriptive-box"placeholder="Descriptive type"></textarea> 
						</div>
					<?php
						endif;
						if($q['type']==0):
					?>
						<div class="correct_answer">
													<p>Correct Answer :
														<?php
														
															$i2=0;
															while($corans=mysqli_fetch_assoc($cares)){
																if($i2>0){echo ', ';}
																echo $corans['text'];
																$i2=1;
																
															}
														?>
													</p>
											</div>
					<?php   endif;
									++$i1;
									endwhile;
									if($time==0){
$qid=$_GET['quiz_id'];
    $result3 =mysqli_query($con,"SELECT * FROM student_response_des where quiz_id = '$qid' and is_corrected=0")or die('Error');

    if(!mysqli_num_rows($result3)){
    echo'<div id="rank-space"><a id="trailtest1-sub1" href="teacher.php?q=7&qid='.$_GET['quiz_id'].'">RANKINGS</a></div>';
        }
        else{
          echo'<div id="rank-space"><a id="trailtest1-sub1" href="teacher.php?q=6&quiz_id='.$_GET['quiz_id'].'">AWARD MARKS</a></div>';
        }
    }
					echo'</form>';
	?>
	<br/>
<br/><br/>

</body>

<!-- Javascript file 2 -->
<script type="text/javascript" src="z-effect2.js"></script>

</html>

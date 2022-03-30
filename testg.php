<!DOCTYPE html>
<html>
<head>
	<!-- Compating different devices and applicatons -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<!-- Title bar -->
	<title>Give Test &nbsp;|&nbsp; EMP</title>
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

	<!-- Javascript file -->
	<script type="text/javascript" src="z-effect.js"></script>
</head>
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

<?php
    $quiz=$_GET['quiz_id'];
    $check=mysqli_query($con,"SELECT end_time FROM quiz where quiz_id='$quiz' ");
    $row=mysqli_fetch_row($check);
    $timer=$row[0];
?>

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

	<div id="trailtest1-main-container">
		<div id="trailtest1-qboard">

		<?php

		$store_id = $_GET['quiz_id'];
		$submit_q="SELECT COUNT(*) AS num4 FROM student_marks WHERE quiz_id='".$store_id."' AND student_id='".$student_id."'";
		$submit_res=mysqli_query($con,$submit_q);
		$submit=mysqli_fetch_assoc($submit_res);
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
		if(($submit['num4']==0 && $time==1)|| $time==0):
		$qres=mysqli_query($con, ("SELECT * FROM question WHERE quiz_id='".$store_id."' ORDER BY rand()" ));
		$i1=1;if($time!=0){echo'<div class="timer-div"><p id="timer">Remaining Time: </p> <p id="demo"></p></div>';}
		while($q=mysqli_fetch_assoc($qres)):
		$cares=mysqli_query($con, ("SELECT text FROM question_option WHERE question_id='".$q['question_id']."' AND is_correct='1'"));
		?>
		<form method="post">
			<div class="trailtest1-qs">
				<div class="trailtest1-heads">
					<p class="trailtest1-nos">
						Question - <?php echo $i1?>
					</p>
					<div class="tooltip"><img style="margin-top: 15px;margin-left: 10px; height: 17px; width:17px;" src="stock/info.jpg">
	  				<span class="tooltiptext"><?php echo'Correct : + '.$q['pmarks'].' Wrong : '.-$q['nmarks'].'';?></span>
					</div>
				</div>

				<br><br><br>
				<div class="trailtest1-bodys"><p class="trailtest1-bodys-texts">
						<?php echo $q['text'] ?>
				</p></div>
				<div class="trailtest1-anss">

					<?php
							$opres=mysqli_query($con,("SELECT option_id, text FROM question_option WHERE question_id='".$q['question_id']."'"));
							if($q['type']==0):
							while($op=mysqli_fetch_assoc($opres)) :
								$ticked_q="SELECT COUNT(*) as num2 FROM student_response_obj WHERE option_id='".$op['option_id']."' AND student_id='".$student_id."'";
								$ticked_res=mysqli_query($con,$ticked_q) or die( mysqli_error($con));
								$ticked=mysqli_fetch_assoc($ticked_res);
					?>
							<div class="trailtest1-anss-ops">
								<input type="checkbox" name="check_list[]" value="<?php echo $q['question_id'].'#'.$op['option_id']?>"  <?php if( $time == 0 && $ticked['num2'] == 1){echo 'checked="checked"';}
								if($time==0){echo'disabled="disabled"';}?> >
		  						<p class="trailtest1-anss-ops-texts"><?php echo $op['text']?></p>
								</input>
		  				</div>
					<?php
							endwhile;
							endif;
							if($q['type']==1&&$time==1):
					?>
						<div class="trailtest1-anss-ops">
							<textarea id="descriptive-box" name="write_list[]" placeholder="Enter your answer here"rows="8" cols="80"></textarea>
							<input type="hidden" name="write_question_list[]" value="<?php echo $q['question_id'] ?>"/>
						</div>
					<?php
						endif;
						$wrote_q="SELECT * FROM student_response_des WHERE quiz_id='".$_GET['quiz_id']."' AND question_id='".$q['question_id']."' AND student_id='".$student_id."'";
                        $wrote_res=mysqli_query($con,$wrote_q);
                        $wrote=mysqli_fetch_assoc($wrote_res);
                        if($q['type']==1 && $time==0):
							if(mysqli_query($con,$wrote_q)):
                    ?>
                        <div class="your_answer">
                            <p>Your Answer : <?php echo $wrote['answer'] ;?></p>
                        </div>
                    <?php
					else:?>
					<div class="your_answer">
                            <p>No Answer Submitted</p>
                        </div>
					<?php
					endif;
                endif;
						if($time == 0&&$q['type']==0):
					?>
						<div class="correct_answer">
													<p>Correct Answer :
														<?php
															$i2=0;
															while($corans=mysqli_fetch_assoc($cares))
															{	
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
										echo'<div id="rank-space"><a id="trailtest1-sub1" href="rank_list.php?quiz_id='.$_GET['quiz_id'].'">RANKINGS</a></div>';
										}
										  else{
											echo'<button class="button" id="button" onclick="myFunction2()"style="padding:10px;background-color:green;color:white;margin-left:47%;margin-top:5%">Quiz Not Yet Corrected</button>';
										  }

										}
									if($time == 1):
					?>
					<input type="submit" id="trailtest1-sub" value="Submit" name="submit"/>
					<div><p><h2 class="warning">WARNING : Pressing Submit Button Once Will Permanently Submit Your Responses.<h2></p></div>


					</form>
				<?php
					endif;
					if(isset($_POST['submit'])){
						$checkbox1 = $_POST["check_list"];
						foreach($checkbox1 as $chk1)
						{
							$chk="";
							$chk2="";
							$i5=0;
							while($chk1[$i5]!='#'){
								$chk.=$chk1[$i5]."";
								++$i5;
							}
							++$i5;
							while($i5!=strlen($chk1)){
								$chk2.=$chk1[$i5]."";
								++$i5;
							}
							$resquery="INSERT INTO student_response_obj(student_id,quiz_id,question_id,option_id) VALUES ('".$student_id."','".$_GET['quiz_id']."','".$chk."','".$chk2."')";
							$chop=mysqli_query($con,$resquery);
						}
						$writelist= $_POST["write_list"];
						$writequestionlist= $_POST["write_question_list"];
						$i3=0;
						foreach($writelist as $chk3){
							$resquery1="INSERT INTO student_response_des(student_id,quiz_id,question_id,answer,is_corrected) VALUES ('".$student_id."','".$_GET['quiz_id']."','".$writequestionlist[$i3]."','".$chk3."',0)";
							$chop1=mysqli_query($con,$resquery1);
							++$i3;
						}
						$marks=0;
						$qres1=mysqli_query($con, ("SELECT * FROM question WHERE quiz_id='".$store_id."'" ));
						while($q1=mysqli_fetch_assoc($qres1)){
							if($q1['type']==0){
								$pos_marks=$q1['pmarks'];
								$neg_marks=$q1['nmarks'];
								$cq1="SELECT COUNT(*) as num FROM student_response_obj WHERE question_id='".$q1['question_id']."' AND student_id='".$student_id."'";
								$c1=mysqli_query($con,$cq1) or die( mysqli_error($con));
								$cr1=mysqli_fetch_assoc($c1);
								$cq2="SELECT COUNT(*) as num1 FROM question_option WHERE question_id='".$q1['question_id']."' AND is_correct='1'";
								$c2=mysqli_query($con,$cq2) or die( mysqli_error($con));
								$cr2=mysqli_fetch_assoc($c2);
								$srq1="SELECT * FROM student_response_obj WHERE question_id='".$q1['question_id']."' AND student_id='".$student_id."'";
								$sr1=mysqli_query($con,$srq1) or die( mysqli_error($con));
								if($cr1['num']==$cr2['num1']){
									$marks+=$pos_marks;
									while($srr1=mysqli_fetch_assoc($sr1)){
										$compareq=mysqli_query($con,"SELECT * FROM question_option WHERE option_id='".$srr1['option_id']."'") or die(mysqli_error($con));
										$compare=mysqli_fetch_assoc($compareq);
										if($compare['is_correct']==0){
											$marks-=$neg_marks+$pos_marks;
											break;
										}
									}
								}
								else{
									if($cr1['num']!=0){$marks-=$neg_marks;}
								}
							}
						}
						$today_sub=date("Y-m-d H:i:s");
						$in_marksq="INSERT INTO student_marks(student_id,quiz_id,marks_sub,marks_obj,sub_time) VALUES('".$student_id."','".$store_id."',0,'".$marks."','".$today_sub."')";
						$in_marks=mysqli_query($con,$in_marksq);
						echo '<script type="text/javascript"> ';
				    echo 'window.location.replace("tests-s.php")';
				    echo '</script>';
				}
				endif;
				$submit_q1="SELECT COUNT(*) AS num5 FROM student_marks WHERE quiz_id='".$store_id."' AND student_id='".$student_id."'";
				$submit_res1=mysqli_query($con,$submit_q1);
				$submit1=mysqli_fetch_assoc($submit_res1);
				if($submit1['num5']!=0 && $time==1):
			?>
			<br/>
				<p><h2 style="font-family:roboto;">YOU CANNOT SUBMIT THIS TEST ANYMORE.</h1></p>
			<?php
				endif;
			?>
		</div>
	</div><br/>
<br/><br/>

</body>
    <script>
        var simp = '<?php echo $timer; ?>';
        var simple=new Date(simp);
        var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = simple - now;
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
        if (distance < 0) {
        clearInterval(x);
        alert("TIME IS UP.")
        document.getElementById("demo").innerHTML = "SUBMIT NOW AS LATE ENTRY";
        }
        }, 1000);

		let siteTitle = '';
window.addEventListener('blur', () => {
  siteTitle = document.title;
  document.title = 'TAB SWITCH DETECTED';
  alert("Tab switching will result in loss of progress.");
	location.reload();
});

window.addEventListener('focus', () => {
	
  document.title = siteTitle;
});
    </script>
<!-- Javascript file 2 -->
<script type="text/javascript" src="z-effect2.js"></script>
<script>
function myFunction2() {
  alert("The test is not yet corrected.");
}
</script>
</body>
</html>

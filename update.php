<?php
include_once 'db.php';
session_start();

$email = $_SESSION['email'];
$query = "SELECT * FROM teacher_list WHERE email='$email'";
$result = mysqli_query($con2, $query);
$row = mysqli_fetch_assoc($result);
$teacher_id = $row['id'];//session variable here
$_SESSION['id'] = $teacher_id;
$tname = $row['name'];
$_SESSION['name'] = $tname;
//add quiz
if(isset($_POST['submit']) && $_SESSION['role']=='Teacher'){
if(@$_GET['q']== 'addquiz') {
$name = $_POST['name'];
$course = $_POST['course'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$total= $_POST['total'];
$noc= $_POST['noc'];
$id=uniqid();

if($name)
{$subpt1="INSERT INTO quiz(quiz_id,created_for, name, start_time, end_time, created_by) VALUES ('$id','$course', '$name', '$start_time', '$end_time','$teacher_id')";
if (mysqli_query($con,$subpt1)){echo "New Test has been created successfully !";}
else {echo "Error: " . $subpt1 . ":-" . mysqli_error($con);}
header("location:teacher.php?q=1&step=2&eid=$id&n=$total&noc=$noc");
mysqli_close($con);}
else{header("location:teacher.php?q=1");}
}}

//edit quiz
if(isset($_POST['submit']) && $_SESSION['role']=='Teacher'){
if(@$_GET['q']== 'edquiz') {
$name = @$_GET['name'];
$total= $_POST['total'];
$noc= $_POST['noc'];
$id=@$_GET['eid'];
header("location:teacher.php?q=1&step=2&eid=$id&n=$total&noc=$noc");
mysqli_close($con);}
}

//add question
if(isset($_POST['submit']) && $_SESSION['role']=='Teacher'){
if(@$_GET['q']== 'addqns') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];
$noc= $_GET['noc'];
for($i=1;$i<=$n;$i++)
 {
 $qns=$_POST['qns'.$i];
 $right=@$_POST['right'.$i];
$wrong=@$_POST['wrong'.$i];
$typ=@$_POST['typ'.$i];

if($qns!=NULL)
{$qid=uniqid();
	if($typ==0)
{$subpt2="INSERT INTO question(question_id,text,quiz_id,type,pmarks,nmarks)VALUES('$qid','$qns','$eid',0,'$right','$wrong')";

if (mysqli_query($con,$subpt2)){echo "New question has been created successfully !";}
else {echo "Error: " . $subpt2 . ":-" . mysqli_error($con);}
$a=$_POST['a'.$i];
$isc = $_POST['isc'.$i];

for($j=0;$j<count($a);$j++)
 {
 	if($a[$j]!="")
 	{$oaid=uniqid();
echo'$isc['.$j.'+1]='.$isc[$j+1].'';
 	if($isc[$j]=="y")
 	{$subpt3="INSERT INTO question_option(option_id,text, is_correct,question_id) VALUES ('$oaid','$a[$j]',1,'$qid')";}
 	else if($isc[$j]=="n")
 	{$subpt3="INSERT INTO question_option(option_id,text, is_correct,question_id) VALUES ('$oaid','$a[$j]',0,'$qid')";}

if (mysqli_query($con,$subpt3)){echo "New options have been created successfully !";}
else {echo "Error: " .$subpt3. ":-" . mysqli_error($con);}
 	}
 }
}
else if ($typ==1) {
$subpt2="INSERT INTO question(question_id,text,quiz_id,type,pmarks,nmarks)VALUES('$qid','$qns','$eid',1,'$right','$wrong')";
if (mysqli_query($con,$subpt2)){echo "New question has been created successfully !";}
else {echo "Error: " . $subpt2 . ":-" . mysqli_error($con);}
}

}
}
header("location:teacher.php?q=1");
}
}

if(@$_GET['q']=='quesdel' && $_SESSION['role']=='Teacher') {
$qid=@$_GET['qid'];
$quiz_id=@$_GET['quiz_id'];
$name=@$_GET['name'];
echo'reached file';

$r1 = mysqli_query($con,"DELETE FROM question_option WHERE question_id='$qid'") or die('Error');

$r2 = mysqli_query($con,"DELETE FROM question WHERE question_id='$qid' ") or die('Error');
header("location:teacher.php?q=5&name=$name&quiz_id=$quiz_id");
}

if(@$_GET['q']=='remupd' && $_SESSION['role']=='Teacher') {
include_once 'db.php';
$quiz_id=@$_GET['quiz_id'];
$result = mysqli_query($con,"SELECT * FROM question WHERE quiz_id='$quiz_id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['question_id'];
$r1 = mysqli_query($con,"DELETE FROM question_option WHERE question_id='$qid'") or die('Error');
}
$r2 = mysqli_query($con,"DELETE FROM question WHERE quiz_id='$quiz_id' ") or die('Error');
$r3 = mysqli_query($con,"DELETE FROM quiz WHERE quiz_id='$quiz_id' ") or die('Error');
header("location:teacher.php?q=3");}

if(@$_GET['q']=='des' && $_SESSION['role']=='Teacher')
		{
			$arr=$_POST['arr'];

			$total=0;
			for($i=0;$i<count($arr);$i++){
				$total=$total+$arr[$i];	}

            //dummy data
			$student=$_POST['std_id'];
		
			//echo"this is $student and marks scored is $total";
			$quiz_id=$_POST['quiz_id'];
			$marks_sub=$total;
			
			//this is to count whether record exist or not
			$check=mysqli_query($con,"SELECT student_id FROM student_marks where student_id='$student' and quiz_id='$quiz_id' ");
			//echo"quiz_id is = $quiz_id ";		
			if(mysqli_num_rows($check)>0){
				mysqli_query($con,"UPDATE student_response_des set is_corrected='1' where student_id='$student' and quiz_id='$quiz_id'");
				//echo"reached update ";	
				mysqli_query($con,"UPDATE student_marks set marks_sub='$total' WHERE student_id='$student' and quiz_id='$quiz_id'  ");	
			}
			else{//echo"reached insert ";	
				mysqli_query($con,"INSERT into student_marks (student_id,quiz_id,marks_sub,marks_obj) values('$student','$quiz_id','$total',0)");
			}
			header("location:teacher.php?q=6&quiz_id=$quiz_id");
		}

		if(@$_GET['q']=='edmrks' && $_SESSION['role']=='Teacher')
		{
			$marks_sub=$_POST['marks_sub'];
			$marks_obj=$_POST['marks_obj'];
			$marks_subr=$_POST['marks_subr'];
			$marks_objr=$_POST['marks_objr'];
			$qid=$_GET['qid'];
            $result = mysqli_query($con, "SELECT * ,(marks_sub + marks_obj) AS marks_tot FROM student_marks where quiz_id='$qid' ORDER BY marks_tot DESC");
			$i=0;
			while ($row = mysqli_fetch_array($result)) 
			{$student_id=$row['student_id'];
			$marks_sub2= (int)$row['marks_sub'] + (int)$marks_sub[$i] - (int)$marks_subr[$i];
			$marks_obj2= (int)$row['marks_obj'] + (int)$marks_obj[$i] - (int)$marks_objr[$i];
			echo "$marks_sub[$i] $marks_subr[$i]";
			mysqli_query($con,"UPDATE student_marks set marks_sub='$marks_sub2', marks_obj='$marks_obj2' WHERE student_id='$student_id' and quiz_id='$qid'");
			$i++;}
			header("location:teacher.php?q=7&qid=$qid");
		}
?>
<!DOCTYPE html>
<html>
<head>
  <?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'simp1');
$con= mysqli_connect('localhost', 'root', '', 'quiz');
$email = $_SESSION['email'];
$query = "SELECT * FROM student_list WHERE email='$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$student_id = $row['student_id'];
$_SESSION['STUDENT_ID'] = $student_id;
$name = $row['name'];
$_SESSION['name'] = $name;
$courses_no = $row['courses_no'];?>

  <!-- Compating different devices and applicatons -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- Title bar -->
  <title>Tests-s &nbsp;|&nbsp; Project</title>
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
    <p id="navbar-simp">Project</p>

    <div id="navbar-profile">
      <p id="navbar-arrow"><i id="navbar-arrow-control"></i></p>
      <img src="stock/dp.jpeg" id="navbar-dp">
    </div>
    <div id="navbar-notify"><img src="stock/icon-notify.png" id="navbar-notify-icon"></div>
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
    <div id="side-notify-bar">
      <p class="side-notify-bar-texts">No unread Notifications</p>
    </div>
  </div>

<?php
                // the database name you need to change , the table name is leader_board

                /* Connection Variable ("Servername","username","password","database") */
                $con = mysqli_connect("localhost","root", "", "quiz");

                //this variable is for getting quiz id
                $qid=$_GET['quiz_id'];
                /* Mysqli query to fetch rows in descending order of marks */
                $result = mysqli_query($con, "SELECT * ,(marks_sub + marks_obj) AS marks_tot FROM student_marks where quiz_id='$qid' ORDER BY marks_tot DESC");

                /* First rank will be 1 and second be 2 and so on */
                $ranking = 1;

                /* Fetch Rows from the SQL query */
                if ($row=mysqli_num_rows($result)) {
                  echo "<table  style='font-size:8mm;margin-left: auto;margin-right: auto;border: 5px solid black;'>
        <!--this is first row for naming table top column -->
            <tr style='font-size: 12mm;'>
                <td>Rank</td>
                <td>Student name</td>
                <td>Marks</td>
            </tr>
       <tr>";
                    while ($row = mysqli_fetch_array($result)) {

  $con2=mysqli_connect("localhost","root", "", "simp1");
       $std_id=$row['student_id'];
       $stuff=mysqli_query($con2, "SELECT * FROM student_list where student_id='$std_id'");
       $student_name=mysqli_fetch_assoc($stuff);
                        echo "<tr><td>{$ranking}</td>
                        <td>{$student_name['name']}</td>
                        <td>{$row['marks_tot']}</td></tr>";
                        $ranking++;}
            echo "</tr>\n</table>";}
            ?>
                </div>
   
<script>
function myFunction() {
  alert("The test is not accessible.");
}
</script>
</body>

<!-- Javascript file 2 -->
<script type="text/javascript" src="z-effect2.js"></script>

</html>
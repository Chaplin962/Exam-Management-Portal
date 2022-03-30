<?php
include_once 'db.php';
    session_start();

    if(isset($_SESSION['sign'])) {
        header("Location: index.php");
    }

    $email = "";
    $errors = array();    

    if(isset($_POST['signin'])) {
        $email = mysqli_real_escape_string($con2, $_POST['email']);
        $password = mysqli_real_escape_string($con2, $_POST['password']);

        if(empty($email)) {
            array_push($errors, "Email is required.");
        }
        if(empty($password)) {
            array_push($errors, "Password is required.");
        }
        if(count($errors) == 0) {
            $password = md5($password);
            $query = "Select * FROM user_sign WHERE email='$email' and password='$password'";
            $result = mysqli_query($con2, $query);
            if(mysqli_num_rows($result)==1) {
                $_SESSION['email'] = $email;                           
                $row = mysqli_fetch_array($result);
                if($row['signstatus'] == 0) {
                    mysqli_query($con2,"UPDATE user_sign set signstatus=0 WHERE email='" . $email . "'");
                    $_SESSION['role'] = $row['role'];                
                    $_SESSION['sign']=0;
                    header("Location: index.php");
                }
                else {
                    array_push($errors, "Already signed in somewhere else.");
                }
            }
            else {
                array_push($errors, "Email and Password don't  match.");
            }
        }
    }

?>

<!-- Compating different devices and applicatons -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<!-- Title bar -->
<title>Sign In | EMP</title>
<link rel = "icon" type = "image/png" href = "stock/logo.png">

<!-- Style sheet -->
<link rel="stylesheet" type="text/css" href="styleFiles//style.css" />

<!-- Adobe fonts -->
<link rel="stylesheet" href="https://use.typekit.net/oyy6bsf.css">

<!-- jQuery files include -->
<script src="effectFiles\jQuery\jQuery compressed.js"></script>
<script src="effectFiles\jQuery\jquery-ui.js"></script>
<script src="effectFiles\jQuery\jQuery ease1.js"></script>
<script src="effectFiles\jQuery\jQuery ease2.js"></script>

<!-- Javascript file -->
<script type="text/javascript" src="effectFiles//effect.js"></script>

<img src="stock/sign_back.jpg" id="sign_back">

<div id="signin_template">    
    <div id="signin_container_1">
        <div id="signin_left">
            <img src="stock/sign_template_logo.gif" id="sign_template_logo">
            <h2 id="signin_head">Sign In</h2>
            <form method="post" action="SignIn.php" id="signin_form">
                <div>                    
                    <input type="text" name="email" placeholder="Email" class="signin_input_box" value= <?php echo $email; ?> >
                </div>
                <div>                    
                    <input type="password" name="password" placeholder="Password" class="signin_input_box">
                </div>
                <div>
                    <button type="submit" name="signin" id="signin_button">Sign In</button>
                </div>
                <p id="signin_bellow">Not yet Signed Up? <a href="SignUp.php">Sign Up</a></p>
		<p id="signin_bellow"><a href="Group6Brochure.pdf">Checkout out our Brochure</a></p>
            </form>
            <div id="signin_errors_container">
                <?php foreach($errors as $error) : ?>
                    <div class="signin_errors"><?php echo $error; ?></div>                    
                <?php endforeach; ?>
            </div>
        </div>
    
        <img src="stock/sign_template_photo.gif" id="signin_right">
    </div>
</div>


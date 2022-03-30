<?php
include_once 'db.php';
    session_start();

    if(isset($_SESSION['sign'])) {
        header("Location: index.php");
    }

    $email = "";    
    $errors = array();
    $_SESSION['step']=1;

    if(isset($_POST['sendotp'])) {
        $email = mysqli_real_escape_string($con2, $_POST['email']);              

        if(empty($email)) {
            array_push($errors, "Email is required.");
        }        
        if(count($errors) == 0) {
            $query = "Select * FROM admin_list WHERE email='$email'";
            $result1 = mysqli_query($con2, $query);
            if(mysqli_num_rows($result1)==1) $_SESSION['role'] = 'Admin';

            $query = "Select * FROM student_list WHERE email='$email'";
            $result2 = mysqli_query($con2, $query);
            if(mysqli_num_rows($result2)==1) $_SESSION['role'] = 'Student';

            $query = "Select * FROM teacher_list WHERE email='$email'";
            $result3 = mysqli_query($con2, $query);
            if(mysqli_num_rows($result3)==1) $_SESSION['role'] = 'Teacher';

            if( isset($_SESSION['role']) ) {
                $_SESSION['email']=$email;
                $query = "Select * FROM user_sign WHERE email='$email'";
                $result = mysqli_query($con2, $query);
                if(mysqli_num_rows($result)==0) {
                    $otp = rand(100000, 999999);
                    mail($email, "Examination Management Portal One Time Password", "The OTP for EMP Sign up is : ".$otp, "");                
                    $_SESSION['otp']=$otp;
                    $_SESSION['step']=2;
                }
                else {
                    array_push($errors, "Email already signed up.");
                }             
            }
            else {
                array_push($errors, "Email not in admin's list. Contact Admin.");
            }         
        }
    }

    if(isset($_POST['verifyotp'])) {
        $_SESSION['step']=2;
        $email = $_SESSION['email'];
        $otp = mysqli_real_escape_string($con2, $_POST['otp']);
        //$otp = strval($otp);        

        if($otp != $_SESSION['otp']) {
            array_push($errors, "OTP not correct");
        }        
        if(count($errors) == 0) {            
            $_SESSION['step']=3;            
        }
    }

    if(isset($_POST['signup'])) {
        $_SESSION['step']=3;
        $password = mysqli_real_escape_string($con2, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($con2, $_POST['confirmpassword']);     

        if(empty($password)) {
            array_push($errors, "Password is required.");
        }
        if($password != $confirmpassword) {
            array_push($errors, "Passwords don't match");
        }    
        if(count($errors) == 0) {
            $email = $_SESSION['email'];
            $password = md5($password);
            $role = $_SESSION['role'];            
            $signstatus = 1;            
            $query = "INSERT INTO user_sign (email, password, role, signstatus) VALUES ('$email', '$password', '$role', '$signstatus')";
            mysqli_query($con2, $query);
            $_SESSION['sign']=1;
            header("Location: index.php");                        
        }
    }

?>

<!-- Compating different devices and applicatons -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<!-- Title bar -->
<title>Sign Up | EMP</title>
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
            <h2 id="signin_head">Sign Up</h2>
            <form method="post" action="SignUp.php" id="signin_form">
            <?php if($_SESSION['step'] == 1) : ?>            
                <div>                    
                    <input type="text" name="email" placeholder="Email" class="signin_input_box" value= <?php echo $email; ?> >
                </div>    
                <div>
                    <button type="submit" name="sendotp" id="signin_button">Send OTP</button>
                </div>            
            <?php endif; ?>

            <?php if($_SESSION['step'] == 2) : ?>                
                <div>                    
                    <input type="text" name="otp" class="signin_input_box" placeholder="OTP">
                </div>    
                <div>
                    <button type="submit" name="verifyotp" id="signin_button">Verify OTP</button>
                </div>            
            <?php endif; ?>

            <?php if($_SESSION['step'] == 3) : ?>            
                <div>                    
                    <input type="text" name="password" class="signin_input_box" placeholder="Password">
                </div>
                <div>                    
                    <input type="text" name="confirmpassword" class="signin_input_box" placeholder="Confirm Password">
                </div>    
                <div>
                    <button type="submit" name="signup" id="signin_button">Sign Up</button>
                </div>             
            <?php endif; ?>            
            <p id="signin_bellow">Already Signed Up ? <a href="SignIn.php">Sign In</a></p>
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
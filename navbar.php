<!-- Compating different devices and applicatons -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<!-- Title bar -->
<link rel = "icon" type = "image/png" href = "stock\logo.png">

<!-- Style sheet -->
<link rel="stylesheet" type="text/css" href="styleFiles\style.css" />

<!-- Adobe fonts -->
<link rel="stylesheet" href="https://use.typekit.net/oyy6bsf.css">

<!-- jQuery files include -->
<script src="effectFiles\jQuery\jQuery compressed.js"></script>
<script src="effectFiles\jQuery\jquery-ui.js"></script>
<script src="effectFiles\jQuery\jQuery ease1.js"></script>
<script src="effectFiles\jQuery\jQuery ease2.js"></script>

<!-- Javascript file -->
<script type="text/javascript" src="effectFiles\effect.js"></script>

<div id="navbar">
    <img src="stock/logo.png" id="navbar-logo">
    <p id="navbar-simp">Examination Management Portal</p>
    <div id="navbar-profile">
		<p id="navbar-arrow"><i id="navbar-arrow-control"></i></p>
        <?php if($_SESSION['role']=='Student') : ?>
            <img src="stock/student.jpg" id="navbar-dp">            
        <?php endif; ?>  
        <?php if($_SESSION['role']=='Teacher') : ?>
            <img src="stock/teacher.jpg" id="navbar-dp">            
        <?php endif; ?>	
        <?php if($_SESSION['role']=='Admin') : ?>
            <img src="stock/admin.jpg" id="navbar-dp">     
        <?php endif; ?>		
	</div>
    <?php if($_SESSION['role']=='Teacher') : ?>
        <div id="mobnavbar-button">
			<div class="bar1"></div> <div class="bar2"></div> <div class="bar3"></div>
		</div>        
    <?php endif; ?>
</div>
<div id="side-bar">	
    <form method="post" action="index.php">
        <div>
            <button type="submit" class="side-bar-texts" name="home">Home</button>
        </div>        
        <div>
            <button type="submit" class="side-bar-texts" name="your_profile">Your Profile</button>
        </div>  
        <div>
            <button type="submit" class="side-bar-texts" name="signout">Sign Out</button>
        </div> 
    </form>    
</div>
<div id="side-bar-2">	
    <form method="post" action="index.php">
        <a class="side-menu-bar-texts"href="teacher.php?q=1">Add Test</a>
        <a class="side-menu-bar-texts"href="teacher.php?q=4">Edit Test</a>
        <a class="side-menu-bar-texts"href="teacher.php?q=3">Remove Test</a>    
    </form>    
</div>
<?php

//import the header file, for session start and DB connection:
require_once '../php/header.php';

// $_SESSION['user'] array can be used to access the user information.

?>


<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="UTF-8">
        <title>Default Index Page</title>
        <link rel="stylesheet" href="../css/styleMain.css">
        <link rel="stylesheet" href="../css/styleFeed.css">
        <link rel="icon" type="image/x-icon" href="../images/icons/starWingsFavicon.png">
    </head>
    
    <body>
    
                        <!-- Import the header menu from a separate file -->
<?php
require_once '../php/menu.php';
?>
        
        
        <section class="background"></section>
        <section class="mainSection">
        
        <div class="wrap">
            <div class="avatar">
                <img alt="logo" src="../images/icons/starWingsLogoW.png">
            </div>
            
            <br>
            <h1>Did you like us..?</h1>
            <p>Leave your feedback here!</p>

            <form id="form1" action="" method="post">
            <input type="text" name="firstName" placeholder="First Name" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="lastName" placeholder="Last Name" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="email" placeholder="E-mail" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="textarea" name="coment" placeholder="Your coment" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="submit" value="Send">
            <div class="bar">
                <i></i>
            </div>
            <input type="reset" value="Cancel">
            </form>
	    </div>
        
    
        </section>
        
        
        
        
<?php
    //import the footer
require_once '../php/footer.php';    
?>
        
    </body>

</html>
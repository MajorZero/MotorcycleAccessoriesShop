
<?php

//import the header file, for session start and DB connection:
require_once '../php/header.php';

// $_SESSION['user'] array can be used to access the user information.

$errorReg = false;

if(isset($_POST['firstName']) && isset($_POST['lastName']))
{
    $firstName = testInput($_POST['firstName']);
    $lastName = testInput($_POST['lastName']);
    $streetName = testInput($_POST['streetName']);
    $suburb = testInput($_POST['suburb']);
    $state = strtoupper(testInput($_POST['state']));
    $postcode = testInput($_POST['postcode']);
    $dateOfBirth = $_POST['dateOfBirth'];
    $mobile = testInput($_POST['mobile']);
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $email = strtoupper($_POST['email']);
    
    $_SESSION['user'] = newCustomer($firstName, $lastName, $streetName, $suburb, $state, $postcode, $userName, $password, $email, $dateOfBirth, $mobile);
    
    
    if(isset($_SESSION['user']) && ($_SESSION['user'] != false))
    {
        updateCartOwner($_SESSION['id']);
        header('Location:home.php');
    }
    else
    {
        $errorReg = "The user has not been created!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="UTF-8">
        <title>Registration Page</title>
        <link rel="stylesheet" href="../css/styleMain.css">
        <link rel="stylesheet" href="../css/styleReg.css">
        <link rel="icon" type="image/x-icon" href="../images/icons/starWingsFavicon.png">
    </head>
    
    <body>
    
        
        <!-- Import the header menu from a separate file -->
        <?php
        require_once '../php/menu.php';
        ?>
        
        
        <section class="background"></section>
        
        <section class="mainSection">
            
<?php
if($errorReg != false)
{    
?>
        <section class="container">
            <h1> <?php echo $errorReg; ?> </h1>
        </section>
        
<?php
}
?>

        
        <div class="wrap">
            <div class="avatar">
                <img alt="logo" src="../images/icons/starWingsLogoW.png">
            </div>

            <form id="form1" action="" method="post">
            <input type="text" name="firstName" placeholder="First Name" pattern="[A-Za-z]{1,20}" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="lastName" placeholder="Last Name" pattern="[A-Za-z]{1,20}" title="Only letters allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="streetName" placeholder="Street Name" pattern="[A-Za-z0-9 ]{1,50}" title="Only letters and numbers allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="suburb" placeholder="Suburb" pattern="[A-Za-z ]{1,20}" title="Only letters allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="state" placeholder="State" pattern="[A-Za-z]{1,3}" title="Example: QLD." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="postcode" placeholder="Postcode" pattern="[0-9]{4}" title="Only 4 numbers allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="date" name="dateOfBirth" placeholder="DOB" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="mobile" placeholder="Mobile" pattern="[0-9]{1,10}" title="Only numbers allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="userName" placeholder="User Name" pattern="[A-Za-z0-9]{1,20}" title="Only combinations of letters and numbers allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="password" placeholder="Password" pattern="[A-Za-z0-9]{1,20}" title="Only combinations of letters and numbers allowed." required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" name="email" placeholder="E-mail" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="submit">
            <div class="bar">
                <i></i>
            </div>
            <input type="reset">
	   </div>
        
            </form>
            
    </section>
        
        
       <?php
        //import the footer
        require_once '../php/footer.php';    
        ?>
        
    </body>

</html>
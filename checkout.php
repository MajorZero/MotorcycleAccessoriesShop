<?php

//import the header file, for session start and DB connection:
require_once '../php/header.php';

// $_SESSION['user'] array can be used to access the user information.


if(!isset($_SESSION['user']))
{
    $errorCart = '<h1>Please, login or register to complete the Checkout.</h1>';
}

else
{
    echo '';
}

?>


<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="UTF-8">
        <title>Default Index Page</title>
        <link rel="stylesheet" href="../css/styleMain.css">
        <link rel="stylesheet" href="../css/styleCheck.css">
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

if(isset($errorCart))
{
    echo '<section class="container">';
    echo $errorCart;
    echo '</section>';
}
else
{
    $lastInvoice = createInvoice();
    
    if($lastInvoice < 0)
    {
        echo '<section class="container">';
        echo '<h1>Your Shopping Cart is empty.</h1>';
        echo '</section>';
    }
    else
    {
        echo '<section class="container">';
        printInvoice($lastInvoice);
        echo '</section>';
        
        echo '<section class="container">';
        echo '<p> <strong>Print Invoice</strong> </p>';
        echo '</section>';
        
        emptyCart();
    }
}
?>        

            
        </section>
            
        <?php
        //import the footer
        require_once '../php/footer.php';    
        ?>
        
    </body>

</html>
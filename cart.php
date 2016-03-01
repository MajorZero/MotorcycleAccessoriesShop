<?php

//import the header file, for session start and DB connection:
require_once '../php/header.php';

// $_SESSION['user'] array can be used to access the user information.


//if receive an option from the product list, add the specific product to the cart:
if(isset($_POST['productOption']))
{
    addToCart($_POST['productOption']);
}

//if receive the emptyCart comand, remove all the products from the cart:
else if(isset($_POST['emptyCart']))
{
    emptyCart();
}

//if receive the takeFromCart comand, lower the quantity for that specific product:
else if(isset($_POST['takeFromCart']) && isset($_POST['quantity']))
{
    if($_POST['quantity'] >= 2)
    {
        takeFromCart($_POST['takeFromCart']);
    }
    else
    {
        removeFromCart($_POST['takeFromCart']);
    }
}

//if receive the removeFromCart comand, remove from the cart only that specific product:
else if(isset($_POST['removeFromCart']))
{
    removeFromCart($_POST['removeFromCart']);
}
else
{
    echo '';
}

$list = printCart();
$totPrice = 0;

?>





<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="../css/styleMain.css">
        <link rel="stylesheet" href="../css/styleCart.css">
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

if($list)
{

    foreach($list as $p)
    {
        echo '<section class="container">';
        echo '<div class="productContainer">';

        echo '<div class="productPicture">';
        echo '<img alt="product picture" src="'.$p['picturePath'].'">';
        echo '</div>';

        echo '<div class="productDesc">';
        echo '<h3>'.$p['productName'].'</h3>';
        echo '<p>'.$p['productDesc'].'</p>';
        echo '</div>';

        echo '<div class="productOpt">';
        echo '<h1>Quantity:</h1>';
        echo '<p>'.$p['quantity'].'</p>';
        echo '</div>';

        $price = $p['price'] * $p['quantity'];
        $totPrice = $totPrice + $price;

        echo '<div class="productOpt">';
        echo '<h1>Price:</h1>';
        echo '<p>$'.$price.'</p>';
        echo '</div>';

        echo '</div>'; //close productContainer

        echo '<div class="controlsContainer">';
            echo '<div class="add">';
                echo '<form method="post" action="#">';
                    echo '<input type="hidden" name="productOption" value="'.$p['productName'].'">';
                    echo '<input type="submit" value="+">';
                echo '</form>';
            echo '</div>';
            echo '<div class="take">';
                echo '<form method="post" action="#">';
                    echo '<input type="hidden" name="takeFromCart" value="'.$p['productName'].'">';
                    echo '<input type="hidden" name="quantity" value="'.$p['quantity'].'">';
                    echo '<input type="submit" value="-">';
                echo '</form>';
            echo '</div>';
            echo '<div class="remove">';
                echo '<form method="post" action="#">';
                    echo '<input type="hidden" name="removeFromCart" value="'.$p['productName'].'">';
                    echo '<input type="submit" value="DELETE">';
                echo '</form>';
            echo '</div>';
        echo '</div>';

        echo '</section>'; //close container

    }

?>
            
            <section class="container">
                <div class="controlsContainer">
                
                    <div class="edit">
                        <form method="post" action="#">
                            <input type="hidden" name="emptyCart" value="empty">
                            <input type="submit" value="Empty Cart">
                        </form>
                    </div>
                    <div class="check"> <a href="checkout.php">Checkout</a> </div>
                    <div class="price"><strong>Total Price: $<?php echo $totPrice; ?></strong></div>
                    
                </div>
            </section>
        
        
<?php

}
else
{
        
?>
        <section class="container">
            <h1>Your Shopping Cart is currently empty.</h1>
        </section>
        
<?php
}
?>
        </section>  <!-- close mainSection -->
        
        
<?php
    //import the footer
require_once '../php/footer.php';    
?>
        
    </body>

</html>
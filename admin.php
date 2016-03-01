<?php

//import the header file, for session start and DB connection:
require_once '../php/header.php';

// $_SESSION['user'] array can be used to access the user information.

$log = "";


if($_SESSION['user']['role']!="A")
{
    header('location:home.php');
}


//if the Visibility option is triggered, update the visibility on the detected product:
if(isset($_POST['visibility']))
{
    changeVisibility($_POST['visibility']);
}

else if(isset($_POST['removeProduct']))
{
    removeFromProducts($_POST['removeProduct']);
}

else if(isset($_POST['newProduct']))
{          
    if (!empty($_POST['size'])) 
    {
        addToProducts($_POST['productName'], $_POST['productDesc'], $_POST['price'], $_POST['category'], $_POST['size'], $_POST['picturePath']);
    }
    else
    {
        $size = [""];
        addToProducts($_POST['productName'], $_POST['productDesc'], $_POST['price'], $_POST['category'], $size, $_POST['picturePath']);
    }
}
else
{}


//get the array of the general products
$list = getProducts();

?>





<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="UTF-8">
        <title>Admin area</title>
        <link rel="stylesheet" href="../css/styleMain.css">
        <link rel="stylesheet" href="../css/styleAdmin.css">
        <link rel="icon" type="image/x-icon" href="../images/icons/starWingsFavicon.png">
    </head>
    
    <body>
    
                <!-- Import the header menu from a separate file -->
        <?php
        require_once '../php/menu.php';
        ?>
        
        
        <section class="background"></section>
        <section class="mainSection">
            
            
            <?php echo '<p>'.$log.'</p>'; ?>
            
            <section class="container">
                
                <form method="post" action="#">
                <div class="newProduct">
                    <h1>Create New Product</h1>
                    Product Name: <br> <input type="text" name="productName" id="productName" required> <br>
                    Product Price: <br> <input type="number" name="price" id="price" required> <br>
                    Product Description: <br> <input type="text" name="productDesc" id="productDesc" required> <br>
                    Picture Path: <br> <input type="text" name="picturePath" id="picturePath" required> <br>
                    <label for="category">Select Category:</label> <br>
                    <select name="category" id="category" required>
                        <option value="C">Clothing</option>
                        <option value="H">Helmets</option>
                        <option value="A">Accessories</option>
                    </select> <br>
                    <label for="size[]">Select available Sizes for this product:</label> <br>
                    <input type="checkbox" name="size[]" value="XS"> XS 
                    <input type="checkbox" name="size[]" value="S"> S 
                    <input type="checkbox" name="size[]" value="M"> M 
                    <input type="checkbox" name="size[]" value="L"> L 
                    <input type="checkbox" name="size[]" value="XL"> XL 
                </div>
                
                <div class="controlsContainer">
                    <div class="edit">
                        
                        <input type="hidden" name="newProduct">
                        <input type="submit" value="ADD NEW PRODUCT">
                        
                    </div>
                </div>
                </form>
            </section>
            
<?php


    foreach($list as $products)
    {
        $subProducts = getSubproducts($products['productName']);
        
        foreach($subProducts as $p)
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
            echo '<h1>Visibility:</h1>';
            
            
            echo '<form method="post" action="#">';
                echo '<input type="hidden" name="visibility" value="'.$p['idProduct'].'">';
            if($p['visibility'] == 1)
            {
                
                echo '<input type="submit" value="ON">';
            }
            else
            {
                echo '<input type="submit" value="OFF">';
            }
            echo '</form>';
            echo '</div>';

            
            echo '<div class="productOpt">';
            echo '<h1>Price:</h1>';
            echo '<p>$'.$p['price'].'</p>';
            echo '</div>';

            echo '</div>'; //close productContainer
            
            echo '<div class="controlsContainer">';
                echo '<div class="remove">';
                    echo '<form method="post" action="#">';
                        echo '<input type="hidden" name="removeProduct" value="'.$p['idProduct'].'">';
                        echo '<input type="submit" value="DELETE THIS PRODUCT">';
                    echo '</form>';
                echo '</div>';
            echo '</div>'; //close controlsContainer

            echo '</section>'; //close container
            
        }
    }

?>      

        </section>  <!-- close mainSection -->
        
        
<?php
    //import the footer
require_once '../php/footer.php';    
?>
        
    </body>

</html>
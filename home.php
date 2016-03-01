<?php

//import the header file, for session start and DB connection:
require_once '../php/header.php';

// $_SESSION['user'] array can be used to access the user information.

?>






<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="../css/styleMain.css">
        <link rel="icon" type="image/x-icon" href="../images/icons/starWingsFavicon.png">
    </head>
    
    <body>
    
        
        <!-- Import the header menu from a separate file -->
        <?php
        require_once '../php/menu.php';
        ?>
        
        
        
        <section id="slide">
            
            <!-- <img src="../images/icons/arrow.png" id="leftArrow"> -->
            <!-- <img src="../images/icons/arrow.png" id="rightArrow"> -->
            <a href="#aboutSection"><img alt="arrow" src="../images/icons/arrow.png" id="navArrow"></a>
            <img id="imgRoll" class="" alt="large image background" src="../images/promo.jpg"> <!-- "images/promo.jpg" -->
            
            <!-- This alternative image will display only if the user had disabled the javascripts, it will overlap the slideshow and display a static image instead -->
            <noscript><img alt="large image background" src="../images/promo.jpg" class="alternativeImg"></noscript>
                    
        </section>
        
        <a name="aboutSection" class="anchor"></a>
        <section class="text">
            <h2>The Best Store for Your Ride</h2>
            
            <p>Welcome to our motorcycle's accessories Online Store. Access the full range of high performance, multi-brand products for the best ride experience. <br> We choose only the top quality brends to ensure customer guaranteed satisfaction. <br> From elegant and comfortable clothings to high-performance protections for your safety, all our products meet the highest standards of quality on the market.</p>
        
            
        </section>
          
        <!--anchor to the shop section-->
        <a name="shopSection" class="anchor"></a>
        
        
        
        
        
        
        <section class="parallax back1">
            
            
<?php

//get all the products in this category:
$clothes = printCategory('C');
            
?>
            
            
            <div class="productImage">
                <img alt="product picture" src="../images/jacket.png">
            </div>
            
            <div class="productCategory">
                <h2>Clothing</h2>
            </div>
            
            <div class="productSum">
                      
<?php

$c = current($clothes);

echo '<h1>Product List:</h1>';
echo '<table>';
echo '<tr>';

while($c)
{
    echo '<form action="product.php" method="post">';
    echo '<td><input type="hidden" name="productName" value="'.$c['productName'].'">
              <input type="hidden" name="productDesc" value="'.$c['productDesc'].'">
              <input type="hidden" name="picturePath" value="'.$c['picturePath'].'">
              <input type="hidden" name="price" value="'.$c['price'].'">
              <input type="image" src="'.$c['picturePath'].'"></td>';
    echo '</form>';
    $c = next($clothes);
}

echo '</tr>';
echo '</table>';

                
?>
                         
            </div>
            
            
        </section> 
        
        
        <br><br>
        
            

        <section class="parallax back2">
            
<?php

//get all the products in this category:
$helmets = printCategory('H');
            
?>
            
            <div class="productImage">
                <img alt="product picture" src="../images/helmet.png">
            </div>
            
            <div class="productCategory">
                <h2>Helmets</h2>
            </div>
            
            <div class="productSum">
                
<?php

$h = current($helmets);

echo '<h1>Product List:</h1>';
echo '<table>';
echo '<tr>';

while($h)
{
    echo '<form action="product.php" method="post">';
    echo '<td><input type="hidden" name="productName" value="'.$h['productName'].'">
              <input type="hidden" name="productDesc" value="'.$h['productDesc'].'">
              <input type="hidden" name="picturePath" value="'.$h['picturePath'].'">
              <input type="hidden" name="price" value="'.$h['price'].'">
              <input type="image" src="'.$h['picturePath'].'"></td>';
    echo '</form>';
    $h = next($helmets);
}

echo '</tr>';
echo '</table>';
                
?>
                
            </div>
            
        </section>
        
        
        
        <br><br>
        
        
        
        <section class="parallax back3">
            
<?php

//get all the products in this category:
$accessories = printCategory('A');
            
?>
            
            <div class="productImage">
                <img alt="product picture" src="../images/glove.png">
            </div>
                        
            <div class="productCategory">
                <h2>Accessories</h2>
            </div>
            
            <div class="productSum">
                
<?php

$a = current($accessories);

echo '<h1>Product List:</h1>';
echo '<table>';
echo '<tr>';

while($a)
{
    echo '<form action="product.php" method="post">';
    echo '<td><input type="hidden" name="productName" value="'.$a['productName'].'">
              <input type="hidden" name="productDesc" value="'.$a['productDesc'].'">
              <input type="hidden" name="picturePath" value="'.$a['picturePath'].'">
              <input type="hidden" name="price" value="'.$a['price'].'">
              <input type="image" src="'.$a['picturePath'].'"></td>';
    echo '</form>';
    $a = next($accessories);
}

echo '</tr>';
echo '</table>';
                
?>
                
            </div>
            
        </section>
        
        
        
        
        
        
        <a name="contactSection" class="anchor"></a>
        <section class="contactTimetableContainer">        
        <section class="text contact">
            
            <h2>Contacts</h2>
            
            <p>Find us in our store:</p>
            <p>45/29 George Street</p>
            <p>Brisbane CBD</p>
            <p>4000 - Phone: 0404 111222</p>
            <p>E-mail: info@onlinestore.com</p>
        
        </section>
        
        
        <section class="text timetable">
            
            <h2>Opening Hours</h2>
            
            <table>
                <tr><td>Monday</td><td>9am - 4pm</td></tr>
                <tr><td>Tuesday</td><td>9am - 4pm</td></tr>
                <tr><td>Wednesday</td><td>9am - 4pm</td></tr>
                <tr><td>Thursday</td><td>9am - 4pm</td></tr>
                <tr><td>Friday</td><td>9am - 4pm</td></tr>
                <tr><td>Saturday</td><td>Closed</td></tr>
                <tr><td>Sunday</td><td>Closed</td></tr>
            </table>
            
        </section>
        </section> <!--close contact/timetable container -->
        
        <section class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7079.813468766839!2d153.0246957!3d-27.472162800000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a0459ce6a61%3A0x578276c54894fa98!2sGeorge+St%2C+Brisbane+QLD+4000!5e0!3m2!1sen!2sau!4v1437534745758" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>
        
        
        
<?php
    //import the footer
require_once '../php/footer.php';    
?>
        
        <!-- script NOT active
        <script src="js/js.js"></script>
        -->
        
    </body>

</html>
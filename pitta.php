<?php
if (file_exists('Recipes Final/index.php')) {
    include('Recipes Final/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pitta1.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,200;1,300;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Pitta Balancing Recipes</title>
</head>

<body>
    <header>
        <div class="logo"></div>
        <div class="nav-bar">
           <!-- <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Recipes</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Contact</a></li>
            </ul> -->
        </div>
    </header>
    <div class="hero">
        <div class="content">
            <h4>Eating well is a form of self-love</h4>
            <h1>Pitta Balancing Recipes</h1>
            <h3>Eat good feel good</h3>
            <div class="button">Start Cooking</div>
        </div>
    </div> 
    <!----About Section Start------>
    <section class="about">
        <h2>Cooling Recipes to Balance Pitta Dosha</h2>
        <div class="main">
            <img src="pittaabout.jpg" alt="">
            <div class="about-text">
                <p>Pitta balancing recipes are designed to calm excess heat and irritation in the body. 
                    They emphasize cooling ingredients like cucumbers, mint, and coconut. These foods help 
                    soothe inflammation and promote a sense of calm. Including mild spices like turmeric and coriander
                     also supports Pitta balance. Such recipes help maintain harmony, 
                     especially during hot weather or stressful times.</p>
               

            </div>
        </div>
    </section>
   

    
    
       
    <!-----Recipes Section Start---------------------------------->
    <div class="recipe">
    <h2>Featured Recipes</h2>
    </div>
    <div class="container">

        <div class="card">
          <div class="img-container">
            <img src="kheer.jpg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Rice Kheer</h2>
            <p>Cooling the Core – Peaceful Plates for Pitta Balance</p>
            <button onclick="window.location.href='../Categories/pittarecipe/recipe1.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="bittersalad.jpg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Bitter Sweet Pitta Pacifying Salad</h2>
            <p>Cooling the Core – Peaceful Plates for Pitta Balance</p>
            <button onclick="window.location.href='../Categories/pittarecipe/recipe2.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="idly.png" alt=""/>
          </div>
          <div class="card-details">
            <h2>Soft Pluffy Idly</h2>
            <p>Cooling the Core – Peaceful Plates for Pitta Balance</p>
            <button onclick="window.location.href='../Categories/pittarecipe/recipe3.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="gajarkahalwa.jpg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Sweet Carrot Halwa(gajar ka halwa)</h2>
            <p>Cooling the Core – Peaceful Plates for Pitta Balance</p>
            <button onclick="window.location.href='../Categories/pittarecipe/recipe4.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="moongkitchari.jpg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Moong Dal Khichadi </h2>
            <p>Cooling the Core – Peaceful Plates for Pitta Balance</p>
            <button onclick="window.location.href='../Categories/pittarecipe/recipe5.php';">View Recipe</button>
          </div>
        </div>
        <div class="card">
            <div class="img-container">
              <img src="coconutrice.jpg" alt=""/>
            </div>
            <div class="card-details">
              <h2>Fragrant Coconut Rice</h2>
              <p>Cooling the Core – Peaceful Plates for Pitta Balance</p>
              <button onclick="window.location.href='../Categories/pittarecipe/recipe6.php';">View Recipe</button>
            </div>
          </div>
          </div>
    
    <!------------contact section-------------------------->
   <!-- <section class="contact">
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> 123 Main Street, city,city,country</p>
            <p><strong>Phone:</strong>1234567890</p>
            <p><strong>Email:</strong>info@example.com</p>
        </div>
        <div class="contact-form">
            <h2>Contact Form</h2>
            <form>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <label for="message">Message:</label>
                <textarea name="message" id="message"  required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>
<footer>
    <div class="social-icons">
        <a href="#" class="social-icon"> <i class="fab fa-facebook"></i> </a>
        <a href="#" class="social-icon"> <i class="fab fa-twitter"></i> </a>
        <a href="#" class="social-icon"> <i class="fab fa-instagram"></i> </a>
    </div>
    <h5>CopyRight © 2023 By Flavoursome Recipes </h5>
</footer>-->

</body>

</html>
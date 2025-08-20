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
    <link rel="stylesheet" href="drinks1.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,200;1,300;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Calming Drinks</title>
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
            <h1>Calming Drinks Recipes</h1>
            <h3>Eat good feel good</h3>
            <div class="button">Start Cooking</div>
        </div>
    </div> 
    <!----About Section Start---------------------------------->
    <section class="about">
        <h2>The Power of Calming Drinks in Ayurveda</h2>
        <div class="main">
            <img src="drinkabout.jpeg" alt="">
            <div class="about-text">
                <p>Calming drinks help restore balance to the body and mind, especially during 
                    seasonal or dietary changes. In Ayurveda, balanced doshas—vata, pitta, and kapha—promote 
                    health and peace, while imbalances can cause discomfort. 
                    These drinks soothe excess doshas, supporting digestion and 
                    relaxation for overall well-being.</p>

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
            <img src="ashgaurdjuice.jpg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Ash Gourd(Winter Melon)Juice</h2>
            <p>A Sip of Balance, A Taste of Tradition.</p>
            <button onclick="window.location.href='../Categories/drinkrecipes/recipe1.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="greenjuice.jpeg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Green Juice</h2>
            <p>A Sip of Balance, A Taste of Tradition</p>
            <button onclick="window.location.href='../Categories/drinkrecipes/recipe2.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="cpo1.jpg" alt=""/>
          </div>
          <div class="card-details">
            <h2>CPO Juice</h2>
            <p>A Sip of Balance, A Taste of Tradition</p>
            <button onclick="window.location.href='../Categories/drinkrecipes/recipe3.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="lemonade1.jpeg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Lemonade</h2>
            <p>A Sip of Balance, A Taste of Tradition</p>
            <button onclick="window.location.href='../Categories/drinkrecipes/recipe4.php';">View Recipe</button>
          </div>
        </div>
         <div class="card">
          <div class="img-container">
            <img src="ginger1.jpeg" alt=""/>
          </div>
          <div class="card-details">
            <h2>Ginger Lemon Tea</h2>
            <p>A Sip of Balance, A Taste of Tradition</p>
            <button onclick="window.location.href='../Categories/drinkrecipes/recipe5.php';">View Recipe</button>
          </div>
        </div>
        <div class="card">
            <div class="img-container">
              <img src="cuminwater.jpg" alt=""/>
            </div>
            <div class="card-details">
              <h2>Jeera(Cumin) Water</h2>
              <p>A Sip of Balance, A Taste of Tradition.</p>
              <button onclick="window.location.href='../Categories/drinkrecipes/recipe6.php';">View Recipe</button>
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
<?php
if (file_exists('features/indexf.php')) {
    include('features/indexf.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,200;1,300;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Ayurveda Recipes</title>
</head>

<body>
    <header>
        <div class="logo">Ayurveda Recipes</div>
        <div class="nav-bar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#recipe">Recipes</a></li>
                <li><a href="#categories">Categories</a></li>
                <li><a href="#con">Reference</a></li>
            </ul>
        </div>
    </header>
    <div class="hero">
        <div class="content">
            <h4>Eating well is a form of self-love</h4>
            <h1>The greatest wealth is health</h1>
            <h3>Eat good feel good</h3>
            <div class="button">Start Cooking</div>
        </div>
    </div>
    <!----About Section Start---------------------------------->
    <section class="about">
    <h2 id="about">About Us</h2>
        <div class="main">
            <img src="20 Indian Thali Ideas.jfif" alt="">
            <div class="about-text">
                <p>Welcome to our Ayurevda recipes, Nourish your body and soul with the ancient
                     wisdom of Ayurveda recipes, where vibrant spices and wholesome ingredients 
                     harmonize to create dishes that delight the senses and balance the doshas. 
                     Savor the warmth of golden turmeric, the comfort of slow-cooked kitchari,
                      and the vitality of fresh herbs,all blended in perfect harmony to 
                      awaken your taste buds and rejuvenate your spirit</p>

            </div>
        </div>
    </section>
   

    
    
       
    <!-----Recipes Section Start---------------------------------->
    <div class="recipe">
        <h2 id="recipe">Featured Recipes</h2>
        <div class="box">
            <div class="card">
                <img src="r1.jfif" alt="" ></a>
                <div class="content">
                    <h3>Golden Turmeric Milk</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index.php';">View Recipe</button>
                    
                </div>
            </div>
            <div class="card">
                <img src="r2.jfif" alt="">
                <div class="content">
                    <h3>Ayurvedic Tomato Rasam</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index3.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="r3.jfif" alt="">
                <div class="content">
                    <h3>Moong Dal Soup</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index4.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="r4.jfif" alt="">
                <div class="content">
                    <h3>Vegetable Thalipeeth</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index5.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="r5.jfif" alt="">
                <div class="content">
                    <h3>Mango Maple Smoothie </h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index2.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="dosa.jpeg" alt="">
                <div class="content">
                    <h3>Barnyard Millet Neer Dosa</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index6.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="r7.jfif" alt="">
                <div class="content">
                    <h3>Raw mango coconut soup</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index7.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="r8.jfif" alt="">
                <div class="content">
                    <h3>Coconut burfi with jaggery</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index9.php';">View Recipe</button>
                </div>
            </div>
            <div class="card">
                <img src="r9.jfif" alt="">
                <div class="content">
                    <h3>Sabudana Khichdi</h3>
                    <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                    <button onclick="window.location.href='../recipe/index8.php';">View Recipe</button>
                </div>
        </div>
        <div class="card">
            <img src="r10.jfif" alt="">
            <div class="content">
                <h3>Cauliflower Green Curry</h3>
                <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
                <button onclick="window.location.href='../recipe/index10.php';">View Recipe</button>
            </div>
    </div>
    <div class="card">
        <img src="r11.jfif" alt="">
        <div class="content">
            <h3>caradmom tea cake</h3>
            <P>Ayurvedic recipes blend nature’s healing herbs and spices for holistic wellness.</P>
            <button onclick="window.location.href='../recipe/index11.php';">View Recipe</button>
        </div>
</div>

    </div>
    <!--------------categories section-------------------------------->
    <div class="categories">
        <h2 id="categories">Categories</h2>
        <div class="box">
            <div class="ca-card">
                <img src="maincourse.jfif" alt="">
                <div class="content">
                    <h3>Pitta dosha</h3>
                    <p>Balance the Fire with Pitta Bites!</p>
                    <button onclick="window.location.href='../Categories/pitta.php';">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="desserts.jfif" alt="">
                <div class="content">
                    <h3>Kapha dosha</h3>
                    <p>Warm, Spicy & Energizing for Kapha!</p>
                    <button onclick="window.location.href='../Categories/kapha.php';">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="healthyeats.jfif" alt="">
                <div class="content">
                    <h3>Vata dosha</h3>
                    <p>"Warm, Moist & Comforting for Vata!</p>
                    <button onclick="window.location.href='../Categories/vata.php';">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="baking.jfif" alt="">
                <div class="content">
                    <h3>Calming drinks</h3>
                    <p>Cool the fire, calm the mind</p>
                    <button onclick="window.location.href='../Categories/drinks.php';">Read More</button>
                </div>
            </div>
        </div>
    </div>
    <!------------contact section-------------------------->
    <section class="contact">
        <div class="contact-info">
            <h2 id="con">References</h2>
            <p><strong>Recipes:</strong> Recipes are referred from artofliving,nadivaidya,arohanyoga websites.</p>
            <p><strong>Images:</strong> Created with AI tools like Meta AI and Microsoft Image Creator, ensuring no copyrighted materials are used.</p>
        </div>
    </section>
    
    <!---<div class="contact-form">
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
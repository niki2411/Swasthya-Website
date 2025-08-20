<?php
if (file_exists('homepage.php')) {
    echo "File exists!";
    include('homepage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swasthya Features</title>
    <link rel="stylesheet" href="stylef.css" class="css">
    <!-- FONT AWESOME LINK USING BOXICON -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="wrapper">
        <h1>Our Features</h1>
        <p>Swasthya provides yoga pose detection, Ayurvedic recipes, a dosha calculator, and a yoga video library.</p>
             <div class="content-box">
                <div class="card">
                  <!--  <i class="bx bx-bar-chart-alt bx-md"></i> -->
                    <img src="meditation.png" alt="">
                    <h2>Yoga pose detection</h2>
                    <a href="../Yoga_page/index.php">Click here</a>
                  <p>The yoga pose detection feature uses computer vision to identify and analyze
                     yoga poses in real time, providing instant feedback to correct alignment and enhance practice accuracy. </p>

                </div>
                <div class="card">
                   <!--<i class="bx bx-laptop bx-md"></i>--> 
                  <img src="cooking.png" alt="">
                    <h2>Ayurvedic Recipes</h2>
                    <a href="../Recipes Final/index.php">Click here</a>
                   <p>Discover delicious and nutritious recipes based on Ayurvedic principles to balance your doshas.</p>
                         
                </div>
                <div class="card">
                   <!--<i class='bx bx-user bx-md'></i>--> 
                    <img src="library.png" alt="">
                    <h2>Yoga Library</h2>
                    <a href="../yogagallery/yogagallerypage.php">Click here</a>
                <p>Explore our extensive library of yoga videos and images, suitable for dosha for practice.</p>
                         
                </div>
                <div class="card">
                   <!--<i class="bx bx-mail-send bx-md"></i>--> 
                   <img src="quiz.png" alt="">
                    <h2>Dosha Calculator</h2>
                    <a href="../Quizpage/index1.php">Click here</a>
                    <p>Find out your unique dosha type - the first step to understanding your natural balance.</p>
                         
                
                         
                </div>
             </div>
    </div>
</body>
</html>
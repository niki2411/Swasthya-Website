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
    <title>Pranayama Study</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #eef2f3;
            background-image: url('bag.jpg');
            background-repeat: no-repeat;
            background-position: center; 
            background-attachment: fixed;
            height: 100vh;/* Background image */
            background-size: cover; /* Cover the entire screen */
        }
        .container {
            width: 90%;
            max-width: 1400px; /* Increased width */
            margin: auto;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #a0a66c;
        }
        .row {
            display: flex;
            flex-wrap: wrap; /* Prevents overlapping */
            justify-content: center;
            gap: 20px; /* Adds spacing between elements */
            padding: 20px;
        }
        .col-sm-6 {
            width: 90%; /* Increased width */
            max-width: 1600px; /* Prevents excessive stretching */
            padding: 10px;
            min-height: 550px; /* Ensures uniform height */
            max-height: 600px; /* Restricts excessive height */
            overflow: hidden; /* Prevents overflow */
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .ih-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }
        .ih-item img {
        width: 100%; /* Ensures responsiveness */
        height: 490px;
        padding-top: 35px; /* Set a fixed height (adjust as needed) */
        object-fit: cover; /* Ensures the image fills the height without distortion */
        display: block;
}
.graph {
    text-align: center; /* Centers the graph */
    margin-top: 15px;
     /* Adds spacing from the text */
}

.graph img {
    width: 80%; /* Makes the image responsive */
    max-width: 500px; /* Prevents it from being too large */
    height: auto; /* Maintains aspect ratio */
    border-radius: 10px; /* Soft corners */
    padding-left: 97px; /* Adds spacing around the image */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow effect */
}
.graph1 {
    text-align: center; /* Centers the graph */
    margin-top: 15px;
    
     /* Adds spacing from the text */
}


.graph1 img {
    display: block;
  margin: 0 auto;
  width: 80%;
  max-width: 300px;
  height: auto;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: auto;
    background: rgba(33, 2, 2, 0.9);
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 8px; /* Ensures spacing for better readability */
    opacity: 0;
    transition: opacity 0.3s ease;
}

.ih-item:hover .info {
    opacity: 1; /* Makes text visible on hover */
}

/* Experiment details styling */
.info h3 {
    font-size: 25px;
    margin-bottom: 10px;
}

.info p {
    font-size: 17px;
    line-height: 1.5;
    padding: 0 10px;
    text-align: justify; /* Ensures better readability */
}

/* Responsive Fixes */
@media (max-width: 768px) {
    .graph img {
        max-width: 100%; /* Ensures it fits smaller screens */
    }

    .info {
        padding: 10px; /* Adjust padding for smaller screens */
    }
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

.typewriter {
  font-family: 'Poppins', sans-serif;
  font-size: 2.2rem;
  color: #fffcfc; /* Bright white for contrast */
  white-space: nowrap;
  overflow: hidden;
  width: 0;
  margin: 50px auto;
  animation: typing 4s steps(44, end) forwards;
  position: relative;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Makes text pop over background */
  background-color: rgba(0, 0, 0, 0.3); /* Optional: subtle background highlight */
  padding: 10px 20px;
  border-radius: 10px;
}

/* Typing animation */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* Cursor */
.typewriter::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  width: 3px;
  height: 100%;
  background-color: #170101;
  animation: blink 0.7s step-end infinite, hideCursor 0s 4.1s forwards;
}

/* Cursor blink */
@keyframes blink {
  0%, 100% { opacity: 1 }
  50% { opacity: 0 }
}

/* Cursor hide */
@keyframes hideCursor {
  to { opacity: 0 }
}


    </style>
</head>
<body>
    <div class="container">
        <h1 class="typewriter">Pranayama Study and Research</h1>
        <p style="text-align: center; 
          color: #c51f02; 
          font-family: 'Poppins', sans-serif; 
          font-size: 1.7rem; 
          font-weight: 800; 
          text-shadow: 2px 2px 6px rgba(192, 17, 17, 0.7);">
  Exploring the benefits of pranayama through scientific experiments.
</p>


        <div class="row">
            <div class="col-sm-6">
                <div class="ih-item"><a href="#">
                    <img src="pra1.jpeg" alt="Impact Study">
                    <div class="info">
                        <h3>Experiment Details</h3>
                        <p><strong>Suryabhedan Pranayama :</strong> It is a breathing technique where one inhales through the right nostril and exhales through the left. It is believed to generate internal heat
            
                            and boost energy.We conducted a 10-minute session with 25 first-year IT students at Usha Mittal Institute of Technology.
                        </p>
                        <div class="graph">
                            <img src="sur.png" alt="Graph showing results">
                           
                            <p>5 students experienced a decrease in body temperature, 1 student showed no change, Others had a slight increase </p>


                        </div>
                    </div></a>
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-6">
                <div class="ih-item"><a href="#">
                    <img src="Pra2.jpeg" alt="Impact Study">
                    <div class="info">
                        <h3>Experiment Details</h3>
                        <p><strong>Chandrabhedan Pranayama :</strong> It involves inhaling through the left nostril and exhaling through the right. It is known for its cooling and calming effects.
                            Using the same group and duration, we noticed a different trend.</p>
                          
                        <div class="graph">
                            <img src="chan.png" alt="Graph showing results">
                            <p>Majority experienced an increase in temperature & Fewer showed a drop compared to the Suryabhedan session</p>

       
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="ih-item"><a href="#">
                        <img src="conf.jpeg" alt="Impact Study">
                        <div class="info">
                            <h3>Research Recognition & Support</h3>
                            <p><strong>ICCC 2025 : </strong>We had the privilege of presenting our work at the International Conference on Climate Change 2025 in Chandrapur, where we published our paper:
                                "Breathing Balance: Yogic Solution for Climate Change."
                                </p>
                            <div class="graph1">
                                <img src="dia.jpeg" alt="Graph showing results">
                                <p>After our study, we received generous support from Nareena’s Digital Thermometer, who provided us with 25 devices to aid further research on the effects of pranayama on body temperature.</p>
                            </div>
                        </div></a>
                    </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
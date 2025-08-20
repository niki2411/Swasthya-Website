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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Swasthya - References & Credits</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-image:url("bg.jpeg");
      background-color: rgba(0, 0, 0, 0.3); /* Overlay color */
      background-blend-mode: overlay; 
	    background-size: cover;
	    background-repeat: no-repeat;
      color:rgb(11, 15, 20);
      opacity: 0.9;
    }
    header {
      background: linear-gradient(135deg,#900C3F, #FFB22C,#FF4C4C);
      color: white;
      padding: 20px;
      text-align: center;
    }
    main {
      padding: 30px;
      max-width: 800px;
      margin: auto;
      background: whitesmoke;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
      margin-top: 30px;
    }
    h2 {
      color:rgb(241, 168, 8);
      margin-top: 30px;
    }
    p {
      line-height: 1.6;
    }
    a {
      color: #92840e;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    footer {
      text-align: center;
      padding: 20px;
      font-size: 0.9em;
      color: rgb(255, 255, 255);
    }
  </style>
</head>
<body>

  <header>
    <h1>References & Credits</h1>
  </header>

  <main>
    <h2>Images</h2>
    <p>All images used on this website are either:</p>
    <ul>
      <li>Copyright-free and sourced from platforms like <a href="https://www.freepik.com/" target="_blank">freepik</a> and <a href="https://www.pexels.com/" target="_blank">pexels</a></li>
      <li>AI-generated using tools like <strong>Microsoft-AI</strong> and <strong>Meta AI</strong>.</li>
    </ul>
    <p>We gratefully acknowledge these platforms and tools for allowing open and creative content sharing.</p>

    <h2>Recipes</h2>
    <p>Recipes are referred from artofliving,nadivaidya,arohanyoga websites.</p>
    <p>Special thanks to OpenAI for enabling creative and informative content generation.</p>

    <h2>Yoga Videos</h2>
    <p>Some yoga poses on the website include embedded YouTube videos to enhance user understanding. All credits go to the original creators of these videos.</p>
    <p>YouTube Channel Links (examples):</p>
    <ul>
      <li><a href="https://youtube.com/@ventunoyoga?si=V1Qa4KQ7cxT7QyjB" target="_blank">Yoga & You</a></li>
      <li><a href="https://youtube.com/@artofliving-official?si=tW0y3hAh4gKvk0GQ" target="_blank">The Art Of Living</a></li>
      <li><a href="https://youtube.com/@mindbodysoul?si=FkCkywG7BDqejtur" target="_blank">Mind Body Soul</a></li>
      <li><a href="https://youtube.com/@theyogihut?si=yS_hf_4xsm4GXzZA" target="_blank">The Yogi Hut</a></li>
      <li><a href="https://youtube.com/@stylecrazeyoga?si=lj8UVw02aZu0WPAY" target="_blank">Stylecraze Yoga</a></li>
      <li><a href="https://youtube.com/@yog4lyf?si=GwWajFLDdQJ_0Upw" target="_blank">Yoga4Lyf</a></li>
      <li><a href="https://youtube.com/@yogaforcurevideos?si=a8AcnUzi4Q3r4ixL" target="_blank">Yoga For Cure Videos</a></li>
    </ul>

    <h2>General Acknowledgment</h2>
    <p>We extend our sincere gratitude to all open-source tools, platforms, creators, and AI resources that helped in building the <strong>Swasthya</strong> website.</p>
  </main>

  <footer>
    &copy; 2025 Swasthya. All rights reserved.
  </footer>

</body>
</html>
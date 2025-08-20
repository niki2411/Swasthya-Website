<?php
if (file_exists('features/indexf.php')) {
    include('features/indexf.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Open+Sans:wght@300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css"/>
    <title>Dosha Balanced Yoga Gallery</title>
</head>
<body>
    <div class="header">
        <img src="logo1.png" alt="Yoga Header Image">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 1200 150" xml:space="preserve">
        <defs>
            <pattern id="water" width="0.25" height="1.1" patternContentUnits="objectBoundingBox">
                <path fill="#95CD41" d="M0.25,1H0c0,0,0-0.659,0-0.916c0.083-0.303,0.158,0.334,0.25,0C0.25,0.327,0.25,1,0.25,1z"/>
            </pattern>
            <mask id="text-mask">
                <text x="120" y="100" font-family="Acme" font-size="80" fill="#F7FD04">Dosha Balanced Yoga Gallery</text>
            </mask>
        </defs>
        <text x="120" y="100" font-family="Acme" font-size="80" fill="#004225">Dosha Balanced Yoga Gallery</text>
        <rect mask="url(#text-mask)" fill="url(#water)" x="0" y="50" width="1200" height="120" opacity="0.3" />
        <rect mask="url(#text-mask)" fill="url(#water)" x="0" y="45" width="1600" height="120" opacity="0.3" />
    </svg>
    </div>
    <div class="filter-buttons">
        <button onclick="filterGallery('all')">All</button>
        <button onclick="filterGallery('vata')">Vata</button>
        <button onclick="filterGallery('pitta')">Pitta</button>
        <button onclick="filterGallery('kapha')">Kapha</button>
    </div>
    <!----<div class="gallery" id="gallery">
        <div class="yoga-card" data-dosha="vata">
            <img src="bg1.jpeg" alt="Vata Yoga">
            <h3>Vata Yoga Pose</h3>
        </div>
        <div class="yoga-card" data-dosha="pitta">
            <img src="bg2'.jpeg" alt="Pitta Yoga">
            <h3>Pitta Yoga Pose</h3>
        </div>
        <div class="yoga-card" data-dosha="kapha">
            <img src="bg3.jpeg" alt="Kapha Yoga">
            <h3>Kapha Yoga Pose</h3>
        </div>--->

<!----------------------------------------------------------------------------------------------------------->
        <section class="cards">
            <article class="card card--1" data-dosha="kapha">
              <div class="card__info-hover">    
              </div>
              <div class="card__img"></div>
              <a href="yoga4.html" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category">Triangle pose</span>
                <h3 class="card__title">Trikonasana</h3>
              </div>
            </article>
              
              
            <article class="card card--2" data-dosha="kapha">
              <div class="card__info-hover">
                
              </div>
              <div class="card__img"></div>
              <a href="yoga5.html" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category">Warrior I</span>
                <h3 class="card__title">Virabhadrasana I</h3>
              </div>
            </article> 

            <article class="card card--3" data-dosha="kapha">
                <div class="card__info-hover">
                  
                </div>
                <div class="card__img"></div>
                <a href="yoga6.html" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category">Warrior II</span>
                  <h3 class="card__title">Virabhadrasana II</h3>
                </div>
              </article> 

              <article class="card card--4" data-dosha="vata">
                <div class="card__info-hover">
                  
                </div>
                <div class="card__img"></div>
                <a href="yoga2.html" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category">Knee to chest</span>
                  <h3 class="card__title">Apanasana</h3>
                </div>
              </article> 
    
<!--------------------------------------------------------------------------------------------------------------->
              <article class="card card--5" data-dosha="kapha">
                <div class="card__info-hover">
                  
                </div>
                <div class="card__img"></div>
                <a href="yoga8.html" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category">Side Plank</span>
                  <h3 class="card__title">Vasisthasana</h3>
                </div>
              </article> 

              <article class="card card--6" data-dosha="vata kapha">
                <div class="card__info-hover">
                  
                </div>
                <div class="card__img"></div>
                <a href="yoga.html" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category">Cobra Pose</span>
                  <h3 class="card__title">Bhujangasana </h3>
                </div>
              </article> 

              <article class="card card--7" data-dosha="vata kapha">
                <div class="card__info-hover">    
                </div>
                <div class="card__img"></div>
                <a href="boat.html" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category">Boat Pose</span>
                  <h3 class="card__title">Navakasana</h3>
                </div>
              </article>
                
                
              <article class="card card--8" data-dosha="pitta">
                <div class="card__info-hover">
                  
                </div>
                <div class="card__img"></div>
                <a href="cat.html" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category">Cat Stretch</span>
                  <h3 class="card__title">Marjaryasana</h3>
                </div>
              </article> 
              
<!----------------------------------------------------------------------------------------------------------------->
                <article class="card card--9" data-dosha="vata">
                    <div class="card__info-hover">
                      
                    </div>
                    <div class="card__img"></div>
                    <a href="yoga3.html" class="card_link">
                       <div class="card__img--hover"></div>
                     </a>
                    <div class="card__info">
                      <span class="card__category">Lotus Pose</span>
                      <h3 class="card__title">Padmasana</h3>
                    </div>
                  </article> 

                  <article class="card card--10" data-dosha="vata pitta">
                    <div class="card__info-hover">
                      
                    </div>
                    <div class="card__img"></div>
                    <a href="crocodile.html" class="card_link">
                       <div class="card__img--hover"></div>
                     </a>
                    <div class="card__info">
                      <span class="card__category">Crocodile Pose</span>
                      <h3 class="card__title">Makarasana</h3>
                    </div>
                  </article> 
    
                  <article class="card card--11" data-dosha="pitta">
                    <div class="card__info-hover">
                      
                    </div>
                    <div class="card__img"></div>
                    <a href="moon.html" class="card_link">
                       <div class="card__img--hover"></div>
                     </a>
                    <div class="card__info">
                      <span class="card__category">Moon Salutation</span>
                      <h3 class="card__title">Chandra Namaskar</h3>
                    </div>
                  </article> 
    
                  <article class="card card--12" data-dosha="pitta">
                    <div class="card__info-hover">
                      
                    </div>
                    <div class="card__img"></div>
                    <a href="seat.html" class="card_link">
                       <div class="card__img--hover"></div>
                     </a>
                    <div class="card__info">
                      <span class="card__category">Seated Forward Bend</span>
                      <h3 class="card__title">Paschimottanasana</h3>
                    </div>
                  </article> 

<!----------------------------------------------------------------------------------------------------------------->

                    <article class="card card--13" data-dosha="pitta">
                      <div class="card__info-hover">    
                      </div>
                      <div class="card__img"></div>
                      <a href="side.html" class="card_link">
                         <div class="card__img--hover"></div>
                       </a>
                      <div class="card__info">
                        <span class="card__category">Extended Side Angle</span>
                        <h3 class="card__title">Utthita Parsvokonasana</h3>
                      </div>
                    </article>
                    <article class="card card--14" data-dosha="vata pitta">
                      <div class="card__info-hover">
                        
                      </div>
                      <div class="card__img"></div>
                      <a href="yoga1.html" class="card_link">
                         <div class="card__img--hover"></div>
                       </a>
                      <div class="card__info">
                        <span class="card__category">Corpse</span>
                        <h3 class="card__title">Shavasana</h3>
                      </div>
                    </article> 
                  </section>
    </div>
    <script>
        function filterGallery(dosha) {
          const cards = document.querySelectorAll(".card");
          cards.forEach(card => {
            const cardDosha = card.getAttribute("data-dosha").split(" ");
            if (dosha === "all" || cardDosha.includes(dosha)) {
              card.style.display = "block";
            } else {
              card.style.display = "none";
            }
          });
        }
      </script>
</body>
</html>




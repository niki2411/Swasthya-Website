<?php
if (file_exists('Categories/drinks.php')) {
    include('Categories/drinks.php');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe 4</title>
    <link rel="stylesheet" href="recipe4.css">
</head>
<body>
    <div class="container">
        <div class="recipe-img">
            <img src="lemonade.jpg" alt="" class="src">
        </div>

        <div class="recipe-information">
            <h1>Lemonade</h1>
            <p class="description">A refreshing and tangy drink perfect for hot days! Made with fresh lemons, sweetened with sugar, and served chilled for a revitalizing experience.</p>
        
            <div class="recipe-icons">
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                    </svg>
                    <h5>Total Time</h5>
                    <p>10 min.</p>
                </article>
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                    </svg>
                    <h5>Prep Time</h5>
                    <p>5 min.</p>
                </article>
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                    </svg>
                    <h5>Cooking Time</h5>
                    <p>5 min.</p>
                </article>
            </div>
        
            <div class="recipe-step">
                <h2>Ingredients for Lemonade</h2>
                <ul class="ingredients">
                    <li><span>4-5 fresh lemons, juiced</span></li>
                    <li><span>1/2 cup sugar (or to taste)</span></li>
                    <li><span>4 cups cold water</span></li>
                    <li><span>Ice cubes (optional)</span></li>
                    <li><span>Mint leaves for garnish (optional)</span></li>
                </ul>
            </div>
        
            <hr>
        
            <div class="recipe-step">
                <h2>Instructions for Lemonade</h2>
                <div class="instructions">
                    <div class="item">
                        <p><span>1. Juice the Lemons:</span> Squeeze the juice of the lemons into a pitcher, removing any seeds.</p>
                    </div>
                    <br>
                    <div class="item">
                        <p><span>2. Add Sugar:</span> Stir in sugar until it dissolves completely. Adjust the sweetness to your preference.</p>
                    </div>
                    <br>
                    <div class="item">
                        <p><span>3. Add Water:</span> Pour cold water into the pitcher and mix well. Add more water if needed for the desired consistency.</p>
                    </div>
                    <br>
                    <div class="item">
                        <p><span>4. Serve:</span> Add ice cubes and garnish with fresh mint leaves. Serve chilled and enjoy!</p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        
</body>
</html>
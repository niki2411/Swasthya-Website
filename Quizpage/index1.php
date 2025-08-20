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
  <title>Dosha Quiz</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="quiz-container">
    <h1>Unlock Your Inner Balance: Discover Your Dosha</h1>
    <form id="doshaQuiz" action="results1.php" method="POST">
      <!-- User Info -->
      <div class="user-info" id="userInfo">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" placeholder="Your age" required>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>
        <button type="button" id="startQuizButton">Start Quiz</button>
      </div>

      <!-- Questions -->
      <div class="questions-container" id="questionsContainer" style="display: none;">
        <!-- Question 1 -->
        <div class="question">
          <p>1. What describes your body type best?</p>
          <label><input type="radio" name="q1" value="Vata" required> Thin and light</label>
          <label><input type="radio" name="q1" value="Pitta" required> Medium and muscular</label>
          <label><input type="radio" name="q1" value="Kapha" required> Heavy and solid</label>
        </div>

        <!-- Question 2 -->
        <div class="question">
          <p>2. How do you usually feel when under stress?</p>
          <label><input type="radio" name="q2" value="Vata" required> Anxious or worried</label>
          <label><input type="radio" name="q2" value="Pitta" required> Irritable or angry</label>
          <label><input type="radio" name="q2" value="Kapha" required> Withdrawn or sluggish</label>
        </div>

                <!-- Question 3 -->
        <div class="question">
          <p>3. What is the shape of your face?</p>
          <label><input type="radio" name="q3" value="Vata" required> Thin, Angular</label>
          <label><input type="radio" name="q3" value="Pitta" required> Tapering or Triangular</label>
          <label><input type="radio" name="q3" value="Kapha" required> Rounded, plump</label>
        </div>
                <!-- Question 4 -->
        <div class="question">
          <p>4. How would you describe your skin?</p>
          <label><input type="radio" name="q4" value="Vata" required> Thin,dry,cold,rough,dark</label>
          <label><input type="radio" name="q4" value="Pitta" required> Smooth,oily,warm,rosy</label>
          <label><input type="radio" name="q4" value="Kapha" required> Thick,oily,cool,white,pale</label>
        </div>
                <!-- Question 5 -->
        <div class="question">
          <p>5. What best describes your hair?</p>
          <label><input type="radio" name="q5" value="Vata" required> Dry,brittle,thin</label>
          <label><input type="radio" name="q5" value="Pitta" required> Oily,straight,reddish</label>
          <label><input type="radio" name="q5" value="Kapha" required> Thick,curly,oily</label>
        </div>
                <!-- Question 6 -->
        <div class="question">
          <p>6.How are your eyes?</p>
          <label><input type="radio" name="q6" value="Vata" required> Small,active,sunken</label>
          <label><input type="radio" name="q6" value="Pitta" required> Sharp,bright,sensitive to light</label>
          <label><input type="radio" name="q6" value="Kapha" required> Large,calm,loving</label>
        </div>

                <!-- Question 7 -->
        <div class="question">
          <p>7. What describes your lips best?</p>
          <label><input type="radio" name="q7" value="Vata" required> Dry,cracked,black/brown tinge</label>
          <label><input type="radio" name="q7" value="Pitta" required> Red,inflamed,yellowish</label>
          <label><input type="radio" name="q7" value="Kapha" required> Smooth,oily,cool,white,pale</label>
        </div>
                <!-- Question 8 -->
        <div class="question">
          <p>8. How would you describe your appetite?</p>
          <label><input type="radio" name="q8" value="Vata" required> Irregular,sometimes strong and sometimes low</label>
          <label><input type="radio" name="q8" value="Pitta" required> Strong and constant</label>
          <label><input type="radio" name="q8" value="Kapha" required> Slow but steady</label>
        </div>
                <!-- Question 9 -->
        <div class="question">
          <p>9. What best describes your emotions?</p>
          <label><input type="radio" name="q9" value="Vata" required> Anxiety,fear,uncertainy</label>
          <label><input type="radio" name="q9" value="Pitta" required> Anger,hate,jealously</label>
          <label><input type="radio" name="q9" value="Kapha" required> Calm,greedy,attachment</label>
        </div>
                <!-- Question 10 -->
        <div class="question">
          <p>10. How would you describe your mind?</p>
          <label><input type="radio" name="q10" value="Vata" required> Restless</label>
          <label><input type="radio" name="q10" value="Pitta" required> Impatient</label>
          <label><input type="radio" name="q10" value="Kapha" required> Calm</label>
        </div>
                <!-- Question 11 -->
        <div class="question">
          <p>11. How is your sleep pattern?</p>
          <label><input type="radio" name="q11" value="Vata" required> Irregular</label>
          <label><input type="radio" name="q11" value="Pitta" required> Normal</label>
          <label><input type="radio" name="q11" value="Kapha" required> long sleep</label>
        </div>
                <!-- Question 12 -->
        <div class="question">
          <p>12. How would you describe your voice?</p>
          <label><input type="radio" name="q12" value="Vata" required> Weak, hoarse</label>
          <label><input type="radio" name="q12" value="Pitta" required> Strong tone</label>
          <label><input type="radio" name="q12" value="Kapha" required> Deep,good tone</label>
        </div>

        <!-- Navigation Buttons -->
        <div class="navigation-buttons">
          <button type="button" id="nextButton">Next</button>
          <button type="button" id="backButton" style="display: none;">Back</button>
          <button type="button" id="restartButton" style="display: none;">Restart</button>
          <button type="button" id="exitButton" style="display: none;">Exit</button>
          <button type="submit" id="submitButton" style="display: none;">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="script1.js"></script>
</body>
</html>


document.addEventListener("DOMContentLoaded", () => {
  const userInfo = document.getElementById("userInfo");
  const questionsContainer = document.getElementById("questionsContainer");
  const startQuizButton = document.getElementById("startQuizButton");
  const nextButton = document.getElementById("nextButton");
  const backButton = document.getElementById("backButton");
  const restartButton = document.getElementById("restartButton");
  const exitButton = document.getElementById("exitButton");
  const submitButton = document.getElementById("submitButton");
  const questions = document.querySelectorAll(".question");
  let currentQuestion = 0;

  // Show question by index
    function showQuestion(index) {
      questions.forEach((q, i) => q.classList.remove("active"));
      questions[index].classList.add("active");
  
      backButton.style.display = index > 0 ? "block" : "none";
      nextButton.style.display = index < questions.length - 1 ? "block" : "none";
      submitButton.style.display = index === questions.length - 1 ? "block" : "none";
      restartButton.style.display = index === questions.length - 1 ? "block" : "none";
      exitButton.style.display = index === questions.length - 1 ? "block" : "none";
    }

  // Start Quiz Button Logic
  startQuizButton.addEventListener("click", () => {
    const name = document.getElementById("name").value.trim();
    const age = document.getElementById("age").value.trim();
    const gender = document.getElementById("gender").value.trim();
    const email = document.getElementById("email").value.trim();

    if (!name || !email) {
      alert("Please enter your name and email.");
      return;
    }

    // Hide user info and show questions
    userInfo.style.display = "none";
    questionsContainer.style.display = "block";
    questions[currentQuestion].classList.add("active");
  });

  // Next Button Logic
  nextButton.addEventListener("click", () => {
    if (currentQuestion < questions.length - 1) {
      questions[currentQuestion].classList.remove("active");
      currentQuestion++;
      questions[currentQuestion].classList.add("active");

      // Show restart and exit buttons on the last question
      if (currentQuestion === questions.length - 1) {
        nextButton.style.display = "none";
        restartButton.style.display = "block";
        exitButton.style.display = "block";
        submitButton.style.display = "block";
      }
    }
  });
  
  // Back
  backButton.addEventListener("click", () => {
    if (currentQuestion > 0) {
      currentQuestion--;
      showQuestion(currentQuestion);
    }
  });

  // Restart Button Logic
  restartButton.addEventListener("click", () => {
    questions[currentQuestion].classList.remove("active");
    currentQuestion = 0;
    questions[currentQuestion].classList.add("active");
    nextButton.style.display = "block";
    restartButton.style.display = "none";
    exitButton.style.display = "none";
    submitButton.style.display = "none";
  });

  // Exit Button Logic
  exitButton.addEventListener("click", () => {
    if (confirm("Are you sure you want to exit the quiz?")) {
      window.location.href = "index1.php"; // Redirect to homepage
    }
  });
});
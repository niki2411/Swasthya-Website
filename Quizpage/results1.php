<?php
require 'db.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's name, email, and answers
    $name = htmlspecialchars($_POST['name']);
    $age = (int)$_POST['age'];
    $gender = $_POST['gender']; // Escape special characters for safety
    $email = htmlspecialchars($_POST['email']);
    $answers = [
        $_POST['q1'],
        $_POST['q2'],
        $_POST['q3'],
        $_POST['q4'],
        $_POST['q5'],
        $_POST['q6'],
        $_POST['q7'],
        $_POST['q8'],
        $_POST['q9'],
        $_POST['q10'],
        $_POST['q11'],
        $_POST['q12'],
        // Add more questions here as needed
    ];

    // Initialize scores for each dosha
    $scores = ['Vata' => 0, 'Pitta' => 0, 'Kapha' => 0];

    // Calculate scores
    foreach ($answers as $answer) {
        $scores[$answer]++;
    }

    // Determine the dominant dosha
    $dominantDosha = array_keys($scores, max($scores))[0];

    // Dosha descriptions
    $descriptions = [
        'Vata' => "Vata is characterized by qualities of lightness, coolness, dryness, and irregularity. It governs movement and creativity.",
        'Pitta' => "Pitta is associated with fire and water. It is linked to digestion, metabolism, and transformation.",
        'Kapha' => "Kapha is associated with earth and water. It embodies stability, strength, and nurturing qualities."
    ];

    // Convert answers to a string (for database storage)
    $answersString = implode(',', $answers);

    // Save results to the database
    $stmt = $pdo->prepare("INSERT INTO results1 (name,age,gender, email, answers, dominant_dosha) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name,$age,$gender, $email, $answersString, $dominantDosha]);

// Percentages
$vataPercent = round(($scores['Vata'] / array_sum($scores)) * 100, 1);
$pittaPercent = round(($scores['Pitta'] / array_sum($scores)) * 100, 1);
$kaphaPercent = round(($scores['Kapha'] / array_sum($scores)) * 100, 1);

// Output HTML
echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Your Dosha Results</title>
<link rel='stylesheet' href='styles.css'>
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
</head>
<body>
<div class='quiz-container'>
    <h1>Discover Your Dosha</h1>
    <p>Thank you, <strong>$name</strong>! Based on your responses, your dominant dosha is:</p>
    <h2>" . ucfirst($dominantDosha) . "</h2>

    <div id='resultContainer' style='display: flex; justify-content: center; gap: 30px; margin: 30px 0;'>
        <div class='gaugeBox'>
            <canvas id='vataGauge'></canvas>
            <p><strong>VATA</strong></p>
        </div>
        <div class='gaugeBox'>
            <canvas id='pittaGauge'></canvas>
            <p><strong>PITTA</strong></p>
        </div>
        <div class='gaugeBox'>
            <canvas id='kaphaGauge'></canvas>
            <p><strong>KAPHA</strong></p>
        </div>
    </div>

    <p>" . $descriptions[$dominantDosha] . "</p>
    <a href='index1.php'>Take the quiz again</a>
</div>

<script>
const vataPercent = $vataPercent;
const pittaPercent = $pittaPercent;
const kaphaPercent = $kaphaPercent;

let vataChart = createGauge('vataGauge', 'Vata', vataPercent, '#255F38');
let pittaChart = createGauge('pittaGauge', 'Pitta', pittaPercent, '#255F38');
let kaphaChart = createGauge('kaphaGauge', 'Kapha', kaphaPercent, '#255F38');

function createGauge(canvasId, label, value, color) {
return new Chart(document.getElementById(canvasId), {
    type: 'doughnut',
    data: {
        labels: [label, ''],
        datasets: [{
            data: [value, 100 - value],
            backgroundColor: [color, '#eee'],
            borderWidth: 0
        }]
    },
    options: {
        rotation: -90,
        circumference: 180,
        cutout: '70%',
        plugins: {
            tooltip: { enabled: false },
            legend: { display: false },
            title: {
                display: true,
                text: label.toUpperCase() + ' - ' + value + '%',
                font: { size: 16 }
            }
        }
    }
});
}
</script>

</body>
</html>";
}
?>

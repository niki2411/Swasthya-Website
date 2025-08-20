let video;
let poseNet;
let pose;
let skeleton;

let brain;
let posesArray = ['Standing', 'Garudasana', 'Garudasana','Sitting','Wrap Hands only','Wrap Legs only'];
let poseLabel = "No Pose Detected"; // Default pose label
let poseStatus = "No Pose"; // "Correct", "Incorrect Pose", or "No Pose Detected"
let confidenceThreshold = 0.75;

// Define a set of correct poses
let correctPoses = [ 'Garudasana', 'Garudasana'];

// Incorrect pose tracking
let incorrectPoses =['Standing','Sitting','Wrap Hands only','Wrap Legs only'];


function setup() {
  let canvas = createCanvas(650, 480); // Ensure canvas is 640x480
  canvas.parent("canvas-container"); // Attach canvas to the container

  video = createCapture(VIDEO);
  video.size(650, 480); // Match video feed size to canvas
  video.hide(); // Hide default HTML video element to avoid overlap
  poseNet = ml5.poseNet(video, modelLoaded);
  poseNet.on("pose", gotPoses);

  let options = {
    inputs: 34,
    outputs: 6,
    task: 'classification',
  };
  brain = ml5.neuralNetwork(options);
  const modelInfo = {
    model: 'model3/model (11).json',
    metadata: 'model3/model_meta (11).json',
    weights: 'model3/model.weights (10).bin',
  };
  brain.load(modelInfo, brainLoaded);
}

function brainLoaded() {
  console.log('pose classification ready!');
  classifyPose();
}
function startDetection() {
  detectionActive = true; // Enable detection
  document.getElementById("startButton").style.display = "none"; // Hide "Start" button
  document.getElementById("backButton").style.display = "inline-block"; // Show "Back" button
  document.getElementById("feedback").innerText = "Feedback: Detection started! Perform a pose.";
  classifyPose(); // Begin pose classification
}

function stopDetection() {
  detectionActive = false; // Disable detection
  document.getElementById("startButton").style.display = "inline-block"; // Show "Start" button
  document.getElementById("backButton").style.display = "none"; // Hide "Back" button

  // Reset pose information
  poseLabel = "Not Started";
  poseStatus = "Not Started";
  document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
  document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;
  document.getElementById("feedback").innerText = "Feedback: Click 'Start' to begin!";
}

function classifyPose() {
  if (pose) {
    let inputs = [];
    for (let i = 0; i < pose.keypoints.length; i++) {
      let x = pose.keypoints[i].position.x;
      let y = pose.keypoints[i].position.y;
      inputs.push(x);
      inputs.push(y);
    }
    brain.classify(inputs, gotResult);
  } else {
    // No pose detected, update the label and status
    poseLabel = "No Pose Detected";
    poseStatus = "No Pose";
    setTimeout(classifyPose, 100);
  }
}

function gotResult(error, results) {
  if (error) {
    console.error(error);
    return;
  }

  if (results.length > 0 && results[0].confidence > confidenceThreshold) {
    // Map the result label to the pose name
    switch (results[0].label) {
      case "1":
        poseLabel = "Standing";
        break;
      case "2":
        poseLabel = "Garudasana";
        break;
      case "3":
        poseLabel = "Garudasana";
        break;
      case "4":
        poseLabel = "Sitting";
        break;
      case "5":
        poseLabel = "Wrap Hands only";
        break;
      default:
        poseLabel = "Wrap Legs only";
        break;
    }

    // Check if the detected pose is among the correct poses
    if (correctPoses.includes(poseLabel)) {
      poseStatus = "Correct";
      incorrectPoses = []; // Reset incorrect poses feedback
      document.getElementById("feedback").innerText = "Feedback: Great job! Keep holding the pose.";
    } else {
      poseStatus = "Incorrect Pose";

      if (!incorrectPoses.includes(poseLabel)) {
        incorrectPoses.push(poseLabel); // Track unique incorrect poses
      }

      // Provide specific feedback
      document.getElementById("feedback").innerText =
        `Feedback: ${poseLabel} detected but it's not a correct pose. Try performing one of the following: Garudasana.`;
    }
  } else {
    poseLabel = "Unknown Pose";
    poseStatus = "Incorrect Pose";

    if (!incorrectPoses.includes(poseLabel)) {
      incorrectPoses.push(poseLabel); // Track unknown pose
    }

    document.getElementById("feedback").innerText =
      "Feedback: An unrecognized pose was detected. Make sure to perform one of the following poses: " + "Garudasana" + ".";
  }

  // Update HTML elements
  document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
  document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;

  classifyPose(); // Re-trigger classification
}

function gotPoses(poses) {
  if (poses.length > 0) {
    pose = poses[0].pose;
    skeleton = poses[0].skeleton;
  } else {
    pose = null; // No poses detected
  }
}

function modelLoaded() {
  console.log('poseNet ready');
}

function draw() {
  push();
  translate(video.width, 0);
  scale(-1, 1);
  image(video, 0, 0, video.width, video.height);

  if (pose) {
    // Draw skeleton and keypoints
    for (let i = 0; i < skeleton.length; i++) {
      let a = skeleton[i][0];
      let b = skeleton[i][1];
      strokeWeight(2);

      if (poseStatus === "Incorrect Pose") {
        stroke(255, 0, 0); // Red for incorrect pose
      } else {
        stroke(0); // Black for correct or no pose detected
      }

      line(a.position.x, a.position.y, b.position.x, b.position.y);
    }

    for (let i = 0; i < pose.keypoints.length; i++) {
      let x = pose.keypoints[i].position.x;
      let y = pose.keypoints[i].position.y;
      fill(0);
      if (poseStatus === "Incorrect Pose") {
        fill(255, 0, 0); // Red for incorrect pose
      }
      stroke(255);
      ellipse(x, y, 16, 16);
    }
  }
  pop();

  // Display pose label and status
  fill(255, 0, 0);
  noStroke();
  textSize(30);
  textAlign(CENTER, BOTTOM);
  text(poseLabel, width / 2, height / 2 - 170);
  textSize(20);
  text(poseStatus, width / 2, height / 2 - 140);

  // Display feedback on incorrect poses
  if (poseStatus === "Incorrect Pose") {
    fill(255, 255, 0);
    textSize(16);
    textAlign(CENTER, BOTTOM);
    text("Incorrect pose detected!", width / 2, height / 2 - 100);

    textSize(14);
    text("Make sure you are performing one of the following:", width / 2, height / 2 - 80);
    text(correctPoses.join(', '), width / 2, height / 2 - 60);
  }
}
let video;
let poseNet;
let pose;
let skeleton;

let brain;
let posesArray = ['Standing', 'UtkataKonasana', 'Left Hand Straight', 'Right Hand Straight', 'Unknown pose', 'Sitting'];
let poseLabel = "No Pose Detected";
let poseStatus = "No Pose";
let confidenceThreshold = 0.75;

let correctPoses = ['UtkataKonasana'];
let incorrectPoses = [];

function setup() {
  let canvas = createCanvas(650, 480);
  canvas.parent("canvas-container");

  video = createCapture(VIDEO);
  video.size(650, 480);
  video.hide();
  poseNet = ml5.poseNet(video, modelLoaded);
  poseNet.on("pose", gotPoses);

  let options = {
    inputs: 34,
    outputs: 6,
    task: 'classification',
  };
  brain = ml5.neuralNetwork(options);
  const modelInfo = {
    model: 'model3/model (9).json',
    metadata: 'model3/model_meta (9).json',
    weights: 'model3/model.weights (9).bin',
  };
  brain.load(modelInfo, brainLoaded);
}

function brainLoaded() {
  console.log('pose classification ready!');
  classifyPose();
}

function startDetection() {
  detectionActive = true;
  document.getElementById("startButton").style.display = "none";
  document.getElementById("backButton").style.display = "inline-block";
  document.getElementById("feedback").innerText = "Feedback: Detection started! Perform a pose.";
  classifyPose();
}

function stopDetection() {
  detectionActive = false;
  document.getElementById("startButton").style.display = "inline-block";
  document.getElementById("backButton").style.display = "none";
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
    switch (results[0].label) {
      case "1":
        poseLabel = "Standing";
        break;
      case "2":
        poseLabel = "UtkataKonasana";
        break;
      case "3":
        poseLabel = "Left Hand Straight";
        break;
      case "4":
        poseLabel = "Right Hand Straight";
        break;
      case "5":
        poseLabel = "Unknown pose";
        break;
      default:
        poseLabel = "Sitting";
        break;
    }

    // === Pose Logic Here ===
    if (poseLabel === "UtkataKonasana") {
      if (isUtkataKonasanaCorrect(pose)) {
        poseStatus = "Correct";
        incorrectPoses = [];
        document.getElementById("feedback").innerText = "Feedback: Great job! Keep holding the pose.";
      } else {
        poseStatus = "Incorrect Pose";
        document.getElementById("feedback").innerText = "Feedback: Arms should be bent like a goalpost in UtkataKonasana.";
      }
    } else {
      poseStatus = "Incorrect Pose";
      if (!incorrectPoses.includes(poseLabel)) {
        incorrectPoses.push(poseLabel);
      }
      document.getElementById("feedback").innerText =
        `Feedback: ${poseLabel} detected but it's not a correct pose. Try performing: ${correctPoses.join(', ')}.`;
    }

  } else {
    poseLabel = "Unknown Pose";
    poseStatus = "Incorrect Pose";
    if (!incorrectPoses.includes(poseLabel)) {
      incorrectPoses.push(poseLabel);
    }
    document.getElementById("feedback").innerText =
      "Feedback: Unrecognized pose. Try performing: " + correctPoses.join(', ') + ".";
  }

  document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
  document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;
  classifyPose();
}

function gotPoses(poses) {
  if (poses.length > 0) {
    pose = poses[0].pose;
    skeleton = poses[0].skeleton;
  } else {
    pose = null;
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
    for (let i = 0; i < skeleton.length; i++) {
      let a = skeleton[i][0];
      let b = skeleton[i][1];
      strokeWeight(2);
      stroke(poseStatus === "Incorrect Pose" ? [255, 0, 0] : [0]);
      line(a.position.x, a.position.y, b.position.x, b.position.y);
    }

    for (let i = 0; i < pose.keypoints.length; i++) {
      let x = pose.keypoints[i].position.x;
      let y = pose.keypoints[i].position.y;
      fill(poseStatus === "Incorrect Pose" ? [255, 0, 0] : [0]);
      stroke(255);
      ellipse(x, y, 16, 16);
    }
  }
  pop();

  fill(255, 0, 0);
  noStroke();
  textSize(30);
  textAlign(CENTER, BOTTOM);
  text(poseLabel, width / 2, height / 2 - 170);
  textSize(20);
  text(poseStatus, width / 2, height / 2 - 140);

  if (poseStatus === "Incorrect Pose") {
    fill(255, 255, 0);
    textSize(16);
    textAlign(CENTER, BOTTOM);
    text("Incorrect pose detected!", width / 2, height / 2 - 100);
    textSize(14);
    text("Make sure you're performing:", width / 2, height / 2 - 80);
    text(correctPoses.join(', '), width / 2, height / 2 - 60);
  }
}

// === Hand-Bend Logic ===

function isUtkataKonasanaCorrect(pose) {
  if (!pose) return false;

  let left = {
    shoulder: pose.leftShoulder,
    elbow: pose.leftElbow,
    wrist: pose.leftWrist
  };
  let right = {
    shoulder: pose.rightShoulder,
    elbow: pose.rightElbow,
    wrist: pose.rightWrist
  };

  let leftAngle = calculateAngle(left.shoulder, left.elbow, left.wrist);
  let rightAngle = calculateAngle(right.shoulder, right.elbow, right.wrist);

  let leftIsBent = leftAngle >= 60 && leftAngle <= 100;
  let rightIsBent = rightAngle >= 60 && rightAngle <= 100;

  return leftIsBent && rightIsBent;
}

function calculateAngle(a, b, c) {
  let ab = dist(a.x, a.y, b.x, b.y);
  let bc = dist(b.x, b.y, c.x, c.y);
  let ac = dist(a.x, a.y, c.x, c.y);
  let angle = Math.acos((ab ** 2 + bc ** 2 - ac ** 2) / (2 * ab * bc));
  return degrees(angle);
}

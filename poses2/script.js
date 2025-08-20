let video;
let poseNet;
let pose;
let skeleton;

let brain;
let posesArray = ['1', '2', 'virabhadrasanaII','virabhadrasanaI'];
let poseLabel = "No Pose Detected";
let poseStatus = "No Pose";
let confidenceThreshold = 0.85;
let detectionActive = false;

let correctPoses = ['1', '2', 'virabhadrasanaII','virabhadrasanaI'];
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
    outputs: 4,
    task: 'classification',
  };
  brain = ml5.neuralNetwork(options);
  const modelInfo = {
    model: 'model/model (5).json',
    metadata: 'model/model_meta (5).json',
    weights: 'model/model.weights (5).bin',
  };
  brain.load(modelInfo, brainLoaded);
}

function modelLoaded() {
  console.log('poseNet ready');
}

function brainLoaded() {
  console.log('pose classification ready!');
}

function startDetection() {
  detectionActive = true;
  document.getElementById("startButton").style.display = "none";
  document.getElementById("stopButton").style.display = "inline-block";
  document.getElementById("feedback").innerText = "Feedback: Detection started! Perform a pose.";
  classifyPose();
}

function stopDetection() {
  detectionActive = false;
  document.getElementById("startButton").style.display = "inline-block";
  document.getElementById("stopButton").style.display = "none";

  poseLabel = "Not Started";
  poseStatus = "Not Started";
  document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
  document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;
  document.getElementById("feedback").innerText = "Feedback: Detection stopped.";
}

function classifyPose() {
  if (!detectionActive) return;

  if (pose) {
    let hipsVisible = pose.keypoints[11].score > 0.5 && pose.keypoints[12].score > 0.5;
    if (!hipsVisible) {
      poseLabel = "No Pose Detected";
      poseStatus = "No Pose";
      document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
      document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;
      document.getElementById("feedback").innerText = "You're not clearly visible. Please stand in front of the camera.";
      return setTimeout(classifyPose, 300);
    }

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
    document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
    document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;
    document.getElementById("feedback").innerText = "No human detected.";
    setTimeout(classifyPose, 300);
  }
}

function gotResult(error, results) {
  if (error) {
    console.error(error);
    return;
  }

  if (!detectionActive) return;

  if (results.length > 0 && results[0].confidence > confidenceThreshold) {
    switch (results[0].label) {
      case "1": poseLabel = "1"; break;
      case "2": poseLabel = "2"; break;
      case "3": poseLabel = "virabhadrasanaII"; break;
      default: poseLabel = "virabhadrasanaI"; break;
    }

    if (correctPoses.includes(poseLabel)) {
      poseStatus = "Correct";
      incorrectPoses = [];
      document.getElementById("feedback").innerText = "Feedback: Great job! Keep holding the pose.";
    } else {
      poseStatus = "Incorrect Pose";
      if (!incorrectPoses.includes(poseLabel)) incorrectPoses.push(poseLabel);
      document.getElementById("feedback").innerText = `Feedback: ${poseLabel} detected but it's not a correct pose. Try: ${correctPoses.join(', ')}`;
    }
  } else {
    poseLabel = "Unknown Pose";
    poseStatus = "Incorrect Pose";
    if (!incorrectPoses.includes(poseLabel)) incorrectPoses.push(poseLabel);
    document.getElementById("feedback").innerText = "Feedback: Unrecognized pose. Try performing: " + correctPoses.join(', ');
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
      stroke(poseStatus === "Incorrect Pose" ? color(255, 0, 0) : 0);
      line(a.position.x, a.position.y, b.position.x, b.position.y);
    }

    for (let i = 0; i < pose.keypoints.length; i++) {
      let x = pose.keypoints[i].position.x;
      let y = pose.keypoints[i].position.y;
      fill(poseStatus === "Incorrect Pose" ? color(255, 0, 0) : 0);
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
    text("Try one of the following:", width / 2, height / 2 - 80);
    text(correctPoses.join(', '), width / 2, height / 2 - 60);
  }
}

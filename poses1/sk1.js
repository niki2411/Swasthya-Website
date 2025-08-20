let video;
let poseNet;
let pose;
let skeleton;

let brain;
let posesArray = ['Tadasasana', 'UtkataKonasana', 'Garudasana'];
let poseLabel = "No Pose Detected";
let poseStatus = "No Pose";
let confidenceThreshold = 0.70;

let correctPoses = ['Tadasasana'];
let incorrectPoses = ['UtkataKonasana', 'Garudasana'];

function setup() {
  let canvas = createCanvas(650, 480);
  canvas.parent("canvas-container");

  video = createCapture(VIDEO);
  video.size(650, 480);
  video.hide();

  poseNet = ml5.poseNet(video, modelLoaded);
  poseNet.on("pose", gotPoses);

  let options = {
    inputs: 14,
    outputs: 3,
    task: 'classification',
  };
  brain = ml5.neuralNetwork(options);
  const modelInfo = {
    model: 'model3/model (3).json',
    metadata: 'model3/model_meta (3).json',
    weights: 'model3/model.weights (3).bin',
  };
  brain.load(modelInfo, brainLoaded);
}

function brainLoaded() {
  console.log('Pose classification model loaded!');
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
    let angles = calculateAngles(pose);
    brain.classify(angles, gotResult);
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
        poseLabel = "Tadasasana";
        break;
      case "2":
        poseLabel = "UtkataKonasana";
        break;
      default:
        poseLabel = "Garudasana";
        break;
    }

    if (correctPoses.includes(poseLabel)) {
      poseStatus = "Correct";
      incorrectPoses = [];
      document.getElementById("feedback").innerText = "Feedback: Great job! Keep holding the pose.";
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
    text("Try performing: " + correctPoses.join(', '), width / 2, height / 2 - 80);
  }
}

// ─────────────────────────────
// Calculate Angles Between Joints
// ─────────────────────────────
function calculateAngles(pose) {
  function getAngle(ax, ay, bx, by, cx, cy) {
    let ab = { x: ax - bx, y: ay - by };
    let cb = { x: cx - bx, y: cy - by };
    let dot = ab.x * cb.x + ab.y * cb.y;
    let magAB = Math.sqrt(ab.x * ab.x + ab.y * ab.y);
    let magCB = Math.sqrt(cb.x * cb.x + cb.y * cb.y);
    let cosine = dot / (magAB * magCB);
    return Math.acos(cosine) * (180 / Math.PI);
  }

  let kp = pose.keypoints;
  return [
    getAngle(kp[11].position.x, kp[11].position.y, kp[13].position.x, kp[13].position.y, kp[15].position.x, kp[15].position.y), // left leg
    getAngle(kp[12].position.x, kp[12].position.y, kp[14].position.x, kp[14].position.y, kp[16].position.x, kp[16].position.y), // right leg
    getAngle(kp[5].position.x, kp[5].position.y, kp[7].position.x, kp[7].position.y, kp[9].position.x, kp[9].position.y),       // left arm
    getAngle(kp[6].position.x, kp[6].position.y, kp[8].position.x, kp[8].position.y, kp[10].position.x, kp[10].position.y),     // right arm
    getAngle(kp[11].position.x, kp[11].position.y, kp[5].position.x, kp[5].position.y, kp[6].position.x, kp[6].position.y),     // torso
    getAngle(kp[13].position.x, kp[13].position.y, kp[11].position.x, kp[11].position.y, kp[12].position.x, kp[12].position.y), // hips
    getAngle(kp[5].position.x, kp[5].position.y, kp[6].position.x, kp[6].position.y, kp[12].position.x, kp[12].position.y),     // shoulder line
    getAngle(kp[11].position.x, kp[11].position.y, kp[13].position.x, kp[13].position.y, kp[15].position.x, kp[15].position.y), // left knee
    getAngle(kp[12].position.x, kp[12].position.y, kp[14].position.x, kp[14].position.y, kp[16].position.x, kp[16].position.y), // right knee
    getAngle(kp[5].position.x, kp[5].position.y, kp[7].position.x, kp[7].position.y, kp[9].position.x, kp[9].position.y),       // left elbow
    getAngle(kp[6].position.x, kp[6].position.y, kp[8].position.x, kp[8].position.y, kp[10].position.x, kp[10].position.y),     // right elbow
    getAngle(kp[5].position.x, kp[5].position.y, kp[11].position.x, kp[11].position.y, kp[13].position.x, kp[13].position.y),   // left side
    getAngle(kp[6].position.x, kp[6].position.y, kp[12].position.x, kp[12].position.y, kp[14].position.x, kp[14].position.y),   // right side
    getAngle(kp[11].position.x, kp[11].position.y, kp[12].position.x, kp[12].position.y, kp[14].position.x, kp[14].position.y)  // hip alignment
  ];
}

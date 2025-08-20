let video;
    let poseNet;
    let pose;
    let skeleton;
    let brain;

    let posesArray = ['Standing', 'Vrikshasana-R', 'Vrikshasana-L','Random Pose','Unknown Pose','sitting'];
    let poseLabel = "No Pose Detected";
    let poseStatus = "No Pose";
    let confidenceThreshold = 0.75;

    let correctPoses = ['Vrikshasana-R', 'Vrikshasana-L'];
    let incorrectPoses = ['Standing','Random Pose','Unknown Pose','sitting'];

    let detectionActive = false;

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
        model: 'model/model (9).json',
        metadata: 'model/model_meta (9).json',
        weights: 'model/model.weights (9).bin',
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
      document.getElementById("feedback").innerText = "Feedback: Click 'Start' to begin!";
    }

    function classifyPose() {
      if (!detectionActive) return;

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
            poseLabel = "Vrikshasana-R";
            break;
          case "3":
            poseLabel = "Vrikshasana-L";
            break;
          case "4":
            poseLabel = "Random Pose";
            break;
          case "5":
            poseLabel = "Unknown Pose";
            break;
          default:
            poseLabel = "sitting";
            break;
        }

        if (correctPoses.includes(poseLabel)) {
          poseStatus = "Correct";
          incorrectPoses = ['Standing','Random Pose','Unknown Pose','sitting'];
          document.getElementById("feedback").innerText = "Feedback: Great job! Keep holding the pose.";
        } else {
          poseStatus = "Incorrect Pose";

          if (!incorrectPoses.includes(poseLabel)) {
            incorrectPoses.push(poseLabel);
          }

          document.getElementById("feedback").innerText =
            `Feedback: ${poseLabel} detected but it's not a correct pose. Try performing one of the following: ${correctPoses.join(', ')}.`;
        }
      } else {
        poseLabel = "Unknown Pose";
        poseStatus = "Incorrect Pose";

        if (!incorrectPoses.includes(poseLabel)) {
          incorrectPoses.push(poseLabel);
        }

        document.getElementById("feedback").innerText =
          "Feedback: An unrecognized pose was detected. Make sure to perform one of the following poses: " + correctPoses.join(', ') + ".";
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

        // Tree pose hand distance check
        let leftWrist = pose.keypoints.find(k => k.part === "leftWrist");
        let rightWrist = pose.keypoints.find(k => k.part === "rightWrist");

        if (leftWrist && rightWrist && leftWrist.score > 0.5 && rightWrist.score > 0.5) {
          let dx = leftWrist.position.x - rightWrist.position.x;
          let dy = leftWrist.position.y - rightWrist.position.y;
          let distance = Math.sqrt(dx * dx + dy * dy);
    if ((poseLabel === "tree pose-R" || poseLabel === "tree pose-L") && distance > 80) {
        poseStatus = "Incorrect Pose";
        document.getElementById("feedback").innerText =
          "Feedback: Bring your hands together above your head for a correct Tree Pose.";
      }
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
        text("Incorrect pose detected!", width / 2, height / 2 - 100);
        textSize(14);
        text("Make sure you are performing one of the following:", width / 2, height / 2 - 80);
        text(correctPoses.join(', '), width / 2, height / 2 - 60);
      }
    }
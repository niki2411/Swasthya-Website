let video;
    let poseNet;
    let pose;
    let skeleton;

    let brain;
    let posesArray = ['Tadasasana', 'Godness', 'Garudasana'];
    let poseLabel = "No Pose Detected"; // Default pose label
    let poseStatus = "No Pose"; // "Correct", "Incorrect Pose", or "No Pose Detected"
    let confidenceThreshold = 0.70;

    // Define a set of correct poses
    let correctPoses = ['Tadasasana'];

    // Incorrect pose tracking
    let incorrectPoses = ['Godness', 'Garudasana'];

    let detectionActive = false; // To track if detection is active
    let canvas;

    function setup() {
      canvas = createCanvas(650, 480);
      canvas.parent("canvas-container"); // Attach canvas to the container
    }

    function startDetection() {
      detectionActive = true;

      // Start video capture
      video = createCapture(VIDEO);
      video.size(650, 480); // Match video feed size to canvas
      video.hide(); // Hide default HTML video element to avoid overlap

      // Initialize PoseNet
      poseNet = ml5.poseNet(video, modelLoaded);
      poseNet.on("pose", gotPoses);

      // Load the neural network model
      let options = {
        inputs: 34,
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

      document.getElementById("startButton").style.display = "none"; // Hide "Start" button
      document.getElementById("backButton").style.display = "inline-block"; // Show "Back" button
      document.getElementById("feedback").innerText = "Feedback: Detection started! Perform a pose.";
    }

    function stopDetection() {
      detectionActive = false;

      // Stop video capture and remove the video element
      if (video) {
        video.remove();
        video = null;
      }

      pose = null; // Reset pose data
      poseLabel = "Not Started";
      poseStatus = "Not Started";
      document.getElementById("poseLabel").innerText = `Pose: ${poseLabel}`;
      document.getElementById("poseStatus").innerText = `Status: ${poseStatus}`;
      document.getElementById("feedback").innerText = "Feedback: Click 'Start' to begin!";
      document.getElementById("startButton").style.display = "inline-block"; // Show "Start" button
      document.getElementById("backButton").style.display = "none"; // Hide "Back" button
    }

    function brainLoaded() {
      console.log('pose classification ready!');
    }

    function classifyPose() {
      if (detectionActive && pose) {
        let inputs = [];
        for (let i = 0; i < pose.keypoints.length; i++) {
          let x = pose.keypoints[i].position.x;
          let y = pose.keypoints[i].position.y;
          inputs.push(x);
          inputs.push(y);
        }
        brain.classify(inputs, gotResult);
      } else if (detectionActive) {
        poseLabel = "No Pose Detected";
        poseStatus = "No Pose";
        setTimeout(classifyPose, 100); // Retry classification
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
            poseLabel = "Godness";
            break;
          default:
            poseLabel = "Garudasana";
            break;
        }

        if (correctPoses.includes(poseLabel)) {
          poseStatus = "Correct";
          incorrectPoses = []; // Reset incorrect poses feedback
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
        document.getElementById("feedback").innerText =
          "Feedback: An unrecognized pose was detected. Make sure to perform one of the following poses: " + correctPoses.join(', ') + ".";
      }

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
      if (video && detectionActive) {
        push();
        translate(video.width, 0);
        scale(-1, 1);
        image(video, 0, 0, video.width, video.height);

        if (pose) {
          for (let i = 0; i < skeleton.length; i++) {
            let a = skeleton[i][0];
            let b = skeleton[i][1];
            strokeWeight(2);
            if (poseStatus === "Incorrect Pose") {
              stroke(255, 0, 0);
            } else {
              stroke(0);
            }
            line(a.position.x, a.position.y, b.position.x, b.position.y);
          }

          for (let i = 0; i < pose.keypoints.length; i++) {
            let x = pose.keypoints[i].position.x;
            let y = pose.keypoints[i].position.y;
            fill(0);
            if (poseStatus === "Incorrect Pose") {
              fill(255, 0, 0);
            }
            stroke(255);
            ellipse(x, y, 16, 16);
          }
        }
        pop();
      }
    }
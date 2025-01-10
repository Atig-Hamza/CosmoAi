const videoElement = document.getElementById('videoElement');
const videomodal = document.getElementById('videomodal');
const gotovideo = document.getElementById('gotovideo');
const closemodal = document.getElementById('closemodal');
const gocall = document.getElementById('gocall');
const closemodal2 = document.getElementById('closemodal2');
const callmodal = document.getElementById('callmodal'); // Add reference to callmodal
let stream;
let recognition;
let isRecognitionRunning = false;
let isManualStop = false;
let captureInterval;

gotovideo.addEventListener('click', () => {
  console.log('Open Video Modal button clicked.');
  callmodal.classList.add('hidden'); // Hide callmodal
  videomodal.classList.remove('hidden');
  startCamera();
});

closemodal.addEventListener('click', () => {
  console.log('Close Modal button clicked.');
  videomodal.classList.add('hidden');
  stopCamera();
});

closemodal2.addEventListener('click', () => {
  console.log('Close Modal 2 button clicked.');
  videomodal.classList.add('hidden');
  stopCamera();
});

gocall.addEventListener('click', () => {
  console.log('Go Call button clicked.');
  videomodal.classList.add('hidden');
  stopCamera();
  callmodal.classList.remove('hidden'); // Show callmodal
});

async function startCamera() {
  console.log('Starting camera...');
  try {
    stream = await navigator.mediaDevices.getUserMedia({ video: true });
    console.log('Camera access granted.');
    videoElement.srcObject = stream;
    startSpeechRecognition();
    captureInterval = setInterval(captureImage, 10000); // Capture image every 10 seconds
    console.log('Camera started and image capture interval set.');
  } catch (error) {
    console.error('Error accessing camera:', error);
  }
}

function stopCamera() {
  console.log('Stopping camera...');
  if (stream) {
    stream.getTracks().forEach(track => track.stop());
    videoElement.srcObject = null;
    console.log('Camera stream stopped.');
  }
  if (recognition) {
    isManualStop = true;
    recognition.stop();
    recognition = null;
    console.log('Speech recognition stopped.');
  }
  clearInterval(captureInterval);
  console.log('Image capture interval cleared.');
}

function startSpeechRecognition() {
  console.log('Starting speech recognition...');
  if (isRecognitionRunning) {
    console.log('Speech recognition is already running.');
    return;
  }

  recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
  recognition.continuous = true;
  recognition.interimResults = false;

  recognition.onresult = async (event) => {
    console.log('Speech recognition result received.');
    const transcript = event.results[event.results.length - 1][0].transcript;
    console.log('User said:', transcript);

    console.log('Capturing image from video stream...');
    const imageBlob = await captureImage();
    console.log('Image captured.');

    console.log('Sending data to backend...');
    const formData = new FormData();
    formData.append('image', imageBlob, 'image.jpg');
    formData.append('message', transcript);

    try {
      const response = await fetch('https://192.168.8.152:8000/analyze', {
        method: 'POST',
        body: formData,
      });
      const data = await response.json();
      console.log('Response from backend:', data);
      speak(data.response); 
    } catch (error) {
      console.error('Error sending data to backend:', error);
    }
  };

  recognition.onerror = (event) => {
    console.error('Speech recognition error:', event.error);
    if (event.error === 'aborted') {
      if (!isManualStop) {
        setTimeout(() => {
          if (recognition) {
            recognition.start();
          }
        }, 1000);
      }
    }
  };

  recognition.onend = () => {
    console.log('Speech recognition ended.');
    isRecognitionRunning = false;

    if (!isManualStop) {
      setTimeout(() => {
        if (recognition) {
          recognition.start();
        }
      }, 1000);
    }
  };

  recognition.start();
  isRecognitionRunning = true;
  isManualStop = false;
  console.log('Speech recognition started.');
}

async function captureImage() {
  console.log('Capturing image...');
  const canvas = document.createElement('canvas');
  canvas.width = videoElement.videoWidth;
  canvas.height = videoElement.videoHeight;
  const context = canvas.getContext('2d');
  context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

  return new Promise((resolve) => {
    canvas.toBlob((blob) => {
      console.log('Image captured and converted to blob.');
      resolve(blob);
    }, 'image/jpeg');
  });
}

function speak(text) {
  console.log('Speaking AI response:', text);
  const synth = window.speechSynthesis;
  const utterance = new SpeechSynthesisUtterance(text);
  utterance.onstart = () => {
    console.log('Speech synthesis started.');
    if (recognition) {
      isManualStop = true;
      recognition.stop();
    }
  };
  utterance.onend = () => {
    console.log('Speech synthesis ended.');
    if (recognition) {
      isManualStop = false;
      recognition.start();
    }
  };
  utterance.onerror = (event) => {
    console.error('Speech synthesis error:', event.error);
    if (recognition) {
      isManualStop = false;
      recognition.start();
    }
  };
  synth.speak(utterance);
}
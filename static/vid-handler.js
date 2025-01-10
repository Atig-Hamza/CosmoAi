const videoElement = document.getElementById('videoElement');
const videomodal = document.getElementById('videomodal');
const gotovideo = document.getElementById('gotovideo');
const closemodal = document.getElementById('closemodal');
const gocall = document.getElementById('gocall');
const closemodal2 = document.getElementById('closemodal2');
let stream;
let recognition;
let captureInterval;

gotovideo.addEventListener('click', (event) => {
  event.preventDefault();
  videomodal.classList.remove('hidden');
  startCamera();
});

closemodal.addEventListener('click', (event) => {
  event.preventDefault();
  clearInterval(captureInterval);
  videomodal.classList.add('hidden');
  stopCamera();
});

closemodal2.addEventListener('click', (event) => {
  event.preventDefault();
  clearInterval(captureInterval);
  videomodal.classList.add('hidden');
  stopCamera();
});

gocall.addEventListener('click', (event) => {
  event.preventDefault();
  clearInterval(captureInterval);
  videomodal.classList.add('hidden');
  stopCamera();
});

async function startCamera() {
  try {
    stream = await navigator.mediaDevices.getUserMedia({ video: true });
    videoElement.srcObject = stream;
    startSpeechRecognition();
    captureInterval = setInterval(captureImage, 10000);
  } catch (error) {
    console.error('Error accessing camera:', error);
  }
}

function stopCamera() {
  if (stream) {
    stream.getTracks().forEach(track => track.stop());
    videoElement.srcObject = null;
  }
  if (recognition) {
    recognition.manualStop = true;
    recognition.stop();
  }
}

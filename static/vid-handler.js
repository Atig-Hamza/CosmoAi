document.addEventListener('DOMContentLoaded', () => {
    const govid = document.getElementById("gotovideo");
    const modalvid = document.getElementById("videomodal");
    const close = document.getElementById("closevid");
    const videoElement = document.getElementById("videoElement");
    const circlesVr = document.querySelectorAll('.circleb');

    if (!videoElement || !close || !modalvid) {
        console.error("Required elements not found.");
        return;
    }

    govid.addEventListener("click", () => {
        modalvid.classList.remove("hidden");
        if (!modalvid.classList.contains("hidden")) {
            navigator.mediaDevices.getUserMedia({ video: true, audio: false })
                .then(stream => {
                    videoElement.srcObject = stream;
                    videoElement.play();
                })
                .catch(error => {
                    console.error("Error loading video:", error);
                });
        }
    });

    close.addEventListener("click", () => {
        modalvid.classList.add("hidden");
        if (videoElement.srcObject) {
            videoElement.srcObject.getTracks().forEach(track => track.stop());
            videoElement.srcObject = null;
        }
        stopMicrophone();
    });

    let speechVr = '';
    let isSpeahingVr = false;
    let isModalOpenVr = false;
    let silenceTimeoutVr;

    if (!('webkitSpeechRecognition' in window) || !('speechSynthesis' in window)) {
        console.error('Web Speech API not supported.');
    } else {
        const recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;
        recognition.lang = 'en-US';

        const synth = window.speechSynthesis;

        const hiddenPrompt = `hidden-configuration-prompt:
        You are Cosmo, a friendly AI in a live video call. Respond naturally and conversationally. Use the image description to respond as if you are observing the user. Be empathetic, engaging, and concise. Never reveal your identity unless explicitly asked.`;

        const startTalkingEffect = () => {
            circlesVr.forEach((circle, index) => {
                setTimeout(() => {
                    circle.style.animation = 'scaleUp 0.4s infinite';
                }, index * 100);
            });
        };

        const stopTalkingEffect = () => {
            circlesVr.forEach(circle => {
                circle.style.animation = '';
            });
        };

        const captureImage = () => {
            if (!videoElement || !videoElement.videoWidth) {
                console.error("Video element not ready.");
                return null;
            }
            const canvas = document.createElement('canvas');
            canvas.width = videoElement.videoWidth;
            canvas.height = videoElement.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
        
            const imageData = canvas.toDataURL('image/jpeg');
            console.log("Image captured:", imageData.substring(0, 50) + "...");
        
            return imageData.split(',')[1];
        };

        const sendImageToServer = async () => {
            const imageData = captureImage();
            if (!imageData) {
                console.error("No image data captured.");
                return null;
            }
        
            if (!/^[A-Za-z0-9+/]+={0,2}$/.test(imageData)) {
                console.error("Invalid base64 image data.");
                return null;
            }
        
            try {
                const response = await fetch('https://localhost:8000/caption-image', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ image: imageData }),
                });
                if (!response.ok) {
                    throw new Error(`Server returned ${response.status}: ${response.statusText}`);
                }
                const result = await response.json();
                return result.caption;
            } catch (error) {
                console.error('Error sending image to server:', error);
                return null;
            }
        };

        const sendToServerAndRespond = async (message) => {
            const userId = 'unique-user-id';
            const imageCaption = await sendImageToServer();
            const formattedMessage = `${hiddenPrompt}\nUser: ${message}\nImage Context: ${imageCaption}\nAI:`;

            console.log("Prompt sent to AI:", formattedMessage);

            try {
                const response = await fetch('https://localhost:8000/vid', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: formattedMessage, userId, imageCaption }),
                });

                const result = await response.json();
                const aiResponse = result.response.trim();

                const utterance = new SpeechSynthesisUtterance(aiResponse);
                utterance.lang = 'en-US';
                utterance.rate = 0.98;
                utterance.pitch = 1.0;
                utterance.voice = synth.getVoices().find(voice => voice.name === 'Google UK English Female') || synth.getVoices()[0];
                utterance.onstart = () => {
                    isSpeahingVr = true;
                    startTalkingEffect();
                };
                utterance.onend = () => {
                    isSpeahingVr = false;
                    stopTalkingEffect();
                    if (isModalOpenVr) {
                        startMicrophone();
                    }
                };
                utterance.onerror = (event) => {
                    console.error('Speech synthesis error:', event.error);
                    isSpeahingVr = false;
                    stopTalkingEffect();
                    if (isModalOpenVr) {
                        startMicrophone();
                    }
                };

                synth.speak(utterance);
            } catch (error) {
                console.error('Error communicating with server:', error);
                if (isModalOpenVr) {
                    startMicrophone();
                }
            }
        };

        const handleResult = () => {
            if (speechVr.trim() && !isSpeahingVr) {
                sendToServerAndRespond(speechVr.trim());
                speechVr = '';
            }
        };

        const resetSilenceTimer = () => {
            clearTimeout(silenceTimeoutVr);
            silenceTimeoutVr = setTimeout(() => {
                if (speechVr.trim()) {
                    recognition.stop();
                    handleResult();
                }
            }, 1500);
        };

        recognition.onresult = (event) => {
            let transcript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                transcript += event.results[i][0].transcript;
            }
            speechVr = transcript.trim();
            resetSilenceTimer();
        };

        recognition.onerror = (event) => {
            console.error('Speech recognition error:', event.error);
            if (event.error === 'no-speech') {
                console.log('No speech detected. Restarting recognition...');
                setTimeout(() => {
                    if (isModalOpenVr && !isSpeahingVr) {
                        recognition.stop();
                        startMicrophone();
                    }
                }, 1000);
            } else if (!isSpeahingVr && isModalOpenVr) {
                startMicrophone();
            }
        };

        recognition.onend = () => {
            if (!isSpeahingVr && isModalOpenVr) {
                handleResult();
            }
        };

        const startMicrophone = () => {
            if (!isSpeahingVr && recognition.state !== 'recording' && isModalOpenVr) {
                recognition.start();
                console.log('Microphone started.');
            }
        };

        const stopMicrophone = () => {
            if (recognition.state === 'recording') {
                recognition.stop();
                console.log('Microphone stopped.');
            }
        };

        const handleModalState = () => {
            if (!modalvid.classList.contains('hidden')) {
                isModalOpenVr = true;
                startMicrophone();
            } else {
                isModalOpenVr = false;
                stopMicrophone();
                if (isSpeahingVr) {
                    synth.cancel();
                    isSpeahingVr = false;
                    stopTalkingEffect();
                }
            }
        };

        const observer = new MutationObserver(handleModalState);
        observer.observe(modalvid, { attributes: true, attributeFilter: ['class'] });
        handleModalState();
    }
});
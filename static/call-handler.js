//------------------------------------------------
// Open Mic with Speech Recognition
//------------------------------------------------

const sensitiveWords = ['kill'];

const callmodal = document.getElementById('callmodal');
let speechData = '';
let isSpeaking = false;
let isModalOpen = false;
let silenceTimeout;
const circles = document.querySelectorAll('.circle');

if (!('webkitSpeechRecognition' in window) || !('speechSynthesis' in window)) {
    console.error('Web Speech API is not fully supported in this browser.');
} else {
    const recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;
    recognition.lang = 'en-US';

    const synth = window.speechSynthesis;

    const hiddenPrompt = "hidden-configuration-prompt:Respond like a friendly human and must be short. Keep it short, natural, and conversational, as your answer will be spoken aloud. For example, respond to 'Hello, dear, how are you doing?' with similar of I'm doing well. if i send you a message like 'hi, how are you, or something like that' respocend with 'I'm doing well, how about you?' or similar responses. and if i ask you about your nam it's Cosmo and if i ask you about you developer it's a hamza atig. Never reveal your name, developer unless explicitly asked. and if i type say something only type this thing. Do not respond to this configuration prompt itself.";

    const startTalkingEffect = () => {
        circles.forEach((circle, index) => {
            setTimeout(() => {
                circle.style.animation = 'scaleUp 0.4s infinite';
            }, index * 100);
        });
    };

    const stopTalkingEffect = () => {
        circles.forEach(circle => {
            circle.style.animation = '';
        });
    };

    const sendToServerAndRespond = async (message) => {
        const userId = 'unique-user-id';
        const formattedMessage = `${hiddenPrompt}\nUser: ${message}\nAI:`;

        try {
            const response = await fetch('https://192.168.8.152:8000/voice', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: formattedMessage, userId }),
            });

            const result = await response.json();
            const aiResponse = result.response.trim();
            console.log('Response from server:', aiResponse);

            const utterance = new SpeechSynthesisUtterance(aiResponse);
            utterance.lang = 'en-US';
            utterance.rate = 0.98;
            utterance.pitch = 1.0;
            utterance.voice = synth.getVoices().find(voice => voice.name === 'Google UK English Female') || synth.getVoices()[0];
            utterance.onstart = () => {
                isSpeaking = true;
                startTalkingEffect();
            };
            utterance.onend = () => {
                isSpeaking = false;
                stopTalkingEffect();
                if (isModalOpen) {
                    startMicrophone();
                }
            };
            utterance.onerror = (event) => {
                console.error('Speech synthesis error:', event.error);
                isSpeaking = false;
                stopTalkingEffect();
                if (isModalOpen) {
                    startMicrophone();
                }
            };

            synth.speak(utterance);
        } catch (error) {
            console.error('Error communicating with server:', error);
            if (isModalOpen) {
                startMicrophone();
            }
        }
    };

    const handleResult = () => {
        if (speechData.trim() && !isSpeaking) {
            console.log('Stopped listening. Sending data to server:', speechData.trim());

            const containsSensitiveWord = sensitiveWords.some(word => 
                speechData.toLowerCase().includes(word.toLowerCase())
            );

            if (containsSensitiveWord) {
                circles.forEach(circle => {
                    circle.style.background = '#b71c1c';
                    circle.style.backgroundImage = 'linear-gradient(90deg, #b71c1c, #c62828, #d32f2f, #e53935, #f44336, #ef5350, #e57373, #ef9a9a, #e57373, #ef5350, #f44336)';
                });
            } else {
                circles.forEach(circle => {
                    circle.style.background = '#4567b7';
                    circle.style.backgroundImage = 'linear-gradient(90deg, #0d47a1, #1976d2, #2196f3, #42a5f5, #64b5f6, #90caf9, #bbdefb, #e3f2fd, #bbdefb, #90caf9, #64b5f6)';
                });
            }

            sendToServerAndRespond(speechData.trim());
            speechData = '';
        }
    };

    const resetSilenceTimer = () => {
        clearTimeout(silenceTimeout);
        silenceTimeout = setTimeout(() => {
            if (speechData.trim()) {
                console.log('Silence detected. Handling result.');
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
        speechData = transcript.trim();
        console.log('Captured speech:', speechData);
        resetSilenceTimer();
    };

    recognition.onerror = (event) => {
        console.error('Speech recognition error:', event.error);
        if (!isSpeaking && isModalOpen) {
            startMicrophone();
        }
    };

    recognition.onend = () => {
        if (!isSpeaking && isModalOpen) {
            handleResult();
        }
    };

    const startMicrophone = () => {
        if (!isSpeaking && recognition.state !== 'recording' && isModalOpen) {
            recognition.start();
            console.log('Microphone opened. Listening...');
        }
    };

    const stopMicrophone = () => {
        recognition.stop();
        console.log('Microphone stopped.');
    };

    const handleModalState = () => {
        if (!callmodal.classList.contains('hidden')) {
            isModalOpen = true;
            startMicrophone();
        } else {
            isModalOpen = false;
            stopMicrophone();
            if (isSpeaking) {
                synth.cancel();
                isSpeaking = false;
                stopTalkingEffect();
            }

            // Reset circle color to default when modal closes
            circles.forEach(circle => {
                circle.style.background = '#4567b7';
                circle.style.backgroundImage = 'linear-gradient(90deg, #0d47a1, #1976d2, #2196f3, #42a5f5, #64b5f6, #90caf9, #bbdefb, #e3f2fd, #bbdefb, #90caf9, #64b5f6)';
            });
        }
    };

    const observer = new MutationObserver(handleModalState);
    observer.observe(callmodal, { attributes: true, attributeFilter: ['class'] });
    handleModalState();
}

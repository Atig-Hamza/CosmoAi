//------------------------------------------------
// Open Mic with Speech Recognition
//------------------------------------------------

const callmodal = document.getElementById('callmodal');
let speechData = '';
let isSpeaking = false;
let silenceTimeout;

if (!('webkitSpeechRecognition' in window) || !('speechSynthesis' in window)) {
    console.error('Web Speech API is not fully supported in this browser.');
} else {
    const recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;
    recognition.lang = 'en-US';

    const synth = window.speechSynthesis;

    const hiddenPrompt = "Respond like a friendly human. Keep it short, natural, and conversational, as your answer will be spoken aloud. For example, respond to 'Hello, dear, how are you doing?' with a warm and simple reply.";

    const sendToServerAndRespond = async (message) => {
        const userId = 'unique-user-id';
        const formattedMessage = `${hiddenPrompt}\nUser: ${message}\nAI:`;

        try {
            console.log('Sending message to server:', formattedMessage);
            const response = await fetch('http://192.168.0.139:8000/voice', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: formattedMessage, userId }),
            });

            const result = await response.json();
            const aiResponse = result.response.trim();
            console.log('Response from server:', aiResponse);

            const utterance = new SpeechSynthesisUtterance(aiResponse);
            utterance.lang = 'en-US';
            utterance.rate = 1.0; // rate of natural speech
            utterance.pitch = 1.8; // pitch of clarity
            utterance.voice = synth.getVoices().filter(voice => voice.name === 'Google US English Female')[0];
            utterance.onstart = () => {
                isSpeaking = true;
                console.log('Speaking started.');
            };
            utterance.onend = () => {
                isSpeaking = false;
                console.log('Speaking ended.');
                startMicrophone();
            };

            synth.speak(utterance);
        } catch (error) {
            console.error('Error communicating with server:', error);
            startMicrophone();
        }
    };

    const handleResult = () => {
        if (speechData.trim() && !isSpeaking) {
            console.log('Stopped listening. Sending data to server:', speechData.trim());
            sendToServerAndRespond(speechData.trim());
            speechData = '';
        }
    };

    const resetSilenceTimer = () => {
        clearTimeout(silenceTimeout);
        silenceTimeout = setTimeout(() => {
            console.log('Silence detected. Handling result.');
            recognition.stop();
            handleResult();
        }, 3000);
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
        if (!isSpeaking) startMicrophone();
    };

    recognition.onend = () => {
        if (!isSpeaking) handleResult();
    };

    const startMicrophone = () => {
        if (!isSpeaking) {
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
            startMicrophone();
        } else {
            stopMicrophone();
        }
    };

    const observer = new MutationObserver(handleModalState);
    observer.observe(callmodal, { attributes: true, attributeFilter: ['class'] });
    handleModalState();
}


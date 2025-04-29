import * as sdk from 'microsoft-cognitiveservices-speech-sdk';
import { getSpeechKey, getSpeechRegion } from './env.js';

document.addEventListener('DOMContentLoaded', () => {

    // --- Configuration ---
    const speechKey = getSpeechKey();
    const speechRegion = getSpeechRegion();
    const backendUrl = 'https://localhost:8000/chat';
    const hiddenPrompt = "Respond like a human in a brief, conversational manner. ";

    // --- State Variables ---
    let isListening = false;
    let isMicOn = false;
    let sdkReady = false;
    let currentThemeIndex = 0;
    const sessionUserId = 'user-' + Math.random().toString(36).substr(2, 9);

    // --- Theme Data with Voices ---
    const themes = [
        { id: 'arbor', name: 'Arbor', description: 'Standard Male', soundIndex: 1, voiceName: 'en-US-AndrewNeural', svgMods: { /* ... arbor svgMods ... */ } },
        { id: 'sol', name: 'Sol', description: 'Multilingual Female 1', soundIndex: 2, voiceName: 'en-US-SerenaMultilingualNeural', svgMods: { /* ... sol svgMods ... */ } },
        { id: 'luna', name: 'Luna', description: 'Multilingual Female 2', soundIndex: 3, voiceName: 'en-US-CoraMultilingualNeural', svgMods: { /* ... luna svgMods ... */ } },
        { id: 'monday', name: 'Monday', description: 'Multilingual Female 3', soundIndex: 4, voiceName: 'en-US-LolaMultilingualNeural', svgMods: { /* ... monday svgMods ... */ } },
        { id: 'forest', name: 'Forest', description: 'Multilingual Male', soundIndex: 5, voiceName: 'en-US-DustinMultilingualNeural', svgMods: { /* ... forest svgMods ... */ } }
    ];

    // --- Audio Playback ---
    let audioContext = null;
    let audioBuffers = {};
    let currentAudioSource = null;

    function getAudioContext() {
        if (!audioContext) {
            try {
                audioContext = new (window.AudioContext || window.webkitAudioContext)();
                console.log(`AudioContext created. State: ${audioContext.state}`);
            } catch (e) { console.error("AudioContext creation failed.", e); return null; }
        }
        return audioContext;
    }

    async function resumeAudioContext() {
        let context = getAudioContext();
        if (!context) return false;
        if (context.state === 'suspended') {
            try {
                console.log("Attempting to resume AudioContext...");
                await context.resume();
                console.log(`AudioContext resumed. State: ${context.state}`);
                return true;
            } catch (e) { console.error("Error resuming AudioContext:", e); return false; }
        }
        return context.state === 'running';
    }

    async function loadSound(index) {
        if (typeof index !== 'number' || isNaN(index)) return null;
        const soundPath = `/voices/output${index}.wav`;
        if (audioBuffers[soundPath]) return audioBuffers[soundPath];
        if (audioBuffers.hasOwnProperty(soundPath) && audioBuffers[soundPath] === null) return null;
        const context = getAudioContext();
        if (!context) return null;
        try {
            const response = await fetch(soundPath);
            if (!response.ok) throw new Error(`HTTP ${response.status}`);
            const buffer = await context.decodeAudioData(await response.arrayBuffer());
            audioBuffers[soundPath] = buffer;
            return buffer;
        } catch (error) { console.error(`Load/decode failed for ${soundPath}:`, error); audioBuffers[soundPath] = null; return null; }
    }

    async function playSound(index) {
        const validIndex = themes.find(t => t.soundIndex === index)?.soundIndex ?? themes[0]?.soundIndex ?? 1;
        const context = getAudioContext();
        if (!context) { console.warn("Cannot play: No AudioContext."); return; }

        if (context.state !== 'running') {
            if (!(await resumeAudioContext()) || context.state !== 'running') {
                console.error(`Cannot play: Failed to resume context.`);
                return;
            }
        }

        const audioBuffer = await loadSound(validIndex);
        if (!audioBuffer) { console.warn(`Cannot play ${validIndex}: buffer unavailable.`); return; }

        try {
            if (currentAudioSource) { try { currentAudioSource.stop(); currentAudioSource.disconnect(); } catch (e) {/* ignore */} }
            const source = context.createBufferSource();
            source.buffer = audioBuffer;
            source.connect(context.destination);
            console.log(`Playing theme sound index: ${validIndex}`);
            source.start(0);
            currentAudioSource = source;
            source.onended = () => { if (currentAudioSource === source) currentAudioSource = null; try { source.disconnect(); } catch (e) {/* ignore */} };
        } catch (error) { console.error(`Error playing sound ${validIndex}:`, error); if (currentAudioSource) { try { currentAudioSource.disconnect(); } catch (e) {/* ignore */} currentAudioSource = null; } }
    }


    // --- Azure Speech SDK Setup ---
    let speechConfig; let audioConfig; let recognizer; let synthesizer;
    try {
        speechConfig = sdk.SpeechConfig.fromSubscription(speechKey, speechRegion);
        speechConfig.speechRecognitionLanguage = 'en-US';
        speechConfig.speechSynthesisVoiceName = themes[0]?.voiceName || 'en-US-JennyNeural';
        console.log(`Initial TTS voice set to: ${speechConfig.speechSynthesisVoiceName}`);

        audioConfig = sdk.AudioConfig.fromDefaultMicrophoneInput();
        recognizer = new sdk.SpeechRecognizer(speechConfig, audioConfig);
        synthesizer = new sdk.SpeechSynthesizer(speechConfig);
        sdkReady = true;
        console.log("Azure SDK initialized.");
    } catch (error) {
        console.error("Failed to initialize Azure SDK:", error);
        sdkReady = false;
    }

    // --- UI Elements & Handlers ---
    const micButton = document.getElementById('micBtn');
    const micOnIcon = document.getElementById('micOnIcon');
    const micOffIcon = document.getElementById('micOffIcon');
    const svgElement = document.getElementById('e0D7ZBtOImG1');
    const prevArrow = document.getElementById('prevArrow');
    const nextArrow = document.getElementById('nextArrow');
    const prevThemeNameEl = document.getElementById('prevThemeName');
    const prevThemeDescEl = document.getElementById('prevThemeDesc');
    const currentThemeNameEl = document.getElementById('currentThemeName');
    const currentThemeDescEl = document.getElementById('currentThemeDesc');
    const nextThemeNameEl = document.getElementById('nextThemeName');
    const nextThemeDescEl = document.getElementById('nextThemeDesc');
    const themeElementsExist = svgElement && prevArrow && nextArrow && prevThemeNameEl && prevThemeDescEl && currentThemeNameEl && currentThemeDescEl && nextThemeNameEl && nextThemeDescEl;


    function updateMicButtonUI() {
        if (!micButton || !micOnIcon || !micOffIcon) return;
        if (isMicOn) {
            micOnIcon.classList.remove('hidden'); micOffIcon.classList.add('hidden');
            micButton.classList.remove('bg-red-500', 'text-white', 'hover:bg-red-600');
            micButton.classList.add('bg-gray-200', 'text-black', 'hover:bg-gray-300');
            micButton.setAttribute('aria-label', 'Stop Listening');
            micButton.classList.toggle('animate-pulse', isListening); // Use toggle for pulse
        } else {
            micOnIcon.classList.add('hidden'); micOffIcon.classList.remove('hidden');
            micButton.classList.remove('bg-gray-200', 'text-black', 'hover:bg-gray-300', 'animate-pulse');
            micButton.classList.add('bg-red-500', 'text-white', 'hover:bg-red-600');
            micButton.setAttribute('aria-label', 'Start Listening');
            isListening = false; // Ensure listening state is off if mic is off
        }
    }

    if (micButton && micOnIcon && micOffIcon) {
        micButton.addEventListener('click', async () => {
            if (!(await resumeAudioContext())) {
                console.warn("Audio context not ready after click.");
                 // Don't proceed if audio isn't ready
                 // Alert might have been shown in resumeAudioContext
                return;
            }
            if (!sdkReady) { alert("Speech services not ready."); return; }

            isMicOn = !isMicOn;
            if (isMicOn) {
                startConversation(); // Start listening
            } else {
                console.log('Mic off by user.');
                isListening = false;
                // If using continuous recognition, call recognizer.stopContinuousRecognitionAsync() here.
            }
            updateMicButtonUI();
        });
        updateMicButtonUI(); // Initial state
    } else { console.warn("Mic button elements not found."); }


    if (themeElementsExist) {
        let isPreloading = false;
        function applySvgModifications(svgMods) { /* ... same as before ... */ if (!svgElement || !svgMods) return; const defs = svgElement.querySelector('defs'); if (!defs) return; for (const [elementId, modifications] of Object.entries(svgMods)) { let element = defs.querySelector(`#${elementId}`) || svgElement.querySelector(`#${elementId}`); if (element) { for (const [attribute, value] of Object.entries(modifications)) { if (typeof value === 'object' && value !== null) { for (const [subAttr, subValue] of Object.entries(value)) { try { element.setAttribute(subAttr, subValue); } catch (e) { /* ignore */ } } } else { try { element.setAttribute(attribute, value); } catch (e) { /* ignore */ } } } } else { /* ignore */ } } }
        function restartSvgAnimation() { /* ... same as before ... */ requestAnimationFrame(() => { try { const playerInstance = window.SVGatorPlayer?.instances?.[svgElement.id]; if (playerInstance?.restart) { playerInstance.restart(); } } catch (error) { /* ignore */ } }); }

        function updateDisplay(index, playSoundEffect = true) {
            const themeCount = themes.length;
            if (index < 0 || index >= themeCount) return;
            const currentTheme = themes[index];
            const prevIndex = (index - 1 + themeCount) % themeCount;
            const nextIndex = (index + 1) % themeCount;

            // Update text
            currentThemeNameEl.textContent = currentTheme.name;
            currentThemeDescEl.textContent = currentTheme.description;
            prevThemeNameEl.textContent = themes[prevIndex].name;
            prevThemeDescEl.textContent = themes[prevIndex].description;
            nextThemeNameEl.textContent = themes[nextIndex].name;
            nextThemeDescEl.textContent = themes[nextIndex].description;

            // Update SVG
            applySvgModifications(currentTheme.svgMods);
            restartSvgAnimation();

            // --- Update TTS Voice ---
            if (speechConfig && currentTheme.voiceName) {
                speechConfig.speechSynthesisVoiceName = currentTheme.voiceName;
                console.log(`TTS voice changed to: ${currentTheme.voiceName}`);
            }
            if (playSoundEffect) {
                playSound(currentTheme.soundIndex);
            }
        }

        prevArrow.addEventListener('click', async () => {
            if (!(await resumeAudioContext())) return;
            currentThemeIndex = (currentThemeIndex - 1 + themes.length) % themes.length;
            updateDisplay(currentThemeIndex, true);
        });
        nextArrow.addEventListener('click', async () => {
            if (!(await resumeAudioContext())) return;
            currentThemeIndex = (currentThemeIndex + 1) % themes.length;
            updateDisplay(currentThemeIndex, true);
        });

        const preloadThemeSounds = async () => { if (isPreloading) return; isPreloading = true; if (!getAudioContext()) { isPreloading = false; return; } const loadPromises = themes.map(theme => loadSound(theme.soundIndex).catch(() => null)); try { await Promise.all(loadPromises); } catch (error) { /* ignore */ } finally { isPreloading = false; } };
        setTimeout(() => { preloadThemeSounds().then(() => { updateDisplay(currentThemeIndex, false); }); }, 100);

    } else { console.warn("Theme switcher elements not found."); setTimeout(() => { if (getAudioContext() && themes.length > 0) { loadSound(themes[0].soundIndex).catch(() => null); } }, 150); }


    // --- Core Logic Functions ---

    function synthesizeSpeech(text) {
        return new Promise((resolve, reject) => {
            if (!sdkReady || !synthesizer) {
                updateMicButtonUI();
                return reject("Synthesizer not ready.");
            }

            console.log(`Synthesizing (Voice: ${speechConfig.speechSynthesisVoiceName}):`, text);
            synthesizer.speakTextAsync(
                text,
                result => {
                    if (result.reason === sdk.ResultReason.SynthesizingAudioCompleted) {
                        console.log("Synthesis finished.");
                        resolve(true);
                    } else {
                        console.error("Synthesis canceled/failed.", result.errorDetails);
                        isListening = false;
                        updateMicButtonUI();
                        reject(result.errorDetails);
                    }
                },
                error => {
                    console.error("Synthesis error.", error);
                    isListening = false;
                    updateMicButtonUI();
                    reject(error);
                }
            );
        });
    }

    function sendToBackend(message) {
        const fullMessage = hiddenPrompt + message;
        const payload = { message: fullMessage, userId: sessionUserId };

        console.log(`Sending to backend:`, payload);
        return fetch(backendUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(payload)
        })
        .then(res => {
            if (!res.ok) { return res.json().catch(() => res.text()).then(errBody => { let errMsg = `Backend error: ${res.status}`; if (typeof errBody === 'object' && errBody?.error) { errMsg += ` - ${errBody.error}`; } else if (typeof errBody === 'string') { errMsg += ` - ${errBody}`; } throw new Error(errMsg); }); }
            return res.json();
        })
        .then(data => {
            if (!data || typeof data.response === 'undefined') throw new Error("Invalid response format. Expected { response: '...' }");
            console.log('Received response:', data.response);
            return data.response;
        });
    }

    function startConversation() {
        if (!sdkReady || !recognizer) { console.error("Recognizer not ready."); return; }
        if (!isMicOn || isListening) {
             console.log(`Skipping startConversation (MicOn: ${isMicOn}, Listening: ${isListening})`);
             return;
        }

        isListening = true;
        updateMicButtonUI();
        console.log('🎙️ Listening...');

        recognizer.recognizeOnceAsync(
            async result => {
                isListening = false;

                if (result.reason === sdk.ResultReason.RecognizedSpeech) {
                    const userText = result.text;
                    console.log('You said:', userText);
                    if (!userText.trim()) {
                        console.log("Empty recognition.");
                        updateMicButtonUI();
                        startConversation();
                        return;
                    }
                    try {
                        const backendResponse = await sendToBackend(userText);
                        await synthesizeSpeech(backendResponse);

                        console.log("TTS finished, attempting to listen again.");
                        startConversation();

                    } catch (err) {
                        console.error('Error during conversation flow:', err);
                        synthesizeSpeech("Sorry, an error occurred.").catch(() => { updateMicButtonUI(); });
                    }

                } else if (result.reason === sdk.ResultReason.NoMatch) {
                    console.log("NoMatch. Listening again...");
                    updateMicButtonUI();
                    setTimeout(startConversation, 100);

                } else if (result.reason === sdk.ResultReason.Canceled) {
                    const cancellation = sdk.CancellationDetails.fromResult(result);
                    console.log(`Recognition canceled: ${cancellation.reason}`);
                    updateMicButtonUI();
                    if (cancellation.reason === sdk.CancellationReason.Error) {
                        console.error(`Cancellation Error: ${cancellation.errorDetails}`);
                        synthesizeSpeech("Sorry, a recognition error occurred.").catch(() => { updateMicButtonUI(); });
                    }

                } else {
                    console.log(`Recognition ended unexpectedly: ${result.reason}`);
                    updateMicButtonUI();
                }
            },
            error => {
                isListening = false;
                updateMicButtonUI();
                console.error('Recognition start error:', error);
                synthesizeSpeech("Sorry, there was an error starting the microphone.").catch(() => { updateMicButtonUI(); });
            }
        );
    }

});
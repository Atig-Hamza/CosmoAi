document.addEventListener('DOMContentLoaded', () => {
    const themes = [
        {
            id: 'arbor',
            name: 'Arbor',
            description: 'Simple and versatile',
            soundIndex: 1,
            svgMods: {
                'e0D7ZBtOImG6-fill-0': { 'stop-color': '#7FDBFF' },
                'e0D7ZBtOImG7-fill-0': { 'stop-color': '#39CCCC' },
                'e0D7ZBtOImG11-fill-0': { 'stop-color': '#39CCCC' },
                'e0D7ZBtOImG11-fill-1': { 'stop-color': '#DDDDDD' },
                'e0D7ZBtOImG14-fill-0': { 'stop-color': '#B2EBF2' },
                'e0D7ZBtOImG17-fill-1': { 'stop-color': '#80DEEA' },
                'e0D7ZBtOImG19-fill-1': { 'stop-color': '#80DEEA' },
                'e0D7ZBtOImG20-fill-1': { 'stop-color': '#80DEEA' },
                'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '0' }
            }
        },
        {
            id: 'sol',
            name: 'Sol',
            description: 'Erudite and casual',
            soundIndex: 2,
            svgMods: {
                'e0D7ZBtOImG6-fill-0': { 'stop-color': '#F9A825' },
                'e0D7ZBtOImG7-fill-0': { 'stop-color': '#FF6F00' },
                'e0D7ZBtOImG11-fill-0': { 'stop-color': '#FF6F00' },
                'e0D7ZBtOImG11-fill-1': { 'stop-color': '#E65100' },
                'e0D7ZBtOImG14-fill-0': { 'stop-color': '#FFCC80' },
                'e0D7ZBtOImG17-fill-1': { 'stop-color': '#F57C00' },
                'e0D7ZBtOImG19-fill-1': { 'stop-color': '#F57C00' },
                'e0D7ZBtOImG20-fill-1': { 'stop-color': '#F57C00' },
                'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '35' }
            }
        },
        {
            id: 'luna',
            name: 'Luna',
            description: 'Mysterious and calm',
            soundIndex: 3,
            svgMods: {
                'e0D7ZBtOImG6-fill-0': { 'stop-color': '#512DA8' },
                'e0D7ZBtOImG7-fill-0': { 'stop-color': '#7C4DFF' },
                'e0D7ZBtOImG11-fill-0': { 'stop-color': '#673AB7' },
                'e0D7ZBtOImG11-fill-1': { 'stop-color': '#B39DDB' },
                'e0D7ZBtOImG14-fill-0': { 'stop-color': '#9575CD' },
                'e0D7ZBtOImG17-fill-1': { 'stop-color': '#5E35B1' },
                'e0D7ZBtOImG19-fill-1': { 'stop-color': '#5E35B1' },
                'e0D7ZBtOImG20-fill-1': { 'stop-color': '#5E35B1' },
                'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '130' }
            }
        },
        {
            id: 'monday',
            name: 'Monday',
            description: 'Random and vibrant',
            soundIndex: 4,
            svgMods: {
                'e0D7ZBtOImG6-fill-0': { 'stop-color': '#00E676' },
                'e0D7ZBtOImG7-fill-0': { 'stop-color': '#00B0FF' },
                'e0D7ZBtOImG11-fill-0': { 'stop-color': '#00B0FF' },
                'e0D7ZBtOImG11-fill-1': { 'stop-color': '#FF1744' },
                'e0D7ZBtOImG14-fill-0': { 'stop-color': '#76FF03' },
                'e0D7ZBtOImG17-fill-1': { 'stop-color': '#FF4081' },
                'e0D7ZBtOImG19-fill-1': { 'stop-color': '#FF4081' },
                'e0D7ZBtOImG20-fill-1': { 'stop-color': '#FF4081' },
                'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '-20' }
            }
        },
        {
            id: 'forest',
            name: 'Forest',
            description: 'Natural and soothing',
            soundIndex: 5,
            svgMods: {
                'e0D7ZBtOImG6-fill-0': { 'stop-color': '#795548' },
                'e0D7ZBtOImG7-fill-0': { 'stop-color': '#8D6E63' },
                'e0D7ZBtOImG11-fill-0': { 'stop-color': '#A1887F' },
                'e0D7ZBtOImG11-fill-1': { 'stop-color': '#4E342E' },
                'e0D7ZBtOImG14-fill-0': { 'stop-color': '#BCAAA4' },
                'e0D7ZBtOImG17-fill-1': { 'stop-color': '#6D4C41' },
                'e0D7ZBtOImG19-fill-1': { 'stop-color': '#6D4C41' },
                'e0D7ZBtOImG20-fill-1': { 'stop-color': '#6D4C41' },
                'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '-100' }
            }
        }
    ];

    let currentThemeIndex = 0;
    const svgElement = document.getElementById('e0D7ZBtOImG1');
    const prevArrow = document.getElementById('prevArrow');
    const nextArrow = document.getElementById('nextArrow');

    const prevThemeNameEl = document.getElementById('prevThemeName');
    const prevThemeDescEl = document.getElementById('prevThemeDesc');
    const currentThemeNameEl = document.getElementById('currentThemeName');
    const currentThemeDescEl = document.getElementById('currentThemeDesc');
    const nextThemeNameEl = document.getElementById('nextThemeName');
    const nextThemeDescEl = document.getElementById('nextThemeDesc');

    let audioContext;
    let audioBuffers = {};
    let currentAudioSource = null;

    function getAudioContext() {
        if (!audioContext) {
            audioContext = new (window.AudioContext || window.webkitAudioContext)();
        }
        return audioContext;
    }

    async function loadSound(index) {
        const soundPath = `/voices/output${index}.wav`;
        if (audioBuffers[soundPath]) {
            return audioBuffers[soundPath];
        }
        try {
            const context = getAudioContext();
            const response = await fetch(soundPath);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const arrayBuffer = await response.arrayBuffer();
            const audioBuffer = await context.decodeAudioData(arrayBuffer);
            audioBuffers[soundPath] = audioBuffer;
            return audioBuffer;
        } catch (error) {
            console.error(`Could not load or decode sound ${soundPath}:`, error);
            return null;
        }
    }

    async function playSound(index) {
        try {
            const context = getAudioContext();
            if (context.state === 'suspended') {
                await context.resume();
            }

            const audioBuffer = await loadSound(index);
            if (!audioBuffer) return;

            if (currentAudioSource) {
                currentAudioSource.stop();
                currentAudioSource.disconnect();
            }

            const source = context.createBufferSource();
            source.buffer = audioBuffer;
            source.connect(context.destination);
            source.start(0);
            currentAudioSource = source;
        } catch (error) {
            console.error('Error playing sound:', error);
        }
    }

    function updateDisplay(index, playSoundEffect = true) {
        const themeCount = themes.length;
        const currentTheme = themes[index];
        const prevIndex = (index - 1 + themeCount) % themeCount;
        const nextIndex = (index + 1) % themeCount;

        currentThemeNameEl.textContent = currentTheme.name;
        currentThemeDescEl.textContent = currentTheme.description;
        prevThemeNameEl.textContent = themes[prevIndex].name;
        prevThemeDescEl.textContent = themes[prevIndex].description;
        nextThemeNameEl.textContent = themes[nextIndex].name;
        nextThemeDescEl.textContent = themes[nextIndex].description;

        if (playSoundEffect) {
            playSound(currentTheme.soundIndex);
        }

        if (svgElement && currentTheme.svgMods) {
            const defs = svgElement.querySelector('defs');
            if (defs) {
                for (const [elementId, modifications] of Object.entries(currentTheme.svgMods)) {
                    const element = defs.querySelector(`#${elementId}`);
                    if (element) {
                        for (const [attribute, value] of Object.entries(modifications)) {
                            if (typeof value === 'object' && value !== null) {
                                for (const [subAttr, subValue] of Object.entries(value)) {
                                    element.setAttribute(subAttr, subValue);
                                }
                            } else {
                                element.setAttribute(attribute, value);
                            }
                        }
                    } else {
                        console.warn(`Element with ID #${elementId} not found in SVG defs.`);
                    }
                }
            }

            setTimeout(() => {
                try {
                    const playerInstance = window.SVGatorPlayer?.instances['e0D7ZBtOImG1'];
                    if (playerInstance && typeof playerInstance.restart === 'function') {
                        playerInstance.restart();
                    } else {
                        console.warn('SVGatorPlayer instance or restart method not found.');
                    }
                } catch (error) {
                    console.error("Error restarting SVGator animation:", error);
                }
            }, 0);
        }
    }

    prevArrow.addEventListener('click', () => {
        const context = getAudioContext();
        if (context.state === 'suspended') {
            context.resume();
        }
        currentThemeIndex = (currentThemeIndex - 1 + themes.length) % themes.length;
        updateDisplay(currentThemeIndex);
    });

    nextArrow.addEventListener('click', () => {
        const context = getAudioContext();
        if (context.state === 'suspended') {
            context.resume();
        }
        currentThemeIndex = (currentThemeIndex + 1) % themes.length;
        updateDisplay(currentThemeIndex);
    });

    const preloadSounds = async () => {
        for (let i = 0; i < themes.length; i++) {
            await loadSound(themes[i].soundIndex);
        }
    };

    setTimeout(() => {
        preloadSounds().then(() => {
            updateDisplay(currentThemeIndex, false);
        });
    }, 100);

});
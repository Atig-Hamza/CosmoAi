<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voice Interface</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    @vite(['resources/js/voicehandler.js'])

    <style>
        body {
            margin: 0;
            height: 100vh;
            background-color: #212121;
            overflow: hidden;
        }

        #close-btn {
            position: fixed;
            top: 1rem;
            right: 1rem;
            background: #ff5252;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 9999px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            z-index: 999;
            transition: background 0.3s;
        }

        #close-btn:hover {
            background: #ff1744;
        }

        canvas {
            display: block;
        }
    </style>
</head>

<body class="bg-[#212121]">

    <a id="closeBtn" href="/chat"
        class="absolute top-4 right-4 text-white hover:text-gray-400 active:scale-90 transition-all duration-150 p-2 rounded-full focus:outline-none z-50"
        aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>

    <button id="settingsBtn" popovertarget="selectV"
        class="absolute top-4 left-4 text-white hover:text-gray-400 active:scale-90 transition-all duration-150 p-2 rounded-full focus:outline-none z-50"
        aria-label="Settings"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
            fill="currentColor">
            <path
                d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z" />
        </svg>
    </button>

    <svg id="e0D7ZBtOImG1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="-300 -340 600 400" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
        class="m-auto w-[84%] h-[84%]">
        <defs>
            <radialGradient id="e0D7ZBtOImG6-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                <stop id="e0D7ZBtOImG6-fill-0" offset="0%" stop-color="#fa01fc"></stop>
                <stop id="e0D7ZBtOImG6-fill-1" offset="100%" stop-color="rgba(250,1,252,0)"></stop>
            </radialGradient>
            <radialGradient id="e0D7ZBtOImG7-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                <stop id="e0D7ZBtOImG7-fill-0" offset="0%" stop-color="#0054ff"></stop>
                <stop id="e0D7ZBtOImG7-fill-1" offset="100%" stop-color="rgba(0,84,255,0)"></stop>
            </radialGradient>
            <filter id="e0D7ZBtOImG8-filter" x="-150%" width="400%" y="-150%" height="400%">
                <feColorMatrix id="e0D7ZBtOImG8-filter-hue-rotate-0" type="hueRotate" values="-15.030654"
                    result="result"></feColorMatrix>
            </filter>
            <linearGradient id="e0D7ZBtOImG11-fill" x1="0" y1="0.5" x2="1" y2="0.5" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                <stop id="e0D7ZBtOImG11-fill-0" offset="0%" stop-color="#0054ff"></stop>
                <stop id="e0D7ZBtOImG11-fill-1" offset="100%" stop-color="#fc0137"></stop>
            </linearGradient>
            <radialGradient id="e0D7ZBtOImG13-fill" cx="0" cy="0" r="0.763019" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="matrix(0 -1 0.807221 0 0.934765 0.5)">
                <stop id="e0D7ZBtOImG13-fill-0" offset="24%" stop-color="#000"></stop>
                <stop id="e0D7ZBtOImG13-fill-1" offset="100%" stop-color="#fff"></stop>
            </radialGradient>
            <radialGradient id="e0D7ZBtOImG14-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                <stop id="e0D7ZBtOImG14-fill-0" offset="0%" stop-color="#fa01fc"></stop>
                <stop id="e0D7ZBtOImG14-fill-1" offset="100%" stop-color="rgba(252,1,55,0)"></stop>
            </radialGradient>
            <radialGradient id="e0D7ZBtOImG15-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                <stop id="e0D7ZBtOImG15-fill-0" offset="0%" stop-color="#fff"></stop>
                <stop id="e0D7ZBtOImG15-fill-1" offset="100%" stop-color="rgba(255,255,255,0)"></stop>
            </radialGradient>
            <linearGradient id="e0D7ZBtOImG17-fill" x1="0.218881" y1="0.921618" x2="0.575964" y2="0.269703"
                spreadMethod="pad" gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                <stop id="e0D7ZBtOImG17-fill-0" offset="0%" stop-color="#000"></stop>
                <stop id="e0D7ZBtOImG17-fill-1" offset="100%" stop-color="#d347ff"></stop>
            </linearGradient>
            <linearGradient id="e0D7ZBtOImG19-fill" x1="0.218881" y1="0.921618" x2="0.575964" y2="0.269703"
                spreadMethod="pad" gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                <stop id="e0D7ZBtOImG19-fill-0" offset="0%" stop-color="#000"></stop>
                <stop id="e0D7ZBtOImG19-fill-1" offset="100%" stop-color="#d347ff"></stop>
            </linearGradient>
            <linearGradient id="e0D7ZBtOImG20-fill" x1="0.218881" y1="0.921618" x2="0.575964" y2="0.269703"
                spreadMethod="pad" gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                <stop id="e0D7ZBtOImG20-fill-0" offset="0%" stop-color="#000"></stop>
                <stop id="e0D7ZBtOImG20-fill-1" offset="100%" stop-color="#d347ff"></stop>
            </linearGradient>
            <radialGradient id="e0D7ZBtOImG27-fill" cx="0" cy="0" r="0.8325945607729996" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="matrix(1 0 0 1 0.636744 0.566145)">
                <stop id="e0D7ZBtOImG27-fill-0" offset="0.62" stop-color="rgba(211,71,255,0)"></stop>
                <stop id="e0D7ZBtOImG27-fill-1" offset="1" stop-color="#fff"></stop>
            </radialGradient>
            <radialGradient id="e0D7ZBtOImG30-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                <stop id="e0D7ZBtOImG30-fill-0" offset="0%" stop-color="#fff"></stop>
                <stop id="e0D7ZBtOImG30-fill-1" offset="100%" stop-color="rgba(255,255,255,0)"></stop>
            </radialGradient>
            <linearGradient id="e0D7ZBtOImG31-stroke" x1="1.01278" y1="0.912121" x2="-0.03944" y2="0.00449"
                spreadMethod="pad" gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                <stop id="e0D7ZBtOImG31-stroke-0" offset="0%" stop-color="#fff"></stop>
                <stop id="e0D7ZBtOImG31-stroke-1" offset="100%" stop-color="rgba(255,255,255,0)"></stop>
            </linearGradient>
        </defs>

        <g transform="matrix(.68 0 0 0.68 10-140)">
            <g id="e0D7ZBtOImG8" mask="url(#e0D7ZBtOImG21)" filter="url(#e0D7ZBtOImG8-filter)"
                transform="matrix(0.966599 0 0 0.966599 0 0)">
                <ellipse rx="277.941173" ry="277.941173" transform="matrix(.68 0 0 0.68 0 0)" opacity="0.8"
                    stroke-width="0"></ellipse>
                <g mask="url(#e0D7ZBtOImG12)">
                    <ellipse rx="168.09308" ry="168.09308" fill="url(#e0D7ZBtOImG11-fill)" stroke-width="0"></ellipse>
                    <mask id="e0D7ZBtOImG12" mask-type="luminance" x="-150%" y="-150%" height="400%" width="400%">
                        <ellipse rx="168.09308" ry="168.09308" transform="matrix(0 1-1 0 0 0)"
                            fill="url(#e0D7ZBtOImG13-fill)" stroke-width="0"></ellipse>
                    </mask>
                </g>
                <ellipse rx="277.941173" ry="277.941173" transform="matrix(.68 0 0 0.68 0-140)"
                    fill="url(#e0D7ZBtOImG14-fill)" stroke-width="0"></ellipse>
                <ellipse id="e0D7ZBtOImG15" rx="277.941173" ry="277.941173" transform="matrix(.68 0 0 0.68 0-60)"
                    opacity="0.149667" fill="url(#e0D7ZBtOImG15-fill)" stroke-width="0"></ellipse>
                <g id="e0D7ZBtOImG16" transform="matrix(0.996132 0.087866 -0.087866 0.996132 0 0)">
                    <path id="e0D7ZBtOImG17" style="mix-blend-mode:screen"
                        d="M -227.8123088040092 -35.53192950805 C -231.9103664094921 51.67969703929679 -148.23683059418377 81.47305943001433 -75.45055412599193 77.70241568658142 C 18.117805062586 72.3977290098533 80.91854392548996 40.3336225165923 124.70876608780102 118.66830416858775 C 102.56550859176022 406.51393386244916 -174.65932983642446 454.1605090855757 -295.2830938760776 342.07633368997597 C -415.9068579157307 229.99216196549267 -311.90586589275256 8.89675455129921 -227.8123088040092 -35.53192950805 Z"
                        transform="translate(131.630381 -187.803951)" opacity="0.244759" fill="url(#e0D7ZBtOImG17-fill)"
                        stroke-width="1.024"></path>
                    <g id="e0D7ZBtOImG18" transform="matrix(0.77438 -0.632721 0.632721 0.77438 0 0)">
                        <path id="e0D7ZBtOImG19" style="mix-blend-mode:screen"
                            d="M -272.6214397885556 45.80666064009037 C -239.11453296314892 62.883199447423394 -166.395783950329 115.4457110544794 -121.60933794058278 140.52760650863226 C -65.04261191011867 169.77754362490163 -20.012345890666282 183.03198874621802 42.4660002842106 225.36130674477852 C 3.6506719460685133 374.4071977159851 -184.41141976029215 396.04837432047776 -273.1239763058974 310.40333389807444 C -361.83653342627053 224.75829519997515 -313.0796116164004 82.78282370172695 -272.6214397885556 45.80666064009037 Z"
                            transform="translate(90.828905 -133.175557)" opacity="0.38" fill="url(#e0D7ZBtOImG19-fill)"
                            stroke-width="1.024"></path>
                    </g>
                    <path id="e0D7ZBtOImG20" style="mix-blend-mode:screen"
                        d="M -310.86084396567503 115.2197267688135 C -245.2624545940938 72.44409149092466 -181.89234809143707 144.43743397978952 -161.0005144828534 194.1416309616812 C -136.01039642829195 252.87993770314188 -106.14517047746901 304.8085178154017 -27.71867483801382 316.41142812004614 C -80.76168538699875 347.0078167106874 -192.73369912449667 346.45639715565443 -254.2137362757584 283.3740966503644 C -315.6937732753765 220.29179629671785 -314.08126803158603 145.83602649185949 -310.86084396567503 115.2197267688135 Z"
                        transform="translate(50.027428 -78.547164)" opacity="0.38" fill="url(#e0D7ZBtOImG20-fill)"
                        stroke-width="1.024"></path>
                </g>
                <mask id="e0D7ZBtOImG21" mask-type="luminance" x="-150%" y="-150%" height="400%" width="400%">
                    <g id="e0D7ZBtOImG22" transform="matrix(0.966599 0 0 0.966599 0 0)">
                        <path id="e0D7ZBtOImG23"
                            d="M-143.776898,0c0-79.405788,64.37111-143.776898,143.776898-143.776898s143.776899,64.37111,143.776899,143.776898-64.371111,143.776899-143.776899,143.776899-143.776898-64.371111-143.776898-143.776899Z"
                            fill="#fff" stroke-width="0" transform="matrix(0.966599 0 0 0.966599 0 0)"></path>
                        <path id="e0D7ZBtOImG24"
                            d="M-150,0c0-82.842712,67.157288-150,150-150s150,67.157288,150,150-67.157288,150-150,150-150-67.157288-150-150Z"
                            transform="matrix(-0.86575 0.631779 -0.573418 -0.785776 0 0)" opacity="0.38" fill="#fff"
                            stroke-width="0"></path>
                        <path id="e0D7ZBtOImG25"
                            d="M-150,0c0-82.842712,67.157288-150,150-150s150,67.157288,150,150-67.157288,150-150,150-150-67.157288-150-150Z"
                            transform="matrix(-1.016679 -0.158844 0.153522 -0.982614 0 0)" opacity="0.38" fill="#fff"
                            stroke-width="0"></path>
                        <path id="e0D7ZBtOImG26"
                            d="M-150,0c0-82.842712,67.157288-150,150-150s150,67.157288,150,150-67.157288,150-150,150-150-67.157288-150-150Z"
                            transform="matrix(-0.638993 -0.875636 0.780739 -0.569742 0 0)" opacity="0.38" fill="#fff"
                            stroke-width="0"></path>
                    </g>
                </mask>
            </g>
            <path id="e0D7ZBtOImG27"
                d="M-137.256263,0c0-75.80454,61.451723-137.256263,137.256263-137.256263s137.256263,61.451723,137.256263,137.256263-61.451723,137.256263-137.256263,137.256263-137.256263-61.451723-137.256263-137.256263Z"
                fill="url(#e0D7ZBtOImG27-fill)" stroke-width="0"
                transform="matrix(0.284654 -0.888723 0.888723 0.284654 0 0)"></path>
        </g>

        <script>
            // The SVGator script remains here for animation
            (function (s, i, u, o, c, w, d, t, n, x, e, p, a, b) { (a = Array.from(d.querySelectorAll('svg#' + i.root)).filter(n => !n.svgatorPlayer)[0] || {}).svgatorPlayer = { ready: (function (a) { b = []; return function (c) { return c ? (b.push(c), a.svgatorPlayer) : b } })(a) }; w[o] = w[o] || {}; w[o][s] = w[o][s] || []; w[o][s].push(i); e = d.createElementNS(n, t); e.async = true; e.setAttributeNS(x, 'href', [u, s, '.', 'j', 's', '?', 'v', '=', c].join('')); e.setAttributeNS(null, 'src', [u, s, '.', 'j', 's', '?', 'v', '=', c].join('')); p = d.getElementsByTagName(t)[0]; p.parentNode.insertBefore(e, p); })('91c80d77', { "root": "e0D7ZBtOImG1", "version": "2022-05-04", "animations": [{ "elements": { "e0D7ZBtOImG3": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }], "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.920668, "y": 0.920668 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG4": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0] }] }, "e0D7ZBtOImG5": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0] }] }, "e0D7ZBtOImG8": { "transform": { "keys": { "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.9, "y": 0.9 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } }, "#filter": { "keys": [{ "t": 0, "v": [{ "type": "hue-rotate", "value": 0 }], "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": [{ "type": "hue-rotate", "value": -45 }], "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": [{ "type": "hue-rotate", "value": 0 }] }], "data": { "items": [["hue-rotate", "e0D7ZBtOImG8-filter-hue-rotate-0"]] } } }, "e0D7ZBtOImG15": { "opacity": [{ "t": 0, "v": 0.25 }, { "t": 1500, "v": 0 }, { "t": 3000, "v": 0.25 }] }, "e0D7ZBtOImG16": { "transform": { "keys": { "r": [{ "t": 0, "v": -15, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": 45, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": -15 }] } } }, "e0D7ZBtOImG17": { "d": [{ "t": 0, "v": ["M", -314.167894, 121.222762, "C", -245.794144, 73.270944, -183.232534, 146.944719, -164.407173, 198.778321, "C", -142.147888, 260.066864, -113.594177, 315.340091, -33.788441, 324.285696, "C", -88.061901, 344.638242, -193.453433, 342.167545, -252.578326, 281.036533, "C", -311.703219, 219.905521, -314.167894, 151.289043, -314.167894, 121.222762, "Z"], "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": ["M", -220.075987, -49.575083, "C", -230.666563, 49.745406, -145.101677, 75.607662, -67.481214, 66.855611, "C", 32.475498, 55.585049, 98.344319, 15.696669, 138.908026, 100.247697, "C", 119.643211, 412.05718, -172.975626, 464.193602, -299.108878, 347.544695, "C", -425.24213, 230.895792, -311.703218, -3.859717, -220.075987, -49.575083, "Z"], "e": [0.25, 0.46, 0.45, 0.94] }], "transform": { "data": { "t": { "x": 57.875257, "y": -70.652439 } }, "keys": { "o": [{ "t": 0, "v": { "x": -24.086816, "y": 13.847376, "type": "corner" } }, { "t": 3000, "v": { "x": 98.317613, "y": -150.037805, "type": "corner" } }] } }, "opacity": [{ "t": 1700, "v": 0.38, "e": [0.42, 0, 1, 1] }, { "t": 3000, "v": 0 }] }, "e0D7ZBtOImG18": { "transform": { "keys": { "r": [{ "t": 1000, "v": 0, "e": [0.42, 0, 0.58, 1] }, { "t": 2000, "v": -58.469922, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": 0 }] } } }, "e0D7ZBtOImG19": { "d": [{ "t": 0, "v": ["M", -241.884025, -9.988618, "C", -234.17274, 55.198009, -153.93941, 92.141723, -89.946111, 97.431838, "C", -7.997627, 102.978575, 49.222529, 85.146162, 98.88151, 152.173834, "C", 71.502609, 396.431237, -177.721845, 435.91116, -288.324315, 332.129846, "C", -398.926786, 228.348535, -312.274465, 32.0997, -241.884025, -9.988618, "Z"], "e": [0.288922, 0.57899, 0.606405, 1] }, { "t": 990, "v": ["M", -220.075987, -49.575083, "C", -230.666563, 49.745406, -145.101677, 75.607662, -67.481214, 66.855611, "C", 32.475498, 55.585049, 98.344319, 15.696669, 138.908026, 100.247697, "C", 119.643211, 412.05718, -172.975626, 464.193602, -299.108878, 347.544695, "C", -425.24213, 230.895792, -311.703218, -3.859717, -220.075987, -49.575083, "Z"], "e": [1, 0] }, { "t": 1000, "v": ["M", -314.167894, 121.222762, "C", -245.794144, 73.270944, -183.232534, 146.944719, -164.407173, 198.778321, "C", -142.147888, 260.066864, -113.594177, 315.340091, -33.788441, 324.285696, "C", -88.061901, 344.638242, -193.453433, 342.167545, -252.578326, 281.036533, "C", -311.703219, 219.905521, -314.167894, 151.289043, -314.167894, 121.222762, "Z"], "e": [0.433203, 0, 0.682004, 0.615475] }, { "t": 3000, "v": ["M", -241.884025, -9.988618, "C", -234.17274, 55.198009, -153.93941, 92.141723, -89.946111, 97.431838, "C", -7.997627, 102.978575, 49.222529, 85.146162, 98.88151, 152.173834, "C", 71.502609, 396.431237, -177.721845, 435.91116, -288.324315, 332.129846, "C", -398.926786, 228.348535, -312.274465, 32.0997, -241.884025, -9.988618, "Z"], "e": [0.288922, 0.57899, 0.606405, 1] }], "transform": { "data": { "t": { "x": 57.875257, "y": -70.652439 } }, "keys": { "o": [{ "t": 0, "v": { "x": 57.516137, "y": -95.409411, "type": "corner" } }, { "t": 990, "v": { "x": 98.317613, "y": -150.037805, "type": "corner" }, "e": [1, 0] }, { "t": 1000, "v": { "x": -24.086816, "y": 13.847376, "type": "corner" } }, { "t": 3000, "v": { "x": 57.516137, "y": -95.409411, "type": "corner" } }] } }, "opacity": [{ "t": 0, "v": 0.349273, "e": [0.486384, 0.258886, 1, 1] }, { "t": 990, "v": 0, "e": [1, 0] }, { "t": 1010, "v": 0.38, "e": [0.317878, 0, 0.656906, 0.377262] }, { "t": 2700, "v": 0.38, "e": [0.317878, 0, 0.656906, 0.377262] }, { "t": 3000, "v": 0.349273, "e": [0.486384, 0.258886, 1, 1] }] }, "e0D7ZBtOImG20": { "d": [{ "t": 0, "v": ["M", -292.359856, 81.636297, "C", -242.287967, 67.818341, -174.394801, 130.410658, -141.942276, 168.202094, "C", -101.674763, 212.673338, -64.472387, 245.890598, 6.238075, 272.359559, "C", -39.921299, 360.264185, -188.707214, 370.449987, -263.362889, 296.451382, "C", -338.018563, 222.452778, -313.596647, 115.329626, -292.359856, 81.636297, "Z"], "e": [0.317996, 0.384525, 0.566797, 1] }, { "t": 1980, "v": ["M", -220.075987, -49.575083, "C", -230.666563, 49.745406, -145.101677, 75.607662, -67.481214, 66.855611, "C", 32.475498, 55.585049, 98.344319, 15.696669, 138.908026, 100.247697, "C", 119.643211, 412.05718, -172.975626, 464.193602, -299.108878, 347.544695, "C", -425.24213, 230.895792, -311.703218, -3.859717, -220.075987, -49.575083, "Z"], "e": [1, 0] }, { "t": 2000, "v": ["M", -314.167894, 121.222762, "C", -245.794144, 73.270944, -183.232534, 146.944719, -164.407173, 198.778321, "C", -142.147888, 260.066864, -113.594177, 315.340091, -33.788441, 324.285696, "C", -88.061901, 344.638242, -193.453433, 342.167545, -252.578326, 281.036533, "C", -311.703219, 219.905521, -314.167894, 151.289043, -314.167894, 121.222762, "Z"], "e": [0.393595, 0, 0.711078, 0.42101] }, { "t": 3000, "v": ["M", -292.359856, 81.636297, "C", -242.287967, 67.818341, -174.394801, 130.410658, -141.942276, 168.202094, "C", -101.674763, 212.673338, -64.472387, 245.890598, 6.238075, 272.359559, "C", -39.921299, 360.264185, -188.707214, 370.449987, -263.362889, 296.451382, "C", -338.018563, 222.452778, -313.596647, 115.329626, -292.359856, 81.636297, "Z"], "e": [0.317996, 0.384525, 0.566797, 1] }], "transform": { "data": { "t": { "x": 57.875257, "y": -70.652439 } }, "keys": { "o": [{ "t": 0, "v": { "x": 16.71466, "y": -40.781018, "type": "corner" } }, { "t": 1980, "v": { "x": 98.317613, "y": -150.037805, "type": "corner" }, "e": [1, 0] }, { "t": 2000, "v": { "x": -24.086816, "y": 13.847376, "type": "corner" } }, { "t": 3000, "v": { "x": 16.71466, "y": -40.781018, "type": "corner" } }] } }, "opacity": [{ "t": 700, "v": 0.38, "e": [0.42, 0, 1, 1] }, { "t": 1980, "v": 0, "e": [1, 0] }, { "t": 2000, "v": 0.38, "e": [0.42, 0, 1, 1] }] }, "e0D7ZBtOImG22": { "transform": { "keys": { "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.9, "y": 0.9 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG23": { "transform": { "keys": { "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.9, "y": 0.9 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG24": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }], "s": [{ "t": 0, "v": { "x": 1.093491, "y": 0.961682 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 1.028427, "y": 0.994833 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1.093491, "y": 0.961682 } }] } } }, "e0D7ZBtOImG25": { "transform": { "keys": { "r": [{ "t": 0, "v": 45 }, { "t": 3000, "v": 225 }], "s": [{ "t": 0, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.317996, 0.384525, 0.566797, 1] }, { "t": 1000, "v": { "x": 1.093491, "y": 0.961682 }, "e": [0.42, 0, 0.58, 1] }, { "t": 2500, "v": { "x": 1.028427, "y": 0.994833 }, "e": [0.393595, 0, 0.711078, 0.42101] }, { "t": 3000, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.317996, 0.384525, 0.566797, 1] }] } } }, "e0D7ZBtOImG26": { "transform": { "keys": { "r": [{ "t": 0, "v": 90 }, { "t": 3000, "v": 270 }], "s": [{ "t": 0, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.288922, 0.57899, 0.606405, 1] }, { "t": 500, "v": { "x": 1.028427, "y": 0.994833 }, "e": [0.42, 0, 0.58, 1] }, { "t": 2000, "v": { "x": 1.093491, "y": 0.961682 }, "e": [0.433203, 0, 0.682004, 0.615475] }, { "t": 3000, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.288922, 0.57899, 0.606405, 1] }] } } }, "e0D7ZBtOImG27": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 360 }], "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.8, "y": 0.8 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } }, "fill": [{ "t": 0, "v": { "t": "g", "s": [{ "c": { "r": 211, "g": 71, "b": 255, "a": 0 }, "o": 0.62 }, { "c": { "r": 255, "g": 255, "b": 255, "a": 1 }, "o": 1 }], "r": "e0D7ZBtOImG27-fill", "gt": [1, 0, 0, 1, 0.636744, 0.566145], "c": { "x": 0, "y": 0 }, "rd": 0.766616 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "t": "g", "s": [{ "c": { "r": 211, "g": 71, "b": 255, "a": 0 }, "o": 0.62 }, { "c": { "r": 255, "g": 255, "b": 255, "a": 1 }, "o": 1 }], "r": "e0D7ZBtOImG27-fill", "gt": [1, 0, 0, 1, 0.636744, 0.566145], "c": { "x": 0, "y": 0 }, "rd": 0.964148 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "t": "g", "s": [{ "c": { "r": 211, "g": 71, "b": 255, "a": 0 }, "o": 0.62 }, { "c": { "r": 255, "g": 255, "b": 255, "a": 1 }, "o": 1 }], "r": "e0D7ZBtOImG27-fill", "gt": [1, 0, 0, 1, 0.636744, 0.566145], "c": { "x": 0, "y": 0 }, "rd": 0.766616 } }] }, "e0D7ZBtOImG28": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }], "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.920668, "y": 0.920668 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG30": { "transform": { "data": { "t": { "x": 200, "y": 0 } }, "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }] } } }, "e0D7ZBtOImG31": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }] } } }, "e0D7ZBtOImG32": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0] }] }, "e0D7ZBtOImG33": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0] }] } }, "s": "MDWA1YzhhMzE3MCzg0ODE3MDgzPQTc4N2U3ZDMExNDk0MjNmWTFNmM2YzYlIzMOTczNzg4MTc0VNzI4Mzc4N2UV3ZDMxNDlDNDBAzYjMxNzg4MWzc0ODE3MDgzYNzg3ZTdkODIMzMTQ5M2YzYjQMxNzU3ODdiNS2IzMTQ5UzQwIM2IzMTcwN2IB4Mzc0ODFQN2VQ3MDgzNzQzMATQ5NzU3MDdiXODJBNzQzYjMPxODI3Zjc0NzRQ3MzMxNDk0MNDNiMzE3NTdmWODIzMTQ5NDICzZjhj" }], "options": "MDRAxMDgyMjk3YTTdiNjg3OTdiQMjlONDEyOTcWzNzY2ODZiRDFI5ODQ/" }, 'https://cdn.svgator.com/ply/', '__SVGATOR_PLAYER__', '2022-05-04', window, document, 'script', 'http://www.w3.org/2000/svg', 'http://www.w3.org/1999/xlink')
        </script>
    </svg>


    <div class="w-full flex justify-center items-center">
        <button id="micBtn"
            class="p-3 rounded-full bg-gray-200 text-black hover:bg-gray-300 active:scale-95 transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            aria-label="Mute Microphone">

            <svg id="micOnIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pointer-events-none"
                viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12 14c1.66 0 2.99-1.34 2.99-3L15 5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3zm5.3-3c0 3-2.54 5.1-5.3 5.1S6.7 14 6.7 11H5c0 3.41 2.72 6.23 6 6.72V21h2v-3.28c3.28-.48 6-3.3 6-6.72h-1.7z" />
            </svg>

            <svg id="micOffIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pointer-events-none hidden">
                <path d="M0 0h24v24H0zm0 0h24v24H0z" fill="none" />
                <path
                    d="M19 11h-1.7c0 .74-.16 1.43-.43 2.05l1.23 1.23c.56-.98.9-2.09.9-3.28zm-4.02.17c0-.06.02-.11.02-.17V5c0-1.66-1.34-3-3-3S9 3.34 9 5v.18l5.98 5.99zM4.27 3L3 4.27l6.01 6.01V11c0 1.66 1.33 3 2.99 3 .22 0 .44-.03.65-.08l1.66 1.66c-.71.33-1.5.52-2.31.52-2.76 0-5.3-2.1-5.3-5.1H5c0 3.41 2.72 6.23 6 6.72V21h2v-3.28c.91-.13 1.77-.45 2.54-.9L19.73 21 21 19.73 4.27 3z" />
            </svg>
        </button>
    </div>

    <script>
        const micButton = document.getElementById('micBtn');
        const micOnIcon = document.getElementById('micOnIcon');
        const micOffIcon = document.getElementById('micOffIcon');

        let isMicOn = true;

        micButton.addEventListener('click', () => {
            isMicOn = !isMicOn;

            if (isMicOn) {
                micOnIcon.classList.remove('hidden');
                micOffIcon.classList.add('hidden');
                micButton.classList.remove('bg-red-500', 'text-white', 'hover:bg-red-600');
                micButton.classList.add('bg-gray-200', 'text-black', 'hover:bg-gray-300');
                micButton.setAttribute('aria-label', 'Mute Microphone');
            } else {
                micOnIcon.classList.add('hidden');
                micOffIcon.classList.remove('hidden');
                micButton.classList.remove('bg-gray-200', 'text-black', 'hover:bg-gray-300');
                micButton.classList.add('bg-red-500', 'text-white', 'hover:bg-red-600');
                micButton.setAttribute('aria-label', 'Unmute Microphone');
            }
        });
    </script>

    <div id="selectV" popover
        class="w-full h-full bg-[#212121] text-white font-sans rounded-lg shadow-xl overflow-hidden border border-gray-700">

        <div class="flex flex-col items-center justify-center h-full w-full p-6 md:p-8 relative">
            <h1 class="text-2xl md:text-3xl font-semibold mb-6 md:mb-10 absolute top-6 md:top-8">Choose a voice</h1>

            <div class="flex items-center justify-center w-full gap-4 sm:gap-6 md:gap-10 lg:gap-16 mt-16 mb-auto px-2">
                <div class="text-center text-gray-500 flex-shrink-0 w-20 md:w-28 hidden sm:block">
                    <div id="prevThemeName" class="text-base md:text-lg truncate">Monday</div>
                    <div id="prevThemeDesc" class="text-xs md:text-sm truncate">Random</div>
                </div>

                <button id="prevArrow" class="text-gray-400 hover:text-white text-3xl md:text-4xl rounded-full z-40">
                    < </button>

                        <div class="flex flex-col items-center gap-3 md:gap-4 flex-shrink-0 mt-[6%]">
                            <div id="svgContainer" class="w-[180%] h-[180%]">
                                <svg id="e0D7ZBtOImG1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-300 -340 600 400"
                                    shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                                    class="w-full h-full">
                                    <defs>
                                        <radialGradient id="e0D7ZBtOImG6-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                                            <stop id="e0D7ZBtOImG6-fill-0" offset="0%" stop-color="#ADD8E6"></stop>
                                            <stop id="e0D7ZBtOImG6-fill-1" offset="100%"
                                                stop-color="rgba(173,216,230,0)"></stop>
                                        </radialGradient>
                                        <radialGradient id="e0D7ZBtOImG7-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                                            <stop id="e0D7ZBtOImG7-fill-0" offset="0%" stop-color="#87CEEB"></stop>
                                            <stop id="e0D7ZBtOImG7-fill-1" offset="100%"
                                                stop-color="rgba(135,206,235,0)"></stop>
                                        </radialGradient>
                                        <filter id="e0D7ZBtOImG8-filter" x="-150%" width="400%" y="-150%" height="400%">
                                            <feColorMatrix id="e0D7ZBtOImG8-filter-hue-rotate-0" type="hueRotate"
                                                values="0" result="result"></feColorMatrix>
                                        </filter>
                                        <linearGradient id="e0D7ZBtOImG11-fill" x1="0" y1="0.5" x2="1" y2="0.5"
                                            spreadMethod="pad" gradientUnits="objectBoundingBox"
                                            gradientTransform="translate(0 0)">
                                            <stop id="e0D7ZBtOImG11-fill-0" offset="0%" stop-color="#87CEEB"></stop>
                                            <stop id="e0D7ZBtOImG11-fill-1" offset="100%" stop-color="#FFFFFF"></stop>
                                        </linearGradient>
                                        <radialGradient id="e0D7ZBtOImG13-fill" cx="0" cy="0" r="0.763019"
                                            spreadMethod="pad" gradientUnits="objectBoundingBox"
                                            gradientTransform="matrix(0 -1 0.807221 0 0.934765 0.5)">
                                            <stop id="e0D7ZBtOImG13-fill-0" offset="24%" stop-color="#000"></stop>
                                            <stop id="e0D7ZBtOImG13-fill-1" offset="100%" stop-color="#fff"></stop>
                                        </radialGradient>
                                        <radialGradient id="e0D7ZBtOImG14-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                                            <stop id="e0D7ZBtOImG14-fill-0" offset="0%" stop-color="#E0FFFF"></stop>
                                            <stop id="e0D7ZBtOImG14-fill-1" offset="100%"
                                                stop-color="rgba(255,255,255,0)"></stop>
                                        </radialGradient>
                                        <radialGradient id="e0D7ZBtOImG15-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                                            <stop id="e0D7ZBtOImG15-fill-0" offset="0%" stop-color="#fff"></stop>
                                            <stop id="e0D7ZBtOImG15-fill-1" offset="100%"
                                                stop-color="rgba(255,255,255,0)"></stop>
                                        </radialGradient>
                                        <linearGradient id="e0D7ZBtOImG17-fill" x1="0.218881" y1="0.921618"
                                            x2="0.575964" y2="0.269703" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                                            <stop id="e0D7ZBtOImG17-fill-0" offset="0%" stop-color="#000"></stop>
                                            <stop id="e0D7ZBtOImG17-fill-1" offset="100%" stop-color="#B0E0E6"></stop>
                                        </linearGradient>
                                        <linearGradient id="e0D7ZBtOImG19-fill" x1="0.218881" y1="0.921618"
                                            x2="0.575964" y2="0.269703" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                                            <stop id="e0D7ZBtOImG19-fill-0" offset="0%" stop-color="#000"></stop>
                                            <stop id="e0D7ZBtOImG19-fill-1" offset="100%" stop-color="#B0E0E6"></stop>
                                        </linearGradient>
                                        <linearGradient id="e0D7ZBtOImG20-fill" x1="0.218881" y1="0.921618"
                                            x2="0.575964" y2="0.269703" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                                            <stop id="e0D7ZBtOImG20-fill-0" offset="0%" stop-color="#000"></stop>
                                            <stop id="e0D7ZBtOImG20-fill-1" offset="100%" stop-color="#B0E0E6"></stop>
                                        </linearGradient>
                                        <radialGradient id="e0D7ZBtOImG27-fill" cx="0" cy="0" r="0.8325945607729996"
                                            spreadMethod="pad" gradientUnits="objectBoundingBox"
                                            gradientTransform="matrix(1 0 0 1 0.636744 0.566145)">
                                            <stop id="e0D7ZBtOImG27-fill-0" offset="0.62"
                                                stop-color="rgba(211,71,255,0)"></stop>
                                            <stop id="e0D7ZBtOImG27-fill-1" offset="1" stop-color="#fff"></stop>
                                        </radialGradient>
                                        <radialGradient id="e0D7ZBtOImG30-fill" cx="0" cy="0" r="0.5" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0.5 0.5)">
                                            <stop id="e0D7ZBtOImG30-fill-0" offset="0%" stop-color="#fff"></stop>
                                            <stop id="e0D7ZBtOImG30-fill-1" offset="100%"
                                                stop-color="rgba(255,255,255,0)"></stop>
                                        </radialGradient>
                                        <linearGradient id="e0D7ZBtOImG31-stroke" x1="1.01278" y1="0.912121"
                                            x2="-0.03944" y2="0.00449" spreadMethod="pad"
                                            gradientUnits="objectBoundingBox" gradientTransform="translate(0 0)">
                                            <stop id="e0D7ZBtOImG31-stroke-0" offset="0%" stop-color="#fff"></stop>
                                            <stop id="e0D7ZBtOImG31-stroke-1" offset="100%"
                                                stop-color="rgba(255,255,255,0)"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g transform="matrix(.68 0 0 0.68 10 -140)">
                                        <g id="e0D7ZBtOImG8" mask="url(#e0D7ZBtOImG21)"
                                            filter="url(#e0D7ZBtOImG8-filter)"
                                            transform="matrix(0.966599 0 0 0.966599 0 0)">
                                            <ellipse rx="277.941173" ry="277.941173"
                                                transform="matrix(.68 0 0 0.68 0 0)" opacity="0.8" stroke-width="0">
                                            </ellipse>
                                            <g mask="url(#e0D7ZBtOImG12)">
                                                <ellipse rx="168.09308" ry="168.09308" fill="url(#e0D7ZBtOImG11-fill)"
                                                    stroke-width="0"></ellipse>
                                                <mask id="e0D7ZBtOImG12" mask-type="luminance" x="-150%" y="-150%"
                                                    height="400%" width="400%">
                                                    <ellipse rx="168.09308" ry="168.09308"
                                                        transform="matrix(0 1-1 0 0 0)" fill="url(#e0D7ZBtOImG13-fill)"
                                                        stroke-width="0"></ellipse>
                                                </mask>
                                            </g>
                                            <ellipse rx="277.941173" ry="277.941173"
                                                transform="matrix(.68 0 0 0.68 0 -140)" fill="url(#e0D7ZBtOImG14-fill)"
                                                stroke-width="0"></ellipse>
                                            <ellipse id="e0D7ZBtOImG15" rx="277.941173" ry="277.941173"
                                                transform="matrix(.68 0 0 0.68 0 -60)" opacity="0.149667"
                                                fill="url(#e0D7ZBtOImG15-fill)" stroke-width="0"></ellipse>
                                            <g id="e0D7ZBtOImG16"
                                                transform="matrix(0.996132 0.087866 -0.087866 0.996132 0 0)">
                                                <path id="e0D7ZBtOImG17" style="mix-blend-mode:screen"
                                                    d="M -227.8123088040092 -35.53192950805 C -231.9103664094921 51.67969703929679 -148.23683059418377 81.47305943001433 -75.45055412599193 77.70241568658142 C 18.117805062586 72.3977290098533 80.91854392548996 40.3336225165923 124.70876608780102 118.66830416858775 C 102.56550859176022 406.51393386244916 -174.65932983642446 454.1605090855757 -295.2830938760776 342.07633368997597 C -415.9068579157307 229.99216196549267 -311.90586589275256 8.89675455129921 -227.8123088040092 -35.53192950805 Z"
                                                    transform="translate(131.630381 -187.803951)" opacity="0.244759"
                                                    fill="url(#e0D7ZBtOImG17-fill)" stroke-width="1.024"></path>
                                                <g id="e0D7ZBtOImG18"
                                                    transform="matrix(0.77438 -0.632721 0.632721 0.77438 0 0)">
                                                    <path id="e0D7ZBtOImG19" style="mix-blend-mode:screen"
                                                        d="M -272.6214397885556 45.80666064009037 C -239.11453296314892 62.883199447423394 -166.395783950329 115.4457110544794 -121.60933794058278 140.52760650863226 C -65.04261191011867 169.77754362490163 -20.012345890666282 183.03198874621802 42.4660002842106 225.36130674477852 C 3.6506719460685133 374.4071977159851 -184.41141976029215 396.04837432047776 -273.1239763058974 310.40333389807444 C -361.83653342627053 224.75829519997515 -313.0796116164004 82.78282370172695 -272.6214397885556 45.80666064009037 Z"
                                                        transform="translate(90.828905 -133.175557)" opacity="0.38"
                                                        fill="url(#e0D7ZBtOImG19-fill)" stroke-width="1.024"></path>
                                                </g>
                                                <path id="e0D7ZBtOImG20" style="mix-blend-mode:screen"
                                                    d="M -310.86084396567503 115.2197267688135 C -245.2624545940938 72.44409149092466 -181.89234809143707 144.43743397978952 -161.0005144828534 194.1416309616812 C -136.01039642829195 252.87993770314188 -106.14517047746901 304.8085178154017 -27.71867483801382 316.41142812004614 C -80.76168538699875 347.0078167106874 -192.73369912449667 346.45639715565443 -254.2137362757584 283.3740966503644 C -315.6937732753765 220.29179629671785 -314.08126803158603 145.83602649185949 -310.86084396567503 115.2197267688135 Z"
                                                    transform="translate(50.027428 -78.547164)" opacity="0.38"
                                                    fill="url(#e0D7ZBtOImG20-fill)" stroke-width="1.024"></path>
                                            </g>
                                            <mask id="e0D7ZBtOImG21" mask-type="luminance" x="-150%" y="-150%"
                                                height="400%" width="400%">
                                                <g id="e0D7ZBtOImG22" transform="matrix(0.966599 0 0 0.966599 0 0)">
                                                    <path id="e0D7ZBtOImG23"
                                                        d="M-143.776898,0c0-79.405788,64.37111-143.776898,143.776898-143.776898s143.776899,64.37111,143.776899,143.776898-64.371111,143.776899-143.776899,143.776899-143.776898-64.371111-143.776898-143.776899Z"
                                                        fill="#fff" stroke-width="0"
                                                        transform="matrix(0.966599 0 0 0.966599 0 0)"></path>
                                                    <path id="e0D7ZBtOImG24"
                                                        d="M-150,0c0-82.842712,67.157288-150,150-150s150,67.157288,150,150-67.157288,150-150,150-150-67.157288-150-150Z"
                                                        transform="matrix(-0.86575 0.631779 -0.573418 -0.785776 0 0)"
                                                        opacity="0.38" fill="#fff" stroke-width="0"></path>
                                                    <path id="e0D7ZBtOImG25"
                                                        d="M-150,0c0-82.842712,67.157288-150,150-150s150,67.157288,150,150-67.157288,150-150,150-150-67.157288-150-150Z"
                                                        transform="matrix(-1.016679 -0.158844 0.153522 -0.982614 0 0)"
                                                        opacity="0.38" fill="#fff" stroke-width="0"></path>
                                                    <path id="e0D7ZBtOImG26"
                                                        d="M-150,0c0-82.842712,67.157288-150,150-150s150,67.157288,150,150-67.157288,150-150,150-150-67.157288-150-150Z"
                                                        transform="matrix(-0.638993 -0.875636 0.780739 -0.569742 0 0)"
                                                        opacity="0.38" fill="#fff" stroke-width="0"></path>
                                                </g>
                                            </mask>
                                        </g>
                                        <path id="e0D7ZBtOImG27"
                                            d="M-137.256263,0c0-75.80454,61.451723-137.256263,137.256263-137.256263s137.256263,61.451723,137.256263,137.256263-61.451723,137.256263-137.256263,137.256263-137.256263-61.451723-137.256263-137.256263Z"
                                            fill="url(#e0D7ZBtOImG27-fill)" stroke-width="0"
                                            transform="matrix(0.284654 -0.888723 0.888723 0.284654 0 0)">
                                        </path>
                                    </g>
                                    <script> (function (s, i, u, o, c, w, d, t, n, x, e, p, a, b) { (a = Array.from(d.querySelectorAll('svg#' + i.root)).filter(n => !n.svgatorPlayer)[0] || {}).svgatorPlayer = { ready: (function (a) { b = []; return function (c) { return c ? (b.push(c), a.svgatorPlayer) : b } })(a) }; w[o] = w[o] || {}; w[o][s] = w[o][s] || []; w[o][s].push(i); e = d.createElementNS(n, t); e.async = true; e.setAttributeNS(x, 'href', [u, s, '.', 'j', 's', '?', 'v', '=', c].join('')); e.setAttributeNS(null, 'src', [u, s, '.', 'j', 's', '?', 'v', '=', c].join('')); p = d.getElementsByTagName(t)[0]; p.parentNode.insertBefore(e, p); })('91c80d77', { "root": "e0D7ZBtOImG1", "version": "2022-05-04", "animations": [{ "elements": { "e0D7ZBtOImG3": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }], "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.920668, "y": 0.920668 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG4": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0] }] }, "e0D7ZBtOImG5": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0] }] }, "e0D7ZBtOImG8": { "transform": { "keys": { "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.9, "y": 0.9 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } }, "#filter": { "keys": [{ "t": 0, "v": [{ "type": "hue-rotate", "value": 0 }], "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": [{ "type": "hue-rotate", "value": -45 }], "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": [{ "type": "hue-rotate", "value": 0 }] }], "data": { "items": [["hue-rotate", "e0D7ZBtOImG8-filter-hue-rotate-0"]] } } }, "e0D7ZBtOImG15": { "opacity": [{ "t": 0, "v": 0.25 }, { "t": 1500, "v": 0 }, { "t": 3000, "v": 0.25 }] }, "e0D7ZBtOImG16": { "transform": { "keys": { "r": [{ "t": 0, "v": -15, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": 45, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": -15 }] } } }, "e0D7ZBtOImG17": { "d": [{ "t": 0, "v": ["M", -314.167894, 121.222762, "C", -245.794144, 73.270944, -183.232534, 146.944719, -164.407173, 198.778321, "C", -142.147888, 260.066864, -113.594177, 315.340091, -33.788441, 324.285696, "C", -88.061901, 344.638242, -193.453433, 342.167545, -252.578326, 281.036533, "C", -311.703219, 219.905521, -314.167894, 151.289043, -314.167894, 121.222762, "Z"], "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": ["M", -220.075987, -49.575083, "C", -230.666563, 49.745406, -145.101677, 75.607662, -67.481214, 66.855611, "C", 32.475498, 55.585049, 98.344319, 15.696669, 138.908026, 100.247697, "C", 119.643211, 412.05718, -172.975626, 464.193602, -299.108878, 347.544695, "C", -425.24213, 230.895792, -311.703218, -3.859717, -220.075987, -49.575083, "Z"], "e": [0.25, 0.46, 0.45, 0.94] }], "transform": { "data": { "t": { "x": 57.875257, "y": -70.652439 } }, "keys": { "o": [{ "t": 0, "v": { "x": -24.086816, "y": 13.847376, "type": "corner" } }, { "t": 3000, "v": { "x": 98.317613, "y": -150.037805, "type": "corner" } }] } }, "opacity": [{ "t": 1700, "v": 0.38, "e": [0.42, 0, 1, 1] }, { "t": 3000, "v": 0 }] }, "e0D7ZBtOImG18": { "transform": { "keys": { "r": [{ "t": 1000, "v": 0, "e": [0.42, 0, 0.58, 1] }, { "t": 2000, "v": -58.469922, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": 0 }] } } }, "e0D7ZBtOImG19": { "d": [{ "t": 0, "v": ["M", -241.884025, -9.988618, "C", -234.17274, 55.198009, -153.93941, 92.141723, -89.946111, 97.431838, "C", -7.997627, 102.978575, 49.222529, 85.146162, 98.88151, 152.173834, "C", 71.502609, 396.431237, -177.721845, 435.91116, -288.324315, 332.129846, "C", -398.926786, 228.348535, -312.274465, 32.0997, -241.884025, -9.988618, "Z"], "e": [0.288922, 0.57899, 0.606405, 1] }, { "t": 990, "v": ["M", -220.075987, -49.575083, "C", -230.666563, 49.745406, -145.101677, 75.607662, -67.481214, 66.855611, "C", 32.475498, 55.585049, 98.344319, 15.696669, 138.908026, 100.247697, "C", 119.643211, 412.05718, -172.975626, 464.193602, -299.108878, 347.544695, "C", -425.24213, 230.895792, -311.703218, -3.859717, -220.075987, -49.575083, "Z"], "e": [1, 0] }, { "t": 1000, "v": ["M", -314.167894, 121.222762, "C", -245.794144, 73.270944, -183.232534, 146.944719, -164.407173, 198.778321, "C", -142.147888, 260.066864, -113.594177, 315.340091, -33.788441, 324.285696, "C", -88.061901, 344.638242, -193.453433, 342.167545, -252.578326, 281.036533, "C", -311.703219, 219.905521, -314.167894, 151.289043, -314.167894, 121.222762, "Z"], "e": [0.433203, 0, 0.682004, 0.615475] }, { "t": 3000, "v": ["M", -241.884025, -9.988618, "C", -234.17274, 55.198009, -153.93941, 92.141723, -89.946111, 97.431838, "C", -7.997627, 102.978575, 49.222529, 85.146162, 98.88151, 152.173834, "C", 71.502609, 396.431237, -177.721845, 435.91116, -288.324315, 332.129846, "C", -398.926786, 228.348535, -312.274465, 32.0997, -241.884025, -9.988618, "Z"], "e": [0.288922, 0.57899, 0.606405, 1] }], "transform": { "data": { "t": { "x": 57.875257, "y": -70.652439 } }, "keys": { "o": [{ "t": 0, "v": { "x": 57.516137, "y": -95.409411, "type": "corner" } }, { "t": 990, "v": { "x": 98.317613, "y": -150.037805, "type": "corner" }, "e": [1, 0] }, { "t": 1000, "v": { "x": -24.086816, "y": 13.847376, "type": "corner" } }, { "t": 3000, "v": { "x": 57.516137, "y": -95.409411, "type": "corner" } }] } }, "opacity": [{ "t": 0, "v": 0.349273, "e": [0.486384, 0.258886, 1, 1] }, { "t": 990, "v": 0, "e": [1, 0] }, { "t": 1010, "v": 0.38, "e": [0.317878, 0, 0.656906, 0.377262] }, { "t": 2700, "v": 0.38, "e": [0.317878, 0, 0.656906, 0.377262] }, { "t": 3000, "v": 0.349273, "e": [0.486384, 0.258886, 1, 1] }] }, "e0D7ZBtOImG20": { "d": [{ "t": 0, "v": ["M", -292.359856, 81.636297, "C", -242.287967, 67.818341, -174.394801, 130.410658, -141.942276, 168.202094, "C", -101.674763, 212.673338, -64.472387, 245.890598, 6.238075, 272.359559, "C", -39.921299, 360.264185, -188.707214, 370.449987, -263.362889, 296.451382, "C", -338.018563, 222.452778, -313.596647, 115.329626, -292.359856, 81.636297, "Z"], "e": [0.317996, 0.384525, 0.566797, 1] }, { "t": 1980, "v": ["M", -220.075987, -49.575083, "C", -230.666563, 49.745406, -145.101677, 75.607662, -67.481214, 66.855611, "C", 32.475498, 55.585049, 98.344319, 15.696669, 138.908026, 100.247697, "C", 119.643211, 412.05718, -172.975626, 464.193602, -299.108878, 347.544695, "C", -425.24213, 230.895792, -311.703218, -3.859717, -220.075987, -49.575083, "Z"], "e": [1, 0] }, { "t": 2000, "v": ["M", -314.167894, 121.222762, "C", -245.794144, 73.270944, -183.232534, 146.944719, -164.407173, 198.778321, "C", -142.147888, 260.066864, -113.594177, 315.340091, -33.788441, 324.285696, "C", -88.061901, 344.638242, -193.453433, 342.167545, -252.578326, 281.036533, "C", -311.703219, 219.905521, -314.167894, 151.289043, -314.167894, 121.222762, "Z"], "e": [0.393595, 0, 0.711078, 0.42101] }, { "t": 3000, "v": ["M", -292.359856, 81.636297, "C", -242.287967, 67.818341, -174.394801, 130.410658, -141.942276, 168.202094, "C", -101.674763, 212.673338, -64.472387, 245.890598, 6.238075, 272.359559, "C", -39.921299, 360.264185, -188.707214, 370.449987, -263.362889, 296.451382, "C", -338.018563, 222.452778, -313.596647, 115.329626, -292.359856, 81.636297, "Z"], "e": [0.317996, 0.384525, 0.566797, 1] }], "transform": { "data": { "t": { "x": 57.875257, "y": -70.652439 } }, "keys": { "o": [{ "t": 0, "v": { "x": 16.71466, "y": -40.781018, "type": "corner" } }, { "t": 1980, "v": { "x": 98.317613, "y": -150.037805, "type": "corner" }, "e": [1, 0] }, { "t": 2000, "v": { "x": -24.086816, "y": 13.847376, "type": "corner" } }, { "t": 3000, "v": { "x": 16.71466, "y": -40.781018, "type": "corner" } }] } }, "opacity": [{ "t": 700, "v": 0.38, "e": [0.42, 0, 1, 1] }, { "t": 1980, "v": 0, "e": [1, 0] }, { "t": 2000, "v": 0.38, "e": [0.42, 0, 1, 1] }] }, "e0D7ZBtOImG22": { "transform": { "keys": { "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.9, "y": 0.9 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG23": { "transform": { "keys": { "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.9, "y": 0.9 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG24": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }], "s": [{ "t": 0, "v": { "x": 1.093491, "y": 0.961682 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 1.028427, "y": 0.994833 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1.093491, "y": 0.961682 } }] } } }, "e0D7ZBtOImG25": { "transform": { "keys": { "r": [{ "t": 0, "v": 45 }, { "t": 3000, "v": 225 }], "s": [{ "t": 0, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.317996, 0.384525, 0.566797, 1] }, { "t": 1000, "v": { "x": 1.093491, "y": 0.961682 }, "e": [0.42, 0, 0.58, 1] }, { "t": 2500, "v": { "x": 1.028427, "y": 0.994833 }, "e": [0.393595, 0, 0.711078, 0.42101] }, { "t": 3000, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.317996, 0.384525, 0.566797, 1] }] } } }, "e0D7ZBtOImG26": { "transform": { "keys": { "r": [{ "t": 0, "v": 90 }, { "t": 3000, "v": 270 }], "s": [{ "t": 0, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.288922, 0.57899, 0.606405, 1] }, { "t": 500, "v": { "x": 1.028427, "y": 0.994833 }, "e": [0.42, 0, 0.58, 1] }, { "t": 2000, "v": { "x": 1.093491, "y": 0.961682 }, "e": [0.433203, 0, 0.682004, 0.615475] }, { "t": 3000, "v": { "x": 1.043507, "y": 0.987149 }, "e": [0.288922, 0.57899, 0.606405, 1] }] } } }, "e0D7ZBtOImG27": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 360 }], "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.8, "y": 0.8 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } }, "fill": [{ "t": 0, "v": { "t": "g", "s": [{ "c": { "r": 211, "g": 71, "b": 255, "a": 0 }, "o": 0.62 }, { "c": { "r": 255, "g": 255, "b": 255, "a": 1 }, "o": 1 }], "r": "e0D7ZBtOImG27-fill", "gt": [1, 0, 0, 1, 0.636744, 0.566145], "c": { "x": 0, "y": 0 }, "rd": 0.766616 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "t": "g", "s": [{ "c": { "r": 211, "g": 71, "b": 255, "a": 0 }, "o": 0.62 }, { "c": { "r": 255, "g": 255, "b": 255, "a": 1 }, "o": 1 }], "r": "e0D7ZBtOImG27-fill", "gt": [1, 0, 0, 1, 0.636744, 0.566145], "c": { "x": 0, "y": 0 }, "rd": 0.964148 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "t": "g", "s": [{ "c": { "r": 211, "g": 71, "b": 255, "a": 0 }, "o": 0.62 }, { "c": { "r": 255, "g": 255, "b": 255, "a": 1 }, "o": 1 }], "r": "e0D7ZBtOImG27-fill", "gt": [1, 0, 0, 1, 0.636744, 0.566145], "c": { "x": 0, "y": 0 }, "rd": 0.766616 } }] }, "e0D7ZBtOImG28": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }], "s": [{ "t": 0, "v": { "x": 1, "y": 1 }, "e": [0.42, 0, 0.58, 1] }, { "t": 1500, "v": { "x": 0.920668, "y": 0.920668 }, "e": [0.42, 0, 0.58, 1] }, { "t": 3000, "v": { "x": 1, "y": 1 } }] } } }, "e0D7ZBtOImG30": { "transform": { "data": { "t": { "x": 200, "y": 0 } }, "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }] } } }, "e0D7ZBtOImG31": { "transform": { "keys": { "r": [{ "t": 0, "v": 0 }, { "t": 3000, "v": 180 }] } } }, "e0D7ZBtOImG32": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0] }] }, "e0D7ZBtOImG33": { "d": [{ "t": 0, "v": ["M", 200, 0, "C", 200, 110.45695, 110.45695, 200, 0, 200, "C", -110.45695, 200, -200, 110.45695, -200, 0], "e": [0.55, 0.085, 0.68, 0.53] }, { "t": 1500, "v": ["M", 200, 0, "C", 200, 0, 110.45695, 0, 0, 0, "C", -110.45695, 0, -200, 0, -200, 0], "e": [0.25, 0.46, 0.45, 0.94] }, { "t": 3000, "v": ["M", 200, 0, "C", 200.000001, -109.316555, 110.45695, -200, 0, -200, "C", -110.45695, -200, -199.999999, -110.114238, -200, 0] }] } }, "s": "MDWA1YzhhMzE3MCzg0ODE3MDgzPQTc4N2U3ZDMExNDk0MjNmWTFNmM2YzYlIzMOTczNzg4MTc0VNzI4Mzc4N2UV3ZDMxNDlDNDBAzYjMxNzg4MWzc0ODE3MDgzYNzg3ZTdkODIMzMTQ5M2YzYjQMxNzU3ODdiNS2IzMTQ5UzQwIM2IzMTcwN2IB4Mzc0ODFQN2VQ3MDgzNzQzMATQ5NzU3MDdiXODJBNzQzYjMPxODI3Zjc0NzRQ3MzMxNDk0MNDNiMzE3NTdmWODIzMTQ5NDICzZjhj" }], "options": "MDRAxMDgyMjk3YTTdiNjg3OTdiQMjlONDEyOTcWzNzY2ODZiRDFI5ODQ/" }, 'https://cdn.svgator.com/ply/', '__SVGATOR_PLAYER__', '2022-05-04', window, document, 'script', 'http://www.w3.org/2000/svg', 'http://www.w3.org/1999/xlink') </script>
                                </svg>
                            </div>
                            <div class="text-center">
                                <div id="currentThemeName" class="text-xl md:text-2xl font-medium">Arbor</div>
                                <div id="currentThemeDesc" class="text-sm md:text-base text-gray-300">Simple and
                                    versatile</div>
                            </div>
                        </div>

                        <button id="nextArrow" class="text-gray-400 hover:text-white text-3xl md:text-4xl rounded-full">
                            >
                        </button>

                        <div class="text-center text-gray-500 flex-shrink-0 w-20 md:w-28 hidden sm:block">
                            <div id="nextThemeName" class="text-base md:text-lg truncate">Sol</div>
                            <div id="nextThemeDesc" class="text-xs md:text-sm truncate">Erudite and casual</div>
                        </div>
            </div>

            <div class="flex flex-col items-center gap-4 mt-auto absolute bottom-6 md:bottom-8">
                <button popovertarget="selectV"
                    class="bg-white text-black px-10 py-2.5 rounded-full font-medium hover:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#212121] focus:ring-blue-500">
                    Done
                </button>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themes = [
                {
                    id: 'arbor',
                    name: 'Arbor',
                    description: 'Simple and versatile',
                    svgMods: {
                        'e0D7ZBtOImG6-fill-0': { 'stop-color': '#7FDBFF' }, // Brighter blue
                        'e0D7ZBtOImG7-fill-0': { 'stop-color': '#39CCCC' }, // Teal
                        'e0D7ZBtOImG11-fill-0': { 'stop-color': '#39CCCC' }, // Teal
                        'e0D7ZBtOImG11-fill-1': { 'stop-color': '#DDDDDD' }, // Light gray
                        'e0D7ZBtOImG14-fill-0': { 'stop-color': '#B2EBF2' }, // Light cyan
                        'e0D7ZBtOImG17-fill-1': { 'stop-color': '#80DEEA' }, // Medium cyan
                        'e0D7ZBtOImG19-fill-1': { 'stop-color': '#80DEEA' }, // Medium cyan
                        'e0D7ZBtOImG20-fill-1': { 'stop-color': '#80DEEA' }, // Medium cyan
                        'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '0' }
                    }
                },
                {
                    id: 'sol',
                    name: 'Sol',
                    description: 'Erudite and casual',
                    svgMods: {
                        'e0D7ZBtOImG6-fill-0': { 'stop-color': '#F9A825' }, // Amber
                        'e0D7ZBtOImG7-fill-0': { 'stop-color': '#FF6F00' }, // Deep orange
                        'e0D7ZBtOImG11-fill-0': { 'stop-color': '#FF6F00' }, // Deep orange
                        'e0D7ZBtOImG11-fill-1': { 'stop-color': '#E65100' }, // Darker orange
                        'e0D7ZBtOImG14-fill-0': { 'stop-color': '#FFCC80' }, // Light orange
                        'e0D7ZBtOImG17-fill-1': { 'stop-color': '#F57C00' }, // Medium orange
                        'e0D7ZBtOImG19-fill-1': { 'stop-color': '#F57C00' }, // Medium orange
                        'e0D7ZBtOImG20-fill-1': { 'stop-color': '#F57C00' }, // Medium orange
                        'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '35' }
                    }
                },
                {
                    id: 'luna',
                    name: 'Luna',
                    description: 'Mysterious and calm',
                    svgMods: {
                        'e0D7ZBtOImG6-fill-0': { 'stop-color': '#512DA8' }, // Deep purple
                        'e0D7ZBtOImG7-fill-0': { 'stop-color': '#7C4DFF' }, // Brighter purple
                        'e0D7ZBtOImG11-fill-0': { 'stop-color': '#673AB7' }, // Regular purple
                        'e0D7ZBtOImG11-fill-1': { 'stop-color': '#B39DDB' }, // Light purple
                        'e0D7ZBtOImG14-fill-0': { 'stop-color': '#9575CD' }, // Medium purple
                        'e0D7ZBtOImG17-fill-1': { 'stop-color': '#5E35B1' }, // Dark purple
                        'e0D7ZBtOImG19-fill-1': { 'stop-color': '#5E35B1' }, // Dark purple
                        'e0D7ZBtOImG20-fill-1': { 'stop-color': '#5E35B1' }, // Dark purple
                        'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '130' }
                    }
                },
                {
                    id: 'monday',
                    name: 'Monday',
                    description: 'Random and vibrant',
                    svgMods: {
                        'e0D7ZBtOImG6-fill-0': { 'stop-color': '#00E676' }, // Green
                        'e0D7ZBtOImG7-fill-0': { 'stop-color': '#00B0FF' }, // Blue
                        'e0D7ZBtOImG11-fill-0': { 'stop-color': '#00B0FF' }, // Blue
                        'e0D7ZBtOImG11-fill-1': { 'stop-color': '#FF1744' }, // Red
                        'e0D7ZBtOImG14-fill-0': { 'stop-color': '#76FF03' }, // Light green
                        'e0D7ZBtOImG17-fill-1': { 'stop-color': '#FF4081' }, // Pink
                        'e0D7ZBtOImG19-fill-1': { 'stop-color': '#FF4081' }, // Pink
                        'e0D7ZBtOImG20-fill-1': { 'stop-color': '#FF4081' }, // Pink
                        'e0D7ZBtOImG8-filter-hue-rotate-0': { 'values': '-20' }
                    }
                },
                {
                    id: 'forest',
                    name: 'Forest',
                    description: 'Natural and soothing',
                    svgMods: {
                        'e0D7ZBtOImG6-fill-0': { 'stop-color': '#795548' }, // Brown
                        'e0D7ZBtOImG7-fill-0': { 'stop-color': '#8D6E63' }, // Light brown
                        'e0D7ZBtOImG11-fill-0': { 'stop-color': '#A1887F' }, // Even lighter brown
                        'e0D7ZBtOImG11-fill-1': { 'stop-color': '#4E342E' }, // Dark brown
                        'e0D7ZBtOImG14-fill-0': { 'stop-color': '#BCAAA4' }, // Very light brown
                        'e0D7ZBtOImG17-fill-1': { 'stop-color': '#6D4C41' }, // Medium brown
                        'e0D7ZBtOImG19-fill-1': { 'stop-color': '#6D4C41' }, // Medium brown
                        'e0D7ZBtOImG20-fill-1': { 'stop-color': '#6D4C41' }, // Medium brown
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

            function updateDisplay(index) {
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

                if (svgElement && currentTheme.svgMods) {
                    const defs = svgElement.querySelector('defs');
                    if (defs) {
                        for (const [elementId, modifications] of Object.entries(currentTheme.svgMods)) {
                            const element = defs.querySelector(`#${elementId}`);
                            if (element) {
                                for (const [attribute, value] of Object.entries(modifications)) {
                                    element.setAttribute(attribute, value);
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
                                console.warn('SVGator player instance not found or restart method unavailable for e0D7ZBtOImG1.');
                            }
                        } catch (error) {
                            console.error("Error restarting SVGator animation:", error);
                        }
                    }, 0);
                }
            }

            prevArrow.addEventListener('click', () => {
                currentThemeIndex = (currentThemeIndex - 1 + themes.length) % themes.length;
                updateDisplay(currentThemeIndex);
            });

            nextArrow.addEventListener('click', () => {
                currentThemeIndex = (currentThemeIndex + 1) % themes.length;
                updateDisplay(currentThemeIndex);
            });

            setTimeout(() => {
                updateDisplay(currentThemeIndex);
            }, 100);

        });
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo AI - The Next Frontier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html,
        body {
            background-color: #000000;
            color: #d1d5db;
        }

        .code-block {
            background-color: rgba(17, 24, 39, 0.5);
            border: 1px solid rgba(55, 65, 81, 0.5);
            border-radius: 0.375rem;
            padding: 1rem 1.5rem;
            font-family: monospace;
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 0.875rem;
            line-height: 1.4;
        }

        .code-block.highlight-border {
            border-color: rgba(59, 130, 246, 0.4);
        }

        #scroll-nav a.active-nav-link {
            color: #ffffff;
            font-weight: 600;
        }

        #scroll-nav a.active-nav-link::before {
            content: '';
            position: absolute;
            left: -16px;
            top: 50%;
            transform: translateY(-50%);
            width: 2px;
            height: 16px;
            background-color: #ffffff;
            border-radius: 1px;
        }

        #scroll-nav li {
            position: relative;
        }

        .group:hover .group-hover\\:block {
            display: block;
        }

        /* Responsive iframe container */
        .aspect-video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            border-radius: 0.375rem;
            /* rounded-md */
        }

        .aspect-video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
            /* Remove default iframe border */
        }
    </style>
</head>

<body class="bg-black text-gray-300 font-sans antialiased">

    <header class="py-4 sticky top-0 z-50 bg-black bg-opacity-90 backdrop-blur-md border-b border-gray-800/70">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-xl font-semibold text-white flex flex-row items-center"><img class="h-[35px]" src="{{ asset('images/white.png') }}" alt="">Cosmo</a>
            <nav class="hidden md:flex space-x-8 items-center text-sm font-medium">
                <a href="#capabilities"
                    class="text-gray-400 hover:text-white transition-colors duration-200">Capabilities</a>
                <div class="relative group">
                    <button class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center">
                        Features
                        <svg class="w-4 h-4 ml-1 text-gray-500 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute top-1 mt-4 left-1/2 -translate-x-1/2 w-60 bg-black/80 backdrop-blur-lg border border-gray-700/60 rounded-lg shadow-xl p-5 hidden group-hover:block transition-opacity duration-200 opacity-0 group-hover:opacity-100 z-50">
                        <ul class="space-y-4">
                            <li> <a href="#image-gen"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-regular fa-image w-5 h-5 mr-3 text-gray-500 group-hover/link:text-blue-400 transition-colors"></i>
                                    Image Generation </a> </li>
                            <li> <a href="#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-video w-5 h-5 mr-3 text-gray-500 group-hover/link:text-rose-400 transition-colors"></i>
                                    Voice & Video Chat </a> </li>
                            <li> <a href="#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-microphone-lines w-5 h-5 mr-3 text-gray-500 group-hover/link:text-teal-400 transition-colors"></i>
                                    Voice Only Chat </a> </li>
                            <li> <a href="#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-comments w-5 h-5 mr-3 text-gray-500 group-hover/link:text-amber-400 transition-colors"></i>
                                    AI vs AI Debate </a> </li>
                            <li> <a href="#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-regular fa-comment-dots w-5 h-5 mr-3 text-gray-500 group-hover/link:text-indigo-400 transition-colors"></i>
                                    Advanced Chat </a> </li>
                            <li>
                                <hr class="border-gray-700/50 my-2">
                            </li>
                            <li> <a href="#plans"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-layer-group w-5 h-5 mr-3 text-gray-500 group-hover/link:text-gray-200 transition-colors"></i>
                                    Compare Plans </a> </li>
                        </ul>
                    </div>
                </div>
                <a href="#plans" class="text-gray-400 hover:text-white transition-colors duration-200">Plans</a>
                <a href="#safety" class="text-gray-400 hover:text-white transition-colors duration-200">Safety</a>
                <a href="#integration"
                    class="text-gray-400 hover:text-white transition-colors duration-200">Integration</a>
                <a href="#more-info" class="text-gray-400 hover:text-white transition-colors duration-200">More Info</a>
            </nav>
            <div class="flex items-center space-x-3">
                <button class="text-gray-400 hover:text-white transition-colors"> <svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg> </button>
                <a href="#"
                    class="bg-gray-800 hover:bg-gray-700 text-white text-xs py-1.5 px-3 rounded-md transition-colors">Log
                    In</a>
                <button class="md:hidden text-gray-400 hover:text-white"> <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg> </button>
            </div>
        </div>
    </header>

    <aside class="hidden xl:block fixed top-1/3 -translate-y-1/2 left-6 lg:left-12 z-40">
        <nav>
            <ul class="space-y-4" id="scroll-nav">
                <li><a href="#hero"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">Intro</a>
                </li>
                <li><a href="#capabilities"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">Capabilities</a>
                </li>
                <li><a href="#plans"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">Plans</a>
                </li>
                <li><a href="#Performance"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">Performance</a>
                </li>
                <li><a href="#safety"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">Safety</a>
                </li>
                <li><a href="#integration"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">Integration</a>
                </li>
                <li><a href="#more-info"
                        class="nav-link text-xs text-gray-500 hover:text-white transition-colors duration-200 block relative">More
                        Info</a></li>
            </ul>
        </nav>
    </aside>

    <main class="container mx-auto px-6 relative z-10 pb-10">

        <section id="hero" class="py-24 md:py-32 text-center">
            <span class="text-sm text-gray-400 mb-4 inline-block">Next-Gen AI</span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-medium text-white mb-6 leading-tight max-w-4xl mx-auto">
                Cosmo: Interact, Create, and Explore with Advanced Multimodal AI.</h1>
            <p class="text-lg md:text-xl text-gray-400 mb-10 max-w-2xl mx-auto">Experience seamless chat, voice, and
                video communication, generate stunning visuals, and witness unique AI debates.</p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#plans"
                    class="bg-gray-100 hover:bg-gray-300 text-black py-2 px-5 rounded-md font-medium transition-colors text-sm inline-flex items-center">
                    Explore Plans <span class="ml-1 text-xs">→</span> </a>
                <a href="#capabilities"
                    class="text-gray-400 hover:text-white py-2 px-5 rounded-md font-medium transition-colors text-sm inline-flex items-center">
                    View Capabilities <span class="ml-1 text-xs">→</span> </a>
            </div>
            <div class="mt-12 flex justify-center items-center space-x-3 text-sm text-gray-400">
                <button class="flex items-center p-2 rounded-full hover:bg-gray-800 transition-colors"> <svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                    </svg> <span class="ml-1.5">Share</span> </button>
            </div>
        </section>

        <section id="capabilities" class="py-20 md:py-24 space-y-20 md:space-y-24">
            <p class="text-lg text-gray-400 max-w-3xl mx-auto text-center mb-16 md:mb-20">Explore the diverse
                capabilities of Cosmo AI, designed for intuitive interaction and powerful creation.</p>

            <div id="image-gen">
                <h3 class="text-2xl font-medium text-white mb-10 text-center">Visual Synthesis & Image Generation</h3>
                <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12 items-center">
                    <div class="text-gray-400 text-base leading-relaxed pr-4">
                        Bring your ideas to life. Describe any scene, concept, or style, and Cosmo can generate
                        high-quality, unique images in seconds. Perfect for artists, designers, marketers, and anyone
                        needing visual content.
                        <ul class="mt-4 space-y-1 text-xs list-disc list-inside text-gray-500">
                            <li>Multiple aspect ratios and resolutions</li>
                            <li>Style adaptation and consistency</li>
                            <li>Iterative refinement based on feedback</li>
                        </ul>
                    </div>
                    <div class="space-y-5">
                        <div>
                            <p class="text-xs uppercase tracking-wider text-gray-500 mb-2">Example Prompt</p>
                            <div class="code-block">A photorealistic image of an astronaut playing chess with a friendly
                                alien on the surface of Mars, dramatic lighting, 16:9 aspect ratio.</div>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wider text-blue-400/80 mb-2">Generated Image Output</p>
                            <div
                                class="aspect-video-container bg-gray-800/50 border border-blue-500/40 highlight-area flex items-center justify-center text-gray-600">
                                <img src="" alt="Generated Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="interaction">
                <h3 class="text-2xl font-medium text-white mb-10 text-center">Seamless Interaction: Voice, Video &
                    Debate</h3>
                <div class="max-w-4xl mx-auto text-center">
                    <p class="text-gray-400 text-base leading-relaxed mb-10">Communicate naturally with Cosmo. Engage in
                        fluid conversations via text, voice, or even video chat. Experience real-time interaction that
                        understands context and nuance.</p>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 text-sm mb-12">
                        <div class="flex flex-col items-center space-y-1"> <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-8 h-8 text-indigo-400 mb-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.454 48.454 0 0 0 12 3c-2.398 0-4.742.176-7.04.502C3.352 3.704 2.25 5.009 2.25 6.637v4.286c0 .837.46 1.58 1.155 1.951" />
                            </svg> <span class="font-medium text-white">Chat</span> <span
                                class="text-gray-500 text-xs">Text-based AI</span> </div>
                        <div class="flex flex-col items-center space-y-1"> <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-8 h-8 text-teal-400 mb-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                            </svg> <span class="font-medium text-white">Voice Chat</span> <span
                                class="text-gray-500 text-xs">Real-time audio</span> </div>
                        <div class="flex flex-col items-center space-y-1"> <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-8 h-8 text-rose-400 mb-1">
                                <path stroke-linecap="round"
                                    d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg> <span class="font-medium text-white">Video Chat</span> <span
                                class="text-gray-500 text-xs">Interactive video</span> </div>
                        <div class="flex flex-col items-center space-y-1"> <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-8 h-8 text-amber-400 mb-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Zm0 0c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Zm-3.25-4.125a.75.75 0 1 0-1.5 0 .75.75 0 0 0 1.5 0ZM15.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg> <span class="font-medium text-white">AI Debate</span> <span
                                class="text-gray-500 text-xs">Two AIs discuss</span> </div>
                    </div>
                    <p class="text-gray-400 text-base leading-relaxed">Explore complex topics from multiple perspectives
                        with our unique AI vs AI Debate feature, where two Cosmo instances argue different sides of a
                        user-provided prompt.</p>
                </div>
            </div>
        </section>

        <section id="plans" class="py-20 md:py-24 border-t border-gray-800/70">
            <h2 class="text-3xl font-medium text-white mb-16 text-center">Choose Your Plan</h2>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto text-center mb-16 md:mb-20">Access Cosmo's capabilities
                with a plan tailored to your needs, from individual exploration to enterprise-scale deployment.</p>
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="border border-gray-700/50 rounded-lg p-8 flex flex-col">
                    <h3 class="text-xl font-semibold text-white mb-2">Explorer</h3>
                    <p class="text-gray-400 text-sm mb-6">Get started and try core features.</p>
                    <p class="text-3xl font-bold text-white mb-6">Free</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-8 flex-grow">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Standard Chat Access</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Limited Image Generations</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Basic AI Debate Access</li>
                        <li class="flex items-center text-gray-600"><svg class="w-4 h-4 mr-2 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>Voice & Video Chat</li>
                    </ul> <a href="#"
                        class="w-full text-center bg-gray-800 hover:bg-gray-700 text-white py-2.5 rounded-md text-sm font-medium transition-colors mt-auto">Get
                        Started</a>
                </div>
                <div
                    class="border-2 border-blue-500 rounded-lg p-8 flex flex-col relative shadow-lg shadow-blue-500/10">
                    <span
                        class="absolute top-0 right-6 -mt-3 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">Most
                        Popular</span>
                    <h3 class="text-xl font-semibold text-white mb-2">Pro Creator</h3>
                    <p class="text-gray-400 text-sm mb-6">Unlock full potential for individuals.</p>
                    <p class="text-3xl font-bold text-white mb-6">$20 <span
                            class="text-base font-normal text-gray-400">/ month</span></p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-8 flex-grow">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Advanced Chat Features</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>High Volume Image Generations</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Full AI Debate Access</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Voice & Video Chat Enabled</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Priority Access</li>
                    </ul> <a href="#"
                        class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md text-sm font-medium transition-colors mt-auto">Go
                        Pro</a>
                </div>
                <div class="border border-gray-700/50 rounded-lg p-8 flex flex-col">
                    <h3 class="text-xl font-semibold text-white mb-2">Enterprise</h3>
                    <p class="text-gray-400 text-sm mb-6">Scale with custom solutions & support.</p>
                    <p class="text-3xl font-bold text-white mb-6">Custom</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-8 flex-grow">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>All Pro Features</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Volume Discounts</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Dedicated Infrastructure (Optional)</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>API Access & Integration Support</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>Dedicated Account Manager</li>
                    </ul> <a href="#"
                        class="w-full text-center bg-gray-800 hover:bg-gray-700 text-white py-2.5 rounded-md text-sm font-medium transition-colors mt-auto">Contact
                        Sales</a>
                </div>
            </div>
        </section>

        <section id="Performance" class="py-20 md:py-24 border-t border-gray-800/70">
            <div class="text-center mb-16 md:mb-20">
                <h2 class="text-3xl font-medium text-white mb-4">Proven Performance</h2>
                <p class="text-lg text-gray-400 max-w-3xl mx-auto">
                    Cosmo consistently excels across diverse benchmarks, showcasing its advanced capabilities.
                </p>
            </div>

            <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

                <div
                    class="bg-gray-900/40 border border-gray-700/40 rounded-xl p-6 text-center flex flex-col items-center shadow-lg hover:bg-gray-800/30 transition-colors duration-300">
                    <h3 class="text-sm font-semibold text-gray-400 mb-5 tracking-wide uppercase">Multimodal
                        Understanding</h3>
                    <p
                        class="text-6xl lg:text-7xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 mb-3">
                        94<span class="text-4xl">%</span>
                    </p>
                    <div class="h-1 w-16 bg-gradient-to-r from-emerald-400 to-cyan-400 rounded-full mb-5"></div>
                    <p class="text-xs text-gray-500 flex-grow">
                        Accurately interprets and reasons across combined text, image, and audio inputs.
                    </p>
                </div>

                <div
                    class="bg-gray-900/40 border border-gray-700/40 rounded-xl p-6 text-center flex flex-col items-center shadow-lg hover:bg-gray-800/30 transition-colors duration-300">
                    <h3 class="text-sm font-semibold text-gray-400 mb-5 tracking-wide uppercase">Conversational Fluidity
                    </h3>
                    <p
                        class="text-6xl lg:text-7xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-violet-400 mb-3">
                        96<span class="text-4xl">%</span>
                    </p>
                    <div class="h-1 w-16 bg-gradient-to-r from-sky-400 to-violet-400 rounded-full mb-5"></div>
                    <p class="text-xs text-gray-500 flex-grow">
                        Maintains context and coherence over extended, complex dialogues.
                    </p>
                </div>

                <div
                    class="bg-gray-900/40 border border-gray-700/40 rounded-xl p-6 text-center flex flex-col items-center shadow-lg hover:bg-gray-800/30 transition-colors duration-300">
                    <h3 class="text-sm font-semibold text-gray-400 mb-5 tracking-wide uppercase">Image Generation
                        Quality</h3>
                    <p
                        class="text-6xl lg:text-7xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-400 to-rose-400 mb-3">
                        91<span class="text-4xl">%</span>
                    </p>
                    <div class="h-1 w-16 bg-gradient-to-r from-fuchsia-400 to-rose-400 rounded-full mb-5"></div>
                    <p class="text-xs text-gray-500 flex-grow">
                        Rated highly for prompt adherence, realism, and aesthetic appeal in generated visuals.
                    </p>
                </div>

                <div
                    class="bg-gray-900/40 border border-gray-700/40 rounded-xl p-6 text-center flex flex-col items-center shadow-lg hover:bg-gray-800/30 transition-colors duration-300">
                    <h3 class="text-sm font-semibold text-gray-400 mb-5 tracking-wide uppercase">Instruction Following
                    </h3>
                    <p
                        class="text-6xl lg:text-7xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-400 mb-3">
                        98<span class="text-4xl">%</span>
                    </p>
                    <div class="h-1 w-16 bg-gradient-to-r from-amber-400 to-orange-400 rounded-full mb-5"></div>
                    <p class="text-xs text-gray-500 flex-grow">
                        Excels at understanding and executing complex, multi-step instructions accurately.
                    </p>
                </div>

            </div>
        </section>

        <section id="safety" class="py-20 md:py-24">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-medium text-white mb-8">Safety & Alignment</h2>
                <div class="space-y-6 text-base text-gray-400 leading-relaxed text-left md:text-center">
                    <p>We invested significant effort in making Cosmo AI safer and more aligned with human intent. Our
                        model demonstrates significantly reduced tendencies to generate harmful, biased, or
                        inappropriate content compared to previous generations, verified through rigorous internal and
                        external red-teaming.</p>
                    <p>Training incorporates extensive human feedback, including inputs from domain experts across
                        safety, ethics, and security fields. We employ techniques like reinforcement learning from human
                        feedback (RLHF), constitutional AI principles, and safety-specific fine-tuning.</p>
                    <p>Continuous improvement stems from real-world usage analysis, proactive monitoring for misuse, and
                        ongoing research into robust safety mechanisms, content moderation tools, and adversarial
                        testing protocols. We are committed to iterating on safety as AI capabilities advance.</p>
                </div>
            </div>
        </section>

        <section id="integration" class="py-20 md:py-24">
            <h2 class="text-3xl font-medium text-white mb-16 text-center">Integrated by Innovators</h2>
            <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <div
                    class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-lg p-6 text-white flex flex-col justify-between min-h-[220px] shadow-lg transform hover:scale-[1.02] transition-transform duration-300 ease-out">
                    <h3 class="font-semibold text-lg">Nova Corp</h3>
                    <p class="text-sm opacity-90 mt-2 flex-grow">Leveraging Cosmo to power next-gen customer support
                        automation.</p> <a href="#"
                        class="text-xs font-medium opacity-80 hover:opacity-100 mt-4 inline-block group">Case Study
                        <span
                            class="inline-block opacity-0 group-hover:opacity-100 transition-opacity ml-1">→</span></a>
                </div>
                <div
                    class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg p-6 text-white flex flex-col justify-between min-h-[220px] shadow-lg transform hover:scale-[1.02] transition-transform duration-300 ease-out">
                    <h3 class="font-semibold text-lg">BioSynth Labs</h3>
                    <p class="text-sm opacity-90 mt-2 flex-grow">Accelerating drug discovery through AI-driven research
                        analysis.</p> <a href="#"
                        class="text-xs font-medium opacity-80 hover:opacity-100 mt-4 inline-block group">Learn More
                        <span
                            class="inline-block opacity-0 group-hover:opacity-100 transition-opacity ml-1">→</span></a>
                </div>
                <div
                    class="bg-gradient-to-br from-purple-600 to-violet-700 rounded-lg p-6 text-white flex flex-col justify-between min-h-[220px] shadow-lg transform hover:scale-[1.02] transition-transform duration-300 ease-out">
                    <h3 class="font-semibold text-lg">EduVerse</h3>
                    <p class="text-sm opacity-90 mt-2 flex-grow">Creating personalized learning pathways with adaptive
                        AI tutors.</p> <a href="#"
                        class="text-xs font-medium opacity-80 hover:opacity-100 mt-4 inline-block group">Platform Story
                        <span
                            class="inline-block opacity-0 group-hover:opacity-100 transition-opacity ml-1">→</span></a>
                </div>
                <div
                    class="bg-gray-800/80 rounded-lg p-6 text-white flex flex-col justify-between min-h-[220px] border border-gray-700 shadow-lg transform hover:scale-[1.02] transition-transform duration-300 ease-out">
                    <img src="https://via.placeholder.com/150x40/FFFFFF/111827?text=FinSecure" alt="FinSecure Logo"
                        class="h-8 w-auto mb-4 filter invert brightness-90">
                    <p class="text-sm opacity-80 mt-2 flex-grow">Enhancing financial modeling and risk assessment
                        accuracy.</p> <a href="#"
                        class="text-xs font-medium opacity-70 hover:opacity-100 mt-4 inline-block group">Integration
                        Details <span
                            class="inline-block opacity-0 group-hover:opacity-100 transition-opacity ml-1">→</span></a>
                </div>
            </div>
            <div class="max-w-5xl mx-auto flex flex-wrap justify-center items-center gap-x-10 sm:gap-x-14 gap-y-8">
                <div title="LogicLeap"
                    class="h-7 w-auto filter grayscale opacity-50 hover:opacity-80 hover:filter-none transition duration-300 text-gray-500 hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5zm4 4h-2v-2h2v2zm0-4h-2V7h2v5z" />
                    </svg>
                </div>
                <div title="QuantumData"
                    class="h-7 w-auto filter grayscale opacity-50 hover:opacity-80 hover:filter-none transition duration-300 text-gray-500 hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.91-.11-1.36l-1.45.49c.04.29.06.58.06.87 0 3.86-3.14 7-7 7s-7-3.14-7-7 3.14-7 7-7c1.58 0 3.04.52 4.27 1.36l1.45-.49C16.12 3.58 14.14 3 12 3zm4 9h-4v4H9V7h7v3l4-4v10l-4-4z" />
                    </svg>
                </div>
                <div title="Synapse"
                    class="h-6 w-auto filter grayscale opacity-50 hover:opacity-80 hover:filter-none transition duration-300 text-gray-500 hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.75 7.25A5.5 5.5 0 0 0 12.25 1.75h-.5A5.5 5.5 0 0 0 6.25 7.25v.5A5.5 5.5 0 0 0 11.75 13.25h.5a5.5 5.5 0 0 0 5.5-5.5v-.5zm-5.5 15A5.5 5.5 0 0 0 17.75 16.75v-.5a5.5 5.5 0 0 0-5.5-5.5h-.5a5.5 5.5 0 0 0-5.5 5.5v.5a5.5 5.5 0 0 0 5.5 5.5h.5zM11.75 9A2.5 2.5 0 0 1 9.25 6.5V6a2.5 2.5 0 0 1 2.5-2.5h.5A2.5 2.5 0 0 1 14.75 6v.5A2.5 2.5 0 0 1 12.25 9h-.5zm0 6a2.5 2.5 0 0 1 2.5 2.5v.5a2.5 2.5 0 0 1-2.5 2.5h-.5A2.5 2.5 0 0 1 9.25 18v-.5a2.5 2.5 0 0 1 2.5-2.5h.5z" />
                    </svg>
                </div>
                <div title="InnovateHub"
                    class="h-7 w-auto filter grayscale opacity-50 hover:opacity-80 hover:filter-none transition duration-300 text-gray-500 hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                    </svg>
                </div>
                <div title="CodeGenius"
                    class="h-6 w-auto filter grayscale opacity-50 hover:opacity-80 hover:filter-none transition duration-300 text-gray-500 hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                    </svg>
                </div>
            </div>
        </section>

        <section id="more-info" class="py-20 md:py-24 border-t border-gray-800/70">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-medium text-white mb-10">More on Cosmo AI</h2>
                <div class="space-y-8 text-base">
                    <div>
                        <h3 class="font-semibold text-white mb-2">Research</h3>
                        <p class="pl-6 ml-3 border-l-2 border-gray-800 text-gray-400 leading-relaxed mb-2">Cosmo represents a significant milestone in
                            scaling deep learning models efficiently and responsibly. Read our technical paper for
                            details on architecture and training.</p> <a href="#"
                            class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors group inline-block">View
                            Cosmo Research Paper <span
                                class="inline-block opacity-0 group-hover:opacity-100 transition-opacity ml-1">→</span></a>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white mb-2">Infrastructure</h3>
                        <p class="pl-6 ml-3 border-l-2 border-gray-800 text-gray-400 leading-relaxed">Trained on a cutting-edge AI supercomputing
                            infrastructure, optimized for large-scale model training and efficient inference, enabling
                            global availability.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white mb-2">Limitations</h3>
                        <p class="pl-6 ml-3 border-l-2 border-gray-800 text-gray-400 leading-relaxed">While highly capable, Cosmo can still exhibit biases,
                            produce incorrect information (hallucinate), or follow harmful instructions under certain
                            prompts. We actively work on mitigating these issues through ongoing research and safety
                            measures.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white mb-2">Availability</h3>
                        <p class="pl-6 ml-3 border-l-2 border-gray-800 text-gray-400 leading-relaxed mb-2">Cosmo AI is available via our API for developers
                            and integrated into select partner applications. Access may be subject to waitlists and
                            usage policies.</p> <a href="#"
                            class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors group inline-block">Explore
                            API Documentation <span
                                class="inline-block opacity-0 group-hover:opacity-100 transition-opacity ml-1">→</span></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="final-cta" class="py-24 md:py-32 text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium text-white mb-10 max-w-4xl mx-auto leading-snug">
                We're building the future of intelligence. Join us in shaping responsible and beneficial AI.</h2>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#plans"
                    class="bg-gray-100 hover:bg-gray-300 text-black py-2.5 px-6 rounded-md font-medium transition-colors text-base inline-flex items-center shadow hover:shadow-md">
                    Choose a Plan <span class="ml-1.5 text-sm">→</span> </a>
                <a href="#integration"
                    class="text-gray-400 hover:text-white bg-gray-800/50 hover:bg-gray-700/80 py-2.5 px-6 rounded-md font-medium transition-colors text-base inline-flex items-center">
                    See Integrations <span class="ml-1.5 text-sm">→</span> </a>
            </div>
        </section>

    </main>

    <footer class="pt-16 pb-24 border-t border-gray-800/70">
        <div class="container mx-auto px-6 flex flex-col items-center space-y-10">

            <a href="#" class="text-xl font-semibold text-white">Cosmo AI</a>

            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm">
                <a href="#safety" class="text-gray-400 hover:text-white transition-colors">Safety</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Use</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Careers</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a>
            </nav>

            <div class="flex space-x-5">
                <a href="#" class="text-gray-500 hover:text-white transition-colors" title="Twitter/X"> <svg
                        class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg> </a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors" title="GitHub"> <svg
                        class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.379.201 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0 0 22 12.017C22 6.484 17.523 2 12 2z"
                            clip-rule="evenodd" />
                    </svg> </a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors" title="LinkedIn"> <svg
                        class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                    </svg> </a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors" title="Discord"> <svg
                        class="w-5 h-5" fill="currentColor" viewBox="0 0 128 96">
                        <path
                            d="M107.7 8.6A108.6 108.6 0 0 0 88.7 0C88.7 0 85.7 1.4 83.8 3.5a124.7 124.7 0 0 0-28.6 0C53.3 1.4 50.2 0 50.2 0A108.6 108.6 0 0 0 31.3 8.6C3.6 26.2-4.8 63.5 1.4 81.9c13.7 13.7 37.3 14.1 37.3 14.1l4.7-5.4a80.2 80.2 0 0 1-14-5.9c1.4-1 2.7-2.2 3.8-3.5 6.6 4.1 14.4 6.5 22.6 7.6l-.2-2.1a118 118 0 0 0 18.1-3.9c2.4 1.6 4.9 2.9 7.6 3.9l.1 2.2c8.3-1.1 16.1-3.5 22.7-7.6.9 1.2 2.1 2.4 3.5 3.5a80.7 80.7 0 0 1-14 5.9l4.7 5.4s23.6-.4 37.3-14.1c6.2-18.4-2.2-55.7-29.9-73.3zM45.4 64.6c-4.1 0-7.5-3.6-7.5-8s3.4-8 7.5-8 7.5 3.6 7.5 8-3.4 8-7.5 8zm38.1 0c-4.1 0-7.5-3.6-7.5-8s3.4-8 7.5-8 7.5 3.6 7.5 8-3.5 8-7.5 8z" />
                    </svg> </a>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 text-xs text-gray-500">
                <span>© 2024 Cosmo AI Labs Inc. All rights reserved.</span>
                <span class="hidden sm:inline">|</span>
                <button class="bg-gray-800 hover:bg-gray-700 text-gray-300 py-1 px-3 rounded-md transition-colors">
                    English (United States) </button>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const scrollNavLinks = document.querySelectorAll('#scroll-nav a[href^="#"]');
            scrollNavLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        const headerOffset = document.querySelector('header')?.offsetHeight || 0;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset - 40;
                        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                    }
                });
            });

            const sectionsToTrack = Array.from(document.querySelectorAll('#scroll-nav a.nav-link'))
                .map(link => document.querySelector(link.getAttribute('href')))
                .filter(el => el !== null);

            const navLinks = document.querySelectorAll('#scroll-nav a.nav-link');
            const navLinksMap = new Map();
            navLinks.forEach(link => {
                navLinksMap.set(link.getAttribute('href'), link);
            });

            const observerOptions = {
                root: null,
                rootMargin: '-30% 0px -65% 0px',
                threshold: 0
            };

            let lastActiveLink = null;

            const observerCallback = (entries, observer) => {
                entries.forEach(entry => {
                    const href = `#${entry.target.id}`;
                    const correspondingLink = navLinksMap.get(href);

                    if (correspondingLink) {
                        if (entry.isIntersecting) {
                            if (lastActiveLink && lastActiveLink !== correspondingLink) {
                                lastActiveLink.classList.remove('active-nav-link', 'text-white', 'font-semibold');
                                lastActiveLink.classList.add('text-gray-500');
                            }
                            correspondingLink.classList.add('active-nav-link', 'text-white', 'font-semibold');
                            correspondingLink.classList.remove('text-gray-500');
                            lastActiveLink = correspondingLink;
                        } else if (lastActiveLink === correspondingLink) {
                            // Optional deactivation
                        }
                    }
                });
            };

            const observer = new IntersectionObserver(observerCallback, observerOptions);
            sectionsToTrack.forEach(section => {
                if (section) observer.observe(section);
            });
        });
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo AI - Apply for Support</title> <!-- Changed title slightly for context -->
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

        /* Styling for file input */
        input[type="file"]::file-selector-button {
            background-color: #374151; /* gray-700 */
            color: #d1d5db; /* gray-300 */
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem; /* rounded-md */
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            margin-right: 1rem;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #4b5563; /* gray-600 */
        }
         input[type="file"] {
            color: #9ca3af; /* gray-400 */
         }

    </style>
</head>

<body class="bg-black text-gray-300 font-sans antialiased">

    <header class="py-4 sticky top-0 z-50 bg-black bg-opacity-90 backdrop-blur-md border-b border-gray-800/70">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-xl font-semibold text-white flex flex-row items-center"><img class="h-[35px]"
                    src="{{ asset('images/white.png') }}" alt="">Cosmo</a>
            <nav class="hidden md:flex space-x-8 items-center text-sm font-medium">
                <a href="/#capabilities"
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
                            <li> <a href="/#image-gen"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-regular fa-image w-5 h-5 mr-3 text-gray-500 group-hover/link:text-blue-400 transition-colors"></i>
                                    Image Generation </a> </li>
                            <li> <a href="/#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-video w-5 h-5 mr-3 text-gray-500 group-hover/link:text-rose-400 transition-colors"></i>
                                    Voice & Video Chat </a> </li>
                            <li> <a href="/#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-microphone-lines w-5 h-5 mr-3 text-gray-500 group-hover/link:text-teal-400 transition-colors"></i>
                                    Voice Only Chat </a> </li>
                            <li> <a href="/#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-comments w-5 h-5 mr-3 text-gray-500 group-hover/link:text-amber-400 transition-colors"></i>
                                    AI vs AI Debate </a> </li>
                            <li> <a href="/#interaction"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-regular fa-comment-dots w-5 h-5 mr-3 text-gray-500 group-hover/link:text-indigo-400 transition-colors"></i>
                                    Advanced Chat </a> </li>
                            <li>
                                <hr class="border-gray-700/50 my-2">
                            </li>
                            <li> <a href="/#plans"
                                    class="flex items-center text-gray-300 hover:text-white text-xs font-medium transition-colors group/link">
                                    <i
                                        class="fa-solid fa-layer-group w-5 h-5 mr-3 text-gray-500 group-hover/link:text-gray-200 transition-colors"></i>
                                    Compare Plans </a> </li>
                        </ul>
                    </div>
                </div>
                <a href="/#plans" class="text-gray-400 hover:text-white transition-colors duration-200">Plans</a>
                <a href="/#safety" class="text-gray-400 hover:text-white transition-colors duration-200">Safety</a>
                <a href="/#integration"
                    class="text-gray-400 hover:text-white transition-colors duration-200">Integration</a>
                <a href="/#more-info" class="text-gray-400 hover:text-white transition-colors duration-200">More Info</a>
            </nav>
            <div class="flex items-center space-x-3">
                <button class="text-gray-400 hover:text-white transition-colors"> <svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg> </button>
                <a href="/login"
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
    <main>
        <div class="container mx-auto px-6 py-16 max-w-3xl">
            <h1 class="text-3xl font-semibold text-white mb-8 text-center">Apply for Remote Support Position</h1>
            <p class="text-gray-400 mb-10 text-center">Interested in joining our remote support team? Fill out the form below.</p>
            @if(session('success'))
                <div class="text-green-400 mb-10 text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/send-support-candidate" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-2 bg-gray-950 border border-gray-700 rounded-md text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                           placeholder="Enter your full name">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-2 bg-gray-950 border border-gray-700 rounded-md text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                           placeholder="you@example.com">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-1">Phone Number</label>
                    <input type="tel" id="phone" name="phone"
                           class="w-full px-4 py-2 bg-gray-950 border border-gray-700 rounded-md text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                           placeholder="+1 (555) 123-4567">
                </div>

                <div>
                    <label for="cv" class="block text-sm font-medium text-gray-300 mb-1">Upload CV</label>
                    <input type="file" id="cv" name="CV" accept=".pdf" required
                           class="w-full px-4 py-2 bg-gray-950 border border-gray-700 rounded-md text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-gray-300 hover:file:bg-gray-600">
                           <p class="mt-1 text-xs text-gray-500">Accepted formats: PDF. Max size: 5MB.</p>
                </div>

                <div>
                    <label for="details" class="block text-sm font-medium text-gray-300 mb-1">Additional Information / Cover Letter</label>
                    <textarea id="details" name="details" rows="5"
                              class="w-full px-4 py-2 bg-gray-950 border border-gray-700 rounded-md text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                              placeholder="Tell us why you'd be a great fit for this role..."></textarea>
                </div>

                <div>
                    <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition duration-200">
                        Apply Now
                    </button>
                </div>
            </form>
        </div>
    </main>
    <footer class="pt-16 pb-24 border-t border-gray-800/70">
        <div class="container mx-auto px-6 flex flex-col items-center space-y-10">

            <a href="#" class="text-xl font-semibold text-white">Cosmo AI</a>

            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm">
                <a href="#safety" class="text-gray-400 hover:text-white transition-colors">Safety</a>
                <a href="/privacy-policy" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                <a href="/terms-of-use" class="text-gray-400 hover:text-white transition-colors">Terms of Use</a>
                <a href="/apply-support" class="text-gray-400 hover:text-white transition-colors">Apply Support</a>
                <a href="/contact-support" class="text-gray-400 hover:text-white transition-colors">Contact Support</a>
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
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 text-xs text-gray-500">
                <span>© 2024 Cosmo AI Labs Inc. All rights reserved.</span>
                <span class="hidden sm:inline">|</span>
                <button class="bg-gray-950 hover:bg-gray-700 text-gray-300 py-1 px-3 rounded-md transition-colors">
                    English (United States) </button>
            </div>
        </div>
    </footer>
</body>

</html>
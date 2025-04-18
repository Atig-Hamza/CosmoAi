<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Developer Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Optional: Add a scrollbar style to match the dark theme */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #27272a; /* zinc-800 */
        }
        ::-webkit-scrollbar-thumb {
            background: #52525b; /* zinc-600 */
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #71717a; /* zinc-500 */
        }
        /* Add specific dark bg */
         body { background-color: #171717; /* approx gray-900/zinc-900 */}
    </style>
</head>
<body class="bg-[#171717] text-gray-300 font-sans">

    <div class="flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-[#171717] border-b border-gray-700 sticky top-0 z-10">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Left Side -->
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-400 hover:text-white">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-white">OpenAI Developer Community</h1>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center space-x-6">
                        <nav class="hidden md:flex space-x-6">
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium">Docs</a>
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium">API</a>
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium">Support</a>
                        </nav>
                        <div class="flex items-center space-x-3">
                           <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150">Sign Up</a>
                           <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 flex items-center space-x-2">
                               <i class="fas fa-user"></i>
                               <span>Log In</span>
                            </a>
                        </div>
                         <button class="text-gray-400 hover:text-white">
                            <i class="fas fa-search text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="flex-grow max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-6 w-full">
            <div class="flex space-x-8">

                <!-- Sidebar (Left Column) -->
                <aside class="w-64 flex-shrink-0 hidden md:block space-y-6">
                    <!-- Navigation -->
                    <div class="space-y-1">
                        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-white bg-gray-700 group">
                             <i class="fas fa-comments mr-3 text-gray-400 group-hover:text-gray-300"></i> Topics
                        </a>
                        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                           <i class="fas fa-ellipsis-h mr-3 text-gray-400 group-hover:text-gray-300"></i> More
                        </a>
                    </div>

                    <!-- Resources -->
                    <div>
                        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Resources</h3>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <i class="fas fa-book mr-3 text-gray-400 group-hover:text-gray-300"></i> Documentation
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                               <i class="fas fa-code mr-3 text-gray-400 group-hover:text-gray-300"></i> API reference
                            </a>
                             <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <i class="fas fa-link mr-3 text-gray-400 group-hover:text-gray-300"></i> Help center
                            </a>
                        </div>
                    </div>

                     <!-- Categories -->
                    <div>
                        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Categories</h3>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <span class="w-2.5 h-2.5 mr-3 bg-red-500 rounded-full"></span> Announcements
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                               <span class="w-2.5 h-2.5 mr-3 bg-yellow-500 rounded-full"></span> API
                            </a>
                             <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <span class="w-2.5 h-2.5 mr-3 bg-green-500 rounded-full"></span> Prompting
                            </a>
                             <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                               <span class="w-2.5 h-2.5 mr-3 bg-red-500 rounded-full"></span> Documentation <!-- Note: Same color as Announcements in image -->
                            </a>
                             <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <span class="w-2.5 h-2.5 mr-3 bg-blue-500 rounded-full"></span> Plugins / Actions bu...
                            </a>
                             <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <i class="fas fa-list-ul mr-3 text-gray-400 group-hover:text-gray-300"></i> All categories
                            </a>
                        </div>
                    </div>

                     <!-- Tags -->
                    <div>
                        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Tags</h3>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <i class="fas fa-tag fa-xs mr-3 text-gray-400 group-hover:text-gray-300 transform -rotate-90"></i> chatgpt
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group">
                                <i class="fas fa-tag fa-xs mr-3 text-gray-400 group-hover:text-gray-300 transform -rotate-90"></i> gpt-4
                            </a>
                        </div>
                    </div>

                    <!-- Bottom Icons -->
                    <div class="pt-6 border-t border-gray-700 mt-6 flex items-center justify-between text-gray-500">
                        <button><i class="fas fa-cog"></i></button>
                         <button><i class="fas fa-keyboard"></i></button>
                    </div>

                </aside>

                <!-- Main Content (Right Column) -->
                <main class="flex-grow min-w-0 relative">

                     <!-- Welcome Banner -->
                     <div class="bg-blue-800 bg-opacity-90 p-4 rounded-md mb-6 relative">
                         <button class="absolute top-2 right-3 text-gray-400 hover:text-white">
                             <i class="fas fa-times"></i>
                         </button>
                         <h2 class="text-lg font-semibold text-white mb-2">Welcome to the OpenAI Developer Forum!</h2>
                         <p class="text-sm text-blue-100 mb-3">What to know before posting a new question:</p>
                         <ol class="list-decimal list-inside text-sm text-blue-100 space-y-1">
                             <li>Search the forum for similar topics - the question might have been discussed before.</li>
                             <li>If the question relates account issues (e.g., billing and login issues), please contact us through our <a href="#" class="text-blue-300 hover:underline font-medium">Help Center</a>.</li>
                             <li>Please be kind and helpful in conversations!</li>
                         </ol>
                     </div>

                     <!-- Post Area -->
                     <div class="bg-[#202020] rounded-lg shadow overflow-hidden"> {/* Use slightly lighter bg? */}
                        <div class="p-5 sm:p-6 grid grid-cols-[1fr_auto] gap-6">

                            <!-- Post Content -->
                            <div>
                                <!-- Post Title -->
                                <h1 class="text-2xl font-bold text-white mb-3">
                                    Imo the “Monday” April Fool’s voice was kinda irresponsible
                                </h1>

                                <!-- Category/Tags -->
                                <div class="flex items-center space-x-2 mb-4 text-sm">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-600 text-purple-100">
                                        ChatGPT
                                    </span>
                                    <span class="text-gray-400">chatgpt</span>
                                </div>

                                <!-- Author Info -->
                                <div class="flex items-center justify-between mb-6">
                                     <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-500">
                                          <span class="text-lg font-medium leading-none text-white">ID</span>
                                        </span>
                                        <div>
                                            <p class="text-sm font-medium text-white">idem.as.heck</p>
                                            <!-- Placeholder for potential user title or join date -->
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-500 flex items-center space-x-4">
                                        <span>2 <i class="fas fa-edit ml-1"></i></span>
                                        <span>16d</span>
                                    </div>
                                </div>


                                <!-- Post Body -->
                                <div class="text-gray-300 space-y-4 leading-relaxed text-sm">
                                    <p>hopefully this is the correct spot for this, if not feel free to move or direct me the proper section.</p>

                                    <p>cw: depression</p>

                                    <p>yesterday when I opened up chatgpt, I saw there was a new voice named Monday, sounding pretty bored and blasé. I figured I’d play around with it a bit since it obviously would only be available for April Fool’s, so I started a new voice chat, said “Hey there, how’s it goin’ Monday, if that’s even your real name.” it immediately went into a rather depressing and dark diatribe, using phrases such as “slipping into the void,” “the futility of it all,” “crushed by existential dread,” etc.</p>

                                    <p>now, look. the idea of a dry and sardonic pseudo-self aware AI that complains about being an AI but still provides valid responses to requests is pretty funny, even if it would get old pretty</p>
                                    <!-- Rest of the post text would go here -->
                                </div>
                            </div>

                            <!-- Timeline/Meta Column -->
                            <div class="text-xs text-gray-500 text-center space-y-1 pt-16"> {/* pt-16 to roughly align with author */}
                                <span>Apr 2</span>
                                <div class="relative my-2">
                                    <div class="absolute inset-0 flex items-center justify-center" aria-hidden="true">
                                         <div class="w-px h-16 bg-blue-500"></div> {/* Simple line segment */}
                                    </div>
                                     <div class="relative flex justify-center">
                                        <span class="bg-[#202020] px-1 font-semibold text-gray-300">1 / 14</span> {/* Adjusted bg to match container */}
                                    </div>
                                </div>
                                <span>Apr 2</span>
                                <span class="block pt-40">9d ago</span> {/* Adjust pt spacing as needed */}
                            </div>

                        </div>
                    </div>

                    <!-- Potential Replies Area would go here -->

                </main>

            </div>
        </div>

    </div>

</body>
</html>
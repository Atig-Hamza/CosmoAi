<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - User Overview</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-bg': '#242424',    
                        'primary-text': '#e3e3e3',    
                        'secondary-text': '#a0a0a0',  
                        'subtle-bg': '#2d2d2d',      
                        'border-color': '#4a4a4a',   
                        'hover-bg': '#3f3f3f',       
                        'active-tab-border': '#3b82f6',
                        'button-text': '#c0c0c0',      
                        'button-hover-text': '#ffffff',
                        'button-hover-bg': '#383838', 
                        'link-color': '#60a5fa',     
                        'link-hover-color': '#93c5fd',
                        'button-danger-bg': '#b91c1c', 
                        'button-danger-hover': '#991b1b',
                        'avatar-border': '#5a5a5a',   
                    }
                }
            }
        }
    </script>
    <style>
        
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        body {
            font-family: "Segoe UI Variable", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }
        
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2d2d2d;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #5a5a5a;
            border-radius: 4px;
            border: 2px solid #2d2d2d;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #8a8a8a;
        }
 
        .action-icon {
            width: 1em;
            height: 1em;
            display: inline-block;
            vertical-align: -0.125em;
        }

    </style>
</head>

<body class="bg-primary-bg text-primary-text font-sans min-h-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <header class="flex justify-between items-start mb-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">
                    Your Profile
                </h1>
                <p class="text-sm text-secondary-text">
                    User account settings
                </p>
            </div>
            <a href="/chat"
                class="text-secondary-text hover:text-primary-text transition-colors duration-150 ease-in-out p-1.5 rounded-full hover:bg-hover-bg mt-1 -mr-1"
                aria-label="Close Settings" title="Close Settings">
                <i class="fa-solid fa-xmark fa-lg action-icon"></i>
            </a>
        </header>
        <nav class="flex space-x-1 sm:space-x-2 border-b border-border-color mb-6">
            <a href="#"
                class="px-3 py-2 text-sm font-medium text-white border-b-2 border-active-tab-border whitespace-nowrap"
                aria-current="page">
                Overview
            </a>
            <a href="#"
                class="px-3 py-2 text-sm font-medium text-secondary-text hover:text-primary-text border-b-2 border-transparent hover:border-gray-500 whitespace-nowrap transition-colors duration-150 ease-in-out">
                Upgrade Plan
            </a>
        </nav>
        <main class="space-y-8">
            <section class="bg-subtle-bg p-5 rounded-md">
                <h2 class="text-base font-semibold text-white mb-4">Basic info</h2>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">
                    <div
                        class="flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gradient-to-br from-teal-600 to-cyan-700 flex items-center justify-center border-2 border-avatar-border shadow-md">
                        <span class="text-3xl sm:text-4xl font-semibold text-white">{{ substr(Auth::user()->full_name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-xl font-semibold text-white">{{ Auth::user()->full_name }}</p>
                        <p class="text-sm text-secondary-text">{{ Auth::user()->email }}</p>
                        <p class="text-sm text-secondary-text mt-1">User</p>
                    </div>
                </div>
            </section>
            <section class="bg-subtle-bg p-5 rounded-md">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-6">
                    <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5 text-sm">
                        <div>
                            <p class="font-medium text-secondary-text mb-1">{{ Auth::user()->full_name }}</p>
                            <div class="flex items-center gap-2 group">
                                <p class="text-primary-text break-all">{{ Auth::user()->email }}</p>
                                <button title="Copy"
                                    class="text-secondary-text opacity-50 group-hover:opacity-100 hover:text-primary-text transition-opacity duration-150 ease-in-out">
                                    <i class="fa-regular fa-copy action-icon"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-text mb-1">User Gen ID</p>
                            <div class="flex items-center gap-2 group">
                                <p class="text-primary-text break-all">{{ Auth::user()->id }}ccccc-7c79d5-0c68-46b8-8fde-a90e9f459284</p>
                                <button title="Copy"
                                    class="text-secondary-text opacity-50 group-hover:opacity-100 hover:text-primary-text transition-opacity duration-150 ease-in-out">
                                    <i class="fa-regular fa-copy action-icon"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-text mb-1">Created date time</p>
                            <p class="text-primary-text">{{ Auth::user()->created_at ->format('M d, Y h:i A') }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-text mb-1">User type</p>
                            <p class="text-primary-text">User</p>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-text mb-1">Identities</p>
                            <p class="text-primary-text break-all">{{ Auth::user()->id }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-text mb-1">Last sign-in</p>
                            <p class="text-primary-text">{{ now()->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                    <div
                        class="text-sm space-y-3 border-t border-border-color md:border-t-0 md:border-l md:pl-8 pt-5 md:pt-0">
                        <p class="font-medium text-white mb-3">Usage location & groups</p>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-text">Created Tickets</span>
                            <a href="#"
                                class="text-link-color hover:text-link-hover-color hover:underline font-medium">{{ \App\Models\Tickets::where('user_id', Auth::user()->id)->count() }}</a>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-text">Closed Tickets</span>
                            <a href="#"
                                class="text-link-color hover:text-link-hover-color hover:underline font-medium">{{ \App\Models\Tickets::where('user_id', Auth::user()->id)->where('status', 'closed')->count() }}</a>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-text">Current Plan</span>
                            <a href="#"
                                class="text-link-color hover:text-link-hover-color hover:underline font-medium">{{ \App\Models\UserProfile::where('user_id', Auth::user()->id)->first()->plan }}</a>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-text">Account Currency</span>
                            <a href="#"
                                class="text-link-color hover:text-link-hover-color hover:underline font-medium">{{ \App\Models\User::where('id', Auth::user()->id)->first()->currency }}</a>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-text">Usage location</span>
                            <span class="text-primary-text">{{ \App\Models\User::where('id', Auth::user()->id)->first()->country }}</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-subtle-bg p-5 rounded-md">
                <h2 class="text-base font-semibold text-white mb-2">My Feed</h2>
                <p class="text-sm text-secondary-text">Recent activities and relevant information will appear here.</p>

                <div class="mt-4 text-center text-secondary-text text-xs italic">
                    (Feed content not yet implemented)
                </div>
            </section>
            <section class="pt-6 mt-4 border-t border-border-color">
                <h2 class="text-base font-semibold text-white mb-4">Account Actions</h2>
                <div class="flex justify-start">
                    <a href="{{ route('logout') }}"
                        class="px-5 py-2 bg-button-danger-bg hover:bg-button-danger-hover text-white font-medium rounded-md text-sm transition-colors duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-bg focus:ring-red-500">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                    </a>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
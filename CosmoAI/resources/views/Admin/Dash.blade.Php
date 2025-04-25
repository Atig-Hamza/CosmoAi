<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Optional: Add a scrollbar style to match the dark theme */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #27272a;
            /* zinc-800 */
        }

        ::-webkit-scrollbar-thumb {
            background: #52525b;
            /* zinc-600 */
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #71717a;
            /* zinc-500 */
        }

        /* Add specific dark bg */
        body {
            background-color: #171717;
            /* approx gray-900/zinc-900 */
        }
    </style>
</head>

<body class="bg-[#171717] text-gray-300 font-sans">

    <div class="flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-[#171717] border-b border-gray-700 sticky top-0 z-10">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-400 hover:text-white">
                            <img class="h-10 w-10" src="{{ asset('images/white.png') }}" alt="">
                        </button>
                        <h1 class="text-xl font-semibold text-white">Cosmo Admin Dashboard</h1>
                    </div>

                    <div class="flex items-center space-x-6">
                        <nav class="hidden md:flex space-x-6">
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium">Documentation</a>
                        </nav>
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
                <aside
                    class="max-[768px]:hidden w-64 flex-shrink-0 fixed h-full border-r border-gray-700 overflow-y-auto pt-2 pb-10">
                    <div class="px-4 space-y-6">
                        <div class="space-y-1">
                            <a href="/admin-dash"
                                class="flex items-center px-3 py-2 text-sm font-medium text-white group border-l-4 border-[#ffffff]">
                                <i class="fas fa-tachometer-alt mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                Dashboard
                            </a>
                            <a href="/user-management"
                                class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                <i class="fas fa-users mr-3 text-gray-400 group-hover:text-gray-300"></i> User
                                Management
                            </a>
                            <a href="/candidates-management"
                                class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                <i class="fas fa-user-check mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                Support
                                Management
                            </a>
                        </div>

                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                                Monitoring</h3>
                            <div class="space-y-1">
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-chart-line mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                    Analytics
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-history mr-3 text-gray-400 group-hover:text-gray-300"></i> Usage
                                    Logs
                                </a>
                            </div>
                        </div>

                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                                Administration</h3>
                            <div class="space-y-1">
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <span class="w-2.5 h-2.5 mr-3 bg-green-500 rounded-full"></span> Subscription Plans
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <span class="w-2.5 h-2.5 mr-3 bg-blue-500 rounded-full"></span> Billing
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-cogs mr-3 text-gray-400 group-hover:text-gray-300"></i> System
                                    Settings
                                </a>
                            </div>
                        </div>

                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Model
                                Types</h3>
                            <div class="space-y-1">
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i
                                        class="fas fa-tag fa-xs mr-3 text-gray-400 group-hover:text-gray-300 transform -rotate-90"></i>
                                    Chat Models
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i
                                        class="fas fa-tag fa-xs mr-3 text-gray-400 group-hover:text-gray-300 transform -rotate-90"></i>
                                    Vision Models
                                </a>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-700 mt-6 flex items-center justify-between text-gray-500">
                            <button><i class="fas fa-cog"></i></button>
                            <button><i class="fas fa-keyboard"></i></button>
                        </div>
                    </div>
                </aside>

                <aside class="w-64 flex-shrink-0 hidden md:block space-y-6">
                </aside>


                <main class="flex-grow min-w-0 relative">

                    <div class="bg-blue-800 bg-opacity-90 p-4 rounded-md mb-6 relative">
                        <button class="absolute top-2 right-3 text-gray-400 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                        <h2 class="text-lg font-semibold text-white mb-2">Welcome to the Cosmo Admin Dashboard!</h2>
                        <p class="text-sm text-blue-100 mb-3">Quick tips for administering the platform:</p>
                        <ol class="list-decimal list-inside text-sm text-blue-100 space-y-1">
                            <li>Use the User Management section to add, edit, or remove user accounts.</li>
                            <li>Keep AI models up-to-date with the latest versions in the AI Models section.</li>
                            <li>Monitor platform usage and performance metrics in the Analytics section.</li>
                        </ol>
                    </div>

                    <div class="rounded-lg shadow overflow-hidden">
                        <div class="p-5 sm:p-6 grid grid-cols-[1fr_auto] gap-6">

                            <div>
                                <h1 class="text-2xl font-bold text-white mb-3">
                                    Platform Performance Report - April 2025
                                </h1>

                                <div class="flex items-center space-x-2 mb-4 text-sm">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-600 text-purple-100">
                                        Analytics
                                    </span>
                                    <span class="text-gray-400">monthly-report</span>
                                </div>

                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center space-x-3">
                                        <span
                                            class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-500">
                                            <span class="text-lg font-medium leading-none text-white">CI</span>
                                        </span>
                                        <div>
                                            <p class="text-sm font-medium text-white">Cosmo InsightOps</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="bg-white px-4 py-2 rounded-md text-sm font-medium text-blue-600 hover:text-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                            type="button">
                                            Regenerate Report
                                        </button>
                                    </div>
                                </div>

                                <div id="report" class="text-gray-300 space-y-4 leading-relaxed text-sm">
                                    <p>This is the monthly performance summary for all AI models and platform usage.</p>

                                    <p><strong>User Management Highlights:</strong></p>

                                    <p>We've seen a 15% increase in new user registrations this month. The admin team
                                        has processed 42 account modification requests and deactivated 7 dormant
                                        accounts. The user verification system is working efficiently with a 98.7%
                                        success rate.</p>

                                    <p><strong>AI Model Performance:</strong></p>

                                    <p>Our GPT-5 implementation is showing remarkable stability with 99.99% uptime. The
                                        new vision models added last week have been adopted by 37% of enterprise users.
                                        Recommended action: Consider upgrading the text-to-speech models as they're
                                        showing higher latency than expected.</p>

                                    <p><strong>Subscription Plans:</strong></p>

                                    <p>The "Professional" tier continues to be our most popular plan with 62% of
                                        subscribers. Revenue from the "Enterprise" plan has increased by 22% following
                                        the addition of custom model fine-tuning options.</p>
                                </div>
                            </div>

                            <div class="text-xs text-gray-500 text-center space-y-1 pt-16">

                            </div>

                        </div>
                    </div>
                </main>

            </div>
        </div>

    </div>

</body>

</html>
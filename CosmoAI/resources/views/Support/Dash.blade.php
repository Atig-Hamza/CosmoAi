<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fikri Studio - Customer Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.18/24/outline/heroicons.min.css" rel="stylesheet">
    
    <style>
        /* Optional: Custom scrollbar styling (Webkit browsers) */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }

        /* Add custom colors if needed in tailwind.config.js or here */
        /* Example:
        .bg-brand-green { background-color: #4CAF50; }
        .text-brand-green { color: #4CAF50; }
        */
    </style>
</head>

<body class="bg-gray-100 font-sans text-sm">
    <div class="flex h-screen">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="px-4 pt-4 flex items-center flex-row justify-center">
                <img class="w-10" src="{{ asset('images/Design sans titre (1).png') }}" alt="cosmo logo">
                <h2 class="text-xl font-bold text-gray-800">CosmoAI</h2>
            </div>
            <div class="p-4">
                <div class="relative">
                    <input type="text" placeholder="Search"
                        class="w-full pl-8 pr-4 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 absolute left-2.5 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <span
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-xs text-gray-400 border border-gray-300 px-1 rounded">⌘
                        K</span>
                </div>
            </div>

            
            <nav class="flex-grow px-2 space-y-1 overflow-y-auto">
                <a href="#" class="flex items-center px-2 py-2 text-gray-700 rounded-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-2 py-2 text-indigo-700 bg-indigo-50 rounded-md font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                    </svg>
                    Ticket
                </a>
            </nav>

            <div class="px-4 py-2 mt-4 border-t border-gray-200">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Conversation</h3>
                <a href="#"
                    class="flex items-center justify-between px-2 py-1.5 text-gray-700 rounded-md hover:bg-gray-100 text-sm">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-2 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        Call <span class="text-gray-400 ml-1">(123)45678...</span>
                    </span>
                    <span class="bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">1</span>
                </a>
                <a href="#"
                    class="flex items-center justify-between px-2 py-1.5 text-gray-700 rounded-md hover:bg-gray-100 text-sm">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-2 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M2.25 3h19.5M2.25 7.5h19.5M4.5 12H6m13.5 0H19.5M2.25 16.5h19.5M4.5 21H6m13.5 0H19.5" />
                        </svg>
                        Side Conversa...
                    </span>
                    <span class="bg-gray-200 text-gray-600 text-xs font-bold px-1.5 py-0.5 rounded-full">0</span>
                </a>
            </div>

            <div class="px-4 py-2 mt-2">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Favorites</h3>
                <p class="text-xs text-gray-400 mb-2">Hover over any table and click the star to add it here.</p>
            </div>

            <div class="px-4 py-2 border-t border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pinned Tickets</h3>
                    <button class="text-xs text-indigo-600 hover:text-indigo-800">Unpin All</button>
                </div>
                <div class="space-y-1.5 text-xs">
                    <div class="flex items-center justify-between text-gray-700">
                        <span><span class="text-green-500 mr-1.5">#</span>TC-192 produc...</span>
                        <button class="text-gray-400 hover:text-gray-600">[X]</button>
                    </div>
                    <div class="flex items-center justify-between text-gray-700">
                        <span><span class="text-green-500 mr-1.5">#</span>TC-191 paymen...</span>
                        <button class="text-gray-400 hover:text-gray-600">[X]</button>
                    </div>
                    <div class="flex items-center justify-between text-gray-700">
                        <span><span class="text-green-500 mr-1.5">📞</span>+1 678-908-78...</span>
                        <button class="text-gray-400 hover:text-gray-600">[X]</button>
                    </div>
                </div>
                <button class="mt-2 flex items-center text-indigo-600 hover:text-indigo-800 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add new
                </button>
            </div>

            <div class="mt-auto p-4 border-t border-gray-200">
                <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                    Help & Support
                </a>
            </div>
        </aside>

        
        <main class="flex-1 flex flex-col overflow-hidden">
            <div class="bg-white p-6 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-black flex items-center justify-center">
                        <p class="text-white text-2xl font-bold mb-1">S</p>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            Santi Cazorla
                            <span
                                class="ml-2 text-xs bg-green-100 text-green-700 px-1.5 py-0.5 rounded-full flex items-center">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span> online
                            </span>
                        </h2>
                        <div class="text-sm text-gray-500 flex items-center">
                            <img src="{{ asset('images/Design sans titre (1).png') }}"
                                alt="Microsoft Logo" class="w-4 h-4 mr-1">
                            Cosmo Support Agent
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3 text-gray-500">
                    <button class="p-2 rounded-full hover:bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg></button>
                    <button class="p-2 rounded-full hover:bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg></button>
                    <button class="p-2 rounded-full hover:bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg></button>
                    <button class="p-2 rounded-full hover:bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></button>
                </div>
            </div>

            <div class="bg-white px-6 border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="#"
                        class="border-green-500 text-green-600 whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                        Ticket
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        Activity
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                        </svg>
                        Attachment
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Notes <span
                            class="ml-1.5 bg-gray-200 text-gray-600 text-xs font-bold px-1.5 py-0.5 rounded-full">2</span>
                    </a>
                </nav>
            </div>
            
            <div class="flex-1 overflow-y-auto bg-white border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 sticky top-0">
                        <tr>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10">
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </th>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ticket ID <span class="text-gray-400">↓</span></th>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject</th>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Priority <span class="text-gray-400">↓</span></th>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Request Date <span class="text-gray-400">↓</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-192</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Unrecognized Charges on My Account
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> High
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">07/11/2023, 06:25AM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-191</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Defective Item Received</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Low
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">06/11/2023, 11:47PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-190</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Unable to Access My Account</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Medium
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">06/11/2023, 05:31AM</td>
                        </tr>
                        
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-189</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Missing Item in Order, Need
                                Replacement</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Low
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">05/11/2023, 09:05PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-188</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Order Assistance Needed,
                                Customization Re...</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Low
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">04/11/2023, 02:30PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-187</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Tracking Order #12345</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Medium
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">04/11/2023, 11:28AM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-186</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Tracking Order #4567</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Low
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">03/11/2023, 10:10AM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-185</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Card Declined for Order #98765
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Medium
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">31/10/2023, 04:13PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-184</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Help me cancel my order</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Medium
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">30/10/2023, 07:46PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-183</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Out-of-Stock Item in Order</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> High
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">29/10/2023, 03:07AM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-182</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Dissatisfied with Order</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> High
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">27/10/2023, 12:00PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-181</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Lost Package Inquiry</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Medium
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">26/10/2023, 01:04PM</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap"><input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">#TC-180</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-700">Card Declined for Order #98765
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Low
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-500">26/10/2023, 10:33AM</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
    </div>
    </main>
    </div>
</body>

</html>
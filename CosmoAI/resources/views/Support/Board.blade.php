<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Board</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.18/24/outline/heroicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

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
                <a href="{{route('suportboard')}}"
                    class="flex items-center px-2 py-2 text-indigo-700 bg-indigo-50 rounded-md font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    Dashboard
                </a>
                <a href="/Tickets" class="flex items-center px-2 py-2 text-gray-700 rounded-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                    </svg>
                    Ticket
                </a>
                <a href="#" class="flex items-center px-2 py-2 text-gray-700 rounded-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Report (Coming soon)
                </a>
                <a href="#" class="flex items-center px-2 py-2 text-gray-700 rounded-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Customer (Coming soon)
                </a>
                <a href="#" class="flex items-center px-2 py-2 text-gray-700 rounded-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Contact Admin (Coming soon)
                </a>
            </nav>

            <div class="px-4 py-2 mt-4 border-t border-gray-200">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Last User Contacted
                    Support</h3>
                @foreach (\App\Models\Tickets::all()->sortByDesc('created_at')->take(2) as $email)
                    <a href=""
                        class="cursor-pointer flex items-center justify-between px-2 py-1.5 text-gray-700 rounded-md hover:bg-gray-100 text-sm">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-2 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            {{ $email->email }}
                        </span>
                    </a>
                @endforeach
            </div>

            <div class="px-4 py-2 mt-2">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Response</h3>
                <p class="text-xs text-gray-400 mb-2">Please select a ticket from the list to submit a response</p>
            </div>

            <div class="px-4 py-2 border-t border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Last Opened Tickets</h3>
                    <button class="text-xs text-indigo-600 hover:text-indigo-800">view All</button>
                </div>
                <div class="space-y-1.5 text-xs">
                    @foreach (\App\Models\Tickets::orderBy('created_at', 'desc')->limit(3)->get() as $ticket)
                        <div class="flex items-center justify-between text-gray-700">
                            <span><span class="text-green-500 mr-1.5">-></span>{{ $ticket->ticket_id }}</span>
                            <button class="text-gray-400 hover:text-gray-600">[X]</button>
                        </div>
                    @endforeach
                </div>
                <button class="mt-2 flex items-center text-indigo-600 hover:text-indigo-800 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    response now
                </button>
            </div>

            <div class="mt-auto p-4 border-t border-gray-200">
                <a href="/logout" class="flex items-center text-gray-600 hover:text-gray-800" title="Logout">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7 7l-7-7 7-7" />
                    </svg>
                    Logout
                </a>
            </div>
        </aside>


        <main class="flex-1 flex flex-col overflow-x-hidden">
            <div class="bg-white p-6 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-black flex items-center justify-center">
                        <p class="text-white text-2xl font-bold mb-1">{{ substr(session('support_name'), 0, 1) }}</p>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            {{ session('support_name') }}
                            <span
                                class="ml-2 text-xs bg-green-100 text-green-700 px-1.5 py-0.5 rounded-full flex items-center">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span> online
                            </span>
                        </h2>
                        <div class="text-sm text-gray-500 flex items-center">
                            <img src="{{ asset('images/Design sans titre (1).png') }}" alt="Microsoft Logo"
                                class="w-4 h-4 mr-1">
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
            @php
                use App\Models\Tickets;
                $openTicketsCount_Blade = Tickets::where('status', 'open')->count();
                $closedTicketsCount_Blade = Tickets::where('status', 'closed')->count();
                $totalTicketsCount_Blade = $openTicketsCount_Blade + $closedTicketsCount_Blade;
            @endphp
            <div class="p-6 md:p-10 bg-gray-50 min-h-screen font-sans">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                    <div class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-600">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>

                            <div class="text-2xl font-semibold text-gray-800">
                                {{ $openTicketsCount ?? $openTicketsCount_Blade }}
                            </div>
                            <div class="text-sm text-gray-500">Open Tickets</div>
                        </div>
                    </div>


                    <div class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-green-100 rounded-lg text-green-600">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>

                            <div class="text-2xl font-semibold text-gray-800">
                                {{ $closedTicketsCount ?? $closedTicketsCount_Blade }}
                            </div>
                            <div class="text-sm text-gray-500">Closed Tickets</div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-blue-100 rounded-lg text-blue-600">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div>

                            <div class="text-2xl font-semibold text-gray-800">
                                {{ $totalTicketsCount ?? $totalTicketsCount_Blade }}
                            </div>
                            <div class="text-sm text-gray-500">Total Tickets</div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                    <div class="md:col-span-2 space-y-6">
                        <div class="bg-white p-4 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Support Tickets</h2>
                            </div>
                            <div class="space-y-3">
                                @forelse (Tickets::all() as $ticket)
                                    <div
                                        class="flex flex-wrap items-center justify-between gap-x-4 gap-y-2 p-3 rounded-lg border border-gray-200 hover:bg-gray-50">
                                        <div class="flex items-center gap-3 flex-1 min-w-[200px]">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center text-xs font-semibold">
                                                {{ strtoupper(substr($ticket->user?->name ?? 'N/A', 0, 2)) }}
                                            </div>
                                            <div>
                                                <a href=""
                                                    class="font-medium text-sm text-gray-800 hover:text-indigo-600 cursor-pointer">
                                                    {{ Str::limit($ticket->problem, 60) }}
                                                </a>
                                                <div class="text-xs text-gray-500">
                                                    Reported by <span
                                                        class="font-medium">{{ $ticket->user?->name ?? 'N/A' }}</span>
                                                    • <span title="Ticket ID">#{{ $ticket->ticket_id }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center px-2">
                                            @if ($ticket->status == 'open')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Open
                                                </span>
                                            @elseif ($ticket->status == 'closed')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Closed
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    {{ ucfirst($ticket->status) }}
                                                </span>
                                            @endif
                                        </div>
                                        <div
                                            class="flex items-center gap-4 text-xs text-gray-500 min-w-[150px] justify-end">
                                            <span class="flex items-center gap-1"
                                                title="Created At: {{ $ticket->created_at }}">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $ticket->created_at->format('M d, Y') }}
                                            </span>
                                            @if ($ticket->attachment)
                                                <span class="flex items-center gap-1 text-gray-600" title="Attachment Present">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                    </svg>
                                                </span>
                                            @else
                                                <span class="flex items-center gap-1 text-gray-400 opacity-50"
                                                    title="No Attachment">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                    </svg>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="pl-2">
                                            <a href="" class="text-gray-400 hover:text-indigo-600" title="View Details">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-gray-500 py-4">No support tickets found.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-1 space-y-6">

                        <div class="bg-white p-4 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>

                            </div>
                            <div class="bg-lime-50 p-3 rounded-lg mb-3">
                                @forelse (Tickets::where('status', 'Closed')->limit(4)->get() as $tick)
                                    <div class="flex justify-between items-center mb-1">
                                        <div class="text-sm font-semibold text-gray-800">Ticket Closed</div>
                                        <span class="text-xs text-gray-400">{{ $tick->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-xs text-gray-600 mb-1">
                                        Ticket <span class="font-medium text-indigo-600">{{ $tick->ticket_id }}</span> was closed.
                                    </p>
                                    <a href="/Tickets" class="text-xs text-indigo-600 hover:underline">View All Ticket</a>
                                @empty
                                    <p class="text-center text-gray-500 py-4">No notifications found.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>
    </main>
    </div>
</body>

</html>
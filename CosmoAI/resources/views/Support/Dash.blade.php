<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Tickets</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.18/24/outline/heroicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <a href="{{route('suportboard')}}" class="flex items-center px-2 py-2 text-gray-700 rounded-md hover:bg-gray-100">
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


        <main class="flex-1 flex flex-col overflow-hidden">
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
                        Response
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
                                Status <span class="text-gray-400">↓</span></th>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Request Date <span class="text-gray-400">↓</span></th>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions <span class="text-gray-400">↓</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach (App\Models\Tickets::all() as $ticket)
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-700">{{ $ticket->ticket_id }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-700">{{ $ticket->problem }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if ($ticket->status == 'open')
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> {{ $ticket->status }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> {{ $ticket->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-500">
                                    {{ $ticket->created_at->format('d/m/Y, h:i A') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if ($ticket->status == 'open')
                                        <button onclick="toggleForm({{ $ticket->id }})"
                                            class="flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 hover:bg-green-200 transition-colors">
                                            <i class="fas fa-check-circle mr-1.5"></i>
                                            Resolve
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr id="form-row-{{ $ticket->id }}" class="hidden">
                                <td colspan="6" class="px-6 py-4 bg-gray-50 rounded-lg shadow-inner">
                                    @if (is_null($ticket->attachment))
                                        <p class="text-gray-500 italic">No attachment provided</p>
                                    @else
                                        <div class="mb-4">
                                            <h4 class="text-sm font-medium text-gray-700 mb-2">Attachment:</h4>
                                            <img src="{{ asset('storage/' . $ticket->attachment) }}" alt="Ticket attachment"
                                                class="max-w-md rounded-md border border-gray-200 shadow-sm">
                                        </div>
                                    @endif

                                    <form action="response/{{ $ticket->id }}" method="POST" class="mt-4 space-y-3">
                                        @csrf
                                        <div>
                                            <textarea name="response" rows="3" placeholder="Enter your response here..."
                                                required
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm"></textarea>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors shadow-sm">
                                                Submit Response
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <script>
                        function toggleForm(id) {
                            const formRow = document.getElementById('form-row-' + id);
                            if (formRow.classList.contains('hidden')) {
                                formRow.classList.remove('hidden');
                            } else {
                                formRow.classList.add('hidden');
                            }
                        }
                    </script>

                </table>
            </div>
    </div>
    </main>
    </div>
</body>

</html>
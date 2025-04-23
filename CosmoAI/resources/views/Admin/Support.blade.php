<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changed Title -->
    <title>Cosmo - Support Candidate Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('/images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #27272a;
        }

        ::-webkit-scrollbar-thumb {
            background: #52525b;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #71717a;
        }

        body {
            background-color: #171717;
        }

        /* --- Removed old badge styles, added new status styles --- */
        .badge-pending {
            background-color: #fef9c3;
            /* yellow-100 */
            color: #854d0e;
            /* yellow-800 */
            border: 1px solid #fde68a;
            /* yellow-300 */
        }

        .badge-accepted {
            background-color: #dcfce7;
            /* green-100 */
            color: #166534;
            /* green-800 */
            border: 1px solid #bbf7d0;
            /* green-300 */
        }

        .badge-refused {
            background-color: #fee2e2;
            /* red-100 */
            color: #991b1b;
            /* red-800 */
            border: 1px solid #fecaca;
            /* red-300 */
        }

        /* --- End new status styles --- */

        .table-fixed {
            table-layout: fixed;
            width: 100%;
        }

        /* Modal styles (kept in case needed later, but modal itself removed) */
        .modal-enter {
            transform: translateX(100%);
        }

        .modal-enter-active {
            transform: translateX(0);
            transition: transform 300ms ease-out;
        }

        .modal-leave {
            transform: translateX(0);
        }

        .modal-leave-active {
            transform: translateX(100%);
            transition: transform 300ms ease-in;
        }

        .overlay-enter {
            opacity: 0;
        }

        .overlay-enter-active {
            opacity: 1;
            transition: opacity 300ms ease-out;
        }

        .overlay-leave {
            opacity: 1;
        }

        .overlay-leave-active {
            opacity: 0;
            transition: opacity 300ms ease-in;
        }
    </style>
</head>

<body class="bg-[#171717] text-gray-300 font-sans">

    <div class="flex flex-col min-h-screen">

        <!-- Header (Unchanged) -->
        <header class="bg-[#171717] border-b border-gray-700 sticky top-0 z-10">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-400 hover:text-white">
                            <img class="h-10 w-10" src="{{ asset('/images/white.png') }}" alt="Cosmo Logo">
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
            <div class="flex flex-col md:flex-row md:space-x-8">
                <!-- Sidebar Placeholder (visible on md+) -->
                <aside class="w-64 flex-shrink-0 hidden md:block">
                    <!-- Adjusted Sidebar Active State -->
                    <div
                        class="fixed h-[calc(100vh-4rem)] bg-[#1a1a1a] border-r border-gray-700 overflow-y-auto pt-2 pb-10 w-64">
                        <div class="px-4 space-y-6">
                            <div class="space-y-1">
                                <a href="/admin-dash"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-tachometer-alt mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                    Dashboard
                                </a>
                                <a href="/user-management"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-users mr-3 text-gray-400 group-hover:text-gray-300"></i> User
                                    Management
                                </a>
                                <a href="/candidates-management"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-white group border-l-4 bg-[#28282898] border-[#ffffff]">
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
                                        <i class="fas fa-history mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                        Usage
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
                                        <span class="w-2.5 h-2.5 mr-3 bg-green-500 rounded-full"></span> Subscription
                                        Plans
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

                            <div
                                class="pt-6 border-t border-gray-700 mt-6 flex items-center justify-between text-gray-500">
                                <button><i class="fas fa-cog"></i></button>
                                <button><i class="fas fa-keyboard"></i></button>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- **** MODIFIED MAIN CONTENT **** -->
                <main class="flex-grow min-w-0 relative rounded-lg p-4 md:p-6">
                    <div class="mb-6">
                        <!-- Changed heading and description -->
                        <h1 class="text-2xl font-semibold text-white mb-1">Support Candidate Management</h1>
                        <p class="text-sm text-gray-400">Review, accept, or refuse support candidate submissions.</p>
                    </div>

                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 gap-4">
                        <!-- Changed heading and count description -->
                        <h2 class="text-lg font-medium text-white">Pending Candidates <span
                                class="text-gray-400">12</span></h2>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <div class="relative flex-grow md:flex-grow-0">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fas fa-search text-sm"></i>
                                </span>
                                <!-- Changed placeholder -->
                                <input type="text" placeholder="Search candidates..."
                                    class="w-full md:w-64 bg-[#2b2b2b] border border-gray-600 rounded-md pl-10 pr-4 py-2 text-sm text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <button
                                class="flex items-center space-x-2 bg-[#2b2b2b] border border-gray-600 text-gray-300 hover:bg-gray-700 text-sm font-medium py-2 px-3 rounded-md">
                                <i class="fas fa-filter text-xs"></i>
                                <span>Filters</span>
                            </button>
                            <!-- Removed "Add User" button -->
                        </div>
                    </div>

                    <!-- Candidate Table -->
                    <div x-data="{ showPdf: false, pdfUrl: '' }" class="flex space-x-6">
                        <!-- Table Section -->
                        <div class="w-full overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700 table-fixed">
                                <thead>
                                    <tr>
                                        <th class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-4/12">
                                            Candidate Name</th>
                                        <th class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-3/12">
                                            Subject / Reason</th>
                                        <th class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-2/12">
                                            Status</th>
                                        <th class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-2/12">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    @foreach (\App\Models\SupportCandidates::all() as $candidate)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <span
                                                            class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-500">
                                                            <span class="text-lg font-medium leading-none text-white">
                                                                {{ strtoupper(substr($candidate->name, 0, 1)) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-white">{{ $candidate->name }}</div>
                                                        <div class="text-gray-400">{{ $candidate->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">
                                                {{ $candidate->details }}
                                            </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-400">
                                                @if ($candidate->status === 'pending')
                                                    <span
                                                        class="badge-pending text-xs font-medium px-2 py-0.5 rounded-full">Pending</span>
                                                @elseif ($candidate->status === 'approved')
                                                    <span
                                                        class="badge-accepted text-xs font-medium px-2 py-0.5 rounded-full">Accepted</span>
                                                @elseif ($candidate->status === 'rejected')
                                                    <span
                                                        class="badge-refused text-xs font-medium px-2 py-0.5 rounded-full">Refused</span>
                                                @endif
                                            </td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                @if ($candidate->status === 'pending')
                                                    <div class="flex space-x-2 justify-end">
                                                        <a href="/approve/{{ $candidate->id }}"
                                                            class="text-green-400 hover:text-green-300 text-xs font-medium py-1 px-2 rounded border border-green-600 hover:bg-green-900/50"
                                                            title="Accept">
                                                            <i class="fas fa-check"></i> Accept
                                                        </a>
                                                        <a href="/reject/{{ $candidate->id }}"
                                                            class="text-red-400 hover:text-red-300 text-xs font-medium py-1 px-2 rounded border border-red-600 hover:bg-red-900/50"
                                                            title="Refuse">
                                                            <i class="fas fa-times"></i> Refuse
                                                        </a>
                                                        <button
                                                            @click="pdfUrl = '{{ asset('storage/' . $candidate->CV) }}'; showPdf = true"
                                                            class="text-blue-400 hover:text-blue-300 text-xs font-medium py-1 px-2 rounded border border-blue-600 hover:bg-blue-900/50"
                                                            title="View PDF">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    <button class="text-gray-400 hover:text-white" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- PDF Viewer Panel -->
                        <div x-show="showPdf" x-transition.duration.500ms
                            class="h-full w-[500px] fixed top-0 right-0 bg-gray-950 border-l border-gray-700 shadow-xl z-50">

                            <button @click="showPdf = false"
                                class="absolute top-4 right-4 text-white hover:text-white/80 z-50">
                                <i class="fas fa-times"></i> Close
                            </button>

                            <iframe :src="pdfUrl" class="w-full h-full rounded-none border-none mt-12" frameborder="0"
                                x-show="pdfUrl"></iframe>
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </div>
</body>

</html>
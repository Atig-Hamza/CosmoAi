<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo - Admin User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('/images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .badge-export {
            background-color: #e0f2fe;
            color: #075985;
            border: 1px solid #bae6fd;
        }

        .badge-import {
            background-color: #f3e8ff;
            color: #6b21a8;
            border: 1px solid #e9d5ff;
        }

        .table-fixed {
            table-layout: fixed;
            width: 100%;
        }

        /* Modal styles */
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

        <!-- Header -->
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
                    <div class="fixed h-[calc(100vh-4rem)] border-r border-gray-700 overflow-y-auto pt-2 pb-10 w-64">
                        <div class="px-4 space-y-6">
                            <div class="space-y-1">
                                <a href="/admin-dash"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-tachometer-alt mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                    Dashboard
                                </a>
                                <a href="/user-management"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-white group border-l-4 bg-[#28282898] border-[#ffffff]">
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
                                <form action="/logout" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button><i class="fas fa-sign-out-alt"></i>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside>

                <main class="flex-grow min-w-0 relative rounded-lg p-4 md:p-6">
                    <div class="mb-6">
                        <h1 class="text-2xl font-semibold text-white mb-1">User management</h1>
                        <p class="text-sm text-gray-400">Manage your team members and their account permissions here.
                        </p>
                    </div>

                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 gap-4">
                        <h2 class="text-lg font-medium text-white">All users <span class="text-gray-400">44</span></h2>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <div class="relative flex-grow md:flex-grow-0">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fas fa-search text-sm"></i>
                                </span>
                                <input type="text" placeholder="Search"
                                    class="w-full md:w-64 bg-[#2b2b2b] border border-gray-600 rounded-md pl-10 pr-4 py-2 text-sm text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <button
                                class="flex items-center space-x-2 bg-[#2b2b2b] border border-gray-600 text-gray-300 hover:bg-gray-700 text-sm font-medium py-2 px-3 rounded-md">
                                <i class="fas fa-filter text-xs"></i>
                                <span>Filters</span>
                            </button>
                            <button id="addUserBtn"
                                class="flex items-center space-x-1.5 bg-gray-50 hover:bg-gray-200 text-gray-900 text-sm font-medium py-2 px-3 rounded-md">
                                <i class="fas fa-plus text-xs"></i>
                                <span>Add user</span>
                            </button>
                        </div>
                    </div>

                    <!-- User Table -->
                    <div class="overflow-x-auto h-full">
                        <table class="min-w-full divide-y divide-gray-700 table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-4/12">
                                        User name
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-3/12">
                                        Plan
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-2/12 cursor-pointer hover:text-white">
                                        Pro End <i class="fas fa-arrow-down text-xs ml-1"></i>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-400 w-2/12">
                                        Date added
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 w-1/12">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach(App\Models\User::all() as $user)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 px-3 text-sm">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <span
                                                        class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-500">
                                                        <span class="text-lg font-medium leading-none text-white">
                                                            {{ strtoupper(substr($user->full_name, 0, 1)) }}
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-white">{{ $user->full_name }}</div>
                                                    <div class="text-gray-400">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                @if($user->profile && $user->profile->plan === 'Pro')
                                                    <span class="text-[#f4ff53] text-xs font-medium px-2 py-0.5 rounded-md">
                                                        <i class="fa-solid fa-crown"></i> Pro
                                                    </span>
                                                @else
                                                    <span class="text-xs font-medium px-2 py-0.5 rounded-md">
                                                        Free
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-400">
                                            @if (is_null($user->profile) || $user->profile->plan === 'free')
                                                No Pro Plan
                                            @else
                                                {{ $user->profile->plan_end }}
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-400">
                                            {{ $user->created_at->format('M d, Y') }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 relative">
                                            <button onclick="toggleDropdown({{ $user->id }})"
                                                class="text-gray-400 hover:text-white">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div id="mod{{ $user->id }}"
                                                class="hidden absolute top-8 right-0 w-40 bg-white shadow-lg rounded-md p-2 z-50">
                                                <button class="text-gray-600 hover:text-black block w-full mb-2">
                                                    <i class="fas fa-edit mr-2"></i> Update Plan
                                                </button>
                                                <form action="/deleteuser/{{ $user->id }}" method="POST"
                                                    class="text-gray-600 hover:text-red-500 block w-full">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit">
                                                        <i class="fas fa-trash-alt mr-2"></i> Delete Account
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <script>
                                            function toggleDropdown(userId) {
                                                const modal = document.getElementById('mod' + userId);
                                                document.querySelectorAll('[id^="mod"]').forEach(el => {
                                                    if (el.id !== 'mod' + userId) {
                                                        el.classList.add('hidden');
                                                    }
                                                });
                                                modal.classList.toggle('hidden');
                                            }

                                            document.addEventListener('click', function (e) {
                                                const dropdowns = document.querySelectorAll('[id^="mod"]');
                                                dropdowns.forEach(drop => {
                                                    if (!drop.contains(e.target) && !e.target.closest('button[onclick^="toggleDropdown"]')) {
                                                        drop.classList.add('hidden');
                                                    }
                                                });
                                            });
                                        </script>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden overlay-enter"></div>

                    <div id="addUserModal"
                        class="fixed top-0 right-0 h-full w-96 bg-[#1a1a1a] text-gray-300 shadow-lg p-6 transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">
                        <div class="flex justify-between items-center mb-6 mt-36">
                            <h2 class="text-xl font-semibold text-white">Add New User</h2>
                            <button id="closeModalBtn" class="text-gray-400 hover:text-white">
                            </button>
                        </div>

                        <form action="/createuser" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-400 mb-1">User
                                    Name</label>
                                <input type="text" id="full_name" name="full_name" placeholder="Enter Full name"
                                    class="w-full bg-[#2b2b2b] border border-gray-600 rounded-md px-3 py-2 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email
                                    Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter email address"
                                    class="w-full bg-[#2b2b2b] border border-gray-600 rounded-md px-3 py-2 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="pt-4 flex justify-end space-x-3">
                                <button type="button" id="cancelModalBtn"
                                    class="bg-[#2b2b2b] border border-gray-600 text-gray-300 hover:bg-gray-700 text-sm font-medium py-2 px-4 rounded-md">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="bg-gray-50 hover:bg-gray-200 text-gray-900 text-sm font-medium py-2 px-4 rounded-md">
                                    Save User
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

    </div>

    <script>
        const addUserBtn = document.getElementById('addUserBtn');
        const addUserModal = document.getElementById('addUserModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const modalOverlay = document.getElementById('modalOverlay');

        function openModal() {
            modalOverlay.classList.remove('hidden');
            requestAnimationFrame(() => {
                modalOverlay.classList.remove('overlay-enter', 'overlay-leave-active');
                modalOverlay.classList.add('overlay-enter-active');

                addUserModal.classList.remove('translate-x-full');
                addUserModal.classList.add('modal-enter-active'); // Add this class
                addUserModal.classList.remove('modal-leave-active'); // Ensure leave is removed
            });
        }

        function closeModal() {
            modalOverlay.classList.remove('overlay-enter-active');
            modalOverlay.classList.add('overlay-leave-active');

            addUserModal.classList.remove('modal-enter-active');
            addUserModal.classList.add('modal-leave-active');
            setTimeout(() => {
                modalOverlay.classList.add('hidden');
                addUserModal.classList.add('translate-x-full');
                addUserModal.classList.remove('modal-leave-active');
            }, 300);
        }

        addUserBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        cancelModalBtn.addEventListener('click', closeModal);
        modalOverlay.addEventListener('click', closeModal);

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !addUserModal.classList.contains('translate-x-full')) {
                closeModal();
            }
        });

    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo AI - Support</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #242424;
            font-family: 'Poppins', sans-serif;
            color: #e2e2e2;
        }

        .form-input {
            background-color: #333333;
            border: 1px solid #444444;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #5e72e4;
            box-shadow: 0 0 0 2px rgba(94, 114, 228, 0.3);
        }

        .submit-btn {
            background: linear-gradient(135deg, #5e72e4 0%, #825ee4 100%);
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .file-drop-area {
            border: 2px dashed #444444;
            transition: all 0.3s ease;
        }

        .file-drop-area:hover {
            border-color: #5e72e4;
        }

        #alert-message {
            padding: 15px;
            margin: 10px;
            border-radius: 8px;
            font-weight: bold;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>

<body>
    <aside id="sidebar"
        class="fixed max-[1080px]:hidden left-0 top-0 h-full z-50 bg-[#1e1e1e] flex flex-col py-6 transition-all duration-300 w-16">
        <div class="flex items-center justify-between px-3 mb-4">
            <button id="menu-toggle"
                class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors">
                <span class="material-symbols-rounded">menu</span>
            </button>
            <button id="collapse-btn"
                class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors opacity-0 scale-0 transition-all duration-300 absolute right-3">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
        </div>

        <a href="/" class="sidebar-item w-full h-10 mb-12 flex items-center px-3">
            <span
                class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                <span class="material-symbols-rounded">home</span>
            </span>
            <span
                class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Home</span>
        </a>

        <div class="flex flex-col items-center gap-4 mt-auto mb-auto w-full">
            <a href="/chat" class="sidebar-item w-full h-10 flex items-center px-3">
                <span
                    class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                    <span class="material-symbols-rounded">chat</span>
                </span>
                <span
                    class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Chat</span>
            </a>

            <a href="/support" class="sidebar-item w-full h-10 flex items-center px-3">
                <span
                    class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                    <span class="material-symbols-rounded">help</span>
                </span>
                <span
                    class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Support</span>
            </a>

            <button class="sidebar-item w-full h-10 flex items-center px-3">
                <span
                    class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                    <span class="material-symbols-rounded">history</span>
                </span>
                <span
                    class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">History</span>
            </button>
        </div>
        <a href="/settings" class="sidebar-item w-full h-10 mt-auto flex items-center px-3">
            <span
                class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                <span class="material-symbols-rounded">settings</span>
            </span>
            <span
                class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Settings</span>
        </a>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menu-toggle');
            const collapseBtn = document.getElementById('collapse-btn');
            const textElements = document.querySelectorAll('.sidebar-item span:nth-child(2)');

            let isExpanded = false;

            function toggleSidebar() {
                isExpanded = !isExpanded;

                if (isExpanded) {
                    sidebar.style.width = '200px';
                    collapseBtn.style.opacity = '1';
                    collapseBtn.style.scale = '1';

                    textElements.forEach(element => {
                        element.style.opacity = '1';
                    });
                } else {
                    sidebar.style.width = '64px';
                    collapseBtn.style.opacity = '0';
                    collapseBtn.style.scale = '0';

                    textElements.forEach(element => {
                        element.style.opacity = '0';
                    });
                }
            }

            menuToggle.addEventListener('click', toggleSidebar);
            collapseBtn.addEventListener('click', toggleSidebar);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div id="alert-message" class="hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>

    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full rounded-xl shadow-xl overflow-hidden">
            <div>
                <div class="text-center mb-8">
                    <h1 class="text-5xl font-bold text-white mb-2">Cosmo AI Support</h1>
                    <p class="text-gray-400">We're here to help with any issues you're experiencing</p>
                </div>

                <form action="/support" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="problem" class="block text-sm font-medium text-gray-300 mb-2">
                            Describe your problem
                        </label>
                        <input type="text" name="problem" id="problem" required
                            class="form-input w-full px-4 py-3 rounded-lg text-white"
                            placeholder="What issue are you experiencing?">
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Your email address
                        </label>
                        <input type="email" name="email" id="email" required
                            class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="name@example.com">
                    </div>

                    <div class="mb-8">
                        <label for="attachment" class="block text-sm font-medium text-gray-300 mb-2">
                            Attachment (optional)
                        </label>
                        <div class="file-drop-area rounded-lg p-4 text-center">
                            <div class="flex items-center justify-center space-x-2 text-gray-400 mb-2">
                                <i class="fas fa-cloud-upload-alt text-xl"></i>
                                <span>Upload a screenshot or file</span>
                            </div>
                            <input type="file" name="attachment" id="attachment"
                                class="w-full opacity-0 relative inset-0 cursor-pointer">
                            <p class="text-xs text-gray-500">Drag and drop or click to browse</p>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="submit-btn w-full py-3 px-4 rounded-lg text-white font-medium text-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Submit Support Request
                        </button>
                    </div>
                </form>

                <div class="mt-8 w-[110%]">
                    <h2>Your Support Tickets</h2>
                    @foreach (App\Models\Tickets::where('user_id', Auth::user()->id)->get() as $ticket)
                        <div class="bg-[#222222] p-4 rounded-lg mb-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-400">Ticket ID: {{ $ticket->id }}</p>
                                    <p class="text-sm text-gray-400">Subject: {{ $ticket->problem }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Created: {{ $ticket->created_at }}</p>
                                    <p class="text-sm text-gray-400">Status: {{ $ticket->status }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-400">
                        For urgent issues, contact us directly at
                        <a href="mailto:support@cosmoai.com" class="text-[#5e72e4]">support@cosmoai.com</a>
                    </p>

                    <div class="mt-4 flex justify-center space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-discord"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-[#222222] py-4 px-8 text-center">
                <p class="text-sm text-gray-500">
                    &copy; 2025 Cosmo AI. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('attachment').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const fileArea = e.target.closest('.file-drop-area');
                const fileInfo = document.createElement('p');
                fileInfo.className = 'text-xs text-[#5e72e4] mt-2';
                fileInfo.innerHTML = `Selected: ${fileName}`;

                const previousInfo = fileArea.querySelector('.text-[#5e72e4]');
                if (previousInfo) {
                    previousInfo.remove();
                }

                fileArea.appendChild(fileInfo);
            }
        });
    </script>
</body>

</html>
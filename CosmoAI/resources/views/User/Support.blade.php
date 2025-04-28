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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    </style>
</head>

<body>
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
                            class="form-input w-full px-4 py-3 rounded-lg text-white" 
                            placeholder="name@example.com">
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
        // Display file name when selected
        document.getElementById('attachment').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const fileArea = e.target.closest('.file-drop-area');
                const fileInfo = document.createElement('p');
                fileInfo.className = 'text-xs text-[#5e72e4] mt-2';
                fileInfo.innerHTML = `Selected: ${fileName}`;
                
                // Remove previous file info if exists
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
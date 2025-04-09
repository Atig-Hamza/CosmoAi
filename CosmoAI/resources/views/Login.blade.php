<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo-Login</title>
    <meta name="description"
        content="Cosmo-Home is the official website of the Cosmo-Login project, a simple web interface to manage login credentials for your astronomical observatory.">
    <link rel="shortcut icon" href="../images/favicon/favicon-32x32.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        :root {
            --primary-color: #070eff;
            --text-color: #333333;
            --bg-dark: #1a1a1a;
            --transition-speed: 0.3s;
        }

        html,
        body {
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-color);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .break-inside {
            -moz-column-break-inside: avoid;
            break-inside: avoid;
        }

        body {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.5;
        }

        /* Typing Effect */
        .cursor {
            display: inline-block;
            width: 2px;
            height: 1em;
            background-color: var(--primary-color);
            margin-left: 2px;
            animation: blink 1s infinite;
            vertical-align: text-bottom;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .typing-effect {
            overflow: hidden;
            display: inline-block;
            vertical-align: bottom;
        }

        .fixed-text {
            color: var(--text-color);
            font-weight: 700;
        }

        .changing-text {
            color: var(--primary-color);
            font-weight: 700;
        }

        /* Button Hover Effects */
        .btn-hover {
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
        }

        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(7, 14, 255, 0.15);
        }

        .btn-hover:active {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(7, 14, 255, 0.1);
        }

        .btn-hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.1);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform var(--transition-speed) ease;
            z-index: 1;
        }

        .btn-hover:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* Layout Adjustments */
        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
            }

            .left-side,
            .right-side {
                width: 100% !important;
                min-height: 50vh;
            }
        }

        .left-side {
            width: 60%;
            background-color: var(--bg-dark);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .left-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #121212;
            z-index: 0;
        }

        .left-side>* {
            position: relative;
            z-index: 1;
        }

        .right-side {
            width: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: white;
            box-shadow: inset 5px 0 15px rgba(0, 0, 0, 0.05);
        }

        .text-container {
            max-width: 90%;
        }

        .input-field {
            transition: all var(--transition-speed) ease;
            border: 2px solid #e1e1e1;
        }

        .input-field:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(7, 14, 255, 0.1);
        }

        .logo-circle {
            background: linear-gradient(135deg, #070eff 0%, #5d63ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1rem;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e1e1e1;
        }

        .divider span {
            margin: 0 10px;
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex flex-container min-h-screen">
        <div class="left-side max-lg:hidden">
            <div class="flex items-center justify-start space-x-3">
                <a href="/"
                    class="font-medium text-xl text-white hover:text-blue-200 transition-colors">Cosmo AI</a>
            </div>
            <div class="space-y-6 text-container">
                <h1 class="text-2xl md:text-2xl lg:text-3xl xl:text-4xl font-extrabold leading-tight">
                    <span class="fixed-text text-white">Welcome to Cosmo AI:</span><br />
                    <span id="welcome-text" class="typing-effect changing-text text-gray-100 text-5xl"></span>
                    <span class="cursor"></span>
                </h1>
                <p class="text-lg text-gray-300 mb-6">Your personal gateway to the universe of artificial intelligence.
                    Discover advanced tools and insights that will transform your workflow.</p>
                <button
                    class="inline-block flex-none px-6 py-3 border-2 rounded-lg font-medium bg-gray-900 text-white hover:bg-white hover:text-gray-900 transition duration-300 ease-in-out">
                    Create your account
                </button>
            </div>
            <p class="font-medium text-gray-400">© 2025 Cosmo AI</p>
        </div>

        <div class="right-side max-lg:w-full max-lg:h-full max-lg:m-auto">
            <div class="flex flex-col justify-center space-y-6 w-full max-w-md px-4">
                <div class="flex flex-col space-y-3 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Login to Cosmo AI</h2>
                    <p class="text-md md:text-xl text-gray-600">Log in or sign up to unlock the power of AI.</p>
                </div>
                <div class="flex flex-col max-w-md space-y-5 w-full">
                    <input type="text" placeholder="Username"
                        class="input-field flex px-4 py-3 rounded-lg font-medium placeholder:font-normal placeholder:text-gray-400 focus:outline-none" />
                    <input type="password" placeholder="Password"
                        class="input-field flex px-4 py-3 rounded-lg font-medium placeholder:font-normal placeholder:text-gray-400 focus:outline-none" />
                    <button
                        class="flex items-center justify-center flex-none px-4 py-3 rounded-lg font-medium bg-blue-600 hover:bg-blue-700 text-white btn-hover">
                        Log In
                    </button>
                    <div class="divider">
                        <span>Or</span>
                    </div>
                    <button
                        class="flex items-center justify-center flex-none px-4 py-3 border rounded-lg font-medium border-gray-300 bg-white text-gray-800 relative btn-hover hover:bg-gray-50">
                        <span class="absolute left-4">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path fill="#EA4335"
                                    d="M5.26620003,9.76452941 C6.19878754,6.93863203 8.85444915,4.90909091 12,4.90909091 C13.6909091,4.90909091 15.2181818,5.50909091 16.4181818,6.49090909 L19.9090909,3 C17.7818182,1.14545455 15.0545455,0 12,0 C7.27006974,0 3.1977497,2.69829785 1.23999023,6.65002441 L5.26620003,9.76452941 Z" />
                                <path fill="#34A853"
                                    d="M16.0407269,18.0125889 C14.9509167,18.7163016 13.5660892,19.0909091 12,19.0909091 C8.86648613,19.0909091 6.21911939,17.076871 5.27698177,14.2678769 L1.23746264,17.3349879 C3.19279051,21.2936293 7.26500293,24 12,24 C14.9328362,24 17.7353462,22.9573905 19.834192,20.9995801 L16.0407269,18.0125889 Z" />
                                <path fill="#4A90E2"
                                    d="M19.834192,20.9995801 C22.0291676,18.9520994 23.4545455,15.903663 23.4545455,12 C23.4545455,11.2909091 23.3454545,10.5272727 23.1818182,9.81818182 L12,9.81818182 L12,14.4545455 L18.4363636,14.4545455 C18.1187732,16.013626 17.2662994,17.2212117 16.0407269,18.0125889 L19.834192,20.9995801 Z" />
                                <path fill="#FBBC05"
                                    d="M5.27698177,14.2678769 C5.03832634,13.556323 4.90909091,12.7937589 4.90909091,12 C4.90909091,11.2182781 5.03443647,10.4668121 5.26620003,9.76452941 L1.23999023,6.65002441 C0.43658717,8.26043162 0,10.0753848 0,12 C0,13.9195484 0.444780743,15.7301709 1.23746264,17.3349879 L5.27698177,14.2678769 Z" />
                            </svg>
                        </span>
                        <span class="ml-6">Sign in with Google</span>
                    </button>
                    <div class="text-center mt-4">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Forgot password?</a>
                        <p class="text-gray-600 mt-4">Don't have an account? <a href="#"
                                class="text-blue-600 hover:text-blue-800 font-medium">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const sentences = [
            "Your Intelligent Assistant",
            "Explore the future of AI",
            "Discover new possibilities",
            "Revolutionize your productivity",
            "Empower your daily workflow",
            "Unlock smart solutions",
            "Innovate with intelligence",
            "Simplify complex tasks",
            "Experience seamless assistance"
        ];

        let currentIndex = 0;
        const welcomeTextElement = document.getElementById('welcome-text');
        const cursor = document.querySelector('.cursor');

        const typeText = (element, text, speed = 70) => {
            let i = 0;
            element.textContent = '';
            const typingInterval = setInterval(() => {
                if (i < text.length) {
                    element.textContent += text.charAt(i);
                    i++;
                } else {
                    clearInterval(typingInterval);
                    setTimeout(() => deleteText(element, speed), 2000);
                }
            }, speed);
        };

        const deleteText = (element, speed = 40) => {
            let text = element.textContent;
            const deletingInterval = setInterval(() => {
                if (text.length > 0) {
                    text = text.slice(0, -1);
                    element.textContent = text;
                } else {
                    clearInterval(deletingInterval);
                    currentIndex = (currentIndex + 1) % sentences.length;
                    setTimeout(() => typeText(element, sentences[currentIndex]), 500);
                }
            }, speed);
        };

        typeText(welcomeTextElement, sentences[currentIndex], 70);
    </script>
</body>

</html>
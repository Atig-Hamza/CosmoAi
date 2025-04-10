<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/commonmark@0.29.0/dist/commonmark.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    @vite(['resources/js/handler.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            /* Dark mode colors */
            --text-color: #e3e3e3;
            --subheading-color: #828282;
            --placeholder-color: #a6a6a6;
            --primary-color: #242424;
            --secondary-color: #383838;
            --secondary-hover-color: #444;
        }

        .light-mode {
            /* Light mode colors */
            --text-color: #222;
            --subheading-color: #a0a0a0;
            --placeholder-color: #6c6c6c;
            --primary-color: #fff;
            --secondary-color: #e9eef6;
            --secondary-hover-color: #dbe1ea;
        }

        body {
            background: var(--primary-color);
            color: var(--text-color);
        }

        .title {
            background: linear-gradient(to right, #4285f4, #d96570);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .suggestion-list,
        .trends-container {
            scrollbar-width: none;
        }

        .suggestion-list::-webkit-scrollbar,
        .trends-container::-webkit-scrollbar {
            display: none;
        }

        .loading .avatar {
            animation: rotate 3s linear infinite;
        }

        .trend-item {
            transition: all 0.2s ease;
        }

        .trend-item:hover {
            background-color: var(--secondary-hover-color);
        }

        .sug-item {
            transition: all 0.2s ease;
        }

        .sug-item:hover {
            background-color: var(--secondary-hover-color);
        }
    </style>
</head>

<body class="bg-[#242424]">
    <aside id="sidebar"
        class="fixed max-[1080px]:hidden left-0 top-0 h-full bg-[#1e1e1e] flex flex-col py-6 z-10 transition-all duration-300 w-16">
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

        <button class="sidebar-item w-full h-10 mb-12 flex items-center px-3">
            <span
                class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                <span class="material-symbols-rounded">home</span>
            </span>
            <span
                class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Home</span>
        </button>

        <div class="flex flex-col items-center gap-4 mt-auto mb-auto w-full">
            <button class="sidebar-item w-full h-10 flex items-center px-3">
                <span
                    class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                    <span class="material-symbols-rounded">chat</span>
                </span>
                <span
                    class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Chat</span>
            </button>

            <button class="sidebar-item w-full h-10 flex items-center px-3">
                <span
                    class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                    <span class="material-symbols-rounded">bookmark</span>
                </span>
                <span
                    class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Bookmarks</span>
            </button>

            <button class="sidebar-item w-full h-10 flex items-center px-3">
                <span
                    class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                    <span class="material-symbols-rounded">history</span>
                </span>
                <span
                    class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">History</span>
            </button>
        </div>
        <button class="sidebar-item w-full h-10 mt-auto flex items-center px-3">
            <span
                class="w-10 h-10 rounded-full bg-[#383838] flex items-center justify-center text-[#e3e3e3] hover:bg-[#444] transition-colors flex-shrink-0">
                <span class="material-symbols-rounded">settings</span>
            </span>
            <span
                class="ml-3 text-[#e3e3e3] font-medium whitespace-nowrap opacity-0 transition-opacity duration-300">Settings</span>
        </button>
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
    <header class="header max-w-4xl mx-auto mt-14 px-4">
        <h1 class="title text-5xl font-medium leading-16 max-[1080px]:text-4xl max-[800px]:text-3xl">Hello, there</h1>
        <p class="subtitle text-4xl font-medium leading-16 text-subheading max-[1080px]:text-3xl max-[800px]:text-2xl">How can I help you today?</p>

        <!-- Trends -->
        <div class="mt-6">
            <h3 class="text-xl font-medium mb-3 max-[1080px]:text-lg max-[800px]:text-md">Today's Trends</h3>

            <div class="relative">
                <div class="trends-container flex gap-3 overflow-x-auto pb-2 z-10 relative" id="trendsContainer">
                    <!-- Trends will be added here dynamically -->
                </div>

                <div
                    class="left-fade-effect-trends pointer-events-none absolute left-0 top-0 h-full w-16 bg-gradient-to-r from-[#242424] to-transparent z-20 transition-opacity duration-300 opacity-100">
                </div>
                <div
                    class="right-fade-effect-trends pointer-events-none absolute right-0 top-0 h-full w-16 bg-gradient-to-l from-[#242424] to-transparent z-20 transition-opacity duration-300 opacity-100">
                </div>
            </div>
        </div>

        <script>
            fetch('https://newsapi.org/v2/top-headlines?country=us&pageSize=10&apiKey=48b89a739f84441f898c9f874e9097f8')
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('trendsContainer');
                    container.innerHTML = '';

                    data.articles.forEach(article => {
                        if (!article.urlToImage || !article.urlToImage.startsWith('http')) return;

                        const title = article.title.length > 40 ? article.title.slice(0, 37) + '...' : article.title;

                        const trendHTML = `
                        <div class="cursor-pointer trend-item flex-shrink-0 w-64 h-16 rounded-lg overflow-hidden bg-[#383838] flex">
                            <div class="h-16 w-16 overflow-hidden flex-shrink-0">
                                <img src="${article.urlToImage}" alt="${title}" class="w-full h-full object-cover" />
                            </div>
                            <div class="p-2 flex flex-col justify-center">
                                <h4 class="font-medium text-sm leading-tight">${title}</h4>
                            </div>
                        </div>
                        `;

                        container.innerHTML += trendHTML;
                    });

                    updateTrendFades();
                })
                .catch(err => {
                    console.error('Failed to fetch trends:', err);
                });

            const trendContainer = document.getElementById('trendsContainer');
            const fadeLeft = document.querySelector('.left-fade-effect-trends');
            const fadeRight = document.querySelector('.right-fade-effect-trends');

            const updateTrendFades = () => {
                const scrollLeft = trendContainer.scrollLeft;
                const maxScroll = trendContainer.scrollWidth - trendContainer.clientWidth;

                fadeLeft.style.opacity = scrollLeft > 0 ? '1' : '0';
                fadeRight.style.opacity = scrollLeft < maxScroll - 1 ? '1' : '0';
            };

            trendContainer.addEventListener('scroll', updateTrendFades);
            window.addEventListener('load', updateTrendFades);
        </script>

        <!-- Suggestions -->
        <div class="mask-alpha mask-r-from-black mask-r-from-50% mask-r-to-transparent mt-4">
            <h3 class="text-xl font-medium mb-3">Suggestions</h3>

            <div class="relative">
                <ul
                    class="suggestion-list flex gap-5 overflow-x-auto overflow-y-hidden scroll-snap-type-x mandatory relative z-10">
                    <li
                        class="sug-item cursor-pointer p-5 w-56 flex-shrink-0 flex flex-col items-end justify-between rounded-xl bg-[#383838] transition-colors duration-200 hover:bg-[#444]-hover">
                        <h4 class="text text-text-color font-normal">
                            Can you help me plan a budget-friendly game night for 6 people?
                        </h4>
                        <span
                            class="icon material-symbols-rounded w-10 h-10 flex text-xl items-center justify-center rounded-full bg-primary mt-10 text-text-color">draw</span>
                    </li>

                    <li
                        class="sug-item cursor-pointer p-5 w-56 flex-shrink-0 flex flex-col items-end justify-between rounded-xl bg-[#383838] transition-colors duration-200 hover:bg-[#444]-hover">
                        <h4 class="text text-text-color font-normal">
                            Want to conquer stage fright and become a confident public speaker? I've got you covered!
                        </h4>
                        <span
                            class="icon material-symbols-rounded w-10 h-10 flex text-xl items-center justify-center rounded-full bg-primary mt-10 text-text-color">lightbulb</span>
                    </li>

                    <li
                        class="sug-item cursor-pointer p-5 w-56 flex-shrink-0 flex flex-col items-end justify-between rounded-xl bg-[#383838] transition-colors duration-200 hover:bg-[#444]-hover">
                        <h4 class="text text-text-color font-normal">
                            Keep me up-to-date on the latest web development trends and news.
                        </h4>
                        <span
                            class="icon material-symbols-rounded w-10 h-10 flex text-xl items-center justify-center rounded-full bg-primary mt-10 text-text-color">explore</span>
                    </li>

                    <li
                        class="sug-item cursor-pointer p-5 w-56 flex-shrink-0 flex flex-col items-end justify-between rounded-xl bg-[#383838] transition-colors duration-200 hover:bg-[#444]-hover">
                        <h4 class="text text-text-color font-normal">
                            Write a Python function to calculate the factorial of a number.
                        </h4>
                        <span
                            class="icon material-symbols-rounded w-10 h-10 flex text-xl items-center justify-center rounded-full bg-primary mt-10 text-text-color">code</span>
                    </li>
                </ul>

                <div
                    class="left-fade-effect pointer-events-none absolute left-0 top-0 h-full w-16 bg-gradient-to-r from-[#242424] to-transparent z-20 transition-opacity duration-300 opacity-100">
                </div>
                <div
                    class="right-fade-effect pointer-events-none absolute right-0 top-0 h-full w-16 bg-gradient-to-l from-[#242424] to-transparent z-20 transition-opacity duration-300 opacity-100">
                </div>
            </div>

            <script>
                const suggestionsList = document.querySelector('.suggestion-list');
                const fadeEffectLeft = document.querySelector('.left-fade-effect');
                const fadeEffectRight = document.querySelector('.right-fade-effect');

                const updateFade = () => {
                    const scrollLeft = suggestionsList.scrollLeft;
                    const maxScroll = suggestionsList.scrollWidth - suggestionsList.clientWidth;

                    fadeEffectLeft.style.opacity = scrollLeft > 0 ? '1' : '0';
                    fadeEffectRight.style.opacity = scrollLeft < maxScroll - 1 ? '1' : '0';
                };

                suggestionsList.addEventListener('scroll', updateFade);
                window.addEventListener('load', updateFade);
            </script>
        </div>
    </header>

    <!-- Chat List / Container -->
    <div class="chat-list max-w-4xl mx-auto p-8 pb-12 h-[80%] mb-[90px] overflow-y-auto"></div>

    <!-- Typing Area -->
    <div class="bg-[#242424] typing-area fixed w-full left-0 bottom-0 p-4 bg-primary z-30">
        <form action="#" class="typing-form max-w-4xl mx-auto">
            <div class="input-wrapper w-full min-h-14 max-md:min-h-10 flex relative">
                <div class="feature-buttons absolute left-3 top-2 flex gap-2">
                    <button
                        class="websearch feature-button flex items-center max-md:h-8 max-md:w-8 justify-center rounded-full bg-[#383838] h-10 w-10 text-text-color hover:bg-[#444] transition-colors duration-200">
                        <i class="fas fa-search text-sm"></i>
                    </button>
                    <button
                        class="DeepThink feature-button flex items-center max-md:h-8 max-md:w-8 justify-center rounded-full bg-[#383838] h-10 w-10 text-text-color hover:bg-[#444] transition-colors duration-200">
                        <i class="fas fa-brain text-sm"></i>
                    </button>
                </div>
    
                <textarea
                    placeholder="Enter a prompt here"
                    class="typing-input w-full border-none outline-none resize-none text-base max-md:text-xs text-text-color pl-36 pr-14 py-4 rounded-3xl bg-[#383838] max-h-52 overflow-y-auto"
                    rows="1"
                    required></textarea>
    
                <button id="send-message-button"
                    class="absolute right-2 top-2 max-md:h-8 max-md:w-8 outline-none border-none bg-transparent w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full text-text-color text-xl hover:bg-[#444] transition-colors duration-200">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
    
            <p class="disclaimer-text text-center text-xs mt-3 max-[390px]:hidden text-placeholder-color max-[800px]:text-[8px]">
                Cosmo AI values your privacy and security. All communication between you and Cosmo AI is encrypted and
                secure. We do not store any user data, and all messages are deleted after 30 days.
            </p>
        </form>
    </div>
    
    <script>
        const textarea = document.querySelector('.typing-input');
        const trends = document.querySelector('.trends-container');
        const sug = document.querySelector('.suggestion-list');
    
        textarea.addEventListener('input', () => {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        });
    
        textarea.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.shiftKey && e.key === 'Enter') {
                e.preventDefault();
                const cursorPos = textarea.selectionStart;
                const value = textarea.value;
                textarea.value = value.slice(0, cursorPos) + '\n' + value.slice(cursorPos);
                textarea.dispatchEvent(new Event('input'));
                textarea.selectionStart = textarea.selectionEnd = cursorPos + 1;
            }
        });

        trends.addEventListener('click', (event) => {
            const clickedTrend = event.target.closest('.trend-item');
            if (!clickedTrend) return;

            const imageElement = clickedTrend.querySelector('img');
            const titleElement = clickedTrend.querySelector('h4');
            if (!imageElement || !titleElement) return;

            const imageUrl = imageElement.src;
            const titleText = titleElement.textContent;

            const chatList = document.querySelector('.chat-list');
            const imageContainer = document.createElement('div');
            imageContainer.classList.add('image-container', 'right-4', 'top-4');
            const image = document.createElement('img');
            image.classList.add('rounded-lg');
            image.src = imageUrl;

            const textarea = document.querySelector('.typing-input');
            if (!textarea) return;

            textarea.value = `Explain this trend: ${titleText}`;
            textarea.dispatchEvent(new Event('input'));

            document.getElementById('send-message-button').click();
            imageContainer.appendChild(image);

            chatList.appendChild(imageContainer);
        });

        sug.addEventListener('click', (e)=>{
            const clickedSug = e.target.closest('.sug-item');
            if (!clickedSug) return;

            const textarea = document.querySelector('.typing-input');
            if (!textarea) return;

            const sugText = clickedSug.querySelector('h4').textContent;
            textarea.value = sugText;
            textarea.dispatchEvent(new Event('input'));

            document.getElementById('send-message-button').click();
        })
        
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - User Overview</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-bg': '#242424',
                        'primary-text': '#e3e3e3',
                        'secondary-text': '#a0a0a0',
                        'subtle-bg': '#2d2d2d',
                        'border-color': '#4a4a4a',
                        'hover-bg': '#3f3f3f',
                        'active-tab-border': '#3b82f6',
                        'button-text': '#c0c0c0',
                        'button-hover-text': '#ffffff',
                        'button-hover-bg': '#383838',
                        'link-color': '#60a5fa',
                        'link-hover-color': '#93c5fd',
                        'button-danger-bg': '#b91c1c',
                        'button-danger-hover': '#991b1b',
                        'avatar-border': '#5a5a5a',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: "Segoe UI Variable", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2d2d2d;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #5a5a5a;
            border-radius: 4px;
            border: 2px solid #2d2d2d;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #8a8a8a;
        }

        .action-icon {
            width: 1em;
            height: 1em;
            display: inline-block;
            vertical-align: -0.125em;
        }
    </style>
</head>

<body class="bg-primary-bg text-primary-text font-sans min-h-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <header class="flex justify-between items-start mb-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">
                    Your Profile
                </h1>
                <p class="text-sm text-secondary-text">
                    User account settings
                </p>
            </div>
            <a href="/chat"
                class="text-secondary-text hover:text-primary-text transition-colors duration-150 ease-in-out p-1.5 rounded-full hover:bg-hover-bg mt-1 -mr-1"
                aria-label="Close Settings" title="Close Settings">
                <i class="fa-solid fa-xmark fa-lg action-icon"></i>
            </a>
        </header>
        <nav class="flex space-x-1 sm:space-x-2 border-b border-border-color mb-6">
            <a href="/settings"
                class="px-3 py-2 text-sm font-medium text-secondary-text hover:text-primary-text border-b-2 border-transparent hover:border-gray-500 whitespace-nowrap transition-colors duration-150 ease-in-out"
                aria-current="page">
                Overview
            </a>
            <a href="/plan"
                class="px-3 py-2 text-sm font-medium text-white border-b-2 border-active-tab-border whitespace-nowrap">
                Upgrade Plan
            </a>
        </nav>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <main class="space-y-8">
            <section class="bg-subtle-bg p-5 rounded-md">
                <h2 class="text-lg font-semibold text-white mb-2">Subscription Plans</h2>
                <p class="text-sm text-secondary-text mb-6">Choose the plan that best fits your needs.</p>

                <div class="flex justify-center mb-8">
                    <div class="inline-flex rounded-md shadow-sm bg-[#3a3a3a] p-1" role="group">
                        <button type="button" id="monthlyBtn" aria-pressed="true"
                            class="px-4 py-1.5 text-sm font-medium text-primary-text bg-hover-bg border border-border-color rounded-l-md focus:z-10 focus:ring-2 focus:ring-offset-2 focus:ring-offset-subtle-bg focus:ring-active-tab-border transition-colors duration-150 ease-in-out">
                            Monthly
                        </button>
                        <button type="button" id="annualBtn" aria-pressed="false"
                            class="px-4 py-1.5 text-sm font-medium text-secondary-text bg-transparent hover:bg-hover-bg hover:text-primary-text border border-border-color border-l-0 rounded-r-md focus:z-10 focus:ring-2 focus:ring-offset-2 focus:ring-offset-subtle-bg focus:ring-active-tab-border transition-colors duration-150 ease-in-out">
                            Annual <span class="text-xs text-green-400">(Save ~16%)</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
                    <div
                        class="border border-border-color rounded-lg p-6 flex flex-col transition-shadow hover:shadow-lg">
                        <h3 class="text-xl font-semibold text-white mb-1">Free</h3>
                        <p class="text-sm text-secondary-text mb-4 h-10">Basic features for individuals starting out.
                        </p>
                        <div class="my-4">
                            <span class="text-4xl font-bold text-white">$<span class="plan-price-amount"
                                    data-monthly-price="0" data-annual-price="0">0</span></span>
                            <span class="text-sm font-medium text-secondary-text plan-price-freq"
                                data-monthly-freq="/month" data-annual-freq="/year">/month</span>
                        </div>
                        <ul class="space-y-3 text-sm text-primary-text flex-grow mb-6">
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Standard Chat Access
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Basic AI Debate Access
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Community Support
                            </li>
                        </ul>
                        <button type="button"
                            class="mt-auto w-full px-4 py-2 bg-button-secondary-bg border border-input-border text-sm font-medium rounded-md text-gray-300 hover:bg-button-secondary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-subtle-bg focus:ring-active-tab-border transition-colors">
                            Current Plan
                        </button>
                    </div>

                    <form action="{{ route('payment.checkout') }}" method="POST"
                        class="border-2 border-active-tab-border rounded-lg p-6 flex flex-col relative transition-shadow hover:shadow-xl">
                        @csrf
                        <input type="hidden" name="amount" value="{{ \App\Models\Plans::where('name', 'Pro Creator')->first()->price }}">
                        <span
                            class="absolute top-0 right-0 mr-4 -mt-3 inline-block px-3 py-1 bg-active-tab-border text-white text-xs font-semibold rounded-full">Recommended</span>
                        <h3 class="text-xl font-semibold text-white mb-1">Pro</h3>
                        <p class="text-sm text-secondary-text mb-4 h-10">Advanced features for professionals and small
                            teams.</p>
                        <div class="my-4">
                            <span class="text-4xl font-bold text-white">$<span class="plan-price-amount"
                                    data-monthly-price="{{ \App\Models\Plans::where('name', 'Pro Creator')->first()->price }}" data-annual-price="{{ \App\Models\Plans::where('name', 'Pro Creator')->first()->price * 10 }}">{{ \App\Models\Plans::where('name', 'Pro Creator')->first()->price }}</span></span>
                            <span class="text-sm font-medium text-secondary-text plan-price-freq"
                                data-monthly-freq="/month" data-annual-freq="/year">/month</span>
                        </div>
                        <ul class="space-y-3 text-sm text-primary-text flex-grow mb-6">
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Advanced Chat Features
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> High Volume Image Generations
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Voice & Video Chat Enabled
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Priority Access
                            </li>
                        </ul>
                        <button type="submit"
                            class="mt-auto w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-subtle-bg focus:ring-active-tab-border">
                            Upgrade to Pro
                        </button>
                    </form>

                    <div
                        class="border border-border-color rounded-lg p-6 flex flex-col transition-shadow hover:shadow-lg">
                        <h3 class="text-xl font-semibold text-white mb-1">Enterprise</h3>
                        <p class="text-sm text-secondary-text mb-4 h-10">Comprehensive solutions for large
                            organizations.</p>
                        <div class="my-4">
                            <span class="text-4xl font-bold text-white"><span class="plan-price-amount"
                                    data-monthly-price="Custom" data-annual-price="Custom">Custom</span></span>
                            <span class="text-sm font-medium text-secondary-text plan-price-freq" data-monthly-freq=""
                                data-annual-freq=""></span>
                        </div>
                        <ul class="space-y-3 text-sm text-primary-text flex-grow mb-6">
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Unlimited Users
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> All Pro Features + Set C
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Dedicated Account Manager
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Premium SLA & Support
                            </li>
                            <li class="flex items-center gap-x-3">
                                <i class="fa-solid fa-check text-green-500 fa-fw"></i> Custom Integrations
                            </li>
                        </ul>
                        <button type="button"
                            class="mt-auto w-full px-4 py-2 bg-button-secondary-bg border border-input-border text-sm font-medium rounded-md text-gray-300 hover:bg-button-secondary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-subtle-bg focus:ring-active-tab-border transition-colors">
                            Contact Sales
                        </button>
                    </div>

                </div>
            </section>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const monthlyBtn = document.getElementById('monthlyBtn');
            const annualBtn = document.getElementById('annualBtn');
            const priceAmountElements = document.querySelectorAll('.plan-price-amount');
            const priceFreqElements = document.querySelectorAll('.plan-price-freq');

            function updatePrices(isAnnual) {
                monthlyBtn.setAttribute('aria-pressed', !isAnnual);
                annualBtn.setAttribute('aria-pressed', isAnnual);

                monthlyBtn.classList.toggle('bg-hover-bg', !isAnnual);
                monthlyBtn.classList.toggle('text-primary-text', !isAnnual);
                monthlyBtn.classList.toggle('bg-transparent', isAnnual);
                monthlyBtn.classList.toggle('text-secondary-text', isAnnual);


                annualBtn.classList.toggle('bg-hover-bg', isAnnual);
                annualBtn.classList.toggle('text-primary-text', isAnnual);
                annualBtn.classList.toggle('bg-transparent', !isAnnual);
                annualBtn.classList.toggle('text-secondary-text', !isAnnual);

                priceAmountElements.forEach(el => {
                    const price = isAnnual ? el.dataset.annualPrice : el.dataset.monthlyPrice;
                    if (price.toLowerCase() === 'custom') {
                        el.textContent = price;
                        if (el.previousSibling && el.previousSibling.nodeValue === '$') {
                            el.previousSibling.nodeValue = '';
                        }
                    } else {
                        el.textContent = price;
                        if (el.previousSibling && el.previousSibling.nodeValue !== '$') {
                            el.previousSibling.nodeValue = '$';
                        } else if (!el.previousSibling) {
                            el.insertAdjacentText('beforebegin', '$');
                        }
                    }
                });

                priceFreqElements.forEach(el => {
                    el.textContent = isAnnual ? el.dataset.annualFreq : el.dataset.monthlyFreq;
                });
            }

            monthlyBtn.addEventListener('click', () => updatePrices(false));
            annualBtn.addEventListener('click', () => updatePrices(true));

            updatePrices(annualBtn.getAttribute('aria-pressed') === 'true');
        });
    </script>
</body>

</html>
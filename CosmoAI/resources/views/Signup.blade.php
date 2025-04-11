<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up for Cosmo AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cosmo-bg': '#242424',
                        'cosmo-blue': '#0a66c2',
                        'cosmo-blue-hover': '#004182',
                    }
                }
            }
        }
    </script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        select option {
            color: #e5e7eb;
            background-color: #374151;
        }

        select:required:invalid {
            color: #9ca3af;
        }

        option[value=""][disabled] {
            display: none;
        }

        option {
            color: #e5e7eb;
        }
    </style>
</head>

<body class="bg-cosmo-bg text-gray-200">

    <div class="absolute top-4 left-5">
        <span class="text-xl font-semibold flex flex-row items-center text-white"><img class="w-8 h-8"
                src="{{ asset('images/white.png') }}" alt="">Cosmo</span>
    </div>

    <div class="min-h-screen flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <div>
                <h1 class="text-3xl font-thin text-gray-300 leading-snug mb-8">
                    Create your <br> Cosmo AI account
                </h1>
            </div>

            <form class="space-y-5" action="#" method="POST">
                @csrf
                <div>
                    <label for="full-name" class="block text-base font-medium text-gray-400 mb-1">
                        Full name
                    </label>
                    <input id="full-name" name="full_name" type="text" autocomplete="name" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-bg border border-gray-500 text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150">
                </div>

                <div>
                    <label for="email-address" class="block text-base font-medium text-gray-400 mb-1">
                        Email address
                    </label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-bg border border-gray-500 text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150">
                </div>

                <div>
                    <label for="country" class="block text-base font-medium text-gray-400 mb-1">
                        Country
                    </label>
                    <select id="country" name="country" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-[#212121] border border-gray-500 text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150">
                        <option value="" disabled selected class="text-gray-400">Select your country</option>
                        <script>
                            fetch('https://restcountries.com/v3.1/independent?status=true')
                                .then(response => response.json())
                                .then(data => {
                                    const options = data.sort((a, b) => a.name.common.localeCompare(b.name.common))
                                        .map(country => `<option value="${country.cca2}" class="text-gray-200 bg-[#212121]">${country.name.common}</option>`);
                                    document.querySelector('#country').insertAdjacentHTML('beforeend', options.join(''));

                                    const selectElement = document.querySelector('#country');
                                    selectElement.addEventListener('mousedown', function () {
                                        setTimeout(() => {
                                            const listboxes = document.querySelectorAll('div[role="listbox"]');
                                            if (listboxes.length > 0) {
                                                listboxes.forEach(box => {
                                                    box.style.maxHeight = '100px';
                                                    box.style.overflow = 'auto';
                                                });
                                            }
                                        }, 0);
                                    });
                                });
                        </script>
                    </select>
                </div>

                <div class="relative">
                    <label for="password" class="block text-base font-medium text-gray-400 mb-1">
                        Password
                    </label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 pr-16 bg-cosmo-bg border border-gray-500 text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150">
                    <button type="button" tabindex="-1"
                        class="absolute inset-y-0 right-0 top-8 flex items-center px-4 text-base font-semibold text-blue-400 hover:text-blue-300 focus:outline-none transition-colors duration-150">
                        Show
                    </button>
                </div>

                <div class="relative">
                    <label for="confirm-password" class="block text-base font-medium text-gray-400 mb-1">
                        Confirm Password
                    </label>
                    <input id="confirm-password" name="password_confirmation" type="password"
                        autocomplete="new-password" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 pr-16 bg-cosmo-bg border border-gray-500 text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150">
                    <button type="button" tabindex="-1"
                        class="absolute inset-y-0 right-0 top-8 flex items-center px-4 text-base font-semibold text-blue-400 hover:text-blue-300 focus:outline-none transition-colors duration-150">
                        Show
                    </button>
                </div>

                <div class="pt-3">
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-base font-semibold rounded-full text-white bg-cosmo-blue hover:bg-cosmo-blue-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cosmo-bg focus:ring-cosmo-blue transition-colors duration-150 ease-in-out">
                        Create account
                    </button>
                </div>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-700"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-cosmo-bg text-gray-500">
                        or
                    </span>
                </div>
            </div>

            <div class="space-y-3">
                <button type="button"
                    class="w-full inline-flex justify-center items-center py-2 px-4 border border-gray-400 rounded-full shadow-sm bg-transparent text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cosmo-bg focus:ring-blue-500 transition-colors duration-150 ease-in-out">
                    <svg class="w-5 h-5 mr-2 -ml-1" viewBox="-3 0 262 262" preserveAspectRatio="xMidYMid"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                            fill="#4285F4" />
                        <path
                            d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                            fill="#34A853" />
                        <path
                            d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                            fill="#FBBC05" />
                        <path
                            d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                            fill="#EB4335" />
                    </svg>
                    Sign up with Google
                </button>

                <a href="/login"
                    class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-gray-400 rounded-full shadow-sm bg-transparent text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cosmo-bg focus:ring-blue-500 transition-colors duration-150 ease-in-out">
                    Already have an account? Sign in
                </a>
            </div>

        </div>
    </div>

    <script>
        const togglePassword = (button) => {
            const passwordInput = button.previousElementSibling;
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            button.textContent = type === 'password' ? 'Show' : 'Hide';
        };

        document.querySelectorAll('input[type="password"] + button').forEach(button => {
            button.addEventListener('click', () => togglePassword(button));
        });

        const countrySelect = document.getElementById('country');
        const updateSelectColor = () => {
            if (countrySelect.value === "") {
                countrySelect.classList.add('text-gray-400');
                countrySelect.classList.remove('text-white');
            } else {
                countrySelect.classList.add('text-white');
                countrySelect.classList.remove('text-gray-400');
            }
        };
        countrySelect.addEventListener('change', updateSelectColor);
        updateSelectColor();

    </script>

</body>

</html>
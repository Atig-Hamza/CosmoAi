<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo AI Questionnaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cosmo-bg': '#242424',
                        'cosmo-input-bg': '#303030',
                        'cosmo-border': '#555555',
                        'cosmo-blue': '#0a66c2',
                        'cosmo-blue-hover': '#004182',
                        'cosmo-text-primary': '#e5e7eb',
                        'cosmo-text-secondary': '#9ca3af',
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

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2a2a2a;
        }

        ::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #666;
        }

        input[type="radio"] {
            appearance: none;
            background-color: var(--tw-bg-opacity, 1) bg-cosmo-input-bg;
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 1.15em;
            height: 1.15em;
            border: 1px solid #555555;
            border-radius: 50%;
            transform: translateY(-0.075em);
            display: grid;
            place-content: center;
        }

        input[type="radio"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            border-radius: 50%;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em #0a66c2;
        }

        input[type="radio"]:checked::before {
            transform: scale(1);
        }

        input[type="radio"]:focus {
            outline: 2px solid #0a66c2;
            outline-offset: 2px;
        }
    </style>
</head>

<body class="bg-cosmo-bg text-cosmo-text-primary">

    <div class="absolute top-4 left-5 z-10">
        <span class="text-xl font-semibold flex flex-row items-center text-white"><img class="w-8 h-8 mr-2"
                src="{{ asset('images/white.png') }}" alt="">Cosmo</span>
    </div>

    <div id="promo-modal"
        class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50 transition-opacity duration-300 ease-out hidden opacity-0"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0" aria-hidden="true"></div>
        <div id="modal-content"
            class="relative rounded-lg shadow-2xl overflow-hidden border border-gray-400 transform transition-all sm:max-w-2xl w-full scale-95 opacity-0 flex flex-col sm:flex-row">
            <div class="sm:w-1/2 w-full">
                <img class="object-cover h-full w-full" src="{{ asset('offers/qeust.png') }}"
                    alt="Survey Promotion Image">
            </div>
            <div class="sm:w-1/2 w-full px-6 py-5 border-l border-gray-400 sm:p-8 flex flex-col justify-between bg-[#101010]">
                <div>
                    <div class="flex justify-between items-start">
                        <h3 id="modal-title" class="text-xl font-semibold text-white leading-6">
                            Unlock Your Free Pro Plan!
                        </h3>
                        <button type="button" id="close-modal-btn"
                            class="text-gray-400 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-cosmo-blue rounded-md">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6 absolute top-2 right-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-4 text-base text-gray-300 space-y-3">
                        <p>
                            Answer a few quick questions about your experience, and unlock <strong
                                class="text-white font-semibold">2 full days of Cosmo AI Pro — completely free!</strong>
                        </p>
                        <p>
                            No credit card required. Your feedback directly helps us improve your AI experience.
                        </p>
                    </div>
                </div>
                <div class="mt-6 sm:mt-8">
                    <button type="button" id="close-modal-btn-bottom"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-cosmo-blue text-base font-medium text-white hover:bg-cosmo-blue-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-cosmo-blue sm:text-sm">
                        Got it, let's start!
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="min-h-screen flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full space-y-10">

            <div>
                <h1 class="text-3xl font-thin text-gray-300 leading-snug mb-2 text-center">
                    Help Us Improve Cosmo AI
                </h1>
                <p class="text-center text-cosmo-text-secondary text-base">
                    Your feedback is valuable. Please answer the following questions.
                </p>
            </div>

            <form class="space-y-8" action="#" method="POST">

                <div class="space-y-3">
                    <label class="block text-base font-medium text-cosmo-text-secondary">1. What is your primary
                        role?</label>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <input id="role-dev" name="role" type="radio" value="developer" required
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="role-dev" class="text-sm font-medium text-cosmo-text-primary">Developer /
                                Engineer</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="role-designer" name="role" type="radio" value="designer"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="role-designer" class="text-sm font-medium text-cosmo-text-primary">Designer /
                                Creative</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="role-manager" name="role" type="radio" value="manager"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="role-manager" class="text-sm font-medium text-cosmo-text-primary">Manager / Team
                                Lead</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="role-writer" name="role" type="radio" value="writer"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="role-writer" class="text-sm font-medium text-cosmo-text-primary">Writer /
                                Content Creator</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="role-other" name="role" type="radio" value="other"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="role-other" class="text-sm font-medium text-cosmo-text-primary">Other</label>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="block text-base font-medium text-cosmo-text-secondary">2. What is the size of your
                        company/team?</label>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <input id="size-1" name="company_size" type="radio" value="1" required
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="size-1" class="text-sm font-medium text-cosmo-text-primary">Just me</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="size-2-10" name="company_size" type="radio" value="2-10"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="size-2-10" class="text-sm font-medium text-cosmo-text-primary">2-10
                                people</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="size-11-50" name="company_size" type="radio" value="11-50"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="size-11-50" class="text-sm font-medium text-cosmo-text-primary">11-50
                                people</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="size-51plus" name="company_size" type="radio" value="51+"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="size-51plus" class="text-sm font-medium text-cosmo-text-primary">51+
                                people</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="use-case" class="block text-base font-medium text-cosmo-text-secondary mb-1">
                        3. What do you primarily hope to achieve using Cosmo AI?
                    </label>
                    <input id="use-case" name="use_case" type="text" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-input-bg border border-cosmo-border text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150"
                        placeholder="e.g., Generate code snippets, write marketing copy, summarize documents">
                </div>

                <div>
                    <label for="important-feature" class="block text-base font-medium text-cosmo-text-secondary mb-1">
                        4. What is the MOST important feature for you in an AI tool?
                    </label>
                    <input id="important-feature" name="important_feature" type="text" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-input-bg border border-cosmo-border text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150"
                        placeholder="e.g., Accuracy, speed, specific integrations, ease of use">
                </div>

                <div class="space-y-3">
                    <label class="block text-base font-medium text-cosmo-text-secondary">5. How familiar are you with AI
                        tools like this?</label>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <input id="familiar-none" name="familiarity" type="radio" value="none" required
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="familiar-none" class="text-sm font-medium text-cosmo-text-primary">Not familiar
                                at all</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="familiar-somewhat" name="familiarity" type="radio" value="somewhat"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="familiar-somewhat" class="text-sm font-medium text-cosmo-text-primary">Somewhat
                                familiar</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="familiar-very" name="familiarity" type="radio" value="very"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="familiar-very" class="text-sm font-medium text-cosmo-text-primary">Very
                                familiar, use them regularly</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="discovery" class="block text-base font-medium text-cosmo-text-secondary mb-1">
                        6. How did you hear about Cosmo AI?
                    </label>
                    <input id="discovery" name="discovery" type="text"
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-input-bg border border-cosmo-border text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150"
                        placeholder="e.g., Social media, friend, search engine, advertisement">
                </div>

                <div>
                    <label for="missing-feature" class="block text-base font-medium text-cosmo-text-secondary mb-1">
                        7. Is there any feature you wish Cosmo AI had?
                    </label>
                    <textarea id="missing-feature" name="missing_feature" rows="3"
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-input-bg border border-cosmo-border text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150"
                        placeholder="Describe any features you'd love to see..."></textarea>
                </div>

                <div class="space-y-3">
                    <label class="block text-base font-medium text-cosmo-text-secondary">8. How satisfied are you with
                        other AI tools you've used (if any)?</label>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <input id="satisfaction-na" name="satisfaction_alt" type="radio" value="na" required
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="satisfaction-na" class="text-sm font-medium text-cosmo-text-primary">Haven't
                                used others</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="satisfaction-unsatisfied" name="satisfaction_alt" type="radio"
                                value="unsatisfied"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="satisfaction-unsatisfied"
                                class="text-sm font-medium text-cosmo-text-primary">Unsatisfied</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="satisfaction-neutral" name="satisfaction_alt" type="radio" value="neutral"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="satisfaction-neutral"
                                class="text-sm font-medium text-cosmo-text-primary">Neutral</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="satisfaction-satisfied" name="satisfaction_alt" type="radio" value="satisfied"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="satisfaction-satisfied"
                                class="text-sm font-medium text-cosmo-text-primary">Satisfied</label>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="block text-base font-medium text-cosmo-text-secondary">9. How often do you anticipate
                        using an AI tool like Cosmo AI?</label>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <input id="frequency-daily" name="frequency" type="radio" value="daily" required
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="frequency-daily"
                                class="text-sm font-medium text-cosmo-text-primary">Daily</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="frequency-weekly" name="frequency" type="radio" value="weekly"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="frequency-weekly" class="text-sm font-medium text-cosmo-text-primary">A few
                                times a week</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="frequency-monthly" name="frequency" type="radio" value="monthly"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="frequency-monthly" class="text-sm font-medium text-cosmo-text-primary">A few
                                times a month</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input id="frequency-rarely" name="frequency" type="radio" value="rarely"
                                class="focus:ring-cosmo-blue text-cosmo-blue border-cosmo-border bg-cosmo-input-bg">
                            <label for="frequency-rarely" class="text-sm font-medium text-cosmo-text-primary">Rarely /
                                Occasionally</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="comments" class="block text-base font-medium text-cosmo-text-secondary mb-1">
                        10. Any other comments or suggestions for Cosmo AI?
                    </label>
                    <textarea id="comments" name="comments" rows="4"
                        class="appearance-none rounded-md relative block w-full px-3 py-2 bg-cosmo-input-bg border border-cosmo-border text-white focus:outline-none focus:ring-1 focus:ring-cosmo-blue focus:border-cosmo-blue text-base transition-colors duration-150"
                        placeholder="We appreciate any additional feedback!"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-3">
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-base font-semibold rounded-full text-white bg-cosmo-blue hover:bg-cosmo-blue-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cosmo-bg focus:ring-cosmo-blue transition-colors duration-150 ease-in-out">
                        Submit Answers & Claim Free Pro Trial
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('promo-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModalBtn = document.getElementById('close-modal-btn');
            const closeModalBtnBottom = document.getElementById('close-modal-btn-bottom');

            const openModal = () => {
                modal.classList.remove('hidden');
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('opacity-0', 'scale-95');
                    modalContent.classList.add('opacity-100', 'scale-100');
                });
            };

            const closeModal = () => {
                modal.classList.add('opacity-0');
                modalContent.classList.add('opacity-0', 'scale-95');
                modalContent.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            };

            openModal();

            closeModalBtn.addEventListener('click', closeModal);
            closeModalBtnBottom.addEventListener('click', closeModal);

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });

            modalContent.addEventListener('click', (event) => {
                event.stopPropagation();
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>

</body>

</html>
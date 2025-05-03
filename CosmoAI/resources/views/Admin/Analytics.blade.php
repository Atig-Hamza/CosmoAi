<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmo - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <style>
        /* Optional: Style chart tooltips for dark mode if needed */
        .chartjs-tooltip {
            background: rgba(0, 0, 0, 0.7) !important;
            color: white !important;
            border-radius: 3px !important;
            padding: 6px !important;
        }

        .chartjs-tooltip-key {
            display: none !important;
        }

        /* Optional: Add a scrollbar style to match the dark theme */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #27272a;
            /* zinc-800 */
        }

        ::-webkit-scrollbar-thumb {
            background: #52525b;
            /* zinc-600 */
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #71717a;
            /* zinc-500 */
        }

        /* Add specific dark bg */
        body {
            background-color: #171717;
            /* approx gray-900/zinc-900 */
        }
    </style>
</head>

<body class="bg-[#171717] text-gray-300 font-sans">

    <div class="flex flex-col min-h-screen">


        <header class="bg-[#171717] border-b border-gray-700 sticky top-0 z-10">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-400 hover:text-white">
                            <img class="h-10 w-10" src="{{ asset('images/white.png') }}" alt="">
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


        <div class="flex-grow max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-6 w-full">
            <div class="flex space-x-8">
                <aside
                    class="max-[768px]:hidden w-64 flex-shrink-0 fixed h-full border-r border-gray-700 overflow-y-auto pt-2 pb-10">
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
                                <a href="/Analytics"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-white group border-l-4 border-[#ffffff]">
                                    <i class="fas fa-chart-line mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                    Analytics
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-[#28282898] hover:text-white group">
                                    <i class="fas fa-history mr-3 text-gray-400 group-hover:text-gray-300"></i> Usage
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
                                    <span class="w-2.5 h-2.5 mr-3 bg-green-500 rounded-full"></span> Subscription Plans
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

                        <div class="pt-6 border-t border-gray-700 mt-6 flex items-center justify-between text-gray-500">
                            <button><i class="fas fa-cog"></i></button>
                            <form action="/logout" method="POST">
                                @csrf
                                @method('GET')
                                <button><i class="fas fa-sign-out-alt"></i>
                            </form>
                            </button>
                        </div>
                    </div>
                </aside>

                <aside class="w-64 flex-shrink-0 hidden md:block space-y-6">
                </aside>


                <main class="flex-grow min-w-0 relative p-4 md:p-6 bg-[#171717]">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div
                            class="lg:col-span-1 bg-[#1f1f1f] p-4 rounded-lg border border-gray-800 shadow-lg relative">
                            <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-300 text-xs z-10">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div>
                                <p class="text-xs font-medium text-gray-400">Passive Income</p>
                                <div class="flex items-baseline space-x-2 mt-1">
                                    <p class="text-3xl font-semibold text-white">{{ \App\Models\Subscription::all()->count() * \App\Models\Plans::where('name', 'Pro Creator')->first()->price }}$</p>
                                </div>
                            </div>
                            
                            <div class="mt-4 h-40 relative">
                                <canvas id="averagePositionsChart"></canvas>
                            </div>
                        </div>

                        
                        <div
                            class="lg:col-span-2 bg-[#1f1f1f] p-4 rounded-lg border border-gray-800 shadow-lg relative">
                            <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-300 text-xs z-10">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-4 gap-y-2 mb-4">
                                <div>
                                    <p class="text-xs font-medium text-gray-400 uppercase">Users</p>
                                    <p class="text-xl font-semibold text-white mt-1">{{ \App\Models\User::all()->count() }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-400 uppercase">Pro Users</p>
                                    <p class="text-xl font-semibold text-white mt-1">{{ \App\Models\UserProfile::where('plan', 'Pro')->count() }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-400 uppercase">Engagement</p>
                                    <p class="text-xl font-semibold text-white mt-1">53%</p>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-400 uppercase">Session Duration</p>
                                    <p class="text-xl font-semibold text-white mt-1">3m 10s</p>
                                    <p class="text-xs text-red-500">-10.5%</p>
                                </div>
                            </div>
                            
                            <div class="mt-4 h-52 relative">
                                <canvas id="mainTrendChart"></canvas>
                            </div>
                        </div>

                        
                        <div
                            class="lg:col-span-2 bg-[#1f1f1f] p-4 rounded-lg border border-gray-800 shadow-lg relative">
                            <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-300 text-xs z-10">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div>
                                <div class="flex items-baseline space-x-2">
                                    <p class="text-3xl font-semibold text-white">1,352</p>
                                    <p class="text-sm text-green-500">+12.5%</p>
                                </div>
                                <p class="text-sm font-medium text-gray-400 mt-1">Visits by Top Referral Source</p>
                            </div>
                            
                            <div class="mt-4 overflow-x-auto">
                                <table class="w-full text-sm text-left">
                                    <thead class="border-b border-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="py-2 pr-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Source</th>
                                            <th scope="col"
                                                class="py-2 px-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                                Rate (%)</th>
                                            <th scope="col"
                                                class="py-2 px-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                                Visit</th>
                                            <th scope="col"
                                                class="py-2 pl-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                                Chart</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800">
                                        
                                        <tr class="hover:bg-[#2a2a2a]/50">
                                            <td class="py-2.5 pr-3 text-gray-300 whitespace-nowrap font-medium">
                                                google.com</td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">35%</td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">473</td>
                                            <td class="py-2.5 pl-3 text-right">
                                                <div
                                                    class="h-1.5 w-16 bg-blue-500 rounded-full inline-block align-middle">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="hover:bg-[#2a2a2a]/50">
                                            <td class="py-2.5 pr-3 text-gray-300 whitespace-nowrap font-medium">direct
                                            </td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">28%</td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">378</td>
                                            <td class="py-2.5 pl-3 text-right">
                                                <div
                                                    class="h-1.5 w-12 bg-green-500 rounded-full inline-block align-middle">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="hover:bg-[#2a2a2a]/50">
                                            <td class="py-2.5 pr-3 text-gray-300 whitespace-nowrap font-medium">
                                                twitter.com</td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">15%</td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">203</td>
                                            <td class="py-2.5 pl-3 text-right">
                                                <div
                                                    class="h-1.5 w-8 bg-purple-500 rounded-full inline-block align-middle">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="hover:bg-[#2a2a2a]/50">
                                            <td class="py-2.5 pr-3 text-gray-300 whitespace-nowrap font-medium">others
                                            </td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">22%</td>
                                            <td class="py-2.5 px-3 text-gray-300 text-right">298</td>
                                            <td class="py-2.5 pl-3 text-right">
                                                <div
                                                    class="h-1.5 w-10 bg-yellow-500 rounded-full inline-block align-middle">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        
                        <div
                            class="lg:col-span-1 bg-[#1f1f1f] p-4 rounded-lg border border-gray-800 shadow-lg relative">
                            <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-300 text-xs z-10">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div>
                                <p class="text-sm font-medium text-white mb-2">Session by browser</p>
                            </div>
                            
                            <div class="mt-4 h-48 flex items-center justify-center relative">
                                <canvas id="browserChart"></canvas>
                            </div>
                        </div>

                    </div> 

                </main>

            </div>
        </div>

    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const grayColor = '#9ca3af'; // Tailwind gray-400
        const gridColor = '#374151'; // Tailwind gray-700
        const cardBgColor = '#1f1f1f';

        // --- Chart 1: Average Positions (Top Left) ---
        const ctx1 = document.getElementById('averagePositionsChart')?.getContext('2d');
        if (ctx1) {
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['Sep 20', 'Sep 21', 'Sep 22', 'Sep 23', 'Sep 24'], // Sample Labels
                    datasets: [{
                        label: 'Avg Position',
                        data: [10, 15, 10.5, 16, 14], // Sample Data
                        borderColor: '#FFFFFF', // White line
                        borderWidth: 2,
                        pointRadius: 0, // No dots on points
                        tension: 0.4 // Smooth curves
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false, // Hide Y grid lines
                                drawBorder: false, // Hide Y axis line
                            },
                            ticks: {
                                display: false // Hide Y labels
                            }
                        },
                        x: {
                             grid: {
                                color: gridColor, // X grid lines color
                                drawBorder: false, // Hide X axis line
                                display: true // Show X grid lines (optional, image has them)
                             },
                             ticks: {
                                color: grayColor, // X labels color
                                maxRotation: 0,
                                minRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 5 // Limit labels shown
                             }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
                        tooltip: {
                            enabled: false // Disable tooltips for this chart if desired
                        }
                    }
                }
            });
        }

        // --- Chart 2: Main Trend Chart (Top Right) ---
        const ctx2 = document.getElementById('mainTrendChart')?.getContext('2d');
        if (ctx2) {
             new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'], // Sample Labels
                    datasets: [{
                        label: 'Sessions',
                        data: [8000, 6000, 18000, 22000, 30000, 35000, 42000], // Sample Data
                        borderColor: '#FFFFFF', // White line
                        borderWidth: 3, // Thicker line
                        pointRadius: 2,
                        pointBackgroundColor: '#FFFFFF',
                        pointBorderColor: '#FFFFFF',
                        tension: 0.4 // Smooth curves
                        // Add fill options if you want area below line:
                        // fill: true,
                        // backgroundColor: 'rgba(255, 255, 255, 0.05)',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                     scales: {
                        y: {
                            beginAtZero: false, // Allow Y axis to not start at 0
                            position: 'right', // Move Y axis labels to right if needed
                            grid: {
                                color: gridColor, // Y grid lines color
                                drawBorder: false, // Hide Y axis line
                             },
                            ticks: {
                                color: grayColor, // Y labels color
                                // Optional: Format Y axis labels as K (thousands)
                                callback: function(value, index, values) {
                                     if (value >= 1000) {
                                        return (value / 1000) + 'K';
                                    }
                                    return value;
                                }
                            }
                        },
                        x: {
                             grid: {
                                display: false, // Hide X grid lines
                                drawBorder: false, // Hide X axis line
                             },
                             ticks: {
                                color: grayColor, // X labels color
                             }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#FFFFFF',
                            bodyColor: '#FFFFFF',
                            borderColor: 'rgba(255,255,255,0.2)',
                            borderWidth: 1,
                             // Optional: Custom tooltip formatting
                             callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                         label += new Intl.NumberFormat('en-US').format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    // Hover interaction adjustments if needed
                     interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    },
                }
            });
        }

         // --- Chart 3: Browser Doughnut Chart (Bottom Right) ---
        const ctx3 = document.getElementById('browserChart')?.getContext('2d');
        if (ctx3) {
            new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    labels: ['Chrome', 'Safari', 'Firefox', 'Other'], // Sample Labels
                    datasets: [{
                        label: 'Sessions by Browser',
                        data: [65, 18, 10, 7], // Sample Data
                        backgroundColor: [
                            '#FFFFFF', // White for largest
                            '#6b7280', // gray-500
                            '#374151', // gray-700
                            '#1f2937'  // gray-800
                        ],
                        borderColor: cardBgColor, // Match card background for spacing effect
                        borderWidth: 2, // Creates spacing between segments
                        hoverBorderColor: cardBgColor
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%', // Adjust for thickness
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
                        tooltip: {
                            enabled: true, // Enable tooltips for doughnut
                             backgroundColor: 'rgba(0, 0, 0, 0.8)',
                             titleColor: '#FFFFFF',
                             bodyColor: '#FFFFFF',
                             callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += context.parsed + '%';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>

</body>

</html>
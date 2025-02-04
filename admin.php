<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <h1 class="text-3xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-10">
                <a class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white" href="#">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
                <a class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white" href="#">
                    <i class="fas fa-users mr-3"></i> Users
                </a>
                <a class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white" href="#">
                    <i class="fas fa-cog mr-3"></i> Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-md p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Admin Name</span>
                        <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-200">Logout</button>
                    </div>
                </div>
            </header>

            <!-- Main Section -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card 1 -->
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                            <div class="flex items-center">
                                <i class="fas fa-users text-3xl text-blue-500 mr-4"></i>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                                    <p class="mt-2 text-3xl font-bold text-gray-900">1,234</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                            <div class="flex items-center">
                                <i class="fas fa-user-plus text-3xl text-green-500 mr-4"></i>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">New Signups</h3>
                                    <p class="mt-2 text-3xl font-bold text-gray-900">56</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                            <div class="flex items-center">
                                <i class="fas fa-dollar-sign text-3xl text-yellow-500 mr-4"></i>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Revenue</h3>
                                    <p class="mt-2 text-3xl font-bold text-gray-900">$12,345</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="mt-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">User Growth</h4>
                            <canvas id="userGrowthChart"></canvas>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="mt-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Recent Users</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="py-3 px-4 text-left">Name</th>
                                            <th class="py-3 px-4 text-left">Email</th>
                                            <th class="py-3 px-4 text-left">Joined</th>
                                            <th class="py-3 px-4 text-left">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">John Doe</td>
                                            <td class="py-3 px-4">john@example.com</td>
                                            <td class="py-3 px-4">2023-10-15</td>
                                            <td class="py-3 px-4">
                                                <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                                <button class="text-red-500 hover:text-red-700">Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">Jane Smith</td>
                                            <td class="py-3 px-4">jane@example.com</td>
                                            <td class="py-3 px-4">2023-10-14</td>
                                            <td class="py-3 px-4">
                                                <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                                <button class="text-red-500 hover:text-red-700">Delete</button>
                                            </td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Sample data for the chart
        const ctx = document.getElementById('userGrowthChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'User Growth',
                    data: [65, 59, 80, 81, 56, 55],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
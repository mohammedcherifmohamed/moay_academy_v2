<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnHub | Online Course Platform</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom styles -->
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #10b981;
            --accent: #f59e0b;
            --dark: #1f2937;
            --light: #f9fafb;
        }
        
        /* Smooth transitions */
        * {
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #c7d2fe;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #a5b4fc;
        }
        
        /* Animation for page transitions */
        .page-transition {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Card hover effects */
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Modal animation */
        .modal-animation {
            animation: modalFadeIn 0.3s ease-out;
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Main App Container -->
    <div id="app" class="min-h-screen flex flex-col">
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



        <!-- Main Content Area -->
        <main id="main-content" class="flex-grow page-transition">
            <!-- Home page will be loaded by default -->

            <div class="container mx-auto px-4 py-12">
                        <div class="max-w-4xl mx-auto">
                            <div class="text-center mb-10">
                                <h1 class="text-3xl font-bold text-gray-800 mb-4">Create Your Account</h1>
                                <p class="text-gray-600">Join LearnHub as a student or teacher to start your educational journey.</p>
                            </div>
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Student Registration -->
                                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100">
                                    <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-6 mx-auto">
                                        <i class="fas fa-user-graduate text-2xl text-blue-600"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Student Registration</h3>
                                    <p class="text-gray-600 mb-6 text-center">Join courses, learn from experts, and track your progress.</p>
                                    
                                    <form  action="{{route("Register.post")}}" method="post" id="student-register-form">
                                    @csrf    
                                    <div class="mb-4">
                                            <label class="block text-gray-700 mb-2" for="student-name">Full Name</label>
                                            <input name="full_name" type="text" id="student-name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your full name" required>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="block text-gray-700 mb-2" for="student-email">Email Address</label>
                                            <input name="email" type="email" id="student-email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 mb-2" for="student-email">phone Number</label>
                                            <input name="phone" type="text" id="student-phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your Phone" required>
                                        </div>
                                        
                                        <div class="mb-6">
                                            <label class="block text-gray-700 mb-2" for="student-password">Password</label>
                                            <input name="password" type="password" id="student-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="At least 6 characters" required>
                                            <p class="text-gray-500 text-sm mt-1">Must be at least 6 characters long</p>
                                        </div>
                                        
                                        <input type="hidden" id="student-role" value="student">
                                        
                                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                            Register as Student
                                        </button>
                                    </form>
                                </div>
                                
                                <!-- Teacher Registration -->
                                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100">
                                    <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-6 mx-auto">
                                        <i class="fas fa-chalkboard-teacher text-2xl text-green-600"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Teacher Registration</h3>
                                    <p class="text-gray-600 mb-6 text-center">Create and manage courses, teach live sessions, and track student progress.</p>
                                    
                                    <form action="{{route("registerTeacher.post")}}" method="post" id="teacher-register-form">
                                        @csrf   
                                    <div class="mb-4">
                                            <label class="block text-gray-700 mb-2" for="teacher-name">Full Name</label>
                                            <input name="full_name" type="text" id="teacher-name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your full name" required>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="block text-gray-700 mb-2" for="teacher-email">Email Address</label>
                                            <input name="email" type="email" id="teacher-email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 mb-2" for="student-email">phone Number</label>
                                            <input name="phone" type="text" id="teacher-phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your Phone" required>
                                        </div>
                                        <div class="mb-6">
                                            <label class="block text-gray-700 mb-2" for="teacher-password">Password</label>
                                            <input name="password" type="password" id="teacher-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="At least 6 characters" required>
                                            <p class="text-gray-500 text-sm mt-1">Must be at least 6 characters long</p>
                                        </div>
                                        
                                        <input type="hidden" id="teacher-role" value="teacher">
                                        
                                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                            Register as Teacher
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="text-center mt-8">
                                <p class="text-gray-600">Already have an account? <a href="#" data-page="login" class="text-indigo-600 hover:text-indigo-800 font-medium">Sign in here</a></p>
                            </div>
                        </div>
                    </div>
                
                


        </main>
        
        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-6 mt-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <i class="fas fa-graduation-cap text-2xl text-indigo-400 mr-3"></i>
                        <span class="text-xl font-bold">LearnHub</span>
                    </div>
                    <p class="text-gray-300 text-sm">Professional online course platform &copy; 2023. All rights reserved.</p>
                    <div class="mt-4 md:mt-0">
                        <a href="#" class="text-gray-300 hover:text-white mx-2 text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-300 hover:text-white mx-2 text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-300 hover:text-white mx-2 text-sm">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Modal Container (hidden by default) -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-20">
        <div class="relative top-10 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-md bg-white modal-animation">
            <div class="flex justify-between items-center mb-4">
                <h3 id="modal-title" class="text-lg font-bold text-gray-900"></h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600 text-2xl">
                    &times;
                </button>
            </div>
            <div id="modal-body"></div>
        </div>
    </div>
    </body>
    </html>


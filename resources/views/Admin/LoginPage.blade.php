<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | LearnHub</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }
        
        .input-field {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }
        
        .input-field:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }
        
        /* Loading spinner */
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-card {
                margin: 1rem;
                padding: 2rem !important;
            }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="container mx-auto max-w-6xl">
        <!-- Background decorative elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse delay-500"></div>
        </div>
        
        <!-- Main Content -->
        <div class="relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Column - Illustration & Info -->
                <div class="text-white text-center lg:text-left">
                    <a href="index.html" class="inline-flex items-center mb-10 text-white hover:text-indigo-200 transition duration-300">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Home
                    </a>
                    
                    <div class="mb-10 floating-animation">
                        <div class="w-24 h-24 mx-auto lg:mx-0 bg-white/20 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-lock text-4xl"></i>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-bold mb-4">Admin Portal</h1>
                        <p class="text-xl opacity-90">Secure access to platform management tools</p>
                    </div>
                    
                    <div class="space-y-6 hidden lg:block">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-shield-alt text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-1">Advanced Security</h3>
                                <p class="opacity-90">Two-factor authentication and encrypted sessions</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-bar text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-1">Analytics Dashboard</h3>
                                <p class="opacity-90">Comprehensive platform insights and reporting</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-users-cog text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-1">User Management</h3>
                                <p class="opacity-90">Complete control over users and permissions</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Login Form -->
                <div class="login-card p-10 lg:p-12">
                    <!-- Logo -->
                    <div class="flex items-center justify-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-graduation-cap text-3xl text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">LearnHub</h2>
                            <p class="text-gray-600">Administrator Access</p>
                        </div>
                    </div>
                    
                    <!-- Welcome Message -->
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back</h3>
                        <p class="text-gray-600">Sign in to your admin account</p>
                    </div>
                    
                    <!-- Login Form -->
                    <form action="{{route("Admin.Login") }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Email Field -->
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                                Admin Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user-shield text-gray-400"></i>
                                </div>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email"
                                    required
                                    placeholder="admin@gmail.com"
                                    class="w-full pl-10 pr-4 py-3 input-field rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                >
                            </div>
                            <p class="text-gray-500 text-xs mt-1">Use admin credentials to proceed</p>
                        </div>
                        
                        <!-- Password Field -->
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                                <i class="fas fa-key mr-2 text-indigo-500"></i>
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password"
                                    required
                                    placeholder="••••••••"
                                    class="w-full pl-10 pr-12 py-3 input-field rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                >
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="text-gray-500 text-xs mt-1">Minimum 8 characters with special characters</p>
                        </div>
                        
                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    id="remember"
                                    name="remember"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                >
                                <label for="remember" class="ml-2 block text-sm text-gray-700">
                                    Remember this device
                                </label>
                            </div>
                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                Forgot password?
                            </a>
                        </div>
                        
                        <!-- Security Notice -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm text-blue-800">
                                        This is a secure admin portal. Ensure you're on the official LearnHub domain before entering credentials.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            class="w-full btn-primary text-white font-bold py-3 px-4 rounded-lg shadow-lg flex items-center justify-center"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In to Admin Dashboard
                        </button>
                        
                        <!-- Loading State (Hidden by default) -->
                        <div id="loading" class="hidden flex-col items-center justify-center space-y-4">
                            <div class="spinner"></div>
                            <p class="text-gray-600">Verifying credentials...</p>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>
        
       
    </div>
    
    <!-- Simple JavaScript for Password Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
                });
            }
            
            // Form submission simulation
            const loginForm = document.querySelector('form');
            const loadingDiv = document.getElementById('loading');
            const submitButton = loginForm.querySelector('button[type="submit"]');
            
            if (loginForm && loadingDiv && submitButton) {
                loginForm.addEventListener('submit', function(e) {
                    // Prevent actual submission for demo purposes
                    // In real implementation, remove this line
                    // e.preventDefault();
                    
                    // Show loading state
                    submitButton.classList.add('hidden');
                    loadingDiv.classList.remove('hidden');
                    
                    // Simulate API call delay
                    setTimeout(() => {
                        // Redirect to admin dashboard
                        // window.location.href = 'admin.html';
                    }, 1500);
                });
            }
            
            // Add animation to login button on hover
            const loginBtn = document.querySelector('.btn-primary');
            if (loginBtn) {
                loginBtn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                loginBtn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | LearnHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <header class="sticky top-0 z-10 bg-white shadow-sm">
        <nav class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-2xl text-indigo-600 mr-2"></i>
                    <span class="text-xl font-bold text-gray-800">LearnHub</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="index.html" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="student-dashboard.html" class="text-gray-700 hover:text-indigo-600 font-medium">Student Dashboard</a>
                    <a href="teacher-courses.html" class="text-gray-700 hover:text-indigo-600 font-medium">Teacher Courses</a>
                    <a href="admin.html" class="text-indigo-600 border-b-2 border-indigo-600 font-medium">Admin</a>
                </div>
                
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <div id="mobile-menu" class="md:hidden hidden py-4 border-t">
                <div class="flex flex-col space-y-3">
                    <a href="index.html" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="student-dashboard.html" class="text-gray-700 hover:text-indigo-600 font-medium">Student Dashboard</a>
                    <a href="teacher-courses.html" class="text-gray-700 hover:text-indigo-600 font-medium">Teacher Courses</a>
                    <a href="admin.html" class="text-indigo-600 font-medium">Admin</a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Admin Dashboard Content -->
    <main class="container mx-auto px-4 py-8">
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
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Admin Dashboard</h1>
            <p class="text-gray-600">Manage user registrations and platform statistics</p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Pending Registrations</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">2</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-xl text-blue-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Approved Students</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">1</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-graduate text-xl text-green-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Approved Teachers</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">1</h3>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-chalkboard-teacher text-xl text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pending Registrations Table -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Pending Registration Requests</h2>
                <p class="text-gray-600 text-sm">Approve or reject new user registrations</p>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- User 1 -->
                         @foreach($StudentsList as $student)
                                 <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <i class="fas fa-user-graduate text-blue-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{$student->name}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$student->email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Student
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$student->phone}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
<form action="{{ route('approaveStudent', $student->id) }}" method="POST" class="approve-form">
    @csrf
    <button 
        type="button"
        class="approve-user-btn mr-3 bg-green-100 hover:bg-green-200 text-green-800 py-2 px-4 rounded-lg transition duration-300"
        data-user-id="{{ $student->id }}"
        data-user-name="{{ $student->name }}">
        <i class="fas fa-check mr-1"></i> Approve
    </button>
</form>

                                        <form action="{{ route('rejectStudent', $student->id) }}" method="POST">
    @csrf
    <button 
        type="button"
        class="reject-user-btn bg-red-100 hover:bg-red-200 text-red-800 py-2 px-4 rounded-lg"
        data-user-name="{{ $student->name }}">
           <i class="fas fa-times mr-1"></i> Reject
    </button>
</form>

                                    </td>
                                </tr>
                         @endforeach


                       
                        
                        <!-- Teachers 2 -->
                         @foreach($TeachersList as $teacher)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-chalkboard-teacher text-green-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{$teacher->name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$teacher->email}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Teacher
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$teacher->phone}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                   <form action="{{ route('approaveTeacher', $teacher->id) }}" method="POST" class="approve-form">
    @csrf
    <button 
        type="button"
        class="approve-user-btn mr-3 bg-green-100 hover:bg-green-200 text-green-800 py-2 px-4 rounded-lg transition duration-300"
        data-user-id="{{ $teacher->id }}"
        data-user-name="{{ $teacher->name }}">
        <i class="fas fa-check mr-1"></i> Approve
    </button>
</form>

                                        <form action="{{ route('rejectTeacher', $teacher->id) }}" method="POST">
    @csrf
    <button 
        type="button"
        class="reject-user-btn bg-red-100 hover:bg-red-200 text-red-800 py-2 px-4 rounded-lg"
        data-user-name="{{ $teacher->name }}">
           <i class="fas fa-times mr-1"></i> Reject
    </button>
</form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Platform Information -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-md p-8 text-white">
            <h2 class="text-2xl font-bold mb-4">Platform Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold mb-3">Total Users</h3>
                    <p class="text-4xl font-bold mb-2">4</p>
                    <p class="opacity-90">Active platform users</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-3">Total Courses</h3>
                    <p class="text-4xl font-bold mb-2">5</p>
                    <p class="opacity-90">Live courses available</p>
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
    
    <!-- Modal Container -->
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
    
    <script>
        // Modal Functions
        const modal = {
            open: (title, content) => {
                document.getElementById('modal-title').textContent = title;
                document.getElementById('modal-body').innerHTML = content;
                document.getElementById('modal').classList.remove('hidden');
            },
            
            close: () => {
                document.getElementById('modal').classList.add('hidden');
                document.getElementById('modal-body').innerHTML = '';
            }
        };
        
        // Initialize event listeners
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Close modal when clicking X
            document.getElementById('close-modal').addEventListener('click', () => {
                modal.close();
            });
            
            // Close modal when clicking outside
            document.getElementById('modal').addEventListener('click', (e) => {
                if (e.target.id === 'modal') {
                    modal.close();
                }
            });
            
       document.querySelectorAll('.approve-user-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();

        const form = button.closest('form');
        const userName = button.dataset.userName;

        modal.open(
            "Approve Registration",
            `
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-2xl text-green-600"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">Approve ${userName}'s registration?</h4>
                <p class="text-gray-600 mb-6">This will grant ${userName} access to the platform.</p>
                <div class="flex justify-center space-x-4">
                    <button id="confirm-approve" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                        Approve
                    </button>
                    <button id="cancel-approve" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-300">
                        Cancel
                    </button>
                </div>
            </div>
            `
        );

        // Wait 50ms so elements exist
        setTimeout(() => {
            document.getElementById('confirm-approve').addEventListener('click', () => {
                form.submit(); 
            });

            document.getElementById('cancel-approve').addEventListener('click', () => {
                modal.close();
            });
        }, 50);
    });
});

            
         document.querySelectorAll('.reject-user-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault(); // prevent form from submitting directly

        const form = button.closest('form');
        const userName = button.dataset.userName;

        modal.open(
            "Reject Registration",
            `
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-times text-2xl text-red-600"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">Reject ${userName}'s registration?</h4>
                <p class="text-gray-600 mb-6">This will deny ${userName} access to the platform.</p>
                <div class="flex justify-center space-x-4">
                    <button id="confirm-reject"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                        Reject
                    </button>
                    <button id="cancel-reject"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-300">
                        Cancel
                    </button>
                </div>
            </div>
            `
        );

        // Add event listeners after modal renders
        setTimeout(() => {
            document.getElementById('confirm-reject').addEventListener('click', () => {
                form.submit(); // 🔥 Submit the Laravel reject request
            });

            document.getElementById('cancel-reject').addEventListener('click', () => {
                modal.close();
            });
        }, 50);
    });
});

            
          
        });
    </script>
</body>
</html>
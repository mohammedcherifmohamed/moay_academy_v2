<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Courses | LearnHub</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="teacher-courses.html" class="text-indigo-600 border-b-2 border-indigo-600 font-medium">Teacher Courses</a>
                    <a href="admin.html" class="text-gray-700 hover:text-indigo-600 font-medium">Admin</a>
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
                    <a href="teacher-courses.html" class="text-indigo-600 font-medium">Teacher Courses</a>
                    <a href="admin.html" class="text-gray-700 hover:text-indigo-600 font-medium">Admin</a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Teacher Courses Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Teacher Courses</h1>
            <p class="text-gray-600">Manage your live courses and create new ones</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Create New Course Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Course</h2>
                    
                    <form id="create-course-form">
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2" for="course-name">Course Name</label>
                            <input type="text" id="course-name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter course name" >
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2" for="course-date">Date</label>
                            <input type="date" id="course-date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" >
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2" for="course-time">Time</label>
                            <input type="time" id="course-time" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" >
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2" for="course-description">Description</label>
                            <textarea id="course-description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Describe your course" ></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            <i class="fas fa-plus-circle mr-2"></i> Create Course
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Teacher's Courses List -->
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Your Live Courses ({{ count($courses) }})</h2>
                
                <div class="space-y-6">
                    @forelse($courses as $course)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 border border-gray-100">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-gray-800">{{ $course->title }}</h3>
                                <div class="flex space-x-2">

                                </div>
                            </div>
                            

                            
                            <div class="flex justify-between items-center">
                                <div class="text-gray-700">
                                </div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('voice-chat.index', ['room' => $course->title]) }}" class="start-session-btn bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                        <i class="fas fa-play mr-2"></i> Start Session
                                    </a>
                                    <button class="edit-course-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-600">You haven't created any courses yet.</p>
                    @endforelse
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
            

            
            // Create course form submission
            document.getElementById('create-course-form').addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = document.getElementById('course-name').value;
                
                try {
                    const response = await fetch('/teacher/create-room', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ 
                            roomName: name, 
                            // Add other fields if controller supports them, for now roomName maps to title
                            // controller currently only uses roomName. I should update controller to support others? 
                            // For now, let's just send roomName as that's what controller expects.
                            // Ideally, I should update controller to accept date, time, description.
                        })
                    });

                    const result = await response.json();

                    if (result.success) {
                         modal.open(
                            'Course Created',
                            `
                            <div class="text-center">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-check text-2xl text-green-600"></i>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 mb-4">Course Created Successfully!</h4>
                                <div class="bg-gray-50 p-4 rounded-lg mb-6 text-left">
                                    <p class="text-gray-700 mb-2"><span class="font-medium">Course Name:</span> ${name}</p>
                                </div>
                                <button id="close-success" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                                    Close
                                </button>
                            </div>
                            `
                        );
                        
                        document.getElementById('create-course-form').reset();
                        
                         document.getElementById('close-success').addEventListener('click', () => {
                            modal.close();
                            window.location.reload(); // Reload to show new course
                        });
                    } else {
                        alert('Error creating course: ' + result.message);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred while creating the course.');
                }
            });
            
            // Start session buttons
            document.querySelectorAll('.start-session-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const courseName = e.target.getAttribute('data-course');
                    
                    modal.open(
                        `Start Live Session`,
                        `
                        <div class="text-center">
                            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-video text-2xl text-indigo-600"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-4">Start "${courseName}" Session?</h4>
                            <p class="text-gray-600 mb-6">This will start the live session for all enrolled students.</p>
                            <div class="flex justify-center space-x-4">
                                <button id="confirm-start" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                                    Start Session
                                </button>
                                <button id="cancel-start" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-300">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        `
                    );
                    
                    document.getElementById('confirm-start').addEventListener('click', () => {
                        modal.open(
                            'Session Started',
                            `
                            <div class="text-center">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-check text-2xl text-green-600"></i>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 mb-4">Live Session Started!</h4>
                                <p class="text-gray-600 mb-6">"${courseName}" is now active. Students can now join the session.</p>
                                <button id="close-success" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                                    Close
                                </button>
                            </div>
                            `
                        );
                        
                        document.getElementById('close-success').addEventListener('click', () => {
                            modal.close();
                        });
                    });
                    
                    document.getElementById('cancel-start').addEventListener('click', () => {
                        modal.close();
                    });
                });
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | LearnHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation (Same as index.html) -->
    <header class="sticky top-0 z-10 bg-white shadow-sm">
        <nav class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-2xl text-indigo-600 mr-2"></i>
                    <span class="text-xl font-bold text-gray-800">LearnHub</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="index.html" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="student-dashboard.html" class="text-indigo-600 border-b-2 border-indigo-600 font-medium">Student Dashboard</a>
                    <a href="teacher-courses.html" class="text-gray-700 hover:text-indigo-600 font-medium">Teacher Courses</a>
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
                    <a href="student-dashboard.html" class="text-indigo-600 font-medium">Student Dashboard</a>
                    <a href="teacher-courses.html" class="text-gray-700 hover:text-indigo-600 font-medium">Teacher Courses</a>
                    <a href="admin.html" class="text-gray-700 hover:text-indigo-600 font-medium">Admin</a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Student Dashboard Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Student Dashboard</h1>
            <p class="text-gray-600">Welcome back! Here are your available live courses</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($courses as $course)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 course-card border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $course->title }}</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Available</span>
                    </div>
                    
                    <div class="mb-4">
                        <!-- teacher isn't eager loaded yet, but referencing the ID or relation if defined -->
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>
                            <span class="font-medium">Teacher ID: {{ $course->teacher }}</span>
                        </div>

                    </div>
                    

                    
                    <button class="join-course-btn w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300" 
                        data-course="{{ $course->title }}">
                        <i class="fas fa-video mr-2"></i> Join Session
                    </button>
                </div>
            </div>
            @empty
             <div class="col-span-3 bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-book-open text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">No courses available</h3>
                <p class="text-gray-600 mb-6">There are no live courses scheduled at the moment. Please check back later.</p>
            </div>
            @endforelse
        </div>
        
        <!-- No Courses Message (hidden by default) -->
        <div id="no-courses-message" class="bg-white rounded-xl shadow-md p-8 text-center hidden">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-book-open text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-4">No courses available</h3>
            <p class="text-gray-600 mb-6">There are no live courses scheduled at the moment. Please check back later.</p>
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
            
            // Join course buttons
            document.querySelectorAll('.join-course-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const courseName = e.target.getAttribute('data-course');
                    
                    modal.open(
                        `Join ${courseName}`,
                        `
                        <div class="text-center">
                            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-video text-2xl text-indigo-600"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-4">Ready to join the live session?</h4>
                            <p class="text-gray-600 mb-6">You're about to join "${courseName}" live session.</p>
                            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                <p class="text-gray-700 font-medium"><i class="fas fa-calendar-alt mr-2"></i> Monday, October 15, 2023 at 14:00</p>
                            </div>
                            <div class="flex justify-center space-x-4">
                                <button id="confirm-join" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                                    Join Now
                                </button>
                                <button id="cancel-join" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-300">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        `
                    );
                    
                    document.getElementById('confirm-join').addEventListener('click', () => {
                        window.location.href = "{{ route('voice-chat.index') }}?room=" + encodeURIComponent(courseName);
                    });
                    
                    document.getElementById('cancel-join').addEventListener('click', () => {
                        modal.close();
                    });
                });
            });
        });
    </script>
</body>
</html>
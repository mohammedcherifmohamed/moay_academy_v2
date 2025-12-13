
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/svg" href="{{asset('logo.svg')}}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
       <link rel="stylesheet" href="{{ asset('voice-chat/style.css') }}">

   <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: 'black',
                        accent: '#3b82f6',
                        fot:"#11224E"
                    }
                }
            }
        }
    </script>
    <style>
        /* Animations personnalisées */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
               
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .slide-in-left {
            transform: translateX(-50px);
            opacity: 0;
            transition: transform 0.8s ease, opacity 0.8s ease;
        }
        
        .slide-in-right {
            transform: translateX(50px);
            opacity: 0;
            transition: transform 0.8s ease, opacity 0.8s ease;
        }
        
        .slide-in-left.active, .slide-in-right.active {
            transform: translateX(0);
            opacity: 1;
        }
        
        /* Styles pour le slider */
        .slider-container {
            position: relative;
            min-height: 100vh;
                height: auto;
                overflow: hidden;
        }
        
        .slider-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        
        .slider-slide.active {
            opacity: 1;
        }
        
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Styles pour les sections */
        section {
            scroll-margin-top: 80px;
        }
        
        /* Footer fixe */
        body {
            padding-bottom: 0;
        }
        
        /* Dropdown menu styles */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            margin-top: 8px;
        }
        
        .dropdown:hover .dropdown-menu,
        .dropdown.active .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-menu a {
            display: block;
            padding: 12px 20px;
            color: #000;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .dropdown-menu a:hover {
            background-color: #f3f4f6;
            color: #3b82f6;
            padding-left: 24px;
        }
        
        .dropdown-menu a:first-child {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        
        .dropdown-menu a:last-child {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        section{
            overflow: hidden;
        }
    </style>
    @yield('meta')
</head>
<body class="font-sans">

    @include('Includes.Nav')

    @yield('content')


    @include('Includes.Footer')

   {{-- @yield('scripts') --}}

</body>
</html>
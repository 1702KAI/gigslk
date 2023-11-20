<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    
    <script>
        // Function to reveal the features section with scrolling animation
        function revealFeaturesSection() {
            // Get the features section element
            var featuresSection = document.getElementById('features-section');
            
            // Add a class to change opacity and trigger CSS transition
            featuresSection.classList.add('opacity-100');

            // Scroll to the features section with smooth animation
            featuresSection.scrollIntoView({ behavior: 'smooth' });
        }
    </script>

</head>
<body class="antialiased bg-white">
    <nav class="flex flex-row p-6 bg-purple-200" aria-label="Global" >
        <div class="flex-grow">
            <a href="#" class="text-sm font-semibold text-gray-900 hover:text-gray-700 px-4 py-2">Product</a>
            <a href="#" class="text-sm font-semibold text-gray-900 hover:text-gray-700 px-4 py-2">Features</a>
            <a href="#" class="text-sm font-semibold text-gray-900 hover:text-gray-700 px-4 py-2">Find Jobs</a>
            <a href="#" class="text-sm font-semibold text-gray-900 hover:text-gray-700 px-4 py-2">About us</a>
        </div>
        <div class="flex-shrink">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-900 hover:text-gray-700 px-4 py-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900 hover:text-gray-700 px-4 py-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 px-4 py-2">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
  
    <div class="mx-auto max-w-2xl py-20 sm:py-38 lg:py-46">
        <div class="hidden sm:mb-8 sm:flex sm:justify-center gap-4">
            <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                Developers|Desginers
            </div>
            <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                Global Reach
            </div>
            <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                Local Focus
            </div>
        </div>            
        <div class="text-center">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Redefine Your Freelance Game🚀</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">Gigs.lk is not just a freelancing platform, it's a community that thrives on local talent. Discover job opportunities right here in Sri Lanka and let your skills shine on a global stage. Connect with clients who understand the value of local expertise.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="#" onclick="revealFeaturesSection()" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div> 
    </div>

<!-- 3x2 grid for features -->
<div  id="features-section" class="grid grid-cols-3 gap-4 max-w-3xl mx-auto mt-12 mb-20">
    <!-- Feature 1 -->
    <div class="col-span-2">
        <h2 class="text-2xl font-semibold mb-4">Seamless Pitch Feature</h2>
        <p class="text-gray-600">Our unique pitch feature sets us apart. With a simple click on client profiles, developers can initiate the pitch process, presenting their skills and ideas directly to potential clients. It's your chance to stand out and showcase what makes you exceptional.</p>
    </div>
    <!-- Image for Feature 1 -->
    <div>
        <!-- Add your image source here -->
        <img src={{ asset('/images/pitch-feature.png') }} alt="Seamless Pitch Feature" class="h-40 w-auto">
    </div>

    <!-- Feature 2 -->
    <div class="col-span-2">
        <h2 class="text-2xl font-semibold mb-4">Secure Payments with Escrow</h2>
        <p class="text-gray-600">At Gigs.lk, we prioritize fairness. Our built-in escrow system ensures that you get paid for your hard work. No more worries about payment delays or disputes – focus on delivering quality work, and we'll take care of the rest.</p>
    </div>
    <!-- Image for Feature 2 -->
    <div>
        <!-- Add your image source here -->
        <img src="/images/escrow-feature.jpg" alt="Secure Payments with Escrow" class="h-40 w-auto">
    </div>

    <!-- Feature 3 -->
    <div class="col-span-2">
        <h2 class="text-2xl font-semibold mb-4">Immersive Content for Branding</h2>
        <p class="text-gray-600">We believe in boosting the profiles of our local freelance developers. Gigs.lk provides a platform for immersive content creation, allowing you to showcase your projects, skills, and unique personality. Elevate your personal brand and attract clients from around the world.</p>
    </div>
    <!-- Image for Feature 3 -->
    <div>
        <!-- Add your image source here -->
        <img src="images/content.png" alt="Immersive Content for Branding" class="rounded-lg">
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-200 py-8 ">
    <div class="mx-auto max-w-2xl flex justify-between items-center">
        <!-- Logo -->
        <div>
            <img src="{{ asset('/images/your-logo.png') }}" alt="Your Logo" class="h-12 w-auto">
        </div>

        <!-- Sitemap -->
        <div class="flex space-x-4">
            <a href="#" class="text-gray-700 hover:text-gray-900">Home</a>
            <a href="#" class="text-gray-700 hover:text-gray-900">About</a>
            <a href="#" class="text-gray-700 hover:text-gray-900">Services</a>
            <a href="#" class="text-gray-700 hover:text-gray-900">Contact</a>
        </div>
    </div>
</footer>
@livewireStyles
</body>
</html>

<!-- HEADER START -->
<header class="bg-[#f4b67d] w-full m-auto px-4 md:px-8 py-4 shadow-md rounded-b-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between space-x-4">
        <!-- Logo -->
        <div class="w-32 sm:w-40 md:w-44 lg:w-52 xl:w-56">
            <a href="">
                <img src="{{asset('assets/logo.svg')}}" alt="Logo" class="w-32" />
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex flex-nowrap items-center space-x-2 text-[#752d19] font-medium">
            <a href="#hero" class="px-4 py-1.5 text-md rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white">Accueil</a>
            <a href="#about" class="px-4 py-1.5 text-md rounded-md transition-all text-nowrap duration-300 hover:bg-[#db571b] hover:text-white">À propos</a>
            <a href="#location" class="px-4 py-1.5 text-md rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white">Location</a>
            <a href="#feedback" class="px-4 py-1.5 text-md rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white">Témoignages</a>
            <a href="#faq" class="px-4 py-1.5 text-md rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white">FAQ</a>
            <a href="#contact" class="px-4 py-1.5 text-md rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white">Contact</a>
        </nav>

        <!-- Contact Button (Desktop) -->
        <a href="" class="hidden lg:inline-block bg-[#db571b] text-white text-lg px-4 py-2 rounded-md font-medium whitespace-nowrap transition-all duration-300 hover:opacity-90">
            Mon Espace
        </a>



        <!-- Hamburger (Tablet & Mobile) -->
        <button id="menu-btn" class="lg:hidden cursor-pointer text-[[#db571b]] text-2xl focus:outline-none">
            ☰
        </button>
    </div>

    <!-- Mobile/Tablet Menu -->
    <div id="mobile-menu" class="lg:hidden hidden mt-4 flex flex-col items-start space-y-3 text-[#752d19] font-medium px-4">
        <a href="#hero" class="px-4 py-1.5 rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white w-full text-center">Accueil</a>
        <a href="#about" class="px-4 py-1.5 rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white w-full text-center">À propos</a>
        <a href="#location" class="px-4 py-1.5 rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white w-full text-center">Location</a>
        <a href="#feedback" class="px-4 py-1.5 rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white w-full text-center">Témoignages</a>
        <a href="#faq" class="px-4 py-1.5 rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white w-full text-center">FAQ</a>
        <a href="#contact" class="px-4 py-1.5 rounded-md transition-all duration-300 hover:bg-[#db571b] hover:text-white w-full text-center">Contact</a>
        <a href="" class="bg-[#db571b] text-white px-4 py-2 rounded-md w-full text-center font-medium  transition-all duration-300 hover:opacity-90">Mon Espace</a>
    </div>
</header>
<!-- HEADER START -->

<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Proprety</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- FONT LINK -->
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

  <!-- FAVICON -->
  <link rel="icon" type="image/png" href="{{asset('assets/favicon/favicon.png')}}">

  <!-- SWIPER CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Add Alpine.js in your <head> or before closing </body> -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <!-- STYLING FOR SMOOTH SCROLL -->
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>

</head>
<!-- SCROLL UP BUTTON -->
<button id="scrollTopBtn" 
    class="hidden fixed cursor-pointer bottom-6 right-6 z-50 bg-[#91341b] hover:bg-[#ea7025] text-white p-3 rounded-full shadow-lg transition duration-300"
    aria-label="Scroll to top">
    <!-- Use an SVG icon for perfect proportions -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
    </svg>
</button>

<body class="bg-[#fef7ee] [font-family:'Lora',sans-serif] overflow-x:hidden">


    <!-- HEADER COMPONENT -->
    <x-shared-components.header/>

    <!-- HEADER COMPONENT -->
    @yield('content')

    <!-- HEADER COMPONENT -->
    <x-shared-components.footer/>
    

    <!-- MOBILE CANVA MENU -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    <!-- AOS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000, // animation duration in ms
        once: true,     // whether animation should happen only once - while scrolling down
    });
    </script>

    <!-- SWIPER JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        navigation: {
            nextEl: ".custom-next",
            prevEl: ".custom-prev",
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
        });
    </script>

    <!-- SCROLL UP BUTTON JS -->
    <script>
        // Show button when scrolled down
        const scrollTopBtn = document.getElementById("scrollTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove("hidden");
            } else {
                scrollTopBtn.classList.add("hidden");
            }
        });

        // Scroll to top when clicked
        scrollTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

</body>
</html>

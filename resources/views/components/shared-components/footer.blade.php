<!-- FOOTER START -->
<footer class="bg-[#91341b] mt-[100px] rounded-t-xl text-white px-6 md:px-12 py-[120px] relative overflow-visible">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
        
        <!-- A PROPOS -->
        <div>
        <h3 class="text-3xl font-semibold mb-4">A propos</h3>
        <p class="text-sm mb-6 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="flex items-center gap-3 mb-6">
            <a href="#" class="bg-[#ea7025] p-2 rounded-md transition">
            <img src="{{asset('assets/social-media-icons/instagram.svg')}}" alt="Instagram" class="w-5 h-5" />
            </a>
            <a href="#" class="bg-[#ea7025] p-2 rounded-md transition">
            <img src="{{asset('assets/social-media-icons/facebook.svg')}}" alt="Facebook" class="w-5 h-5" />
            </a>
            <a href="#" class="bg-[#ea7025] p-2 rounded-md transition">
            <img src="{{asset('assets/social-media-icons/tiktok.svg')}}" alt="TikTok" class="w-5 h-5" />
            </a>
        </div>
        <p class="text-sm mt-10">Kari.ma — Tous droits réservés.</p>
        </div>

        <!-- CONTACT -->
        <div>
            <h3 class="text-3xl font-semibold mb-4">Contact</h3>
            <ul class="space-y-4 text-sm flex flex-col gap-2">
                <li class="flex items-start gap-2">
                <img src="{{asset('assets/footer-section-icons/location.svg')}}" alt="">
                <span>Avenue Zerktouni Mohammed</span>
                </li>
                <li class="flex items-center gap-2">
                <img src="{{asset('assets/footer-section-icons/phone.svg')}}" alt="">
                <span>+212 123-456789</span>
                </li>
                <li class="flex items-center gap-2">
                <img src="{{asset('assets/footer-section-icons/phone.svg')}}" alt="">
                <span>+212 123-456789</span>
                </li>
                <li class="flex items-center gap-2">
                <img src="{{asset('assets/footer-section-icons/mail.svg')}}" alt="">
                <span>contact@proprety.ma</span>
                </li>
            </ul>
        </div>

        <!-- NEWSLETTER -->
        <div>
            <h3 class="text-3xl font-semibold mb-4">NewsLetter</h3>
            <p class="text-sm mb-4">Abonnez-vous à notre newsletter.</p>
            
            <form class="relative w-full max-w-xs">
                <input 
                    type="email" 
                    name="email"
                    autocomplete="email"
                    required
                    placeholder="Entrez votre e-mail"
                    class="w-full outline-[#28532B] px-4 py-4 pr-24 rounded bg-white text-[#1D4D2C] text-sm focus:outline-none" 
                />
                
                <button 
                    type="submit"
                    class="absolute cursor-pointer right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-[#f4b67d] text-[#91341b] font-semibold text-sm rounded hover:bg-[#ea7025] transition"
                >
                    S’abonner
                </button>
            </form>
        </div>
    </div>
</footer>
<!-- FOOTER END -->
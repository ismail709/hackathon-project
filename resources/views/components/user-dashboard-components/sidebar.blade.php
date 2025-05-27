<!-- Sidebar -->
<div data-aos="slide-right" class="bg-[#db571b] lg:sticky lg:top-28 h-[310px] text-white w-full max-w-sm md:w-1/3 p-6 rounded-xl shadow-md">
    <div class="mb-8">
        <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
        {{-- <p class="text-sm">user@example.com</p> --}}
    </div>
    <div class="flex flex-col gap-4">
        <a href="{{route('mon_espace')}}">
            <button class="bg-[#f8d5b0] text-orange-700 font-semibold cursor-pointer py-2 px-4 rounded-md w-full">
                Mon Profile
            </button>
        </a>
        <a href="{{route('reservations')}}">
            <button class="bg-[#f8d5b0] text-orange-700 font-semibold cursor-pointer py-2 px-4 rounded-md w-full">
                Mes Reservations
            </button>
        </a>
        <a href="{{route('invoices')}}">
            <button class="bg-[#f8d5b0] text-orange-700 font-semibold cursor-pointer py-2 px-4 rounded-md w-full">
                Mes Factures
            </button>
        </a>
    </div>
</div>

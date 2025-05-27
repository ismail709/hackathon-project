<!-- LOCATION CARDS + PAGINATION WRAPPER -->
<div class="flex-1 flex flex-col items-center">

    <!-- LOCATION CARDS GRID FETCH 6 PER PAGE -->
<!-- LOCATION CARDS + PAGINATION WRAPPER -->
<div class="flex-1 flex flex-col items-center">

    <!-- LOCATION CARDS GRID FETCH 6 PER PAGE -->
    <div class="w-full grid grid-cols-1 md:grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-10">
        @forelse ($locals as $local)
            <div data-aos="slide-up"
                class="bg-white rounded-xl overflow-hidden shadow-md flex flex-col items-start text-left border border-[#f5d0c4]">

                <!-- Image -->
                <img src="{{ asset('storage/' . $local->image_path) }}" alt="location"
                    class="w-full h-48 object-cover rounded-t-xl ">

                <!-- Content -->
                <div class="p-4 w-full space-y-2">
                    <!-- Title -->
                    <p class="text-lg text-[#1d1d1d] font-semibold">{{ $local->title }}</p>

                    <!-- Location & Capacity -->
                    <div class="flex items-center justify-between text-sm text-[#91341b] font-medium">
                        <span><i class="fa-solid fa-location-dot mr-1"></i> {{ $local->location }}</span>
                        <span><i class="fa-solid fa-users mr-1"></i> {{ $local->capacite }} personnes</span>
                    </div>

                    <!-- Price -->
                    <p class="text-lg font-bold text-[#1d1d1d]">{{ $local->prix }} DH</p>
                </div>

                <!-- Button -->
                <div class="px-4 pb-4 w-full">
                    <a href="{{ route('location-details', $local->id) }}">
                        <button
                            class="w-full bg-[#db571b] text-white text-lg text-base px-6 py-3 rounded-md font-medium hover:opacity-90 transition cursor-pointer">
                            Voir
                        </button>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-20">
                Aucun local trouvé correspondant à vos critères.
            </div>
        @endforelse

        @if ($locals->count() > 0)
            {{ $locals->links() }}
        @endif
    </div>

    <!-- location PAGINATION -->
    {{-- <x-location-components.location-pagination locals="$locals"/> --}}
</div>

</div>

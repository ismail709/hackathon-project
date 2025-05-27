@props(['local', 'places_dispo'])
<div data-aos="zoom-in" class="lg:w-1/3 sticky top-28 bg-[#ea7025] text-white rounded-lg p-8 flex flex-col justify-between h-full">
    <!-- Informations principales -->
    <div class="grid grid-cols-2 gap-4 text-sm font-medium">
        <div class="bg-white text-[#ea7025] px-3 py-2 rounded text-center font-semibold">
            Catégorie : {{ $local->category->name ?? 'N/A' }}
        </div>
        <div class="bg-white text-[#ea7025] px-3 py-2 rounded text-center font-semibold">
            Places dispo : {{ $places_dispo }}
            {{-- Replace places_dispo with your actual attribute or calculate it --}}
        </div>
        <div class="bg-white text-[#ea7025] px-3 py-2 rounded text-center font-semibold">
            Prix : {{ $local->prix }} DH
        </div>
        <div class="bg-white text-[#ea7025] px-3 py-2 rounded text-center font-semibold">
            Capacité : {{ $local->capacite }} personnes
        </div>
    </div>

    <!-- Informations supplémentaires -->
    <div class="mt-8">
        <h3 class="font-semibold text-xl mb-2">Informations supplémentaires</h3>
        <p class="text-sm leading-relaxed text-white text-justify">
            {{ $local->additional_info ?? "Aucune information supplémentaire disponible." }}
            {{-- Add an additional_info column or adapt accordingly --}}
        </p>
    </div>

    <!-- Réservation -->
    <div class="mt-8">
        <h3 class="font-semibold text-xl mb-2">Comment réserver ?</h3>
        <p class="text-sm leading-relaxed text-white text-justify">
            {{ $local->reservation_instructions ?? "Veuillez remplir le formulaire en ligne ou nous contacter." }}
            {{-- Add this field or hardcode it if fixed --}}
        </p>
    </div>
</div>

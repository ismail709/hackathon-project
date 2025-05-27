<!-- FILTER CARD -->
<form method="GET" action="" data-aos="slide-right" class="w-full lg:w-[400px] bg-[#db571b] text-white p-10 rounded-xl space-y-6 self-start lg:sticky lg:top-28">

    <!-- Filtrage par Categorie -->
    <div>
        <label for="category" class="block font-medium mb-2 text-base">Filtrage par Catégorie</label>
        <input type="text" id="category" name="category" placeholder="Ex : Gestion de projet"
            class="w-full px-3 py-2 rounded bg-white text-sm text-[#1d1d1d] focus:outline-none placeholder:text-gray-500" />
    </div>

    <!-- Filtrage par Capacite -->
    <div>
        <label class="block font-medium mb-2 text-base">Filtrage par Capacité</label>
        <div class="space-y-2 text-sm text-white">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="capacity[]" value="0-10" class="accent-[#91341b]" />
                0 - 10
            </label>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="capacity[]" value="10-100" class="accent-[#91341b]" />
                10 - 100
            </label>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="capacity[]" value="100-500" class="accent-[#91341b]" />
                100 - 500
            </label>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="capacity[]" value="500+" class="accent-[#91341b]" />
                500+
            </label>
        </div>
    </div>

    <!-- Filtrage par Localisation -->
    <div>
        <label for="location" class="block font-medium mb-2 text-base">Filtrage par Localisation</label>
        <input type="text" id="location" name="location" placeholder="Ex : Casablanca"
            class="w-full px-3 py-2 rounded bg-white text-sm text-[#1d1d1d] focus:outline-none placeholder:text-gray-500" />
    </div>

    <!-- Filtrage par Prix -->
    <div>
        <label class="block font-medium mb-2 text-base">Filtrage par Prix</label>
        <div class="flex gap-2">
            <input type="number" name="min_price" placeholder="Min"
                class="w-1/2 px-3 py-2 rounded bg-white text-sm text-[#1d1d1d] focus:outline-none placeholder:text-gray-500" />
            <input type="number" name="max_price" placeholder="Max"
                class="w-1/2 px-3 py-2 rounded bg-white text-sm text-[#1d1d1d] focus:outline-none placeholder:text-gray-500" />
        </div>
    </div>

    <!-- Buttons -->
    <div class="flex flex-col md:flex-row lg:flex-col gap-4 pt-4">
        <button type="reset"
            class="bg-white text-[#91341b] px-4 py-2 cursor-pointer rounded hover:bg-[#fbd7c3] text-sm font-semibold">
            Réinitialiser
        </button>
        <button type="submit"
            class="bg-white text-[#91341b] px-4 py-2 cursor-pointer rounded hover:bg-[#fbd7c3] text-sm font-semibold">
            Filtrer
        </button>
    </div>

</form>

<div data-aos="zoom-in" class="bg-[#f8d5b0] p-4 md:p-8 rounded-xl shadow-md overflow-x-auto">
  <table class="min-w-full text-sm text-left text-gray-700">
    <thead class="bg-[#db571b] text-md uppercase font-medium text-white text-center">
      <tr>
        <th class="px-4 py-3 whitespace-nowrap">Réservation</th>
        <th class="px-4 py-3 whitespace-nowrap">Date</th>
        <th class="px-4 py-3 whitespace-nowrap">Heure</th>
        <th class="px-4 py-3 whitespace-nowrap">Durée</th>
        <th class="px-4 py-3 whitespace-nowrap">Nombre de personnes</th>
        <th class="px-4 py-3 whitespace-nowrap">Statut</th>
        <th class="px-4 py-3 whitespace-nowrap">Action</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 text-md font-medium text-center">
      <tr>
        <td class="px-4 py-4">#R001</td>
        <td class="px-4 py-4">27/05/2025</td>
        <td class="px-4 py-4">18:00</td>
        <td class="px-4 py-4">2h</td>
        <td class="px-4 py-4">4</td>
        <td class="px-4 py-4">
          <span class="inline-flex items-center px-3 py-1 text-nowrap rounded-md text-sm font-medium bg-green-100 text-green-800">
            Confirmé
          </span>
        </td>
        <td class="px-4 py-4">
          <button class="bg-red-500 hover:bg-red-600 text-white text-sm md:text-base font-semibold py-1.5 px-3 md:py-2 md:px-4 rounded-md transition duration-200">
            Annuler
          </button>
        </td>
      </tr>

      <tr>
        <td class="px-4 py-4">#R002</td>
        <td class="px-4 py-4">28/05/2025</td>
        <td class="px-4 py-4">20:00</td>
        <td class="px-4 py-4">1h30</td>
        <td class="px-4 py-4">2</td>
        <td class="px-4 py-4">
          <span class="inline-flex items-center px-3 py-1 text-nowrap rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
            En attente
          </span>
        </td>
        <td class="px-4 py-4">
          <button class="bg-red-500 hover:bg-red-600 text-white text-sm md:text-base font-semibold py-1.5 px-3 md:py-2 md:px-4 rounded-md transition duration-200">
            Annuler
          </button>
        </td>
      </tr>

      <tr>
        <td class="px-4 py-4">#R003</td>
        <td class="px-4 py-4">29/05/2025</td>
        <td class="px-4 py-4">19:30</td>
        <td class="px-4 py-4">3h</td>
        <td class="px-4 py-4">6</td>
        <td class="px-4 py-4">
          <span class="inline-flex items-center px-3 py-1 text-nowrap rounded-md text-sm font-medium bg-red-100 text-red-800">
            Annulé
          </span>
        </td>
        <td class="px-4 py-4">
          <button class="bg-red-500 hover:bg-red-600 text-white text-sm md:text-base font-semibold py-1.5 px-3 md:py-2 md:px-4 rounded-md transition duration-200">
            Annuler
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Pagination -->
  <div class="mt-6 flex justify-center">
    <x-pagination />
  </div>
</div>

<div data-aos="zoom-in" class="bg-[#f8d5b0] w-full md:w-2/3 p-4 md:p-8 rounded-xl shadow-md">
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm text-left text-gray-700">
      <thead class="bg-[#db571b] text-md uppercase font-medium text-white text-center">
        <tr>
          <th class="px-4 py-3">Facture</th>
          <th class="px-4 py-3">Réservation</th>
          <th class="px-4 py-3">Prix</th>
          <th class="px-4 py-3">Créé le</th>
          <th class="px-4 py-3">Statut</th>
          <th class="px-4 py-3">Action</th>
        </tr>
      </thead>
<tbody class="divide-y divide-gray-200 text-md font-medium text-center">
@forelse($factures as $facture)
    <tr>
        <td class="px-4 py-3">#F{{ str_pad($facture->id, 3, '0', STR_PAD_LEFT) }}</td>
        <td class="px-4 py-3">#R{{ str_pad($facture->reservation_id, 3, '0', STR_PAD_LEFT) }}</td>
        <td class="px-4 py-3">{{ $facture->montant }} DH</td>
        <td class="px-4 py-3">{{ $facture->created_at->format('d/m/Y') }}</td>
        <td class="px-4 py-3">
            @if($facture->status === 'paid')
                <span class="inline-flex px-3 py-1 rounded-md bg-green-100 text-nowrap text-green-800 text-sm">Réglée</span>
            @else
                <span class="inline-flex px-3 py-1 rounded-md bg-red-100 text-nowrap text-red-800 text-sm">Non Réglée</span>
            @endif
        </td>
        <td class="px-4 py-3 flex flex-row flex-nowrap gap-2 justify-center items-center">
            <a href="">
                <button class="bg-red-500 text-white py-2 px-3 text-nowrap rounded-md text-sm">Télécharger PDF</button>
            </a>
            @if($facture->status !== 'paid')
                <a href="">
                    <button class="bg-green-500 text-white py-2 px-3 rounded-md text-sm">Payer</button>
                </a>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center py-6 text-gray-500">Aucune facture trouvée.</td>
    </tr>
@endforelse

</tbody>

    </table>
    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        <x-pagination />
    </div>
  </div>
</div>

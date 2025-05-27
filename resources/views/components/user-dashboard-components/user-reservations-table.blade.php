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
  @forelse ($reservations as $reservation)
    <tr>
      <td class="px-4 py-4">#R{{ str_pad($reservation->id, 3, '0', STR_PAD_LEFT) }}</td>
      <td class="px-4 py-4">{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</td>
      <td class="px-4 py-4">{{ \Carbon\Carbon::parse($reservation->heure)->format('H:i') }}</td>
      <td class="px-4 py-4">{{ $reservation->duree }}h</td>
      <td class="px-4 py-4">{{ $reservation->people_nbr }}</td>
      <td class="px-4 py-4">
        @php
          $badge = match ($reservation->status) {
              \App\Enums\ReservationStatusEnum::CONFIRMED->value => 'bg-green-100 text-green-800',
              \App\Enums\ReservationStatusEnum::PENDING->value => 'bg-yellow-100 text-yellow-800',
              \App\Enums\ReservationStatusEnum::CANCELLED->value => 'bg-red-100 text-red-800',
              \App\Enums\ReservationStatusEnum::CHECKEDIN->value => 'bg-blue-100 text-blue-800',
              \App\Enums\ReservationStatusEnum::CHECKEDOUT->value => 'bg-gray-200 text-gray-800',
              default => 'bg-gray-100 text-gray-800'
          };
        @endphp
        <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium {{ $badge }}">
          {{ ucfirst(__($reservation->status)) }}
        </span>
      </td>
      <td class="px-4 py-4">
        @if (in_array($reservation->status, [
            \App\Enums\ReservationStatusEnum::CANCELLED->value,
            \App\Enums\ReservationStatusEnum::CHECKEDIN->value,
        ]))
          @if ($reservation->status === \App\Enums\ReservationStatusEnum::CANCELLED->value)
            <span class="text-gray-400 italic">Déjà annulée</span>
          @else
            <span class="text-gray-500 italic">Impossible d’annuler (Check-in effectué)</span>
          @endif
        @else
          <form action="{{ route('reservations.cancel', $reservation) }}" method="POST" onsubmit="return confirm('Annuler cette réservation ?')">
            @csrf
            @method('PATCH')
            <button class="bg-red-500 hover:bg-red-600 text-white text-sm md:text-base font-semibold py-1.5 px-3 md:py-2 md:px-4 rounded-md transition duration-200">
              Annuler
            </button>
          </form>
        @endif
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="7" class="px-4 py-4 text-gray-500 italic">Aucune réservation trouvée.</td>
    </tr>
  @endforelse
</tbody>


  </table>

  <!-- Pagination -->
  <div class="mt-6 flex justify-center">
    <x-pagination />
  </div>
</div>

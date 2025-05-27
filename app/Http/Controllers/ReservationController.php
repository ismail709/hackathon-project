<?php

namespace App\Http\Controllers;

use App\Enums\ReservationStatusEnum;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function cancel(Reservation $reservation)
    {
        if (!auth()->user()->id === $reservation->user_id) {
            return back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }
        // Check if already cancelled or checked-in
        if (in_array($reservation->status, [
            ReservationStatusEnum::CANCELLED->value,
            ReservationStatusEnum::CHECKEDIN->value,
        ])) {
            return back()->with('error', 'Cette réservation ne peut pas être annulée.');
        }

        // Update status to cancelled
        $reservation->status = ReservationStatusEnum::CANCELLED->value;
        $reservation->save();

        return back()->with('success', 'Réservation annulée avec succès.');
    }
}

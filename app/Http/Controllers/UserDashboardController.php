<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function profile()
    {
        return view('user-dashboard.user-profile');
    }

    public function invoices()
    {
    $user = auth()->user();

    $factures = Facture::whereHas('reservation', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->with('reservation')->latest()->paginate(10);

        return view('user-dashboard.user-invoices', compact('factures'));

    }

    public function reservations()
    {
            $reservations = Auth::user()->reservations()->with('local')->latest()->get();
        return view('user-dashboard.user-reservations',compact('reservations'));
    }
}

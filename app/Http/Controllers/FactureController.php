<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function download(Facture $facture)
    {
        // Load any necessary relationships for the invoice (e.g., reservation details)
        // Ensure 'reservation' is a defined relationship on your Facture model.
        $facture->load('reservation');

        // Load the Blade view that will serve as the PDF template.
        // The view 'pdf.facture' will be located at 'resources/views/pdf/facture.blade.php'.
        $pdf = Pdf::loadView('pdfs.facture', compact('facture'));

        // Return the PDF for download. The filename will be 'invoice-[id].pdf'.
        return $pdf->download('invoice-' . $facture->id . '.pdf');
    }
}
